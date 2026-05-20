<!DOCTYPE html>
<html lang="de">
<head>
  <title>Über – Schulkarte Berlin</title>
  <?php include '../app/partials/head.php'; ?>
</head>

<body class="body-info-page">

  <?php $activePage = 'ueber'; include '../app/partials/topnav.php'; ?>

  <main class="info-main">

    <div class="schulinfo-layout">

      <nav id="contentNav" class="schulinfo-sidebar">
        <div class="schulinfo-nav-label">Inhalt</div>
        <!-- ul injected by contentnavi.js -->
      </nav>

      <div id="contentArea" class="schulinfo-content">

        <div class="info-intro">
          <div class="section-title">Schulkarte Berlin</div>

          <h1 class="info-heading">
            Über diese Karte
          </h1>

          <p class="info-lead">
            Informationen zu Datenquellen, Methodik und dem Projekt
            Schulkarte Berlin.
          </p>
        </div>

        <div class="info-card">

          <h2 class="info-card-title">Datengrundlage</h2>

          <div class="info-label info-label--mb">
            Woher stammen die Daten?
          </div>

          <p class="info-card-body">
            Die Schuldaten basieren auf öffentlich verfügbaren Informationen
            der Berliner Verwaltung sowie auf offenen Datensätzen und
            ergänzenden Quellen.
          </p>

          <p class="info-card-body">
            Standorte, Schulformen und weitere Informationen werden
            schrittweise ergänzt und vereinheitlicht, um eine möglichst
            übersichtliche Darstellung aller Schulen zu ermöglichen.
          </p>

          <div class="info-links">
            <a href="https://www.berlin.de/sen/bildung/" target="_blank" rel="noopener">
              Berliner Senatsverwaltung Bildung
            </a>
          </div>

        </div>

        <div class="info-card">

          <h2 class="info-card-title">Methodik</h2>

          <div class="info-label info-label--mb">
            Wie werden die Daten verarbeitet?
          </div>

          <p class="info-card-body">
            Schulformen, Bezirke und weitere Eigenschaften werden in ein
            einheitliches Schema überführt, damit Schulen einfacher
            gefiltert und verglichen werden können.
          </p>

          <p class="info-card-body">
            Einige Inhalte werden automatisiert verarbeitet oder ergänzt.
            Weitere Informationen zur Datenaufbereitung folgen in einer
            späteren Version.
          </p>

        </div>

        <div class="info-card">

          <h2 class="info-card-title">Bezirke und Regionen</h2>

          <div class="info-label info-label--mb">
            Welche Gebiete deckt die Karte ab?
          </div>

          <p class="info-card-body">
            Die Schulkarte umfasst Schulen aus allen Berliner Bezirken,
            darunter Mitte, Neukölln, Charlottenburg-Wilmersdorf,
            Friedrichshain-Kreuzberg oder Pankow.
          </p>

          <p class="info-card-body">
            Perspektivisch können zusätzliche regionale Informationen,
            Bezirksprofile und Kartenansichten ergänzt werden.
          </p>

        </div>

        <div class="info-card">

          <h2 class="info-card-title">Projektstatus</h2>

          <div class="info-label info-label--mb">
            Ist die Plattform bereits vollständig?
          </div>

          <p class="info-card-body">
            Die Schulkarte Berlin befindet sich aktuell im Aufbau.
            Inhalte, Schulprofile und Zusatzinformationen werden
            kontinuierlich erweitert.
          </p>

          <p class="info-card-body">
            Einige Datenbereiche dienen derzeit noch als Platzhalter
            und werden schrittweise vervollständigt.
          </p>

        </div>

        <div class="info-card">

          <h2 class="info-card-title">Projekt</h2>

          <div class="info-label info-label--mb">
            Wer steckt hinter der Schulkarte?
          </div>

          <p class="info-card-body">
            Die Schulkarte Berlin ist ein unabhängiges Informationsprojekt
            zur besseren Orientierung im Berliner Bildungsangebot.
          </p>

          <p class="info-card-body">
            Weitere Informationen zu Mitwirkenden, technischen Hintergründen
            und zukünftigen Funktionen können hier ergänzt werden.
          </p>

        </div>

      </div><!-- /contentArea -->

    </div><!-- /schulinfo-layout -->

  </main>

  <script src="../app/js/contentnavi.js"></script>

</body>
</html>