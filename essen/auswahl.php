<!DOCTYPE html>
<html lang="de">
<head>
  <title>Auswahl – Schulkarte Essen</title>
  <?php include '../app/partials/head.php'; ?>
  <link href="https://unpkg.com/maplibre-gl/dist/maplibre-gl.css" rel="stylesheet">
  <script src="https://unpkg.com/maplibre-gl/dist/maplibre-gl.js"></script>
</head>

<body class="body-info-page">

  <?php $activePage = 'auswahl'; include '../app/partials/topnav.php'; ?>

  <main class="info-main info-main--800">

    <div class="header-row">
      <div>
        <div class="section-title">Schulkarte Essen</div>
        <h1 class="page-heading">Meine Auswahl</h1>
        <p id="subtitle" class="page-subtitle"></p>
      </div>
      <div class="header-actions no-print">
        <a href="index.php" class="back-link">← Zur Karte</a>
        <button onclick="window.print()" class="year-btn">⎙ Drucken</button>
      </div>
    </div>

    <div id="cardList"></div>

  </main>

  <script>
  window.APP_CONFIG = {
    city: 'essen'
  };
  </script>
  <script src="../app/js/auswahl.js"></script>

</body>
</html>