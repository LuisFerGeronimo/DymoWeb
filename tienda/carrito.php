<?php
/* Sublime Text 3  Tab-Size: 4 */

/**
 * Detalles de producto Ribbon
 *
 * Se muestran los detalles del Ribbon. Aquí se podrá meter productos al
 * carrito.
 *
 * @author Luis Fernando Gerónimo Carranza <luisfergeronimo@gmail.com>
 * @author Jesús Emmanuel Zetina Chevez <zcjo151173@uepemor.edu.mx>
 */

/*
 * Se requiere de la conexión a la base de datos.
 */
require '../includes/db.php';

/*
 * Se requiere de la clase 'QueryGenerico' para hacer consultas a la BD para
 * filtrar los productos.
 */
require '../includes/model/queryGenerico.php';
$GLOBALS['results']['productos'] = [];
$GLOBALS['results']['request'] = false;
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
    <link rel="stylesheet" href="../assets/css/regular.css">
    <link rel="stylesheet" href="../assets/css/solid.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.css">

	<title>Carrito de comrpas</title>
</head>
<body>


<?php include '../includes/tienda_header.php'; ?>

<!-- CONTAINER -->
<div class="container my-5">


<?php
if(!isset($_SESSION['id'])){
	header('Location: login.php');
} else {

	$queryGenerico = new QueryGenerico();

	$queryGenerico->setTable('pedidosView');
	$queryGenerico->setSelect('*');
	$queryGenerico->setWhere('clienteID = ? AND estado = 1 ORDER BY producto ASC');
	$queryGenerico->setParamsType(array('i'));
	$queryGenerico->setParamsValues(array($_SESSION['id']));
	$pedidos = $queryGenerico->read();

	$where = '';
	$paramsType = [];
	$paramsValues = [];

	for ($i=0; $i < sizeof($pedidos); $i++) { 

        $where .= 'codigo LIKE CONCAT("%",?,"%")';
        if($i < sizeof($pedidos)-1){
            $where .= ' OR ';
        }

         /*
         * Se 'empuja' el tipo de dato ('s') del parámetro al arreglo
         * 'paramsType'.
         */
        array_push($paramsType, 's');

        // Se 'empuja' el valor del parámetro al arreglo
        // 'paramsValues'.
        array_push($paramsValues, $pedidos[$i]['producto']);

	}

	$where .= ' ORDER BY codigo ASC';

	$queryGenerico = new QueryGenerico();

	$queryGenerico->setTable('producto');
	$queryGenerico->setSelect('*');
	$queryGenerico->setWhere($where);
	$queryGenerico->setParamsType($paramsType);
	$queryGenerico->setParamsValues($paramsValues);
	$productos = $queryGenerico->read();

	$pedidosHTML = '';
	$pedidoTotal = 0;

	for ($i=0; $i < sizeof($pedidos); $i++) {
		$pedidoTotal = $pedidoTotal + $pedidos[$i]['costo'];

		$pedidosHTML .= '
			<div class="row producto">
				<!-- Imagen -->
				<div class="col-12 col-sm-3 col-lg-2 py-4 py-sm-0">
					<img class="img-fluid" onerror="this.src=`../assets/img/products/img-placeholder.png`" src="../assets/img/products/ribbon-'.$productos[$i]['codigo'].'.png" alt="">
				</div>

				<!-- Detalles -->
				<div class="col-12 col-sm-4 col-lg-5">
					
					<!-- Titulo y descripcion -->
					<div class="row">
						<div class="col-12 text-center text-sm-left">
							<h4>'.$productos[$i]['nombre'].' <small class="text-muted producto-codigo" data-id="'.$pedidos[$i]['pedidoID'].'">'.$productos[$i]['codigo'].'</small></h4>
							<h6 class="text-muted font-italic">'.$productos[$i]['descripcion'].'</h6>
						</div>
					</div>

					<!-- Precio por Unidad-->
					<div class="row mt-2">
						<div class="col-12 text-center text-sm-left">
							<span class="font-weight-bold">Precio: </span>
							$<span class="precio-unidad">'.$productos[$i]['costo'].'</span> M.X.N./<span class="unidad-pedido">'.$productos[$i]['unidadDePedido'].'</span>
						</div>
					</div>
				</div>


				<!-- Cantidad -->
				<div class="col-12 col-sm-3 col-lg-2 my-3 mt-sm-4 mt-lg-4 px-0 pt-sm-3 ">
					<div class="input-group m-auto" style="width: 125px;">
					    <div class="input-group-prepend">
					    	<button class="btn btn-primary restar px-2"><i class="fas fa-minus"></i></button>
					    </div>
					    <input type="text" class="form-control text-center cantidad" value="'.$pedidos[$i]['cantidad'].'">
					    <div class="input-group-prepend">
					    	<button class="btn btn-primary sumar px-2"  style=""><i class="fas fa-plus"></i></button>
					    </div>
				  	</div>
				</div>


				<!-- Precio total -->
				<div class="col-12 col-sm-2 col-lg-3 m-auto">
					<div class="row">
						<div class="col-12 text-center px-0">
							<small class="text-muted">Precio total</small>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center px-0">
							<h4 class="text-success">$ <span class="precio-total">'.$pedidos[$i]['costo'].'</span> M.X.N.</h4>
						</div>
					</div>
				</div>
			</div>
		';

		if($i < sizeof($pedidos)){
			$pedidosHTML .= '<hr class="w-100">';
		}

		if($i == sizeof($pedidos) - 1){
			$pedidosHTML .= '
			<div class="row precio-suma">
				<div class="col"></div>
				<div class="col-12 col-sm-2 col-lg-3 m-auto">
					<div class="row">
						<div class="col-12 text-center px-0">
							<small class="text-muted">Precio pedido</small>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center px-0">
							<h4 class="text-primary">$ <span class="pedido-total">'.$pedidoTotal.'</span> M.X.N.</h4>
						</div>
					</div>
				</div>
			</div>';
			
		}
	}
	echo $pedidosHTML;
}
?>


</div> <!-- FIN - CONTAINER -->




<!-- --------------------------  -->
<!--   FOOTER | PIE DE PÁGINA    -->
<!-- --------------------------  -->
<?php include '../includes/footer.php' ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../assets/js/jquery-3.3.1.js"></script>
<script src="../assets/js/popper.js"></script>
<script src="../assets/js/bootstrap.js"></script>


<!-- Script para calcular el precio -->
<script>
	$(document).ready(function(){

		/**
		 * Restar 1 al input de cantidad y calcular el precio total.
		 * 
		 * @param  {DOM element} input  input donde se muestra la cantidad.
		 * @return {void}       
		 */
		function restar(input){
			var cantidad = parseInt(input.val());
			
			if(cantidad > 1){
				input.val(cantidad - 1);
				calcularTotal(cantidad - 1);
			}
		}

		/**
		 * Añadir 1 al input de cantidad y calcular el precio total.
		 * 
		 * @param  {DOM element} input  input donde se muestra la cantidad.
		 * @return {void}       
		 */
		function sumar(input){
			var cantidad = parseInt(input.val());

			if(cantidad < 999){
				input.val(cantidad + 1);
				calcularTotal(cantidad + 1);
			}

		}

		/**
		 * Calcular el total del precio multiplicando la cantidad por el
		 * precio por unidad.
		 * 
		 * @param  {int} cantidad  Valor del input de Cantidad en Int.
		 * @return {void}        
		 */
		function calcularTotal(cantidad){
			if(isNaN(cantidad)){
				$('#precio-total').html('0.00');
			} else {
				var precio = parseFloat($('#precio').html());
				$('#precio-total').html(cantidad * precio);
			}
		}


		// Restar la cantidad
		$('.restar, .sumar').on('click', function(){
			var producto = $(this).closest('.producto').find('.producto-codigo');
			var codigo = producto.html();
			var pedidoID = producto.attr('data-id');
			var cantidad = $(this).closest('.producto').find('.cantidad').val();

			if($(this).hasClass('restar')){
				var operacion = 'restar';
			} else if($(this).hasClass('sumar')){
				var operacion = 'sumar';
			}

			console.log(codigo);
			console.log(pedidoID);
			console.log(operacion);
			console.log(cantidad);


			$.ajax({
				type: 'POST',
				url: 'pedidos/modificarCantidad.php',
				data: {
					cantidad: cantidad,
					pedidoID: pedidoID,
					codigo: codigo,
					operacion: operacion
				},
				dataType: 'json',
				success: function(data){
					console.log(data);
					if(data != false){
						location.reload();
					}
				},
                error: function (xhr, status, error) { 
                    console.log("Xhr: " + xhr);
                    console.log("Xhr.responseText: " + xhr.responseText);
                    console.log("Status: " + status);
                    console.log("Error: " + error);
                    var err = JSON.parse(xhr.responseText);
                    console.log(err);
                    console.log(err.error);
                }
			});

		});


		// Detectar cuando se escriba en el input de cantidad calcular el total.
		$('.cantidad').on('change paste keyup', function(){
			var producto = $(this).closest('.producto').find('.producto-codigo');
			var codigo = producto.html();
			var pedidoID = producto.attr('data-id');
			var cantidad = $(this).closest('.producto').find('.cantidad').val();

			if($(this).hasClass('restar')){
				var operacion = 'restar';
			} else if($(this).hasClass('sumar')){
				var operacion = 'sumar';
			} else {
				var operacion = '';
			}

			console.log(codigo);
			console.log(pedidoID);
			console.log(operacion);
			console.log(cantidad);


			$.ajax({
				type: 'POST',
				url: 'pedidos/modificarCantidad.php',
				data: {
					cantidad: cantidad,
					pedidoID: pedidoID,
					codigo: codigo,
					operacion: operacion
				},
				dataType: 'json',
				success: function(data){
					console.log(data);
					if(data != false){
						location.reload();
					}
				},
                error: function (xhr, status, error) { 
                    console.log("Xhr: " + xhr);
                    console.log("Xhr.responseText: " + xhr.responseText);
                    console.log("Status: " + status);
                    console.log("Error: " + error);
                    var err = JSON.parse(xhr.responseText);
                    console.log(err);
                    console.log(err.error);
                }
			});
		});
	});
</script>

</body>
</html>