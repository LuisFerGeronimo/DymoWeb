<?php session_start(); ?>
<!-- HEADER del NAVBAR -->
<div class="navbar-dark" style="background-color: #262F36">
    <!-- Navbar página de inicio principal -->
    <nav class="navbar navbar-dark bg-transparent navbar-expand-md m-auto py-2">

        <!-- Logotipo de DYMO -->
        <a class="navbar-brand ml-5 " href="index.php">
           <img src="../assets/img/dymo-transparente.png" width="80" height="55" alt="DYMO">
        </a>


        <!-- Navbar TOGGLER -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav-productos" aria-controls="navbarNav-productos" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Navbar Productos MENU -->
        <div class="collapse navbar-collapse" id="navbarNav-productos">
            <ul class="navbar-nav ml-md-2 text-center">
                <li class="nav-item active">
                    <a class="nav-link " href="index.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#etiquetas">Etiquetas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#Etiquetadoras">Etiquetadoras</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link disabled" href="#Rotuladoras">Rotuladoras</a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link" href="../tienda/ribbon.php">Ribbon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#Impresoras">Impresoras</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto mr-md-5 text-center">

<?php 

    if(isset($_SESSION['id'])){
        echo   '<li class="nav-item dropdown ">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../tienda/login.php">Ver carrito</a>
                        <a class="dropdown-item" href="../tienda/login.php">Ver pedidos</a>
                    </div>
                </li>

                <li class="nav-item dropdown ">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        '.$_SESSION['nombre'] . ' ' . '<i class="fas fa-user-circle fa-lg"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Cuenta</a>
                        <a class="dropdown-item" href="../includes/cerrarSesion.php">Cerrar sesión</a>
                    </div>
                </li>';


    } else {
        echo   '<li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Acceder
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../tienda/login.php">Cliente</a>
                        <a class="dropdown-item" href="../tienda/login.php">Distribuidor</a>
                    </div>
                </li>';
    } 

?>
                

                

            </ul>

        </div>
    </nav>
</div>