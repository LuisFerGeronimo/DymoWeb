<!doctype html>
<html lang="es-mx">
    <head>
        <!-- Required meta tags -->
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../assets/css/solid.css">
        <link rel="stylesheet" href="../assets/css/fontawesome.css">



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
                <!-- Columna rellenadora -->
                <div class="col-0 col-sm-1 col-md-2 col-lg-3"></div>
                <!-- Columna principal donde está el form del log in -->
                <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                    <!-- Estructura del componente _card_ -->
                    <div class="card text-white bg-dark">
                        <!-- Cuerpo del componente _card_ -->
                        <div class="card-body px-3">
                            <!-- Título del componente _card_ -->
                            <h3 class="card-title text-center text-nowrap">Acceder</h3>
                            <!-- Formulario del log in -->
                            <form class="needs-validation px-0 px-sm-3 pb-0 pb-sm-3 pt-4 px-lg-4" novalidate>
                                <!-- Grupo del label e input para el e-mail -->
                                <div class="form-group">
                                    <label for="email">E-mail/Usuario</label>
                                    <!-- Grupo contenedor del input y su ícono -->
                                    <div class="input-group">
                                        <!-- Contendedor del ícono -->
                                        <div class="input-group-prepend">
                                            <!-- Icono de FontAwesome -->
                                            <div class="input-group-text"><i class="fas fa-at"></i></div>
                                        </div>
                                        <!-- Input del e-mail -->
                                        <input type="text" class="form-control" id="email" placeholder="nombre@ejemplo.com" required>

                                        <div class="invalid-feedback">
                                            Ingresa tu correo o usuario.
                                        </div>
                                    </div>
                                </div>
                                <!-- Grupo del label e input para el password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <!-- Grupo contenedor del input y su ícono -->
                                    <div class="input-group">
                                        <!-- Contendedor del ícono -->
                                        <div class="input-group-prepend">
                                            <!-- Icono de FontAwesome -->
                                            <div class="input-group-text"><i class="fas fa-key"></i></div>
                                        </div>
                                        <!-- Input del password -->
                                        <input type="password" class="form-control" id="password" placeholder="Contraseña" required>
                                        <!-- Mensaje de input invalido -->
                                        <div class="invalid-feedback">  
                                            Ingresa tu contraseña.
                                        </div>
                                    </div>
                                </div>

                                <!-- Grupo del label e input para el checkbox de "Recuérdame" -->
                                <div class="form-check">
                                    <!-- Input del checkbox -->
                                    <input class="form-check-input" type="checkbox" value="" id="recuerdame">
                                    <!-- Label del checkbox -->
                                    <label class="form-check-label" for="recuerdame">
                                        Recuérdame
                                    </label>
                                </div>
                                <!-- Boton de "Acceder" -->
                                <button type="submit" class="btn btn-success my-3 w-100" id="btn-acceder">Acceder</button>
                                <!-- Mensaje de error -->
                                <p id="mensaje-error" class="d-none">Mensaje</p>
                                <!-- Link para el usuario que olvidó su contraseña -->
                                <a href="#" class="card-link">¿Olvidó su contraseña?</a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Columna rellenadora -->
                <div class="col-0 col-sm-1 col-md-2 col-lg-3"></div>
            </div>
        </div>




        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>

        <!-- Custom scripts -->
        <script src="../assets/js/needs-validation-bootstrap.js"></script>


        <!-- Envío de datos al servidor con AJAX -->
        <script type="text/javascript">

            $(document).ready(function(){
               
                $("#btn-acceder").on('click', function(){ 
                    
                    var correo_input  = $("#email").val();
                    var contrasena_input  = $("#password").val();


                    //alert('Correo: ' + correo_input +', | Contra: ' + contrasena_input);
                    
                    $.ajax({
                        type: "POST",
                        url: "login-request.php",
                        cache: false,
                        data: 
                            {
                                correo: correo_input,
                                contrasena: contrasena_input
                            },

                        success: function(data, status){

                            var match = data['match'];
                            var user = data['user'];

                            //alert(data['match']);

                            if(status) {
                                if(match === "true"){

                                    alert("Data: " + data +
                                        "\nStatus: " + status + 
                                        "\nid: " + data['id'] + 
                                        "\nNombre " + data['nombre']
                                    );

                                    switch(user){
                                        case "cliente":
                                            window.location.href = "index.php";
                                            break;

                                        case "vendedor":
                                            window.location.href = "../panel/";
                                            break;

                                        case "admin":
                                            window.location.href = "../panel/";
                                            break;
                                    }
                                } else {
                                    alert("Datos incorrectos.");
                                }

                            }else{
                                alert("Algo salio mal...");
                            }

                        }
                    });
         
                }); 
            });

        </script>

    </body>
</html>