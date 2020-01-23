<!DOCTYPE html>
<html lang="es">
<?php
$id = utf8_decode($_GET['mapa']);
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Municipio Sarmiento - Mapa</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link href="../../fontawesome/css/all.css" rel="stylesheet">
    <!-- Estilos -->
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/footer.css">
	<!--OpenLayers-->
	<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css">
</head>
<body>
	<?php include("include/header.php");

		$conexion = mysqli_connect('localhost', 'root', '7539510.', 'municipiocapitansarmiento') or die("Fallo en el establecimiento de la conexión");
		$sql = "SELECT * FROM mapas WHERE id='$id'";
		$resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
		while ($mostrar = mysqli_fetch_array($resultado)) { //Imprimo toda la db
	?>
	<div class="container w-100">
        <img class="mx-auto d-block img-fluid pb-5 pt-5" src="../mapas/<?php echo $mostrar['categoria']?>/<?php echo $mostrar['titulo']?>/<?php echo $mostrar['mapa']?>" alt="Mapa Seleccionado"/>
    </div>

	<div class="jumbotron pt-5 pb-5">
		<div class="input-group mb-3 justify-content-center">
			<a href="../mapaChart.php/?archivo=<?php echo $mostrar['id']?>" class="btn btn-info btn-md btn-outline-dark font-weight-bold text-uppercase m-2" style="background-color: rgb(92, 159, 214);"><i class="fas fa-chart-pie mr-2"></i>Ver gráfico</a>
			<a href="../inicio/mapas.php" class="btn btn-info btn-md btn-outline-dark font-weight-bold text-uppercase m-2" style="background-color: rgb(92, 159, 214);"><i class="fas fa-map-marked-alt mr-2"></i> Ir a mapas</a>
		</div>
	</div>

	<?php
		}mysqli_close($conexion); // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
		  
	include("include/footer.php");?>
    <script src="../js/menu.js"></script>
</body>
</html>