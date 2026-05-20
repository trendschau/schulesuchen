<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/utility.php';

// =========================
// CONFIG — city-specific
// =========================

$bundesland = "Berlin";
$city       = "Berlin";
$lat        = 52.52;
$lng        = 13.405;
$zoom       = 11;
$outFile    = __DIR__ . "/../berlin/data/schulen.geojson";

$license = 'Verwendete Daten: Senatsverwaltung für Bildung, Jugend und Familie Berlin '
         . '(<a href="https://daten.berlin.de">Berlin Open Data</a>), '
         . '<a href="https://www.govdata.de/dl-de/by-2-0">dl-de/by-2-0</a>';

$mapping = "Schularten wurden über mapSchulart() in ein UI-Schema überführt.";

// =========================
// SCHULART MAPPING — Berlin school-type labels → canonical schulform
// =========================

function mapSchulart($schulart) {
    $map = [
        "Grundschule"                        => "Grundschule",
        "Integrierte Sekundarschule"         => "Gesamtschule",
        "Gemeinschaftsschule"                => "Gesamtschule",
        "Gesamtschule"                       => "Gesamtschule",
        "Oberschule"                         => "Gesamtschule",
        "Gymnasium"                          => "Gymnasium",
        "Berufliches Gymnasium"              => "Gymnasium",
        "Realschule"                         => "Realschule",
        "Hauptschule"                        => "Hauptschule",
        "Förderschule"                       => "Förderschule",
        "Sonderpädagogisches Förderzentrum"  => "Förderschule",
        "Oberstufenzentrum"                  => "Berufsschule",
        "Berufsschule"                       => "Berufsschule",
        "Berufsfachschule"                   => "Berufsschule",
        "Fachoberschule"                     => "Berufsschule",
        "Fachschule"                         => "Berufsschule",
        "Freie Waldorfschule"                => "Freie Schule",
        "Volkshochschule"                    => "Andere Schule",
        "Ergänzungsschule"                   => "Andere Schule",
    ];

    return $map[$schulart] ?? "Andere Schule";
}

// =========================
// LOAD SOURCE DATA
// =========================

$raw = file_get_contents(__DIR__ . "/../data-berlin/schulen_orig.json");
if ($raw === false) {
    echo "ERROR: cannot read schulen-berlin.json\n";
    exit(1);
}

$geojson = json_decode($raw, true);
if (!$geojson || !isset($geojson['features'])) {
    echo "ERROR: invalid GeoJSON\n";
    exit(1);
}

// =========================
// TRANSFORM
// =========================

$features = [];

foreach ($geojson['features'] as $f) {
    $p      = $f['properties'] ?? [];
    $coords = $f['geometry']['coordinates'] ?? null;

    if (!$coords) continue;

    [$featureLng, $featureLat] = $coords; // GeoJSON is [lng, lat], already WGS84

    $id = $p['bsn'] ?? null;

    $props = [];

    // =========================
    // BASE FIELDS
    // =========================

    setProp($props, "id",     $id);
    setProp($props, "id_key", "bsn");

    setProp($props, "schulname", $p['schulname'] ?? null);

    setProp($props, "schulform_raw", $p['schulart'] ?? null);
    setProp($props, "schulform",     mapSchulart($p['schulart'] ?? ''));

    setProp($props, "traeger", $p['traeger'] ?? null);

    setProp($props, "rechtsform", match($p['traeger'] ?? '') {
        "öffentlich" => "öffentlich",
        "privat"     => "privat",
        default      => null
    });

    setProp($props, "regbezirk", $bundesland);
    setProp($props, "bezirk",    $p['bezirk']   ?? null);
    setProp($props, "ortsteil",  $p['ortsteil'] ?? null);
    setProp($props, "ort",       $city);
    setProp($props, "plz",       $p['plz']      ?? null);

    // Berlin source splits strasse and hausnr — merge them
    $strasse = trim(($p['strasse'] ?? '') . ' ' . ($p['hausnr'] ?? ''));
    setProp($props, "strasse", $strasse ?: null);

    setProp($props, "bundesland", $bundesland);

    // =========================
    // CONTACT
    // =========================

    setProp($props, "telefon",  $p['telefon']  ?? null);
    setProp($props, "fax",      $p['fax']      ?? null);
    setProp($props, "email",    $p['email']    ?? null);
    setProp($props, "internet", $p['internet'] ?? null);

    // =========================
    // FLAT METRICS
    // =========================

    // Berlin source has no separate pupil count or social index file yet —
    // leave as null so setProp skips them entirely
    setProp($props, "schuelerzahl",       $p['schuelerzahl']       ?? null);
    setProp($props, "klassengroesse_avg", $p['klassengroesse_avg'] ?? null);
    setProp($props, "sozialindex",        $p['sozialindex']        ?? null);

    // =========================
    // EIGENSCHAFTEN
    // =========================

    $eigenschaften = [];

    // Berlin source currently has no feature flags in the JSON;
    // placeholders are ready for when the data becomes available
    if (!empty($p['ganztag'])) {
        $eigenschaften[] = $p['ganztag'] === "gebunden"
            ? "gebundener_ganztag"
            : "offener_ganztag";
    }

    if (!empty($p['inklusion']))              $eigenschaften[] = "inklusion";
    if (!empty($p['bilingual']))              $eigenschaften[] = "bilingual";
    if (!empty($p['mint']))                   $eigenschaften[] = "mint";
    if (!empty($p['musik']))                  $eigenschaften[] = "musik";
    if (!empty($p['sport']))                  $eigenschaften[] = "sport";
    if (!empty($p['jahrgangsuebergreifend'])) $eigenschaften[] = "jahrgangsuebergreifend";

    setProp($props, "eigenschaften", array_values(array_unique($eigenschaften)));

    // =========================
    // FEATURE
    // =========================

    $features[] = [
        "type"     => "Feature",
        "geometry" => [
            "type"        => "Point",
            "coordinates" => [$featureLng, $featureLat],
        ],
        "properties" => $props,
    ];
}

// =========================
// OUTPUT
// =========================

$meta = [
    "city"           => $city,
    "lat"            => $lat,
    "lng"            => $lng,
    "zoom"           => $zoom,
    "lizenzhinweis"  => $license,
    "mappinghinweis" => $mapping,
    "zone_layers"    => [
        ["file" => "data/esb_2022.json", "label" => "22/23"],
        ["file" => "data/esb_2023.json", "label" => "23/24"],
        ["file" => "data/esb_2024.json", "label" => "24/25"],
        ["file" => "data/esb_2025.json", "label" => "25/26", "default" => true],
        ["file" => "data/esb_2026.json", "label" => "26/27"],
    ],
];

writeGeoJson($outFile, $meta, $features);