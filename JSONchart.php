<!DOCTYPE html>
<html lang="es">
<?php
$title = utf8_decode($_GET['archivo']);
?>
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
</head>
<body onload="grafico('pie')">
    <?php include("include/header.php");?>

    <div id="contenedor-canvasjs" class="contenedor-canvasjs" style="margin:0;height:500px;width:100%;"></div>
    
    <div class="jumbotron pt-5 pb-5">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text font-weight-bold text-uppercase text-body border border-dark" for="seleccionar-tipo" style="background-color: rgb(92, 159, 214);">Tipo de Gráfico: </label>
            </div>
            <select class="custom-select font-weight-bold text-uppercase text-center border border-dark" id="seleccionar-tipo" onchange="grafico(value);">
                <option selected name="tipo" value="pie">Torta</option>
                <option name="tipo" value="doughnut">Dona</option>
                <option name="tipo" value="column">Columnas</option>
                <option name="tipo" value="bar">Barras</option>
                <option name="tipo" value="line">Linea</option>
                <option name="tipo" value="area">Area</option>
            </select>
        </div>
        <div class="input-group mb-3 justify-content-center">
            <a href="../inicio/busqueda.php" class="btn btn-info btn-md btn-outline-dark font-weight-bold text-uppercase" style="background-color: rgb(92, 159, 214);"><i class="fas fa-undo"></i> Volver a la base de datos</a>
        </div>
    </div>

    <?php include("include/footer.php");?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/menu.js"></script>
</body>
<!--CanvasJS-->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
    function grafico(tipo) {
        var mostrarLeyenda = false;
        if (tipo == 'pie' || tipo == 'doughnut'){
            mostrarLeyenda = true;
        }
        <?php
        $conexion = mysqli_connect('localhost', 'root', '7539510.', 'municipiocapitansarmiento') or die("Fallo en el establecimiento de la conexión");
        $sql = "SELECT * from archivos WHERE titulo='$title'";
        $result = mysqli_query($conexion, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
            ?>
            $(document).ready(function() {
                var dataPoints = [];
                $.getJSON("<?php echo '../' . $mostrar['direccion'] ?>", function(result) {
                    for (var i = 0; i <= result.dataPoints.length - 1; i++) {
                        dataPoints.push({
                            label: result.dataPoints[i].label,
                            y: parseInt(result.dataPoints[i].y)
                        });
                    }
                    var chart = new CanvasJS.Chart("contenedor-canvasjs", {
                        theme: "light1",
                        animationEnabled: true,
                        animationDuration: 1500,
                        exportEnabled: true,
                        exportFileName: "<?php echo utf8_encode($mostrar['titulo']) ?>",

                        title: {
                            text: "<?php echo utf8_encode($mostrar['titulo']) ?>",
                            margin: 25,
                            padding: 10,
                            borderThickness: 2
                        },
                        subtitles: [{
                            text: "<?php echo utf8_encode($mostrar['subtitulo']) ?>",
                            //fontColor: "red",
                            fontSize: 18
                        }],
                        legend: {
                            horizontalAlign: "center", // "left", "center" , "right"
                            verticalAlign: "bottom", // "top" , "center", "bottom"
                            fontSize: 15
                        },
                        data: [{
                            indexLabel: "{y}",
                            type: tipo,
                            showInLegend: mostrarLeyenda,
                            explodeOnClick: true,
                            dataPoints: dataPoints
                        }]
                    });
                    chart.render();
                });
            });
        <?php
        }
        mysqli_close($conexion); // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
        ?>
    }
</script>
</html>