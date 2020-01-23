<!doctype html>
<html lang="es">
  <head>
    <title>Municipio Sarmiento</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link href="../../fontawesome/css/all.css" rel="stylesheet">
    <!-- Estilos -->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/footer.css">
  </head>
  <body>
    <?php include("../include/header.php");?>
    
    <!-- Slider -->
    <div class="main" id="main">
      <div id="slider" class="carousel slide pb-5" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#slider" data-slide-to="0" class="active bg-dark"></li>
          <li data-target="#slider" data-slide-to="1" class="bg-dark"></li>
          <li data-target="#slider" data-slide-to="2" class="bg-dark"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="myImg" src="../img/mapa_final.png" alt="Mapa">
            <div class="carousel-caption bg-light text-body font-weight-bold">
              <h3 class="textoTitulo">Datos Abiertos</h3>
              <p class="subTexto">Explorá la base de datos de tu ciudad!</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="myImg" src="../img/calendario_final.png" alt="Calendario Fiscal">
            <div class="carousel-caption bg-light text-body font-weight-bold">
              <h3 class="textoTitulo">Calendario Fiscal</h3>
              <p class="subTexto">Mirá tu calendario fiscal</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="myImg" src="../img/mapa_final.png" alt="Mapa2">
            <div class="carousel-caption bg-light text-body font-weight-bold">
              <h3 class="textoTitulo">Mapas</h3>
              <p class="subTexto">Conocé diferentes maneras de ver de tu ciudad!</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
          <i class="fas fa-chevron-circle-left fa-2x" style="color:black"></i>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
        <i class="fas fa-chevron-circle-right fa-2x" style="color:black"></i>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- /Slider -->

      <!-- Imagenes -->
      <div class="card-deck px-3 py-5">
        <div class="card border-dark flex-column justify-content-between">
          <img class="card-img-top img-thumbnail d-block" src="../img/casa_cultura.jpg" alt="Card image" style="width:100%;height:100%;">
          <div class="card-img-overlay d-block">
            <a href="paginas/cultura.php" class="btn btn-block stretched-link mt-auto text-center text-uppercase font-weight-bolder" style="background:#5c9fd6;">Cultura</a>
          </div>
        </div>
        <div class="card border-dark flex-column justify-content-between">
          <img class="card-img-top img-thumbnail" src="../img/municipio.jpg" alt="Card image" style="width:100%;height:100%;">
          <div class="card-img-overlay d-block">
            <a href="paginas/municipio.php" class="btn btn-block stretched-link mt-auto text-center text-uppercase font-weight-bolder" style="background:#5c9fd6;">Municipio</a>
          </div>
        </div>
        <div class="card border-dark flex-column justify-content-between">
          <img class="card-img-top img-thumbnail" src="../img/hospital.jpg" alt="Card image" style="width:100%;height:100%;">
          <div class="card-img-overlay d-block">
            <a href="paginas/salud.php" class="btn btn-block stretched-link mt-auto text-center text-uppercase font-weight-bolder" style="background:#5c9fd6;">Salud</a>
          </div>
        </div>
        <div class="card border-dark flex-column justify-content-between">
          <img class="card-img-top img-thumbnail" src="../img/escuela.jpg" alt="Card image" style="width:100%;height:100%;">
          <div class="card-img-overlay d-block">
            <a href="paginas/educacion.php" class="btn btn-block stretched-link mt-auto text-center text-uppercase font-weight-bolder" style="background:#5c9fd6;">Educación</a>
          </div>
        </div>
      </div>
      <!-- /Imagenes -->

      <?php include("../include/footer.php");?>
</div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/menu.js"></script>
  </body>
</html>