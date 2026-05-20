<!DOCTYPE html>
<html lang="de">
<head>
  <title>Über – Schulkarte Bielefeld</title>
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
          <div class="section-title">Schulkarte Bielefeld</div>
          <h1 class="info-heading">Über diese Karte</h1>
          <p class="info-lead">
            Hintergründe zu Datenquellen, Methodik und dem Projekt.
          </p>
        </div>

        <div class="info-card">

          <h2 class="info-card-title">Datengrundlage</h2>

          <div class="info-label info-label--mb">
            Woher stammen die Daten?
          </div>

          <p class="info-card-body">
            Die Schuldaten stammen aus dem Open-Data-Angebot des Ministeriums für
            Schule und Bildung NRW (MSB) und werden unter der Lizenz
            <span class="code-inline">dl-de/by-2-0</span>
            bereitgestellt.
          </p>

          <p class="info-card-body">
            Koordinaten und weitere Metadaten wurden maschinell ergänzt und
            vereinheitlicht, damit die Schulen auf der Karte zuverlässig dargestellt
            und gefiltert werden können.
          </p>

        </div>

        <div class="info-card">

          <h2 class="info-card-title">Methodik</h2>

          <div class="info-label info-label--mb">
            Wie werden die Daten verarbeitet?
          </div>

          <p class="info-card-body">
            Schulformen wurden über ein einheitliches Schema normalisiert.
            Zusätzlich wurden Bezeichnungen vereinheitlicht und einzelne
            Datensätze ergänzt oder bereinigt.
          </p>

          <p class="info-card-body">
            Weitere Informationen zur Transformation und Datenaufbereitung
            werden hier zukünftig ergänzt.
          </p>

        </div>

        <div class="info-card">

          <h2 class="info-card-title">Projekt</h2>

          <div class="info-label info-label--mb">
            Wer steckt hinter der Schulkarte?
          </div>

          <p class="info-card-body">
            Die Schulkarte Bielefeld ist ein unabhängiges Projekt zur besseren
            Orientierung im lokalen Bildungsangebot.
          </p>

          <p class="info-card-body">
            Informationen zu Urhebern, Kontaktmöglichkeiten und weiteren
            Entwicklungen folgen hier.
          </p>

        </div>

      </div><!-- /contentArea -->

    </div><!-- /schulinfo-layout -->

  </main>

  <script src="../app/js/contentnavi.js"></script>

</body>
</html>