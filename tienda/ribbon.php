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

    .card img:before {
        content: ' ';
        background-image: url(../assets/img/products/img-placeholder.png);
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
                
                <form id="form-filtros">


                    <!-- Filtro - Material -->
                    <div id="material" class="filtro">

                        <!-- Filtro - Título -->
                        <li class="nav-item">
                            <h6 class="nav-link pb-0">Material</h6>
                        </li>

                    </div> <!-- FIN - Filtro - Máquina -->
                    


                    <!-- Filtro - Máquina -->
                    <div id="maquina" class="filtro">

                        <!-- Filtro - Título -->
                        <li class="nav-item">
                            <h6 class="nav-link pb-0">Máquina</h6>
                        </li>


                    </div> <!-- FIN - Filtro - Máquina -->



                    <!-- Filtro - Medida -->
                    <div id="medida" class="filtro">

                        <!-- Filtro - Título -->
                        <li class="nav-item">
                            <h6 class="nav-link pb-0">Medida</h6>
                        </li>

                    </div> <!-- FIN - Filtro - Medida -->
                </form>
                
            </ul>
        </aside>

        
        <!-- Lista de productos -->
        <div class="col" id="lista-productos">

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


<!-- Script para obtener los tipos de filtros del ribbon -->
<script>
    
    $.ajax({
        type: 'POST',
        url: 'filtrado/filtrosRibbon.php',
        dataType: "json",
        success: function(data){

            $('#material').append(data['material']);
            $('#maquina').append(data['maquina']);
            $('#medida').append(data['medida']);
        }

    });
</script>


<!-- Script para los filtros del ribbon -->
<script>
    $(document).ready(function(){



        $('#form-filtros').change('input[type=checkbox]', function(){


            /* Get input values from form */
            var values = jQuery("#form-filtros").serializeArray();

            /* Because serializeArray() ignores unset checkboxes and radio buttons: */
            /*values = values.concat(
                    jQuery('#form-filtros input[type=checkbox]:not(:checked)').map(
                            function() {
                                return {"name": this.name, "value": false}
                            }).get()
            );
*/

            for (var i = 0; i < values.length; i++) {
                if(values[i]['value'] == 'on'){
                    values[i]['value'] = true;
                } else {
                    values[i]['value'] = false;
                }

                values[i]['filtro'] = $("input[name='" + values[i]['name'] + "']").closest('div.filtro').attr('id');
            }

            if(values.length === 0){
                values = null;
            }

            console.log(values);

            $.ajax({
                type: 'POST',
                url: 'filtrado/filtrarRibbon.php',
                data: {values: values},
                dataType: 'json',
                success: function(data){

                    console.log("data");
                    console.log(data);

                    var productos = data['productos'];
                    var filas = productos['filas'];

                    console.log("Filas: " + filas + "\n");

                    var htmlString = '';
                    
                    for (var i = 1; i <= filas; i++) {
                        console.log("i: " + i + "\n");
                        htmlString += productos[i];
                        console.log("data["+i+"]: \n");
                        console.log(productos[i]);
                    }
                    $('#lista-productos').html(htmlString);

                    $('img').on("error", function() {
                      $(this).attr('src', '../assets/img/products/img-placeholder.png');
                    });

                }
            });
        });

        $('#form-filtros').trigger("change");
    });
    
</script>

</body>
</html>