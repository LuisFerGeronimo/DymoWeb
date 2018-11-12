<?php 

/* Sublime Text 3 */

/**
 * Archivo php con código HTML para la página principal de la tienda
 * 
 * PHP version 7.2.10
 *
 * @author Luis Fernando Gerónimo Carranza <luisfergeronimo@gmail.com>
 * @author Jesús Emmanuel Zetina Chevez <zcjo151173@upemor.edu.mx>
 */

?>

<!doctype html>
<html lang="es-mx">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="../assets/css/solid.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.css">


    <!-- Propio css -->
    <link rel="stylesheet" href="../assets/css/tienda-style.css">


    <title>Tienda - Dymo</title>
</head>
<body>
    
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
                    <a class="nav-link disabled" href="#Ribbon">Ribbon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#Impresoras">Impresoras</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto mr-md-5 text-center">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Acceder
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Cliente</a>
                        <a class="dropdown-item" href="#">Distribuidor</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="jumbotron jumbotron-fluid bg-white mb-0 pb-0">
    <div class="container">
        <div class="row">
            <div class="col-8 mt-md-4 pt-md-5">
                <h1 class="display-4">¡Nuevo catálogo en línea!</h1>
                <p class="lead text-muted">Pronto podrás hacer tus pedidos desde la comodidad de tu casa...</p>
            </div>
            <div class="col-4 d-sm-none d-md-block">
                <img src="../assets/img/ui/happy-guy.png" alt="Happy-guy"  style="height: 350px;">
            </div>
        </div>
    </div>
</div>

<div class="jumbotron jumbotron-fluid mb-0" id="etiquetas" style="background-color: #262F36">
    <div class="container text-white">
        <h1 class="display-4 text-center text-white worksans-medium">Etiquetas</h1>
        <div class="row">
            <div class="col-5 offset-md-1 d-sm-none d-md-block">
                <img src="../assets/img/products/etiqueta.png" alt="etiqueta-tumarca"  style="height: 350px;">
            </div>
            <div class="col-5 offset-md-1 mt-md-4 pt-md-4 ">
                <div class="border border-secondary w-100 p-4 worksans-regular" style="color: #8496A5;">
                    <p><span class="lead worksans-medium text-white" >Materiales:</span></p>
                    <p><i class="fas fa-angle-double-right fa-xs" style="color: white"></i><span class="ml-1 lead">Textiles</span></p>
                    <p><i class="fas fa-angle-double-right fa-xs" style="color: white"></i><span class="ml-1 lead">Cartón</span></p>
                    <p><i class="fas fa-angle-double-right fa-xs" style="color: white"></i><span class="ml-1 lead">Autoadherible térmica</span></p>
                    <p><i class="fas fa-angle-double-right fa-xs" style="color: white"></i><span class="ml-1 lead">Autoadherible transferencia</span></p>
                    <p><i class="fas fa-angle-double-right fa-xs" style="color: white"></i><span class="ml-1 lead">Autoadherible marca precios</span></p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- --------------------------  -->
<!--        ETIQUETADORAS        -->
<!-- --------------------------  -->
<div class="jumbotron jumbotron-fluid bg-transparent mb-0" id="etiquetadoras">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-6 col-lg-6">
                <h1 class="display-5 text-white">Las mejores etiquetadoras del mercado</h1>
                <p class="lead mb-4 text-light">Nunca fue más fácil etiquetar tus productos</p>
                <a class="btn btn-success py-2 px-4" href="tienda/">Ir a la tienda</a>
            </div>
            <div class="col-sm-6 col-lg-6 mt-5">
                <img src="../assets/img/products/5.png" class="img-fluid float-right hidden-sm-down" width="380px" alt="Etiquetadora-gris">
            </div>
        </div>
    </div>
</div>




<div class="container">

    <div class="row align-items-center" style="height: 100vh">
        <div class="col"></div>
        <div class="col text-center">
            <h2>¡Hola! Por el momento estamos trabajando en la tienda.</h2>
            <h4 class="text-muted roboto-lightItalic">Regresa pronto...</h4>
            <img src="../assets/img/work-in-progress.jpg" alt="Work in progress..." title="Work in progres...">
            <a class="btn btn-primary" href="../">Regresar a la página principal</a>
        </div>
        <div class="col"></div>
    </div>
</div>

<!-- --------------------------  -->
<!--   FOOTER | PIE DE PÁGINA    -->
<!-- --------------------------  -->
<?php include '../includes/footer.php' ?>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../assets/js/jquery-3.3.1.js"></script>
<script src="../assets/js/popper.js"></script>
<script src="../assets/js/bootstrap.js"></script>


<script src="../assets/js/scroll-animation.js"></script>

</body>
</html>