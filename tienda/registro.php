<!doctype html>
<html lang="es-mx">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/solid.css" integrity="sha384-osqezT+30O6N/vsMqwW8Ch6wKlMofqueuia2H7fePy42uC05rm1G+BUPSd2iBSJL" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/fontawesome.css" integrity="sha384-BzCy2fixOYd0HObpx3GMefNqdbA7Qjcc91RgYeDjrHTIEXqiF00jKvgQG0+zY/7I" crossorigin="anonymous">

        <style>
            .input-group-text{
                border-color: #5C6375;
                background-color: #5C6375;
            }

            .fas {
              color: white;
            }
        </style>

        <title>Dymo - Tienda</title>
    </head>
    <body style="background-image: url(../assets/img/registro.jpg); background-size: cover;">


        <div class="container px-0 py-4">
            <div class="row align-items-center bg-transparent mx-0" style="min-height: 100vh; background-color: white;">
                <div class="col-0 col-sm-1 col-md-2 col-lg-3"></div>
                <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                    <div class="card text-white bg-dark" style="background-color:rgba(0, 0, 0, 0.8);">


                        <div class="card-body px-3">

                            

                            <div class="card-header mb-3">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 33.33%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">1/3</div>
                                </div>
                            </div>                                
                            
                            <h3 class="card-title text-center text-nowrap">Registro</h3>
                            
                            <form class="px-0 px-sm-3 pb-0 pb-sm-1 pt-2">

                                <div class="form-group">
                                    <label for="nombres">Nombres</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="nombres" placeholder="Juan Carlos">
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="apellidoP">Apellido Paterno</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="apellidoP" placeholder="Perez">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="apellidoM">Apellido Materno</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="apellidoM" placeholder="Rodríguez">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="correo">E-mail</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-at"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="correo" placeholder="nombre@ejemplo.com">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="telefono" placeholder="777 1234 567">
                                    </div>
                                </div>
<!--
                                <div class="form-group">
                                    <label for="contrasena">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-key"></i></div>
                                        </div>
                                        <input type="password" class="form-control" id="contrasena" placeholder="Contraseña">
                                    </div>
                                </div>
-->                            

                                <button type="submit" class="btn btn-success my-3 w-100">Siguiente</button>

                                
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-0 col-sm-1 col-md-2 col-lg-3"></div>
            </div>
        </div>













        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>


    </body>
</html>