<?php
    // Cuenta Personal
    $maxNombre = 32;
    $maxApellido = 24;
    $maxCorreo = 64;
    $maxTelefono = 19;
    
    // Empresa
    $maxEmpresa = 100;
    
    // Dirección
    $maxEstado = 24;
    $maxMunicipio = 50;
    $maxCodigoPostal = 5;
    $maxColonia = 50;
    $maxCalle = 50;
    $maxNumerosExtInt = 5;

    //Contraseña
    $minContrasena = 10;
    $maxContrasena = 26;
?>

<?php // echo $max; ?>

<!doctype html>
<html lang="es-mx">
    <head>
        <!-- Required meta tags -->
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.css">

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

            #paso-2, #paso-3, #paso-4 {
                display: none;
            }
        </style>

        <title>Dymo - Tienda</title>
    </head>
    <body style="background-image: url(../assets/img/ui/registro.jpg); background-size: cover;">


        <!-- CONTENEDOR -->
        <div class="container px-0 py-4">

            <!-- FILA FORMULARIO -->
            <div class="row align-items-center bg-transparent mx-0" style="min-height: 100vh; background-color: white;">
                
                <!-- COLUMNA RELLENADORA - IZQUIERDA-->
                <div class="col-0 col-sm-1 col-md-2 col-lg-3"></div>
                

                <!-- COLUMNA CON FORMULARIO -->
                <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                    <div class="card text-white bg-dark" style="background-color:rgba(0, 0, 0, 0.8);">


                        <div class="card-body px-3">

                            
                            <div class="card-header mb-3">

                                <!-- BARRA DE PROGRESO -->
                                <div class="progress" style="height: 22px;">
                                    <div class="progress-bar progress-bar-striped bg-success" id="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span class="lead" id="progress-bar-text">PASO 1</span></div>
                                </div>

                            </div>                                
                            
                            <h3 class="card-title text-center text-nowrap" id="card-title">Cuenta Personal</h3>
                            
                            <!-- FORMULARIO -->
                            <form class="needs-validation px-0 px-sm-3 pb-0 pb-sm-1 pt-2" id="form-registro" novalidate>








                                <!-- PASO 1 - CUENTA -->
                                <div id="paso-1">

                                    <div class="form-group">
                                        <label for="nombres">Nombres</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="nombres" placeholder="Juan Carlos" maxlength="<?php echo $maxNombre; ?>" required>
                                            <div class="invalid-feedback">
                                                Ingrese su nombre.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="apellidoP">Apellido Paterno</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="apellidoP" placeholder="Perez" maxlength="<?php echo $maxApellido; ?>" required>
                                                <div class="invalid-feedback">
                                                    Ingrese su apellido paterno.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="apellidoM">Apellido Materno</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="apellidoM" placeholder="Rodríguez" maxlength="<?php echo $maxApellido; ?>" required>
                                                <div class="invalid-feedback">
                                                    Ingrese su apellido materno.
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="correo-cuenta">E-mail</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-at"></i></div>
                                            </div>
                                            <input type="email" class="form-control" id="correo-cuenta" placeholder="nombre@ejemplo.com" maxlength="<?php echo $maxCorreo; ?>" required>
                                            <div class="invalid-feedback">
                                                Ingrese un correo válido
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="telefono-cuenta">Teléfono</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="telefono-cuenta" placeholder="777 1234 567" maxlength="<?php echo $maxTelefono; ?>" autocomplete="off" required>
                                            <div class="invalid-feedback">
                                                Ingrese su número de teléfono.
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn btn-success my-3 w-100" id="btn-cuenta-sig">Siguiente</a>
                                </div>





                                <!-- PASO 2 - EMPRESA -->
                                <div id="paso-2">
                                    <div class="form-group">
                                        <label for="empresa">Empresa</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="empresa" placeholder="Distribuidora y Mayorista Omega S.A de C.V." maxlength="<?php echo $maxEmpresa; ?>" required>
                                            <div class="invalid-feedback">
                                                Ingrese su empresa.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="telefono-empresa">Teléfono</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="telefono-empresa" placeholder="777 1234 567" maxlength="<?php echo $maxTelefono; ?>" autocomplete="off" required>
                                            <div class="invalid-feedback">
                                                Ingresa el número de teléfono de tu empresa.
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="correo-empresa">E-mail</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-at"></i></div>
                                            </div>
                                            <input type="email" class="form-control" id="correo-empresa" placeholder="nombre@ejemplo.com" maxlength="<?php echo $maxCorreo; ?>" required>
                                            <div class="invalid-feedback">
                                                Ingrese un correo válido
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Boton de "Anterior" && "Siguiente" -->
                                    <div class="form-row">

                                        <div class="col-12 col-md-6">
                                            <a href="#" class="btn btn-secondary my-3 w-100" id="btn-empresa-ant">Anterior</a>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <a href="#" class="btn btn-success my-3 w-100" id="btn-empresa-sig">Siguiente</a>
                                        </div>
                                    </div>
                                </div>






                                <!-- PASO 3 - DIRECCION -->
                                <div id="paso-3">
                                    <h4 class="text-secondary">Su empresa</h4>

                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="estado">Estado</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="estado" placeholder="Estado" maxlength="<?php echo $maxEstado; ?>" required>
                                                <div class="invalid-feedback">
                                                    Ingrese el Estado de su empresa.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                        <label for="municipio">Municipio</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="municipio" placeholder="Municipio" maxlength="<?php echo $maxMunicipio; ?>" required>
                                                <div class="invalid-feedback">
                                                    Ingrese el municipio de su empresa.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="codigo-postal">Código Postal</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="codigo-postal" placeholder="Código Postal" maxlength="<?php echo $maxCodigoPostal; ?>" required>
                                            <div class="invalid-feedback">
                                                Ingrese el códigio postal.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="colonia">Colonia</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="colonia" placeholder="Colonia" maxlength="<?php echo $maxColonia; ?>" required>
                                                <div class="invalid-feedback">
                                                    Ingrese la colonia de su empresa.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="calle">Calle</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="calle" placeholder="Calle" maxlength="<?php echo $maxCalle; ?>" required>
                                                <div class="invalid-feedback">
                                                    Ingrese la calle de su empresa.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="numero-ext">Número exterior</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="numero-ext" placeholder="Número exterior" maxlength="<?php echo $maxNumerosExtInt; ?>" required>
                                                <div class="invalid-feedback">
                                                    Ingrese el número exterior.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="numero-int">Número interior</label>
                                        
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="numero-int" placeholder="Número interior" maxlength="<?php echo $maxNumerosExtInt; ?>" required>
                                                <div class="invalid-feedback">
                                                    Ingrese el número interior.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Boton de "Anterior" && "Siguiente" -->
                                    <div class="form-row">

                                        <div class="col-12 col-md-6">
                                            <a href="#" class="btn btn-secondary my-3 w-100" id="btn-direccion-ant">Anterior</a>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <a href="#" class="btn btn-success my-3 w-100" id="btn-direccion-sig">Siguiente</a>
                                        </div>
                                    </div>
                                </div>









                                <!-- PASO 4 - Contraseña -->
                                <div id="paso-4">

                                    <div class="form-group">
                                        <label for="contrasena">Contraseña</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                                            </div>
                                            <input type="password" class="form-control" id="contrasena" aria-describedby="emailHelp" placeholder="Contraseña" maxlength="<?php echo $maxContrasena; ?>" required>
  
                                            <div class="invalid-feedback">
                                                Ingrese una contraseña segura
                                            </div>
                                        </div>
                                        <small id="passwordHelp" class="form-text text-muted">Ingrese una contraseña entre 8 y 26 caracteres.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="contrasena-repetida">Repita su contraseña</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                                            </div>
                                            <input type="password" class="form-control" id="contrasena-repetida" placeholder="Contraseña" maxlength="<?php echo $maxContrasena; ?>" required>

                                            <div class="invalid-feedback">
                                                Sus contraseñas no coinciden.
                                            </div>
                                        </div>


                                    <!-- Boton de "Anterior" && "Registrarse" -->
                                    <div class="form-row">

                                        <div class="col-12 col-md-6">
                                            <a href="#" class="btn btn-secondary my-3 w-100" id="btn-contrasena-ant">Anterior</a>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <button type="submit" class="btn btn-info my-3 w-100" id="btn-contrasena-sig">Registrarse</button>
                                        </div>
                                    </div>
                                </div>

                                
                            </form>

                        </div>
                    </div>
                </div>

                <!-- COLUMNA RELLENADORA - DERECHA -->
                <div class="col-0 col-sm-1 col-md-2 col-lg-3"></div>
            </div>
        </div>





        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../assets/js/jquery-3.3.1.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/js/bootstrap.js"></script>


        <!-- Custom scripts -->
        <script src="../assets/js/needs-validation-bootstrap.js"></script>
        <script src="../assets/js/validation-functions.js"></script>

        <!-- Inputs del formulario -->
        <script>
            // Formulario
            var form = $("#form-registro");

            // Paso 1 - Cuenta
            var inputNombres         = $("#nombres");
            var inputApellidoP       = $("#apellidoP");
            var inputApellidoM       = $("#apellidoM");
            var inputCorreoCuenta    = $("#correo-cuenta");
            var inputTelefonoCuenta  = $("#telefono-cuenta");

            // Paso 2 - Empresa
            var inputEmpresa         = $("#empresa");
            var inputTelefonoEmpresa = $("#telefono-empresa");
            var inputCorreoEmpresa   = $("#correo-empresa");

            // Paso 3 - Dirección
            var inputEstado          = $("#estado");
            var inputMunicipio       = $("#municipio");
            var inputCodigoPostal    = $("#codigo-postal");
            var inputColonia         = $("#colonia");
            var inputCalle           = $("#calle");
            var inputNumeroExt       = $("#numero-ext");
            var inputNumeroInt       = $("#numero-int");

            // Paso 4 - Seguridad
            var inputContrasena         = $("#contrasena");
            var inputContrasenaRepetida = $("#contrasena-repetida");

        </script>

        <script>
            // VALIDACIONES DE TECLAS
            // VALIDACIONES DE LONGITUD
            // VALIDACIONES DE COINCIDENCIA
            $(document).ready(function() {

                var form = $("#form-registro");


                /********************************************/
                /************   CUENTA PERSONAL    **********/
                /********************************************/
                // Validación de teclas.
                validarTeclasNombres("#nombres");
                validarTeclasNombres("#apellidoP");
                validarTeclasNombres("#apellidoM");
                validarTeclasTelefono("#telefono-cuenta");


                inputNombres.on('keyup', function(){
                    
                    if(validarInputVacio($(this),  form, "el nombre")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        if(validarInputLength($(this),    form,     "El nombre",  0, <?php echo $maxNombre;   ?>)){ 
                            validarInputLettersOnly($(this), form, "El nombre");
                        }
                    }
                });

                $("#apellidoP, #apellidoM").on('keyup', function(){

                    if(validarInputVacio($(this),  form, "el apellido")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        if(validarInputLength($(this),    form,     "El apellido",  0, <?php echo $maxApellido;   ?>)){
                            validarInputLettersOnly($(this), form, "El apellido");
                        }
                    }
                });

                inputCorreoCuenta.on('keyup', function(){
                    
                    if(validarInputVacio($(this),  form, "el correo")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        validarInputLength($(this),    form,     "El correo",  0, <?php echo $maxCorreo;   ?>);
                    }
                });

                inputTelefonoCuenta.on('keyup', function(){
                    
                    if(validarInputVacio($(this),  form, "el teléfono")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        if(validarInputLength($(this),    form,     "El teléfono",  0, <?php echo $maxTelefono;   ?>)){

                            // Validar que sólo se metan caracteres válidos para un teléfono (+, -,  , 0-9)
                            validarInputTelefonoOnly($(this), form); 
                        }
                    }
                });
                

                /********************************************/
                /************       EMPRESA        **********/
                /********************************************/
                // Validación de teclas.
                validarTeclasNombres("#empresa");
                validarTeclasTelefono("#telefono-empresa");


                inputEmpresa.on('keyup', function(){
                    
                    if(validarInputVacio($(this),  form, "la empresa")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        if(validarInputLength($(this),    form,     "La empresa",  0, <?php echo $maxEmpresa; ?>)){
                            validarInputLettersOnly($(this), form, "La empresa");
                        }
                    }
                });


                inputTelefonoEmpresa.on('keyup', function(){
                    
                    if(validarInputVacio($(this),  form, "el teléfono")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        if(validarInputLength($(this),    form,     "El teléfono",  0, <?php echo $maxTelefono;   ?>)){

                            // Validar que sólo se metan caracteres válidos para un teléfono (+, -,  , 0-9)
                            validarInputTelefonoOnly($(this), form); 
                        }
                    }
                });

                inputCorreoEmpresa.on('keyup', function(){
                    
                    if(validarInputVacio($(this),  form, "el correo")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        validarInputLength($(this),    form,     "El correo",  0, <?php echo $maxCorreo;   ?>);   
                    }
                });




                /********************************************/
                /************      DIRECCION       **********/
                /********************************************/
                // Validación de teclas.
                validarTeclasNombres("#estado");
                validarTeclasNombres("#municipio");
                validarTeclasNumerosSinPuntos("#codigo-postal");
                validarTeclasNombres("#colonia");
                validarTeclasNombres("#calle");
                validarTeclasNumerosSinPuntos("#numero-ext");
                validarTeclasNumerosSinPuntos("#numero-int");


                inputEstado.on('keyup', function(){
                    
                    if(validarInputVacio($(this),  form, "el estado")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        if(validarInputLength($(this),    form,     "El estado",  0, <?php echo $maxEstado;   ?>)){
                            validarInputLettersOnly($(this), form, "El estado");
                        }
                    }

                });


                inputMunicipio.on('keyup', function(){
                    
                    if(validarInputVacio($(this),  form, "el municipio")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        if(validarInputLength($(this),    form,     "El municipio",  0, <?php echo $maxMunicipio;   ?>)){
                            validarInputLettersOnly($(this), form, "El municipio");
                        }
                    }
                });


                inputCodigoPostal.on('keyup', function(){
                    
                    if(validarInputVacio($(this),  form, "el código postal")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        if(validarInputLength($(this),    form,     "El código postal",  0, <?php echo $maxCodigoPostal;   ?>)){
                            validarInputNumbersOnly($(this), form, "El código postal");
                        }
                    }
                });


                inputColonia.on('keyup', function(){
                    
                    if(validarInputVacio($(this),  form, "la colonia")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        if(validarInputLength($(this),    form,     "La colonia",  0, <?php echo $maxColonia;   ?>)){
                            validarInputLettersOnly($(this), form, "La colonia");
                        }
                    }
                });


                inputCalle.on('keyup', function(){
                    
                    if(validarInputVacio($(this),  form, "la calle")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        if(validarInputLength($(this),    form,     "La calle",  0, <?php echo $maxCalle;   ?>)){
                            validarInputLettersOnly($(this), form, "La calle");
                        }
                    }
                });


                inputNumeroExt.on('keyup', function(){
                    
                    if(validarInputVacio($(this),  form, "el número exterior")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        if(validarInputLength($(this),    form,     "El número exterior",  0, <?php echo $maxNumerosExtInt;   ?>)){
                            validarInputNumbersOnly($(this), form, "El número exterior");
                        }
                    }
                });


                inputNumeroInt.on('keyup', function(){
                    
                    if(validarInputVacio($(this),  form, "el número interior")){

                        // Funcion para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        if(validarInputLength($(this),    form,     "El número interior",  0, <?php echo $maxNumerosExtInt;   ?>)){
                            validarInputNumbersOnly($(this), form, "El número interior");
                        }
                    }
                });

  


                /********************************************/
                /************      SEGURIDAD       **********/
                /********************************************/

                //  **Sin Validaciones de teclas** //

                //      VALIDACION DE LONGITUD  Y... //
                // VALIDACIÓN DE CONTRASEÑAS IGUALES //

                //          #contraseña              //
                $("#contrasena").on('keyup',function(){
                    
                    if(validarInputVacio($(this),  form, "la contraseña")){

                        // Función para validar el tamaño del input ingresado por el usuario.
                        // Params:          (input,    form, articuloInput, nombreInput, min, max)
                        if(validarInputLength($(this),    form,     "La contraseña",  8, <?php echo $maxContrasena;   ?>)){
                            if(validarInputContrasena($(this), $(this).val(), form) == 1){
                                // Función para validar que dos input coincidan.
                                // Params:       (   input1,         input2, form)
                                validarCoincidencia($(this), $("#contrasena-repetida"), form);
                            }    
                        }
                    }
                });

                
                //       #contraseña-repetida        //
                $("#contrasena-repetida").on('keyup',function(){
                    validarCoincidencia($("#contrasena"), $(this), form);
                });
            });


        </script>

        <script>
            function hasNumber(text){
                var matches = text.match(/\d+/g);
                if (matches != null) { alert('number'); } else { alert('Not number')}
            }
            $(document).ready(function(){

                /* CLICK LISTENERS - BOTONES DEL FORMULARIO */

                // Paso 1 - Botón "Siguiente";
                $('#btn-cuenta-sig').click(function(e){
                    
                    var formularioInvalido = false;
                    

                    e.preventDefault();

                    if( !validarInputVacio(      inputNombres,  form, "el nombre" ) ||
                        !validarInputLettersOnly(inputNombres,  form, "El nombre" ) ||
                        !validarInputLength(inputApellidoP, form, "El nombre", 0, <?php echo $maxNombre;?>) ){
                        formularioInvalido = true;
                    }
                        
                    if( !validarInputVacio(inputApellidoP,      form, "el apellido" ) ||
                        !validarInputLettersOnly(inputApellidoP,      form, "El apellido") ||
                        !validarInputLength(inputApellidoP, form, "El apellido",0, <?php echo $maxApellido; ?>) ){
                        formularioInvalido = true;
                    }

                    if( !validarInputVacio(inputApellidoM,      form, "el apellido" ) ||
                        !validarInputLettersOnly(inputApellidoM,      form, "El apellido") ||
                        !validarInputLength(inputApellidoM, form, "El apellido",0, <?php echo $maxApellido; ?>) ){
                        formularioInvalido = true;

                    }
                        
                    if( !validarInputVacio(inputCorreoCuenta,   form, "el correo"           ) ||
                        //!validarInputLettersOnly(inputCorreoCuenta,   form, "su correo"          ) || -- Poner validarInputEmailOnly
                        !validarInputLength(inputCorreoCuenta, form, "El correo",          0, <?php echo $maxCorreo;   ?>) ){
                        formularioInvalido = true;
                    }
                        
                    if( !validarInputVacio(inputTelefonoCuenta, form, "el teléfono"         ) || 
                        !validarInputTelefonoOnly(inputTelefonoCuenta, form ) ||
                        !validarInputLength(inputTelefonoCuenta, form, "El teléfono",        0, <?php echo $maxTelefono; ?>)) {
                        formularioInvalido = true;
                    }

                    if(formularioInvalido === true){
                        return false;
                    } else {
                        $('#paso-2').show();
                        $('#paso-1').hide();
                        $('#progress-bar').css("width", "50%");
                        $('#progress-bar-text').html("PASO 2");
                        $('#card-title').html("Empresa");
                    }
                });

                // Paso 2 - Botón "Anterior";
                $('#btn-empresa-ant').click(function(e){
                    $('#paso-1').show();
                    $('#paso-2').hide();
                    $('#progress-bar').css("width", "25%");
                    $('#progress-bar-text').html("PASO 1");
                    $('#card-title').html("Cuenta Personal");
                });

                // Paso 2 - Botón "Siguiente";
                $('#btn-empresa-sig').click(function(e){
                    var formularioInvalido = false;

                    e.preventDefault();

                    if( !validarInputVacio(      inputEmpresa,  form, "la empresa" ) ||
                        !validarInputLettersOnly(inputEmpresa,  form, "La empresa" ) ||
                        !validarInputLength(inputEmpresa, form, "La empresa", 0, <?php echo $maxEmpresa;?>) ){
                        formularioInvalido = true;
                    }
                        
                    if( !validarInputVacio(inputTelefonoEmpresa, form, "el teléfono"         ) || 
                        !validarInputTelefonoOnly(inputTelefonoEmpresa, form ) ||
                        !validarInputLength(inputTelefonoEmpresa, form, "El teléfono",        0, <?php echo $maxTelefono; ?>)) {
                        formularioInvalido = true;
                    }

                    if( !validarInputVacio(inputCorreoEmpresa,   form, "el correo"           ) ||
                        //!validarInputLettersOnly(inputCorreoEmpresa,   form, "su correo"          ) || -- Poner validarInputEmailOnly
                        !validarInputLength(inputCorreoEmpresa, form, "El correo",          0, <?php echo $maxCorreo;   ?>) ){
                        formularioInvalido = true;
                    }

                    if(formularioInvalido === true){
                        return false;
                    } else {
                        $('#paso-3').show();
                        $('#paso-2').hide();
                        $('#progress-bar').css("width", "75%");
                        $('#progress-bar-text').html("PASO 3");
                        $('#card-title').html("Direccion");
                    }
                });

                // Paso 3 - Botón "Anterior";
                $('#btn-direccion-ant').click(function(){
                    $('#paso-2').show();
                    $('#paso-3').hide();
                    $('#progress-bar').css("width", "50%");
                    $('#progress-bar-text').html("PASO 2");
                    $('#card-title').html("Empresa");
                });

                // Paso 3 - Botón "Siguiente";
                $('#btn-direccion-sig').click(function(e){
                    var formularioInvalido = false;

                    e.preventDefault();

                    if( !validarInputVacio(      inputEstado,  form, "el estado" ) ||
                        !validarInputLettersOnly(inputEstado,  form, "El estado" ) ||
                        !validarInputLength(inputEstado, form, "El estado", 0, <?php echo $maxEstado;?>) ){
                        formularioInvalido = true;
                    }

                    if( !validarInputVacio(      inputMunicipio,  form, "el municipio" ) ||
                        !validarInputLettersOnly(inputMunicipio,  form, "El municipio" ) ||
                        !validarInputLength(inputMunicipio, form, "El municipio", 0, <?php echo $maxMunicipio;?>) ){
                        formularioInvalido = true;
                    }

                    if( !validarInputVacio(      inputCodigoPostal,  form, "el código postal" ) ||
                        !validarInputNumbersOnly(inputCodigoPostal,  form, "El código postal" ) ||
                        !validarInputLength(inputCodigoPostal, form, "El código postal", 0, <?php echo $maxCodigoPostal;?>) ){
                        formularioInvalido = true;
                    }

                    if( !validarInputVacio(      inputColonia,  form, "la colonia" ) ||
                        !validarInputLettersOnly(inputColonia,  form, "La colonia" ) ||
                        !validarInputLength(inputColonia, form, "La colonia", 0, <?php echo $maxColonia;?>) ){
                        formularioInvalido = true;
                    }

                    if( !validarInputVacio(      inputCalle,  form, "la calle" ) ||
                        !validarInputLettersOnly(inputCalle,  form, "La calle" ) ||
                        !validarInputLength(inputCalle, form, "La calle", 0, <?php echo $maxCalle;?>) ){
                        formularioInvalido = true;
                    }

                    if( !validarInputVacio(      inputNumeroExt,  form, "el número exterior" ) ||
                        !validarInputNumbersOnly(inputNumeroExt,  form, "El número exterior" ) ||
                        !validarInputLength(inputNumeroExt, form, "El número exterior", 0, <?php echo $maxNumerosExtInt;?>) ){
                        formularioInvalido = true;
                    }

                    if( !validarInputVacio(      inputNumeroInt,  form, "el número interior" ) ||
                        !validarInputNumbersOnly(inputNumeroInt,  form, "El número interior" ) ||
                        !validarInputLength(inputNumeroInt, form, "El número interior", 0, <?php echo $maxNumerosExtInt;?>) ){
                        formularioInvalido = true;
                    }

                    if(formularioInvalido === true){
                        return false;
                    } else {
                        $('#paso-4').show();
                        $('#paso-3').hide();
                        $('#progress-bar').css("width", "100%");
                        $('#progress-bar-text').html("PASO 4");
                        $('#card-title').html("Seguridad");
                    }
                });

                // Paso 4 - Botón "Anterior";
                $('#btn-contrasena-ant').click(function(){
                    $('#paso-3').show();
                    $('#paso-4').hide();
                    $('#progress-bar').css("width", "75%");
                    $('#progress-bar-text').html("PASO 3");
                    $('#card-title').html("Dirección");
                });

                // Paso 4 - Botón "Registrarse/Siguiente";
                $('#btn-contrasena-sig').click(function(){

                });
            });
        </script>





    </body>
</html>