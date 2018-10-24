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
                    <div class="card text-white bg-dark">

                        <div class="card-body px-3">
                            
                            <h3 class="card-title text-center text-nowrap">Acceder</h3>
                            
                            <form class="px-0 px-sm-3 pb-0 pb-sm-3 pt-4 px-lg-4">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-at"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="email" placeholder="nombre@ejemplo.com">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-key"></i></div>
                                        </div>
                                        <input type="password" class="form-control" id="password" placeholder="Contraseña">
                                    </div>
                                </div>
                            
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="recuerdame">
                                    <label class="form-check-label" for="recuerdame">
                                        Recuérdame
                                    </label>
                                </div>

                                <button class="btn btn-success my-3 w-100" id="btn-acceder">Acceder</button>

                                <p id="mensaje-error" class="d-none">Mensaje</p>


                                <a href="#" class="card-link">¿Olvidó su contraseña?</a>
                                
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

        <!-- Validaciones de input -->
        <script type="text/javascript">
            /* SCRIPT DE VALIDACIONES DE KEVIN */

        </script>

        <!-- Envío de datos al servidor con AJAX -->
        <script type="text/javascript">
            alert("Correo: , Contra: ");

            $(function(){ 
               
                $("#btn-acceder").on('click', function(){ 
                    
                    var correo  = $("#email").val();
                    var contrasena  = $("#password").val();

                    alert('Correo: ' + correo +', Contra: ' + contrasena);
                    
                    $.ajax({ 

                        method: "POST",
                        url: "login-request.php",

                        data: {"correo": correo, "contrasena": contrasena}

                    }).done(function( data ) {
                        var result = $.parseJSON(data);
            
                        var string = '';

                        if(sizeof($result) == 1){
                            $("#mensaje-error").css('color', 'red').html($result['nombre'].' as '.$result['apellidoP']);


                        } else {
                            $("#mensaje-error").css('color', 'red').html('Failed.');

                        }
           
                    });
         
                }); 
            });

        </script>

    </body>
</html>