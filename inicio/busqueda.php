<!DOCTYPE html>
<html lang="es">
<head>
    <title>Municipio Sarmiento - Datos</title>
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
    <?php include("../include/header.php"); ?>
    <main>
        <div class="container-fluid w-100 mt-5">
            <nav class="navbar navbar-expand-xl bg-info border border-dark justify-content-center">
                <ul class="nav">
                    <li class="nav-item">
                        <form class="buscador" name="buscador" id="buscador" action="busqueda.php" method="post">
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
                            <form class="seleccionarCategorias" name="seleccionarCategorias" id="seleccionarCategorias" action="busqueda.php" method="post">
                                <input class="btn btn-info dropdown-item categorias" type="submit" name="cate" value="Todas"/>
                                <input class="btn btn-info dropdown-item categorias" type="submit" name="cate" value="Economía"/>
                                <input class="btn btn-info dropdown-item categorias" type="submit" name="cate" value="Salud"/>
                                <input class="btn btn-info dropdown-item categorias" type="submit" name="cate" value="Infraestructura"/>
                                <input class="btn btn-info dropdown-item categorias" type="submit" name="cate" value="Educación"/>
                                <input class="btn btn-info dropdown-item categorias" type="submit" name="cate" value="Cultura"/>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <?php            
            //          BUSQUEDA
            if (!$_POST) { //si TODAVIA NO HUBO BUSQUEDA
                $conexion = mysqli_connect('localhost', 'root', '', 'municipiocapitansarmiento') or die("Fallo en el establecimiento de la conexión");
                $sql = "SELECT * FROM archivos ORDER BY fechaAdaptacion";
                $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
                echo '<div class="container-fluid">
                        <div class="alert alert-info w-100 text-center">
                            <strong>Realice una busqueda o seleccione una categoría, estos son nuestros ' . mysqli_num_rows($resultado) . ' archivos:</strong>
                        </div>
                    </div>
                    <div class="table-responsive-md" style="height:700px;overflow-y:scroll;">
                        <table class="table table-striped table-hover text-center">
                            <thead class="thead-dark">    
                                <tr>
                                    <th>Archivo</th>
                                    <th>Categoría</th>
                                    <th>Creación</th>
                                    <th>Adaptación</th>
                                    <th>Gráfico!</th>
                                </tr>
                            </thead>'; //Al iniciar
                while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo toda la db
                    ?>
            <tr>
                <td><?php echo utf8_encode( $mostrar['titulo']) ?></td>
                <td><?php echo utf8_encode( $mostrar['categoria']) ?></td>
                <td><?php echo date("d/m/Y", strtotime($mostrar['fechaCreacion']))?></td>
                <td><?php echo date("d/m/Y", strtotime($mostrar['fechaAdaptacion']))?></td>
                <td><?php echo '<a class="btn btn-info" href=../JSONchart.php/?archivo=' . utf8_encode($mostrar['titulo']) . '><i class="fas fa-chart-pie"></i> Ver!</a>'?></td>
                <!--Link a JSONchart.php, con el archivo deseado-->
            </tr>
            <?php
            }
            mysqli_close($conexion); // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
            echo '</table></div>';
        }else{
        //          BUSQUEDA POR TEXTO
        if (isset($_POST['buscador'])) { //HUBO BUSQUEDA
            $busqueda = utf8_decode($_POST['buscar']);//RECIBO LO QUE HAY DENTRO DEL INPUT
            $conexion = mysqli_connect('localhost', 'root', '7539510.', 'municipiocapitansarmiento') or die("Fallo en el establecimiento de la conexión");
            $sql = "SELECT * FROM archivos ORDER BY fechaAdaptacion";
            $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
            if (empty($busqueda)) { //SI ESTA VACIA
                echo '<div class="container-fluid">
                        <div class="alert alert-info w-100 text-center">
                            <strong>Realice una busqueda o seleccione una categoría, estos son nuestros ' . mysqli_num_rows($resultado) . ' archivos:</strong>
                        </div>
                    </div>
                    <div class="table-responsive-md" style="height:700px;overflow-y:scroll;">
                        <table class="table table-striped table-hover text-center">
                            <thead class="thead-dark">    
                                <tr>
                                    <th>Archivo</th>
                                    <th>Categoría</th>
                                    <th>Creación</th>
                                    <th>Adaptación</th>
                                    <th>Gráfico!</th>
                                </tr>
                            </thead>';
                while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo toda la db
                    ?>
                    <tr>
                        <td><?php echo utf8_encode($mostrar['titulo']) ?></td>
                        <td><?php echo utf8_encode($mostrar['categoria']) ?></td>
                        <td><?php echo date("d/m/Y", strtotime($mostrar['fechaCreacion']))?></td>
                        <td><?php echo date("d/m/Y", strtotime($mostrar['fechaAdaptacion']))?></td>
                        <td><?php echo '<a class="btn btn-info" href=../JSONchart.php/?archivo=' . utf8_decode($mostrar['titulo']) . '><i class="fas fa-chart-pie"></i> Ver!</a>' ?></td>
                        <!--Link a JSONchart.php, con el archivo deseado-->
                    </tr>
                <?php
            }
            echo '</table></div>';//CIERRE TABLA
            ?>
            <?php
        } else { //SI NO ESTA VACIA
            //Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar
            $sql = "SELECT * FROM archivos WHERE titulo LIKE '%" . $busqueda . "%' ORDER BY fechaAdaptacion";
            $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
            if (mysqli_num_rows($resultado) > 0) { //Si hay resultados
                echo '<div class="container-fluid">
                        <div class="alert alert-success w-100 text-center">
                            <strong>Encontramos ' . mysqli_num_rows($resultado) . ' resultado/s para la busqueda: "' . utf8_encode($busqueda) . '"</strong>
                        </div>
                    </div>
                    <div class="table-responsive-md" style="height:700px;overflow-y:scroll;">
                        <table class="table table-striped table-hover text-center">
                            <thead class="thead-dark">    
                                <tr>
                                    <th>Archivo</th>
                                    <th>Categoría</th>
                                    <th>Creación</th>
                                    <th>Adaptación</th>
                                    <th>Gráfico!</th>
                                </tr>
                            </thead>';
                while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo la tabla CORRESPONDIENTE
                    ?>
                        <tr>
                            <td><?php echo utf8_encode($mostrar['titulo']) ?></td>
                            <td><?php echo utf8_encode($mostrar['categoria']) ?></td>
                            <td><?php echo date("d/m/Y", strtotime($mostrar['fechaCreacion']))?></td>
                            <td><?php echo date("d/m/Y", strtotime($mostrar['fechaAdaptacion']))?></td>
                            <td><?php echo '<a class="btn btn-info" href=../JSONchart.php/?archivo=' . utf8_encode($mostrar['titulo']) . '><i class="fas fa-chart-pie"></i> Ver!</a>' ?></td>
                            <!--Link a JSONchart.php, con el archivo deseado-->
                        </tr>
                    <?php
                }
                echo '</table></div>';//CIERRE TABLA
            } else {
                $sql = "SELECT * FROM archivos ORDER BY fechaAdaptacion";
                $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
                echo '<div class="container-fluid">
                        <div class="alert alert-warning w-100 text-center">
                            <strong>No hay resultados para la busqueda: "' . utf8_encode($busqueda) . '", lo sentimos! Estos son nuestros ' . mysqli_num_rows($resultado) . ' archivos:</strong>
                        </div>
                    </div>
                    <div class="table-responsive-md" style="height:700px;overflow-y:scroll;">
                        <table class="table table-striped table-hover text-center">
                            <thead class="thead-dark">    
                                <tr>
                                    <th>Archivo</th>
                                    <th>Categoría</th>
                                    <th>Creación</th>
                                    <th>Adaptación</th>
                                    <th>Gráfico!</th>
                                </tr>
                            </thead>'; //Si no se busco nada
                while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo toda la db
                    ?>
                        <tr>
                            <td><?php echo utf8_encode($mostrar['titulo']) ?></td>
                            <td><?php echo utf8_encode($mostrar['categoria']) ?></td>
                            <td><?php echo date("d/m/Y", strtotime($mostrar['fechaCreacion']))?></td>
                            <td><?php echo date("d/m/Y", strtotime($mostrar['fechaAdaptacion']))?></td>
                            <td><?php echo '<a class="btn btn-info" href=../JSONchart.php/?archivo=' . utf8_encode($mostrar['titulo']) . '><i class="fas fa-chart-pie"></i> Ver!</a>' ?></td>
                            <!--Link a JSONchart.php, con el archivo deseado-->
                        </tr>
                    <?php
                }
                echo '</table></div>';
            }
        }
        mysqli_close($conexion); // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
        }else{
        //          BUSQUEDA POR CATEGORIAS
        if (isset($_POST['cate'])) { //Si se ha seleccionado alguna categoría que no sean todas, hace el filtro.
            $categoria = utf8_decode($_POST['cate']);
            $conexion = mysqli_connect('localhost', 'root', '', 'municipiocapitansarmiento') or die("Fallo en el establecimiento de la conexión");
            if ($categoria == 'Todas') {
                $sql = "SELECT * FROM archivos ORDER BY fechaAdaptacion";
                $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
                echo '<div class="container-fluid">
                        <div class="alert alert-success w-100 text-center">
                            <strong>Encontramos ' . mysqli_num_rows($resultado) . ' resultado/s para todas las categorías</strong>
                        </div>
                    </div>
                    <div class="table-responsive-md" style="height:700px;overflow-y:scroll;">
                        <table class="table table-striped table-hover text-center">
                            <thead class="thead-dark">    
                                <tr>
                                    <th>Archivo</th>
                                    <th>Categoría</th>
                                    <th>Creación</th>
                                    <th>Adaptación</th>
                                    <th>Gráfico!</th>
                                </tr>
                            </thead>'; // Se recoge el número de resultados
                $sql = "SELECT * FROM archivos ORDER BY fechaAdaptacion";
                $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
                while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo toda la db
                    ?>
        <tr>
            <td><?php echo utf8_encode($mostrar['titulo']) ?></td>
            <td><?php echo utf8_encode($mostrar['categoria']) ?></td>
            <td><?php echo date("d/m/Y", strtotime($mostrar['fechaCreacion']))?></td>
            <td><?php echo date("d/m/Y", strtotime($mostrar['fechaAdaptacion']))?></td>
            <td><?php echo '<a class="btn btn-info" href=../JSONchart.php/?archivo=' . utf8_encode($mostrar['titulo']) . '><i class="fas fa-chart-pie"></i> Ver!</a>' ?></td>
            <!--Link a JSONchart.php, con el archivo deseado-->
        </tr>
        <?php
            }
            echo '</table></div>';
        } else {
            $sql = "SELECT * FROM archivos WHERE categoria='$categoria' ORDER BY fechaAdaptacion";
            $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
            if (mysqli_num_rows($resultado) > 0) { //Si hay resultados
                echo '<div class="container-fluid">
                        <div class="alert alert-success w-100 text-center">
                            <strong>Encontramos ' . mysqli_num_rows($resultado) . ' resultado/s para la categoría: "' . utf8_encode($categoria) . '"!</strong>
                        </div>
                    </div>
                    <div class="table-responsive-md" style="height:700px;overflow-y:scroll;">
                        <table class="table table-striped table-hover text-center">
                            <thead class="thead-dark">    
                                <tr>
                                    <th>Archivo</th>
                                    <th>Categoría</th>
                                    <th>Creación</th>
                                    <th>Adaptación</th>
                                    <th>Gráfico!</th>
                                </tr>
                            </thead>'; // Se recoge el número de resultados
                while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo la tabla solo si hay al menos 1 resultado 
                    ?>
        <tr>
            <td><?php echo utf8_encode($mostrar['titulo']) ?></td>
            <td><?php echo utf8_encode($mostrar['categoria']) ?></td>
            <td><?php echo date("d/m/Y", strtotime($mostrar['fechaCreacion']))?></td>
            <td><?php echo date("d/m/Y", strtotime($mostrar['fechaAdaptacion']))?></td>
            <td><?php echo '<a class="btn btn-info" href=../JSONchart.php/?archivo=' . utf8_encode($mostrar['titulo']) . '><i class="fas fa-chart-pie"></i> Ver!</a>' ?></td>
            <!--Link a JSONchart.php, con el archivo deseado-->
        </tr>
        <?php
                }
                echo "</table></div>"; //cierro la tabla
            } else {
                $sql = "SELECT * FROM archivos ORDER BY fechaAdaptacion";
                $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
                echo '<div class="container-fluid">
                        <div class="alert alert-warning w-100 text-center">
                            <strong>No hay resultados para la categoría: "' . utf8_encode($categoria) . '", lo sentimos! Estos son nuestros ' . mysqli_num_rows($resultado) . ' archivos:</strong>
                        </div>
                    </div>
                    <div class="table-responsive-md" style="height:700px;overflow-y:scroll;">
                        <table class="table table-striped table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                <th>Archivo</th>
                                <th>Categoría</th>
                                <th>Creación</th>
                                <th>Adaptación</th>
                                <th>Gráfico!</th>
                            </tr>
                        </thead>'; //Si no se busco nada
                while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo toda la db
                    ?>
        <tr>
            <td><?php echo utf8_encode($mostrar['titulo']) ?></td>
            <td><?php echo utf8_encode($mostrar['categoria']) ?></td>
            <td><?php echo date("d/m/Y", strtotime($mostrar['fechaCreacion']))?></td>
            <td><?php echo date("d/m/Y", strtotime($mostrar['fechaAdaptacion']))?></td>
            <td><?php echo '<a class="btn btn-info" href=../JSONchart.php/?archivo=' . utf8_encode($mostrar['titulo']) . '><i class="fas fa-chart-pie"></i> Ver!</a>' ?></td>
            <!--Link a JSONchart.php, con el archivo deseado-->
        </tr>
        <?php
                }
                echo '</table></div>';
            }
            mysqli_close($conexion); // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
        }}}}
        ?>
        </div>
    </main>
    <?php include("../include/footer.php"); ?>
    <script src="../js/menu.js"></script>
</body>
</html>