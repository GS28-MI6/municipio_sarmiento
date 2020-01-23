<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clasificados Sarmiento</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link href="../../fontawesome/css/all.css" rel="stylesheet">
    <!-- Estilos -->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/clasificados.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <?php include("../include/header.php");?>
    <main>
        <form class="busqueda" name="buscar" id="buscar" action="clasificados.php" method="post">
            <div class="input-group">
                <input type="text" name="buscar" id="barraBusqueda" class="form-control border-dark py-2" placeholder="Buscar..." size="80" maxlength="64" pattern="[a-zA-Z0-9 ]{1,64}" oninvalid="this.setCustomValidity('Solo se permiten letras y números!')" onchange="try{setCustomValidity('')}catch(e){}">
                <div class="input-group-append">
                    <button class="btn btn-secondary" name="buscador" type="submit"><i class="fa fa-search"></i></button>
                </div>
                
        </form>
    </main>
    <?php include("../include/footer.php");?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/menu.js"></script>
</body>
</html>