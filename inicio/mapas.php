<!doctype html>
<html lang="es">
<head>
  <title>Municipio Sarmiento - Nosotros</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link href="../../fontawesome/css/all.css" rel="stylesheet">
    <!-- Estilos -->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
  <style>
  .categorias:hover>.dropdown-menu {
      display: block;
  }
  .categorias:hover {
      background-color: rgb(49, 185, 206);
  }
  </style>
</head>
<body>

  <?php include("../include/header.php");?>
  <main>
    <div class="container-fluid w-100 mt-5">
      <nav class="navbar navbar-expand-xl bg-info border border-dark justify-content-center">
          <ul class="nav">
              <li class="nav-item">
                  <form class="buscador" name="buscador" id="buscador" action="mapas.php" method="post">
                      <div class="input-group">
                          <input type="text" name="buscar" id="barraBusqueda" class="form-control border-dark py-2" placeholder="Buscar..." size="80" maxlength="64" pattern="[a-zA-Z0-9 ]{1,64}" oninvalid="this.setCustomValidity('Solo se permiten letras y números!')" onchange="try{setCustomValidity('')}catch(e){}">
                          <div class="input-group-append">
                              <button class="btn btn-secondary" name="buscador" type="submit"><i class="fa fa-search"></i></button>
                          </div>
                      </form>
                  </div>
              </li>
              <li class="nav-item dropdown categorias">
                  <a class="nav-link text-uppercase text-body text-center font-weight-bold dropdown-toggle btn" href="#" id="navbardrop" data-toggle="dropdown">seleccionar categoría</a>
                  <div class="dropdown-menu text-uppercase bg-info border border-dark">
                      <form class="seleccionarCategorias" name="seleccionarCategorias" id="seleccionarCategorias" action="mapas.php" method="post">
                          <input class="btn btn-info dropdown-item categorias" type="submit" name="cate" value="Todas"/>
                          <input class="btn btn-info dropdown-item categorias" type="submit" name="cate" value="Calles"/>
                          <input class="btn btn-info dropdown-item categorias" type="submit" name="cate" value="Lluvias"/>
                          <input class="btn btn-info dropdown-item categorias" type="submit" name="cate" value="Temperatura"/>
                      </form>
                  </div>
              </li>
          </ul>
      </nav>
    </div>
    <?php

    //          SIN BUSQUEDA

      if (!$_POST) { //si TODAVIA NO HUBO BUSQUEDA
        $conexion = mysqli_connect('localhost', 'root', '7539510.', 'municipiocapitansarmiento') or die("Fallo en el establecimiento de la conexión");
        $sql = "SELECT * FROM mapas";
        $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
        echo '<div class="container-fluid">
                <div class="alert alert-info w-100 text-center">
                    <strong>Realice una busqueda o seleccione una categoría, estos son nuestros ' . mysqli_num_rows($resultado) . ' mapas:</strong>
                </div>
            </div>
            <div class="card-deck pt-5 pb-5" style="height:1000px;overflow-y:scroll;">'; //Al iniciar
        while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo toda la db
    ?>
    <div class="card" style="width:100%;height:300px;">
      <img class="card-img-top img-thumbnail" src="../mapas/<?php echo $mostrar['categoria']?>/<?php echo $mostrar['titulo']?>/<?php echo $mostrar['miniatura']?>" alt="Card image" style="width:100%;height:300px;">
      <div class="card-img-overlay d-flex flex-column">
        <a class="btn btn-block stretched-link border-dark mt-auto text-center text-uppercase font-weight-bolder" style="background:#5c9fd6;" href="../mapa.php/?mapa=<?php echo $mostrar['id']?>"><?php echo $mostrar['titulo']?></a>
      </div>
    </div>
    <?php
      }
      mysqli_close($conexion); // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
      echo '</div>';
      }else{

      //          BUSQUEDA POR TEXTO

      if (isset($_POST['buscador'])) { //HUBO BUSQUEDA
        $busqueda = utf8_decode($_POST['buscar']);//RECIBO LO QUE HAY DENTRO DEL INPUT
        $conexion = mysqli_connect('localhost', 'root', '7539510.', 'municipiocapitansarmiento') or die("Fallo en el establecimiento de la conexión");
        $sql = "SELECT * FROM mapas";
        $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
        if (empty($busqueda)) { //SI ESTA VACIA
          echo '<div class="container-fluid">
                  <div class="alert alert-info w-100 text-center">
                      <strong>Realice una busqueda o seleccione una categoría, estos son nuestros ' . mysqli_num_rows($resultado) . ' mapas:</strong>
                  </div>
                </div>
                <div class="card-deck pt-5 pb-5" style="height:1000px;overflow-y:scroll;">';
          while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo toda la db
    ?>
      <div class="card" style="width:100%;height:300px;">
        <img class="card-img-top" src="../mapas/<?php echo $mostrar['categoria']?>/<?php echo $mostrar['titulo']?>/<?php echo $mostrar['miniatura']?>" alt="Card image" style="width:100%;height:300px;">
        <div class="card-img-overlay d-flex flex-column">
          <a class="btn btn-block stretched-link border-dark mt-auto text-center text-uppercase font-weight-bolder" style="background:#5c9fd6;" href="../mapa.php/?mapa=<?php echo $mostrar['id']?>"><?php echo $mostrar['titulo']?></a>
        </div>
      </div>
    <?php
          }
          echo '</div>';//CIERRE coleccion de cartas
    ?>
    <?php
        }else{ //SI NO ESTA VACIA
          //Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar
          $sql = "SELECT * FROM mapas WHERE titulo LIKE '%" . $busqueda . "%'";
          $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
          if (mysqli_num_rows($resultado) > 0) { //Si hay resultados
            echo '<div class="container-fluid">
                    <div class="alert alert-success w-100 text-center">
                        <strong>Encontramos ' . mysqli_num_rows($resultado) . ' resultado/s para la busqueda: "' . utf8_encode($busqueda) . '"</strong>
                    </div>
                  </div>
                  <div class="card-deck pt-5 pb-5" style="height:1000px;overflow-y:scroll;">';
            while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo la coleccion de cartas CORRESPONDIENTE
    ?>
      <div class="card" style="width:100%;height:300px;">
        <img class="card-img-top" src="../mapas/<?php echo $mostrar['categoria']?>/<?php echo $mostrar['titulo']?>/<?php echo $mostrar['miniatura']?>" alt="Card image" style="width:100%;height:300px;">
        <div class="card-img-overlay d-flex flex-column">
          <a class="btn btn-block stretched-link border-dark mt-auto text-center text-uppercase font-weight-bolder" style="background:#5c9fd6;" href="../mapa.php/?mapa=<?php echo $mostrar['id']?>"><?php echo $mostrar['titulo']?></a>
        </div>
      </div>
    <?php
            }
            echo '</div>';//CIERRE coleccion de cartas
          }else{
            $sql = "SELECT * FROM mapas";
            $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
            echo '<div class="container-fluid">
                    <div class="alert alert-warning w-100 text-center">
                        <strong>No hay resultados para la busqueda: "' . utf8_encode($busqueda) . '", lo sentimos! Estos son nuestros ' . mysqli_num_rows($resultado) . ' mapas:</strong>
                    </div>
                  </div>
                  <div class="card-deck pt-5 pb-5" style="height:1000px;overflow-y:scroll;">'; //Si no se busco nada
            while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo toda la db
    ?>
      <div class="card" style="width:100%;height:300px;">
        <img class="card-img-top" src="../mapas/<?php echo $mostrar['categoria']?>/<?php echo $mostrar['titulo']?>/<?php echo $mostrar['miniatura']?>" alt="Card image" style="width:100%;height:300px;">
        <div class="card-img-overlay d-flex flex-column">
          <a class="btn btn-block stretched-link border-dark mt-auto text-center text-uppercase font-weight-bolder" style="background:#5c9fd6;" href="../mapa.php/?mapa=<?php echo $mostrar['id']?>"><?php echo $mostrar['titulo']?></a>
        </div>
      </div>
    <?php
            }
              echo '</div>';
          }
        }
        mysqli_close($conexion); // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
      }else{

        //          BUSQUEDA POR CATEGORIAS

        if (isset($_POST['cate'])) { //Si se ha seleccionado alguna categoría.
          $categoria = utf8_decode($_POST['cate']);
          $conexion = mysqli_connect('localhost', 'root', '7539510.', 'municipiocapitansarmiento') or die("Fallo en el establecimiento de la conexión");
          if ($categoria == 'Todas') { //Si la categoria seleccionada ES Todas.
            $sql = "SELECT * FROM mapas";
            $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
            echo '<div class="container-fluid">
                    <div class="alert alert-success w-100 text-center">
                        <strong>Encontramos ' . mysqli_num_rows($resultado) . ' resultado/s para todas las categorías</strong>
                    </div>
                  </div>
                  <div class="card-deck pt-5 pb-5" style="height:1000px;overflow-y:scroll;">'; // Se recoge el número de resultados
            $sql = "SELECT * FROM mapas";
            $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
            while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo toda la db
    ?>
      <div class="card" style="width:100%;height:300px;">
        <img class="card-img-top" src="../mapas/<?php echo $mostrar['categoria']?>/<?php echo $mostrar['titulo']?>/<?php echo $mostrar['miniatura']?>" alt="Card image" style="width:100%;height:300px;">
        <div class="card-img-overlay d-flex flex-column">
          <a class="btn btn-block stretched-link border-dark mt-auto text-center text-uppercase font-weight-bolder" style="background:#5c9fd6;" href="../mapa.php/?mapa=<?php echo $mostrar['id']?>"><?php echo $mostrar['titulo']?></a>
        </div>
      </div>
    <?php
            }
            echo '</div>';
          }else{ //Si se ha seleccionado alguna categoría que NO sea Todas.
            $sql = "SELECT * FROM mapas WHERE categoria='$categoria'";
            $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
            if (mysqli_num_rows($resultado) > 0) { //Si hay resultados
              echo '<div class="container-fluid">
                      <div class="alert alert-success w-100 text-center">
                          <strong>Encontramos ' . mysqli_num_rows($resultado) . ' resultado/s para la categoría: "' . utf8_encode($categoria) . '"!</strong>
                      </div>
                    </div>
                    <div class="card-deck pt-5 pb-5" style="height:1000px;overflow-y:scroll;">'; // Se recoge el número de resultados
              while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo la coleccion de cartas solo si hay al menos 1 resultado 
    ?>
      <div class="card" style="width:100%;height:300px;">
        <img class="card-img-top" src="../mapas/<?php echo $mostrar['categoria']?>/<?php echo $mostrar['titulo']?>/<?php echo $mostrar['miniatura']?>" alt="Card image" style="width:100%;height:300px;">
        <div class="card-img-overlay d-flex flex-column">
          <a class="btn btn-block stretched-link border-dark mt-auto text-center text-uppercase font-weight-bolder" style="background:#5c9fd6;" href="../mapa.php/?mapa=<?php echo $mostrar['id']?>"><?php echo $mostrar['titulo']?></a>
        </div>
      </div>
    <?php
              }
              echo "</div>"; //cierro la coleccion de cartas
            }else{
              $sql = "SELECT * FROM mapas";
              $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
              echo '<div class="container-fluid">
                      <div class="alert alert-warning w-100 text-center">
                          <strong>No hay resultados para la categoría: "' . utf8_encode($categoria) . '", lo sentimos! Estos son nuestros ' . mysqli_num_rows($resultado) . ' mapas:</strong>
                      </div>
                    </div>
                    <div class="card-deck pt-5 pb-5" style="height:1000px;overflow-y:scroll;">'; //Si no se busco nada
              while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo toda la db
    ?>
      <div class="card" style="width:100%;height:300px;">
        <img class="card-img-top" src="../mapas/<?php echo $mostrar['categoria']?>/<?php echo $mostrar['titulo']?>/<?php echo $mostrar['miniatura']?>" alt="Card image" style="width:100%;height:300px;">
        <div class="card-img-overlay d-flex flex-column">
          <a class="btn btn-block stretched-link border-dark mt-auto text-center text-uppercase font-weight-bolder" style="background:#5c9fd6;" href="../mapa.php/?mapa=<?php echo $mostrar['id']?>"><?php echo $mostrar['titulo']?></a>
        </div>
      </div>
    <?php
              }
              echo '</div>';
            }
            mysqli_close($conexion); // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
        }
      }
    }
  }
    ?>

</main>
<?php include("../include/footer.php"); ?>
<script src="../js/menu.js"></script>
</body>
</html>