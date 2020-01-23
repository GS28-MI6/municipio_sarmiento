<!doctype html>
<html lang="es">
  <head>
    <title>Municipio Sarmiento - Salud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link href="../../fontawesome/css/all.css" rel="stylesheet">
    <!-- Estilos -->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <!-- Adaptar height de iframe -->
    <script type="text/javascript" src="../js/iframeWordpress.js"></script>
    <style>
      .iframe-container iframe{
        width:100%;
        border:0;
      }
    </style>
  </head>
  <body>
    <?php include("../include/header.php");?>
    
    <div class="iframe-container mb-5">
      <iframe id="ifrm" src="../wordpress/salud/" scrolling="no" onload="setIframeHeight(this.id)"></iframe>
    </div>

    <?php include("../include/footer.php");?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/menu.js"></script>
  </body>
</html>