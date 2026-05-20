<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Grundschulprofile Göttingen – Gymnasium-Übergänge 2024/25</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,500;0,9..144,700;1,9..144,300&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  :root {
    --blue: #1a4b8c;
    --blue-light: #ddeaf8;
    --blue-mid: #3a6fc4;
    --gold: #c8922a;
    --gold-light: #fdf3e0;
    --red-soft: #f5ebe8;
    --teal: #1a7f6e;
    --teal-light: #dff2ee;
    --bg: #f7f5f0;
    --surface: #ffffff;
    --text: #1c1c1c;
    --text-muted: #6b6560;
    --text-faint: #a09890;
    --border: #e8e4dc;
    --radius: 12px;
    --shadow: 0 2px 16px rgba(0,0,0,0.07);
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    font-size: 15px;
    line-height: 1.6;
  }

  /* ── Header ── */
  header {
    background: var(--blue);
    color: white;
    padding: 3rem 2rem 2.5rem;
    position: relative;
    overflow: hidden;
  }
  header::before {
    content: '';
    position: absolute; inset: 0;
    background: repeating-linear-gradient(
      45deg,
      transparent,
      transparent 40px,
      rgba(255,255,255,0.03) 40px,
      rgba(255,255,255,0.03) 80px
    );
  }
  .header-inner {
    max-width: 900px;
    margin: 0 auto;
    position: relative;
  }
  header .label {
    font-size: 11px;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.55);
    margin-bottom: 0.75rem;
    font-weight: 400;
  }
  header h1 {
    font-family: 'Fraunces', serif;
    font-size: clamp(1.8rem, 5vw, 3rem);
    font-weight: 500;
    line-height: 1.15;
    margin-bottom: 1rem;
    color: #fff;
  }
  header p {
    color: rgba(255,255,255,0.70);
    max-width: 560px;
    font-size: 14px;
    font-weight: 300;
    line-height: 1.7;
  }
  .header-meta {
    display: flex;
    gap: 2rem;
    margin-top: 2rem;
    flex-wrap: wrap;
  }
  .header-stat {
    display: flex;
    flex-direction: column;
    gap: 2px;
  }
  .header-stat .num {
    font-family: 'Fraunces', serif;
    font-size: 1.6rem;
    font-weight: 500;
    color: #fff;
    line-height: 1;
  }
  .header-stat .desc {
    font-size: 11px;
    color: rgba(255,255,255,0.5);
    text-transform: uppercase;
    letter-spacing: 0.06em;
  }

  /* ── Layout ── */
  main {
    max-width: 900px;
    margin: 0 auto;
    padding: 3rem 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 2.5rem;
  }

  /* ── School Card ── */
  .school-card {
    background: var(--surface);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    overflow: hidden;
  }

  /* Map area */
  .map-area {
    width: 100%;
    height: 220px;
    background: #e8eef5;
    position: relative;
    overflow: hidden;
  }
  .map-area iframe {
    width: 100%;
    height: 100%;
    border: none;
    display: block;
  }
  .map-overlay-label {
    position: absolute;
    top: 10px;
    left: 10px;
    background: white;
    border-radius: 6px;
    padding: 4px 10px;
    font-size: 11px;
    font-weight: 500;
    color: var(--text-muted);
    box-shadow: 0 1px 6px rgba(0,0,0,0.15);
    pointer-events: none;
    display: flex;
    align-items: center;
    gap: 5px;
  }
  .map-pin {
    width: 8px;
    height: 8px;
    background: var(--blue);
    border-radius: 50%;
    flex-shrink: 0;
  }

  /* Card body */
  .card-body {
    padding: 1.5rem 1.75rem;
  }

  .card-top {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1rem;
  }

  .rank-num {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--blue);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Fraunces', serif;
    font-size: 1rem;
    font-weight: 500;
    flex-shrink: 0;
    margin-top: 2px;
  }

  .card-title-group { flex: 1; min-width: 0; }

  .card-name {
    font-family: 'Fraunces', serif;
    font-size: 1.3rem;
    font-weight: 500;
    line-height: 1.2;
    margin-bottom: 3px;
  }

  .card-addr {
    font-size: 12px;
    color: var(--text-faint);
    display: flex;
    align-items: center;
    gap: 4px;
  }

  .gym-box {
    text-align: right;
    flex-shrink: 0;
  }
  .gym-pct {
    font-family: 'Fraunces', serif;
    font-size: 2rem;
    font-weight: 700;
    color: var(--blue);
    line-height: 1;
  }
  .gym-label {
    font-size: 10px;
    color: var(--text-faint);
    text-transform: uppercase;
    letter-spacing: 0.06em;
  }

  /* Tags */
  .tags {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    margin-bottom: 1rem;
  }
  .tag {
    font-size: 11px;
    padding: 3px 9px;
    border-radius: 20px;
    font-weight: 500;
    letter-spacing: 0.01em;
  }
  .tag-blue { background: var(--blue-light); color: var(--blue); }
  .tag-teal { background: var(--teal-light); color: var(--teal); }
  .tag-gold { background: var(--gold-light); color: var(--gold); }
  .tag-red  { background: var(--red-soft); color: #8b3e2a; }

  /* Bar */
  .bar-wrap {
    background: #f0ede8;
    border-radius: 4px;
    height: 7px;
    margin-bottom: 6px;
    overflow: hidden;
  }
  .bar-fill {
    height: 7px;
    border-radius: 4px;
    background: linear-gradient(90deg, var(--blue-mid), var(--blue));
  }
  .bar-legend {
    display: flex;
    justify-content: space-between;
    font-size: 11px;
    color: var(--text-faint);
    margin-bottom: 1.25rem;
  }

  hr.section-div {
    border: none;
    border-top: 1px solid var(--border);
    margin: 1.25rem 0;
  }

  /* Ruf */
  .ruf-text {
    font-size: 13.5px;
    color: var(--text-muted);
    line-height: 1.65;
    margin-bottom: 1.25rem;
  }

  /* Info grid */
  .info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 8px;
    margin-bottom: 1.25rem;
  }
  .info-cell {
    background: var(--bg);
    border-radius: 8px;
    padding: 9px 12px;
  }
  .info-cell-label {
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    color: var(--text-faint);
    margin-bottom: 3px;
  }
  .info-cell-val {
    font-size: 13px;
    font-weight: 500;
    color: var(--text);
    line-height: 1.3;
  }

  /* Angebote */
  .angebote-title {
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--text-faint);
    margin-bottom: 8px;
    font-weight: 500;
  }
  .angebote-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
  }
  .angebot-chip {
    background: var(--bg);
    border: 1px solid var(--border);
    border-radius: 6px;
    font-size: 12px;
    padding: 4px 10px;
    color: var(--text-muted);
    line-height: 1.2;
  }

  /* Ganztag footer */
  .ganztag-note {
    margin-top: 1rem;
    padding: 8px 12px;
    background: var(--blue-light);
    border-radius: 7px;
    font-size: 12px;
    color: var(--blue);
    display: flex;
    align-items: center;
    gap: 7px;
  }
  .ganztag-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: var(--blue);
    flex-shrink: 0;
  }

  /* Footer */
  footer {
    text-align: center;
    padding: 2rem;
    font-size: 12px;
    color: var(--text-faint);
    border-top: 1px solid var(--border);
    background: var(--surface);
  }

  @media (max-width: 600px) {
    .card-body { padding: 1.25rem; }
    .card-top { flex-wrap: wrap; }
    .gym-box { text-align: left; }
    .header-meta { gap: 1.5rem; }
    .map-area { height: 180px; }
  }
</style>
</head>
<body>

<header>
  <div class="header-inner">
    <div class="label">Stadt Göttingen · Schuljahr 2024/25</div>
    <h1>Grundschulprofile &amp;<br>Gymnasium-Übergänge</h1>
    <p>Die acht Grundschulen mit der höchsten Gymnasial­übergangs&shy;quote, sortiert nach Prozentanteil. Datenquelle: offizielle Übergangsdaten der Stadt Göttingen.</p>
    <div class="header-meta">
      <div class="header-stat">
        <span class="num">8</span>
        <span class="desc">Schulprofile</span>
      </div>
      <div class="header-stat">
        <span class="num">69–83 %</span>
        <span class="desc">Gym.-Anteil</span>
      </div>
      <div class="header-stat">
        <span class="num">2024/25</span>
        <span class="desc">Schuljahr</span>
      </div>
    </div>
  </div>
</header>

<main id="school-list"></main>

<footer>
  Daten: Stadt Göttingen – Übergangsdaten 2024/25 · Schulprofile recherchiert aus öffentlich zugänglichen Schulhomepages · Karten: OpenStreetMap
</footer>

<script>
const schools = [
  {
    "rank": 1,
    "name": "Herman-Nohl-Schule",
    "adresse": "Immanuel-Kant-Str. 44b, 37083 Göttingen",
    "stadtviertel": "Hainberg / Südstadt",
    "lat": 51.523101,
    "lng": 9.945975,
    "gym": 29,
    "total": 35,
    "gymPct": 83,
    "typ": "Offene Ganztagsschule",
    "schueler": "ca. 140",
    "lehrer": "k. A.",
    "verhaeltnis": "k. A.",
    "ruf": "Ganztagsgrundschule im Hainberg-Viertel mit starkem Gemeinschaftsansatz. Leitbild: Aktiv, Kreativ, Konstruktiv. Barrierefrei und inklusiv ausgerichtet. Benannt nach dem Göttinger Pädagogik-Professor Herman Nohl (1879-1960), der an der Göttinger Universität lehrte.",
    "angebote": [
      "Streitschlichter-AG",
      "Kreative Arbeitsgemeinschaften",
      "Bewegungsorientiertes Lernen",
      "Aktive Elternpartizipation",
      "Regelmäßige Projektarbeit",
      "Förderverein"
    ],
    "ganztag": "Ja - Offene Ganztagsschule (Mo-Do nachmittags)",
    "tags": [
      ["Ganztag","blue"],
      ["Inklusion","teal"],
      ["Gemeinschaftsschule","gold"]
    ]
  },
  {
    "rank": 2,
    "name": "Grundschule Herberhausen",
    "adresse": "Eulenloch 6, 37075 Göttingen",
    "stadtviertel": "Herberhausen / Roringen (ländliche Ortsteile)",
    "lat": 51.540858,
    "lng": 9.982236,
    "gym": 19,
    "total": 23,
    "gymPct": 83,
    "typ": "Sportprofil-Schule (zertifiziert)",
    "schueler": "ca. 110",
    "lehrer": "7",
    "verhaeltnis": "ca. 1 : 16",
    "ruf": "Kleinste Grundschule Göttingens - seit 1971 für die Ortsteile Herberhausen und Roringen. Sehr familiäres Umfeld, hohes Engagement. Die Schule richtet das jährliche Schachturnier der Göttinger Grundschulen aus und kooperiert mit dem ASC Göttingen.",
    "angebote": [
      "Sportprofil (Basketball, Fußball)",
      "Schach-AG & Schachturnier-Ausrichter",
      "Radio-AG",
      "Schulgarten",
      "Schülerzeitung (Eulenblatt)",
      "Chor",
      "Bücherei",
      "Zirkusprojekt"
    ],
    "ganztag": "Ja - ASC-Betreuung",
    "tags": [
      ["Sportprofil","teal"],
      ["Kleinschule","gold"],
      ["Ländlich","red"]
    ]
  },
  {
    "rank": 3,
    "name": "Bonifatiusschule I",
    "adresse": "Bürgerstraße 52-54, 37073 Göttingen",
    "stadtviertel": "Innenstadt / ehem. Casinogelände",
    "lat": 51.528809,
    "lng": 9.935981,
    "gym": 33,
    "total": 40,
    "gymPct": 83,
    "typ": "Katholische Bekenntnisschule (Angebotsschule)",
    "schueler": "ca. 160",
    "lehrer": "k. A.",
    "verhaeltnis": "k. A.",
    "ruf": "Eine von zwei katholischen Grundschulen Göttingens. Leitbild: christlich - familiär - musikalisch - sportlich. Einschreibung vorrangig für kath. Familien stadtweiter Herkunft; nichtkatholische Kinder per Losverfahren. Enge Kooperation mit den Kirchgemeinden St. Michael und Maria Frieden.",
    "angebote": [
      "Musikalischer Schwerpunkt (Chor, Kirchenjahresfeste)",
      "Sportlicher Schwerpunkt",
      "Kooperation St. Michael & Maria Frieden",
      "Individuelle Förderdiagnostik ab Kl. 1",
      "Ganztagsbetreuung (ab SJ 26/27)"
    ],
    "ganztag": "Ab Schuljahr 2026/27 verpflichtend",
    "tags": [
      ["Katholisch","red"],
      ["Musisch","gold"],
      ["Innenstadtlage","teal"]
    ]
  },
  {
    "rank": 4,
    "name": "Albanischule",
    "adresse": "Albaniplatz 1, 37073 Göttingen",
    "stadtviertel": "Innenstadt / Albaniviertel",
    "lat": 51.534324,
    "lng": 9.941046,
    "gym": 46,
    "total": 61,
    "gymPct": 75,
    "typ": "Offene Ganztagsschule mit Begabungsförderung",
    "schueler": "ca. 246",
    "lehrer": "20 + 3 päd. Mitarbeiter*innen",
    "verhaeltnis": "ca. 1 : 12",
    "ruf": "Eine der renommiertesten Göttinger Grundschulen mit breitem Kooperationsnetz. Seit Juli 2023 in der Bundesinitiative Leistung macht Schule. Drehtürmodell für Hochbegabte, Legorobotik, Sprachen-AGs in Kooperation mit zwei Gymnasien.",
    "angebote": [
      "Sprachen-AGs Spanisch / Französisch / Latein (MPG)",
      "Chinesisch-AG (Hainberg-Gymnasium)",
      "Informatik-AG (Max-Planck-Gymnasium)",
      "Lego-Robotik-AG",
      "Schach-AG",
      "Chor & Theater-AG",
      "Instrumentenkarussell (Geige, Flöte, Gitarre)",
      "Drehtürmodell für Hochbegabte",
      "Jugend forscht junior"
    ],
    "ganztag": "Ja - Mo bis Do bis 17:00 Uhr",
    "tags": [
      ["Begabungsförderung","blue"],
      ["Innenstadtlage","teal"],
      ["Gymnasium-Kooperation","blue"]
    ]
  },
  {
    "rank": 5,
    "name": "Leinebergschule",
    "adresse": "Weserstraße 32, 37081 Göttingen",
    "stadtviertel": "Weende / Nordstadt",
    "lat": 51.526704,
    "lng": 9.912279,
    "gym": 34,
    "total": 46,
    "gymPct": 74,
    "typ": "Offene Ganztagsschule - Englisch-Immersionsprofil",
    "schueler": "ca. 260",
    "lehrer": "22",
    "verhaeltnis": "ca. 1 : 12",
    "ruf": "Besonderer Bekanntheitsgrad durch 20-jähriges Englisch-Immersionsprogramm. Zertifizierte sportfreundliche Schule. Großes Kooperationsnetz mit dem Felix-Klein-Gymnasium (Lego-Roboter, Naturwissenschaften, Fremdsprachen). Schulgarten und Lehr-Küche.",
    "angebote": [
      "Englisch-Immersionsprogramm (20 Jahre!)",
      "Lego-Roboter-AG (mit FKG)",
      "Schwimmen in Klasse 3",
      "Schüler-Lehrküche",
      "Streitschlichter-AG",
      "Projektzirkus alle 4 Jahre",
      "Mensa",
      "Basketballfeld",
      "Mathe-Olympiade"
    ],
    "ganztag": "Ja - Mo bis Do bis 15:30 Uhr, Mensa",
    "tags": [
      ["Englisch-Immersion","blue"],
      ["Begabungsförderung","blue"],
      ["Sportfreundlich","teal"]
    ]
  },
  {
    "rank": 6,
    "name": "Höltyschule",
    "adresse": "Am Pfingstanger 38, 37075 Göttingen",
    "stadtviertel": "Weststadt / Nähe Nikolausberger Weg",
    "lat": 51.543631,
    "lng": 9.955088,
    "gym": 15,
    "total": 21,
    "gymPct": 71,
    "typ": "Offene Ganztagsschule - Bewegte Schule",
    "schueler": "ca. 169",
    "lehrer": "13 + 2 Lehramtsanwärter",
    "verhaeltnis": "ca. 1 : 13",
    "ruf": "Überschaubare Gemeinschaft im Westen der Stadt. Leitbild: Vom ICH zum WIR - so lernen wir hier. Täglich Sportunterricht, Projekt Fit für Pisa. Jahrzehnte gewachsene Schulkultur mit starkem Fokus auf demokratische Partizipation.",
    "angebote": [
      "Täglich Sportunterricht - Fit für Pisa",
      "Ganztag mit Bewegungsprofil",
      "Musisch-kreative AGs",
      "Förderverein & Hort",
      "Demokratische Partizipation"
    ],
    "ganztag": "Ja - Offene Ganztagsschule",
    "tags": [
      ["Bewegte Schule","teal"],
      ["Weststadt","red"],
      ["Überschaubar","gold"]
    ]
  },
  {
    "rank": 7,
    "name": "Wilhelm-Busch-Schule",
    "adresse": "Bornbreite 1, 37085 Göttingen",
    "stadtviertel": "Geismar (südlicher Stadtteil)",
    "lat": 51.512311,
    "lng": 9.969173,
    "gym": 41,
    "total": 59,
    "gymPct": 69,
    "typ": "Umweltschule + Sportfreundliche Schule + Inklusionsklassen",
    "schueler": "k. A. (öffentlich)",
    "lehrer": "k. A.",
    "verhaeltnis": "k. A.",
    "ruf": "Profilierte Schule mit zwei offiziellen Zertifizierungen: Umweltschule (6x ausgezeichnet) und Sportfreundliche Schule. Besonders bekannt für Spezialklassen für sprachauffällige und hörgeschädigte Kinder. Internationales Erasmus-Schulpartnerschaftsprojekt.",
    "angebote": [
      "Klassen für sprachauffällige Kinder",
      "Klassen für hörgeschädigte Kinder",
      "Umweltschule (6x ausgezeichnet)",
      "Sportfreundliche Schule",
      "SINUS (Mathe & Naturwiss.)",
      "Göttinger Knabenchor-Kooperation",
      "Erasmus-Schulprojekt",
      "Lesementoren"
    ],
    "ganztag": "Ja",
    "tags": [
      ["Inklusion","teal"],
      ["Umweltschule","teal"],
      ["Sprachförderung","gold"]
    ]
  },
  {
    "rank": 8,
    "name": "Wilhelm-Henneberg-Schule",
    "adresse": "Petrikirchstraße 21, 37077 Göttingen",
    "stadtviertel": "Weende (nördlicher Ortsteil)",
    "lat": 51.559739,
    "lng": 9.938348,
    "gym": 25,
    "total": 36,
    "gymPct": 69,
    "typ": "Offene Ganztagsschule - Schule ohne Noten",
    "schueler": "ca. 110-140",
    "lehrer": "ca. 8-12",
    "verhaeltnis": "ca. 1 : 13",
    "ruf": "Seit 2017/18 Schule ohne Noten (Berichtszeugnisse). Historisches, modernisiertes Schulgebäude am Rande des alten Weender Ortskerns. Englisch und Flöte ab Klasse 1. Benannt nach Wilhelm Henneberg (1825-1890), Begründer der modernen Tierernährungslehre.",
    "angebote": [
      "Englisch ab Klasse 1",
      "Flöte ab Klasse 1",
      "Schwimmen (Kl. 2 & 3)",
      "Kooperation Stiftung Lesen",
      "Göttinger Knabenchor",
      "Stadtbibliothek-Kooperation",
      "Schulgarten & Streuobstwiese",
      "ASC Junior Club",
      "Kirchtag-Projekttag"
    ],
    "ganztag": "Ja - Mo bis Do bis 15:30 Uhr (seit SJ 2018/19)",
    "tags": [
      ["Schule ohne Noten","blue"],
      ["Weende","gold"],
      ["Historisches Gebäude","red"]
    ]
  }
];

function buildCard(s) {
  const mapSrc = `https://www.openstreetmap.org/export/embed.html?bbox=${s.lng-0.012}%2C${s.lat-0.007}%2C${s.lng+0.012}%2C${s.lat+0.007}&layer=mapnik&marker=${s.lat}%2C${s.lng}`;
  const barW = s.gymPct;

  const tagHtml = s.tags.map(([t, c]) =>
    `<span class="tag tag-${c}">${t}</span>`
  ).join('');

  const angeboteHtml = s.angebote.map(a =>
    `<span class="angebot-chip">${a}</span>`
  ).join('');

  return `
  <article class="school-card">
    <div class="map-area">
      <iframe
        src="${mapSrc}"
        title="Karte: ${s.name}"
        loading="lazy"
        allowfullscreen
      ></iframe>
      <div class="map-overlay-label">
        <div class="map-pin"></div>
        ${s.name}
      </div>
    </div>

    <div class="card-body">
      <div class="card-top">
        <div class="rank-num">${s.rank}</div>
        <div class="card-title-group">
          <div class="card-name">${s.name}</div>
          <div class="card-addr">&#128205; ${s.adresse}</div>
        </div>
        <div class="gym-box">
          <div class="gym-pct">${s.gymPct}%</div>
          <div class="gym-label">Gymnasium</div>
        </div>
      </div>

      <div class="tags">${tagHtml}</div>

      <div class="bar-wrap">
        <div class="bar-fill" style="width:${barW}%"></div>
      </div>
      <div class="bar-legend">
        <span>${s.gym} von ${s.total} Sch&#252;ler*innen wechseln ans Gymnasium</span>
        <span>${s.gymPct}%</span>
      </div>

      <hr class="section-div">

      <p class="ruf-text">${s.ruf}</p>

      <div class="info-grid">
        <div class="info-cell">
          <div class="info-cell-label">Stadtviertel / Lage</div>
          <div class="info-cell-val">${s.stadtviertel}</div>
        </div>
        <div class="info-cell">
          <div class="info-cell-label">Schultyp</div>
          <div class="info-cell-val">${s.typ}</div>
        </div>
        <div class="info-cell">
          <div class="info-cell-label">Sch&#252;ler*innen</div>
          <div class="info-cell-val">${s.schueler}</div>
        </div>
        <div class="info-cell">
          <div class="info-cell-label">Lehrkr&#228;fte</div>
          <div class="info-cell-val">${s.lehrer}</div>
        </div>
        <div class="info-cell">
          <div class="info-cell-label">Lehrer : Sch&#252;ler</div>
          <div class="info-cell-val">${s.verhaeltnis}</div>
        </div>
      </div>

      <hr class="section-div">

      <div class="angebote-title">Besondere Angebote &amp; Profile</div>
      <div class="angebote-grid">${angeboteHtml}</div>

      <div class="ganztag-note">
        <div class="ganztag-dot"></div>
        Ganztagsangebot: ${s.ganztag}
      </div>
    </div>
  </article>`;
}

document.getElementById('school-list').innerHTML =
  schools.map(buildCard).join('');
</script>
</body>
</html>
