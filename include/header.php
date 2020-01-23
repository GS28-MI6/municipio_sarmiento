<div class="titular">
    <a href="../inicio/index.php"><img src="../img/logo_municipio.png" alt="" class="logo_muni"></a>
    <div class="redes">
        <img src="../img/facebook_celeste.png" alt="" class="facebook">
        <img src="../img/instagram_celeste.png" alt="" class="instagram">
        <img src="../img/twitter_celeste.png" alt="" class="twitter">
    </div>
</div>
    <div class="toggler" onclick="header()">
        <img src="../img/municipio_sarmiento.png" alt="">
        <a href="#" class="btnMenu" aria-hidden="true"><i class="icono fa fa-bars"></i></a>
    </div>
<nav class="navNoB" id="nav">
    <ul class="principal">
        <li class="button_nav">
            <div class="buttonNoB">
                <a href="../inicio/index.php" class="link"><i class="fas fa-home"></i>Inicio</a>
            </div>
        </li>
        <li class="button_nav" onclick="hidder('nosotros', 'nosotrosNav')" id="nosotrosNav">
            <div class="buttonNoB nosotros">
                <a href="#" class="textoNosotros"><i class="fas fa-info"></i>Sobre Nosotros</a>
                <img src="../img/dropdown.png" alt="" class="dpImgNosotros">
            </div>
            <ul class="hide dropdown" id="nosotros">
                <li><a href="../paginas/nosotros.php" class="linkDropdown"><i class="fas fa-users"></i>Nosotros</a></li>
                <li><a href="../paginas/educacion.php" class="linkDropdown"><i class="fas fa-chalkboard-teacher"></i>Educación</a></li>
                <li><a href="../paginas/salud.php" class="linkDropdown"><i class="fas fa-heartbeat"></i>Salud</a></li>
                <li><a href="../paginas/municipio.php" class="linkDropdown"><i class="fas fa-building"></i>Municipio</a></li>
                <li><a href="../paginas/cultura.php" class="linkDropdown"><i class="fas fa-mug-hot"></i>Cultura</a></li>
            </ul>
        </li>
        <li class="button_nav" onclick="hidder('gestion', 'gestionNav')" id="gestionNav">
            <div class="buttonNoB gestion" id="gestionButton">
                <a href="#" class="textoGestion"><i class="fas fa-building"></i>Gestión</a>
                <img src="../img/dropdown.png" alt="" class="dpImgGestion">
            </div>
            <ul class="hide dropdown" id="gestion">
                <li><a href="#" class="linkDropdown"><i class="fas fa-city"></i>Capitan Sarmiento</a></li>
                <li><a href="#" class="linkDropdown"><i class="fas fa-flag"></i>Cuna de la bandera bonaerense</a></li>
                <li><a href="../inicio/busqueda.php" class="linkDropdown"><i class="fas fa-search"></i>Datos de Sarmiento</a> </li>
            </ul>
        </li>
        <li class="button_nav" onclick="hidder('servicios', 'serviciosNav')" id="serviciosNav">
            <div class="buttonNoB servicios" id="serviciosButton">
                <a href="#" class="textoServicios"><i class="fas fa-user-check"></i>Servicios</a>
                <img src="../img/dropdown.png" alt=""  class="dpImgServicios">
            </div>
            <ul class="hide dropdown" id="servicios">
                <li><a href="#" class="linkDropdown"><i class="fas fa-calendar-alt"></i>Calendario Fiscal</a></li>
                <li><a href="../reclamoSarmiento/" class="linkDropdown"><i class="fas fa-hands-helping"></i>Reclamos Sarmiento</a></li>
            </ul>
        </li>
        <li class="button_nav">
            <div class="buttonNoB">
                <a href="../inicio/busqueda.php" class="link"><i class="fas fa-search"></i>Datos Abiertos</a>
            </div>
        </li>
        <li class="button_nav">
            <div class="buttonNoB">
                <a href="../inicio/mapas.php"  class="link"><i class="fas fa-road"></i>Mapas</a>
            </div>
        </li>
    </ul>
</nav>