<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/utility.php';

// =========================
// CONFIG — city-specific
// =========================

$city    = "Bielefeld";
$year    = 2024;
$inFile  = __DIR__ . "/../data-bielefeld/grundschuleinzugsbereiche_2024_25.gml";
$outFile = __DIR__ . "/../bielefeld/data/einzugsbereiche.geojson";

$license = '© Stadt Bielefeld, Amt für Geoinformation und Kataster (CC BY 4.0) '
         . '(<a href="https://open-data.bielefeld.de">open-data.bielefeld.de</a>), '
         . '<a href="https://www.govdata.de/dl-de/by-2-0">CC BY 4.0</a>';

$mapping = "GML-Quelle in EPSG:25832 (UTM Zone 32N). Koordinaten wurden per "
         . "utmToLatLng() (utility.php) nach WGS84 (EPSG:4326) transformiert. "
         . "Polygon-Geometrien wurden nach MultiPolygon normiert.";

// =========================
// GML NAMESPACES
// =========================

$ns = [
    'gml' => 'http://www.opengis.net/gml',
    'ms'  => 'http://mapserver.gis.umn.edu/mapserver',
    'wfs' => 'http://www.opengis.net/wfs',
];

// =========================
// GML HELPERS
// =========================

/**
 * Parst eine gml:posList (flache Koordinatenfolge "X Y X Y …") in ein Array
 * von [lng, lat]-Paaren in WGS84.
 *
 * Nutzt utmToLatLng() aus utility.php — gibt [lat, lng] zurück,
 * daher hier tauschen auf GeoJSON-Reihenfolge [lng, lat].
 */
function parsePosList(string $posListText): array
{
    $values = array_map('floatval', preg_split('/\s+/', trim($posListText)));
    $coords = [];
    for ($i = 0; $i < count($values) - 1; $i += 2) {
        [$lat, $lng] = utmToLatLng($values[$i], $values[$i + 1]);
        $coords[] = [$lng, $lat];  // GeoJSON: [lng, lat]
    }
    return $coords;
}

/**
 * Liest ein gml:Polygon-Element und gibt einen GeoJSON-MultiPolygon-Eintrag zurück.
 * Innere Ringe (Löcher) werden korrekt als weitere Ringe übergeben.
 */
function parseGmlPolygon(\DOMElement $polygonEl, \DOMXPath $xpath): array
{
    $rings = [];

    // Äußerer Ring
    $exteriorNodes = $xpath->query('gml:exterior/gml:LinearRing/gml:posList', $polygonEl);
    if ($exteriorNodes->length > 0) {
        $rings[] = parsePosList($exteriorNodes->item(0)->nodeValue);
    }

    // Innere Ringe (Löcher / Enklaven)
    $interiorNodes = $xpath->query('gml:interior/gml:LinearRing/gml:posList', $polygonEl);
    foreach ($interiorNodes as $interior) {
        $rings[] = parsePosList($interior->nodeValue);
    }

    // GeoJSON MultiPolygon-Struktur: [ [ [outerRing], [hole1], … ] ]
    return [$rings];
}

// =========================
// LOAD SOURCE DATA
// =========================

if (!file_exists($inFile)) {
    fwrite(STDERR, "Fehler: Datei nicht gefunden: $inFile\n");
    exit(1);
}

$dom = new \DOMDocument();
$dom->load($inFile);

$xpath = new \DOMXPath($dom);
foreach ($ns as $prefix => $uri) {
    $xpath->registerNamespace($prefix, $uri);
}

$featureNodes = $xpath->query('//gml:featureMember/ms:grundschuleinzugsbereiche_2024_25_pl');

if ($featureNodes->length === 0) {
    fwrite(STDERR, "Fehler: Keine Features im GML gefunden.\n");
    exit(1);
}

// =========================
// TRANSFORM
// =========================

$features = [];

foreach ($featureNodes as $node) {

    $gseb_nr   = trim($xpath->evaluate('string(ms:gseb_nr)',   $node));
    $schule    = trim($xpath->evaluate('string(ms:schule)',    $node));
    $label     = trim($xpath->evaluate('string(ms:label)',     $node));
    $bemerkung = trim($xpath->evaluate('string(ms:bemerkung)', $node));

    if ($gseb_nr === '') continue;

    $polygonNodes = $xpath->query('ms:msGeometry/gml:Polygon', $node);
    if ($polygonNodes->length === 0) continue;

    $multiPolygonCoords = parseGmlPolygon($polygonNodes->item(0), $xpath);

    $props = [];

    // =========================
    // BASE FIELDS
    // =========================

    setProp($props, "id",             "bielefeld-{$year}-{$gseb_nr}");
    setProp($props, "id_key",         "gseb_nr");

    setProp($props, "schulname",      $schule !== '' ? $schule : $label);
    setProp($props, "schulname_kurz", $label  !== '' ? $label  : $schule);

    setProp($props, "zone_id",        $gseb_nr);
    setProp($props, "district_id",    null);
    setProp($props, "district_name",  null);

    setProp($props, "city",           $city);
    setProp($props, "bundesland",     "NRW");
    setProp($props, "year",           $year);

    // =========================
    // EXTRA
    // =========================

    if ($bemerkung !== '') {
        setProp($props, "bemerkung", $bemerkung);
    }

    // =========================
    // FEATURE
    // =========================

    $features[] = [
        'type'       => 'Feature',
        'geometry'   => [
            'type'        => 'MultiPolygon',
            'coordinates' => $multiPolygonCoords,
        ],
        'properties' => $props,
    ];
}

// =========================
// OUTPUT
// =========================

$meta = [
    'city'           => $city,
    'year'           => $year,
    'lizenzhinweis'  => $license,
    'mappinghinweis' => $mapping,
];

writeGeoJson($outFile, $meta, $features);