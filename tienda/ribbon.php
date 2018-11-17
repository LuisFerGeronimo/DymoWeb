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

    <style>
        #filter-menu {
            border-right: 1px gray solid;
            width: auto;
            padding-left: 5px;
        }

        /* Links del menú de filtro de productos. */
        #filter-menu .form-check {
            font-size: 0.90em;
            padding-top: 2px;
            padding-left: 40px;
            padding-bottom: 2px;
            padding: 2px 10px 2px 40px;
        }

        .titulo-producto{
            font-size: 1.30em;
        }

        .datos-producto{
            font-size: 0.80em;
        }

        .datos-producto .list-group-item{
            padding-top: 8px !important;
            padding-bottom: 8px !important;
            padding-left: 10px;
        }

        .descripcion-producto{
        }
    </style>

    <title>Tienda - Ribbon</title>
</head>
<body>

<?php include '../includes/tienda_header.php' ?>

<div id="mainContent">

    <div class="row align-items-center m-0" style="height: 40px; font-size: 0.90em; background-color: #f4f4f4;">
        <div class="col pl-3">
            1 a 20 de <span class="font-weight-bold">35</span> resultados
        </div>
    </div>


    <div class="row m-0">

        <!-- FILTROS -->
        <aside class="" id="filter-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <h4 class="nav-link pb-0">Filtros</h4>
                </li>
                
                <!-- Filtro - Material -->
                <div id="material">

                    <!-- Filtro - Título -->
                    <li class="nav-item">
                        <h6 class="nav-link pb-0">Material</h6>
                    </li>

                    <!-- Filtro - Cera -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="cera-checkbox">
                        <label class="form-check-label" for="cera-checkbox">
                            Cera
                        </label>
                    </div>

                    <!-- Filtro - Resina -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="resina-checkbox">
                        <label class="form-check-label" for="resina-checkbox">
                            Resina
                        </label>
                    </div>

                    <!-- Filtro - Resina/Cera -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="resinacera-checkbox">
                        <label class="form-check-label" for="resinacera-checkbox">
                            Resina/Cera
                        </label>
                    </div>

                    <!-- Filtro - Resina TP -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="resinatp-checkbox">
                        <label class="form-check-label" for="resinatp-checkbox">
                            Resina TP
                        </label>
                    </div>

                    <!-- Filtro - Resina TR -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="resitatr-checkbox">
                        <label class="form-check-label" for="resitatr-checkbox">
                            Resina TR
                        </label>
                    </div>

                    <!-- Filtro - Resina Original -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="resitaoriginal-checkbox">
                        <label class="form-check-label" for="resitaoriginal-checkbox">
                            Resina Original
                        </label>
                    </div>

                    <!-- Filtro - Resina Textil -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="resitatextil-checkbox">
                        <label class="form-check-label" for="resitatextil-checkbox">
                            Resina Textil
                        </label>
                    </div>
                </div>
                
                <!-- Filtro - Máquina -->
                <div id="maquina">

                    <!-- Filtro - Título -->
                    <li class="nav-item">
                        <h6 class="nav-link pb-0">Máquina</h6>
                    </li>

                    <!-- Filtro - Datacard -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="datacard-checkbox">
                        <label class="form-check-label" for="datacard-checkbox">
                            Datacard
                        </label>
                    </div>

                    <!-- Filtro - Eltron -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="eltron-checkbox">
                        <label class="form-check-label" for="eltron-checkbox">
                            Eltron
                        </label>
                    </div>

                    <!-- Filtro - Datamax -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="datamax-checkbox">
                        <label class="form-check-label" for="datamax-checkbox">
                            Datamax
                        </label>
                    </div>

                    <!-- Filtro - Zebra -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="zebra-checkbox">
                        <label class="form-check-label" for="zebra-checkbox">
                            Zebra
                        </label>
                    </div>

                </div>
                
                <!-- Filtro - Medida -->
                <div id="medida">

                    <!-- Filtro - Título -->
                    <li class="nav-item">
                        <h6 class="nav-link pb-0">Medida</h6>
                    </li>

                    <!-- Filtro - Medida 1 -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="medida1-checkbox">
                        <label class="form-check-label" for="medida1-checkbox">
                            32x90 - 38x360 
                        </label>
                    </div>

                    <!-- Filtro - Medida 2 -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="medida2-checkbox">
                        <label class="form-check-label" for="medida2-checkbox">
                            38x450 - 44x360 
                        </label>
                    </div>

                    <!-- Filtro - Medida 3 -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="medida3-checkbox">
                        <label class="form-check-label" for="medida3-checkbox">
                            50x300 - 64x450
                        </label>
                    </div>

                    <!-- Filtro - Medida 4 -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="medida4-checkbox">
                        <label class="form-check-label" for="medida4-checkbox">
                            76x300 - 90x360
                        </label>
                    </div>

                    <!-- Filtro - Medida 5 -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="medida5-checkbox">
                        <label class="form-check-label" for="medida5-checkbox">
                            100x360 - 220x300
                        </label>
                    </div>
                </div>
                
            </ul>
        </aside>

        
        <!-- Lista de productos -->
        <div class="col">

            <!-- Producto 1 -->
            <div class="row m-0 py-2">

                <!-- Imagen Producto -->
                <div class="col-3">
                    <img src="../assets/img/products/img-placeholder.png" class="w-100" alt="">
                </div>

                <!-- Descripción Producto -->
                <div class="col-9 descripcion-producto">

                    <!-- Título Producto -->
                    <div class="row">
                        <div class="col text-primary titulo-producto">
                            Título Ribbon
                        </div>
                    </div>

                    <!-- Datos Producto -->
                    <div class="row">
                        <div class="col datos-producto">
                            <ul class="list-group border-0">
                                <li class="list-group-item border-0"><span id="producto-material">Cera </span><span class="badge badge-primary">Material</span></li>
                                <li class="list-group-item border-0"><span id="producto-máquina">Datacard </span><span class="badge badge-primary">Máquina</span></li>
                                <li class="list-group-item border-0"><span id="producto-medida">38x360 </span><span class="badge badge-primary">Medida</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="row m-0 py-2">

                <!-- Imagen Producto -->
                <div class="col-3">
                    <img src="../assets/img/products/img-placeholder.png" class="w-100" alt="">
                </div>

                <!-- Descripción Producto -->
                <div class="col-9 descripcion-producto">

                    <!-- Título Producto -->
                    <div class="row">
                        <div class="col text-primary titulo-producto">
                            Título Ribbon
                        </div>
                    </div>

                    <!-- Datos Producto -->
                    <div class="row">
                        <div class="col datos-producto">
                            <ul class="list-group border-0">
                                <li class="list-group-item border-0"><span id="producto-material">Cera </span><span class="badge badge-primary">Material</span></li>
                                <li class="list-group-item border-0"><span id="producto-máquina">Datacard </span><span class="badge badge-primary">Máquina</span></li>
                                <li class="list-group-item border-0"><span id="producto-medida">38x360 </span><span class="badge badge-primary">Medida</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="row m-0 py-2">

                <!-- Imagen Producto -->
                <div class="col-3">
                    <img src="../assets/img/products/img-placeholder.png" class="w-100" alt="">
                </div>

                <!-- Descripción Producto -->
                <div class="col-9 descripcion-producto">

                    <!-- Título Producto -->
                    <div class="row">
                        <div class="col text-primary titulo-producto">
                            Título Ribbon
                        </div>
                    </div>

                    <!-- Datos Producto -->
                    <div class="row">
                        <div class="col datos-producto">
                            <ul class="list-group border-0">
                                <li class="list-group-item border-0"><span id="producto-material">Cera </span><span class="badge badge-primary">Material</span></li>
                                <li class="list-group-item border-0"><span id="producto-máquina">Datacard </span><span class="badge badge-primary">Máquina</span></li>
                                <li class="list-group-item border-0"><span id="producto-medida">38x360 </span><span class="badge badge-primary">Medida</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Producto 4 -->
            <div class="row m-0 py-2">

                <!-- Imagen Producto -->
                <div class="col-3">
                    <img src="../assets/img/products/img-placeholder.png" class="w-100" alt="">
                </div>

                <!-- Descripción Producto -->
                <div class="col-9 descripcion-producto">

                    <!-- Título Producto -->
                    <div class="row">
                        <div class="col text-primary titulo-producto">
                            Título Ribbon
                        </div>
                    </div>

                    <!-- Datos Producto -->
                    <div class="row">
                        <div class="col datos-producto">
                            <ul class="list-group border-0">
                                <li class="list-group-item border-0"><span id="producto-material">Cera </span><span class="badge badge-primary">Material</span></li>
                                <li class="list-group-item border-0"><span id="producto-máquina">Datacard </span><span class="badge badge-primary">Máquina</span></li>
                                <li class="list-group-item border-0"><span id="producto-medida">38x360 </span><span class="badge badge-primary">Medida</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Producto 5 -->
            <div class="row m-0 py-2">

                <!-- Imagen Producto -->
                <div class="col-3">
                    <img src="../assets/img/products/img-placeholder.png" class="w-100" alt="">
                </div>

                <!-- Descripción Producto -->
                <div class="col-9 descripcion-producto">

                    <!-- Título Producto -->
                    <div class="row">
                        <div class="col text-primary titulo-producto">
                            Título Ribbon
                        </div>
                    </div>

                    <!-- Datos Producto -->
                    <div class="row">
                        <div class="col datos-producto">
                            <ul class="list-group border-0">
                                <li class="list-group-item border-0"><span id="producto-material">Cera </span><span class="badge badge-primary">Material</span></li>
                                <li class="list-group-item border-0"><span id="producto-máquina">Datacard </span><span class="badge badge-primary">Máquina</span></li>
                                <li class="list-group-item border-0"><span id="producto-medida">38x360 </span><span class="badge badge-primary">Medida</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="row ml-auto"">
                <div class="col">
                    
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
                
        </div>

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

<!-- Script para los filtros de los productos -->
<script>
    $(document).ready(function(){
        $('input[type=checkbox]').on('click', function(){

            var serializedForm = $('#form-filtros').serialize();


            $.ajax({
                type: 'POST',
                url: 'filtrarProductos.php',
                data: serializedForm,
                success: function(data){
                    
                }
            });
        });
    });
    
</script>

</body>
</html>