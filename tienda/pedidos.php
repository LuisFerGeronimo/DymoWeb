<?php
/* Sublime Text 3  Tab-Size: 4 */

/**
 * Pedidos hechos por el cliente
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

function estadoIntAString($estadoInt){
	switch ($estadoInt) {
		case 3: return 'Pedido'; break;
		case 5: return 'En proceso de cancelación'; break;
	}
}
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

	<title>Pedidos</title>
</head>
<body>

<div class="alert alert-warning alert-dismissible fade show fixed-top" role="alert">
  	<strong>¡Su solicitud se ha enviado!</strong> Será contactado por uno de nuestros vendedores en un horario de <strong>9:00 a 18:00 hrs.</strong>.
  	<button type="button" class="close" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  	</button>
</div>

<?php include '../includes/tienda_header.php'; ?>




<?php
if(!isset($_SESSION['id'])){
	header('Location: login.php');
} else {

	//======================================================================
	// PEDIDOS HECHOS POR EL CLIENTE (ESTADO = 3 Y ORDENADOS POR LA FECHA MÁS RECIENTE)
	//======================================================================

	$queryGenerico = new QueryGenerico();

	$queryGenerico->setTable('pedido');
	$queryGenerico->setSelect('*');
	$queryGenerico->setWhere('clienteID = ? AND (estado = 3 OR estado = 5) ORDER BY fechaPedido DESC');
	$queryGenerico->setParamsType(array('i'));
	$queryGenerico->setParamsValues(array($_SESSION['id']));
	$pedidos = $queryGenerico->read();


	$pedidosHTML = '';


	if(sizeof($pedidos) > 0){

		//======================================================================
		// RECORRIDO DE PEDIDOS DEL CLIENTE
		//======================================================================
		for ($i=0; $i < sizeof($pedidos); $i++) { 
			$pedidoID = $pedidos[$i]['id'];


			//-----------------------------------------------------
			// Header Del Pedido (Título)
			//-----------------------------------------------------
			$pedidosHTML .= '
			<!-- CONTAINER -->
			<div class="container my-5 border rounded py-3 pedido-container" data-id="'.$pedidoID.'" style="border: 1.8px solid #DEE2E6 !important;">
				<div class="row justify-content-start">
					<div class="col-6">
						<h3>Estado: <span class="text-muted" id="estado" data-id="'.$pedidos[$i]['estado'].'">'.estadoIntAString($pedidos[$i]['estado']).'</span></h3>
					</div>
					<div class="col-6 d-flex justify-content-end align-self-center">
						<h6 class="text-muted">'.$pedidos[$i]['fechaPedido'].'</h6>
					</div>
				</div>

				<hr class="w-100">';

			//======================================================================
			// PRODUCTOS DEL PEDIDO QUE SE ESTÁ RECORRIENDO
			//======================================================================
			
			$queryGenerico = new QueryGenerico();
			$queryGenerico->setTable('pedido_producto');
			$queryGenerico->setSelect('*');
			$queryGenerico->setWhere('pedidoID = ? ORDER BY productoCodigo ASC');
			$queryGenerico->setParamsType(array('i'));
			$queryGenerico->setParamsValues(array($pedidoID));
			$pedidosProducto = $queryGenerico->read();

			//======================================================================
			// OBTENCIÓN DE LOS DATOS DE LOS PRODUCTOS DEL PEDIDO QUE SE ESTÁ RECORRIENDO
			//======================================================================

			//-----------------------------------------------------
			// Condición Where Para Obtener Los Datos De Los Productos Del Pedido
			//-----------------------------------------------------
			$where = '';
			$paramsType = [];
			$paramsValues = [];
			for ($j=0; $j < sizeof($pedidosProducto); $j++) { 

		        $where .= 'codigo = ?';
		        if($j < sizeof($pedidosProducto)-1){
		            $where .= ' OR ';
		        }

		         /*
		         * Se 'empuja' el tipo de dato ('s') del parámetro al arreglo
		         * 'paramsType'.
		         */
		        array_push($paramsType, 's');

		        // Se 'empuja' el valor del parámetro al arreglo
		        // 'paramsValues'.
		        array_push($paramsValues, $pedidosProducto[$j]['productoCodigo']);

			}

			$where .= ' ORDER BY codigo ASC';


			//-----------------------------------------------------
			// Consulta De Los Datos De Los Productos
			//-----------------------------------------------------

			$queryGenerico = new QueryGenerico();
			$queryGenerico->setTable('producto');
			$queryGenerico->setSelect('*');
			$queryGenerico->setWhere($where);
			$queryGenerico->setParamsType($paramsType);
			$queryGenerico->setParamsValues($paramsValues);
			$productos = $queryGenerico->read();

			$pedidoTotal = 0;

			//======================================================================
			// RECORRIDO DE LOS PRODUCTOS DE LOS PEDIDOS
			//======================================================================

			for ($k=0; $k < sizeof($pedidosProducto); $k++) {
				$pedidoTotal = $pedidoTotal + $pedidosProducto[$k]['costo'];

				$pedidosHTML .= '
					<div class="row producto">

						<!-- Imagen -->
						<div class="col-12 col-sm-3 col-lg-2 py-4 py-sm-0">
							<img class="img-fluid" onerror="this.src=`../assets/img/products/img-placeholder.png`" src="../assets/img/products/ribbon-'.$productos[$k]['codigo'].'.png" alt="">
						</div>

						<!-- Detalles -->
						<div class="col-12 col-sm-5 col-lg-7">
							
							<!-- Titulo y descripcion -->
							<div class="row">
								<div class="col-12 text-center text-sm-left">
									<h4>'.$productos[$k]['nombre'].' <small class="text-muted producto-codigo" data-id="'.$pedidosProducto[$k]['pedidoID'].'">'.$productos[$k]['codigo'].'</small></h4>
									<h6 class="text-muted font-italic">'.$productos[$k]['descripcion'].'</h6>
								</div>
							</div>

							<!-- Precio por Unidad-->
							<div class="row mt-2">
								<div class="col-12 text-center text-sm-left">
									<span class="font-weight-bold">Precio: </span>
									$<span class="precio-unidad">'.$productos[$k]['costo'].'</span> M.X.N./<span class="unidad-pedido">'.$productos[$k]['unidadDePedido'].'</span>
								</div>
							</div>

							<!-- Cantidad -->
							<div class="row mt-2">
								<div class="col-12 text-center text-sm-left">
									<span class="font-weight-bold">Cantidad: </span>
									<span class="cantidad">'.$pedidosProducto[$k]['cantidad'].'</span> x [<span class="unidad-pedido">'.$productos[$k]['unidadDePedido'].'</span>]
								</div>
							</div>
						</div>


						<!-- Precio total -->
						<div class="col-12 col-sm-4 col-lg-3 m-auto d-flex align-items-center">

							<div class="w-100">
								<div class="row">
									<div class="col-12 text-center px-0">
										<small class="text-muted">Precio total</small>
									</div>
								</div>
								<div class="row">
									<div class="col-12 text-center px-0">
										<h4 class="text-success">$ <span class="precio-total">'.$pedidosProducto[$k]['costo'].'</span> M.X.N.</h4>
									</div>
								</div>
							</div>
						</div>

					</div>
				';

				if($k < sizeof($pedidosProducto)){
					$pedidosHTML .= '<hr class="w-100">';
				}

				//======================================================================
				// FOOTER DEL PEDIDO | SUMA TOTAL && BOTÓN DE CANCELACIÓN
				//======================================================================
				
				if($k == sizeof($pedidosProducto) - 1){
					$pedidosHTML .= '
					<!-- SUMA TOTAL DEL PEDIDO -->
					<div class="row precio-suma">
					
						<div class="col"></div>

						<!-- "Suma Total" -->
						<div class="col-12 col-sm-4 col-md-4 col-lg-2 my-3 mt-sm-4 mt-lg-4 px-0 pt-sm-3 ">
							    <h3 class="text-center text-info">Suma Total:</h3>
						</div>

						<!-- Precio -->
						<div class="col-12 col-sm-5 col-md-4 col-lg-3 m-auto">
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
					</div>

					<!-- BOTÓN CANCELACIÓN -->
					<div class="row mt-3 mt-sm-0">
					
						<div class="col"></div>

						<div class="col-12 col-sm-5 col-md-5 col-lg-3 text-center">
					  		<button type="button" class="btn btn-danger w-100 px-0" id="btn-cancelacion" aria-label="Close">
								<span class="">Solicitar Cancelación</span>
					  		</button>
						</div>
					</div>
					
				</div> <!-- FIN - CONTAINER -->';
				}
			}
		}

	} else {

		//======================================================================
		// INTERFAZ ALTERNATIVA EN CASO DE NO TENER NINGÚN PEDIDO HECHO
		//======================================================================

		$pedidosHTML = '
		<!-- CONTAINER -->
		<div class="container my-5 border rounded py-3" style="border: 1.8px solid #DEE2E6 !important;">
			<div class="row text-center my-5">
				<div class="col-12">
					<div class="row">
						<div class="col"></div>
						<div class="col-6 col-sm-4 col-lg-3">
							<img class="img-fluid" src="../assets/img/empty-box.png">
						</div>
						<div class="col"></div>
					</div>
					<div class="row">
						<div class="col">
							<h3 class="text-muted d-none d-sm-block">No tienes ningún pedido realizado</h3>
							<h4 class="text-muted d-block d-sm-none">No tienes ningún pedido realizado</h4>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<h5 class="text-dark">Ir a la <a class="alert-link" href="index.php">tienda</a>.</h5>
						</div>
					</div>
				</div>
			</div>
					
		</div> <!-- FIN - CONTAINER -->';
	}
	echo $pedidosHTML;
}
?>






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
		$('.cantidad').on('change', function(){
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

<!-- Script para enviar solicitud de cancelación -->
<script>

	//======================================================================
	// DESHABILITACIÓN DEL BOTÓN CUANDO YA ESTÁ EN PROCESO DE CANCELACIÓN
	//======================================================================

	$(document).ready(function(){

		var estado = $('#estado').attr('data-id');
		if(estado == 5){
			$('#btn-cancelacion').prop( "disabled", true);
		}

	})

    $('.alert-warning').hide();

    $('.close').on('click', function(){
		$('.alert-warning').hide();    	
    });

    $( function () {
    	if(sessionStorage.getItem('alert') == 'true'){
			$('.alert-warning').show();    	
    		sessionStorage.setItem('alert', 'false');
    	}
    });	

	$(document).ready(function(){
		$('body').on('click', '#btn-cancelacion', function(){

 			if (confirm('¿Deseas enviar la solicitud de cancelación?')) {
				var pedidoID = $(this).closest('.pedido-container').attr('data-id');
				console.log("PedidoID: " + pedidoID);

				$.ajax({
					type: 'POST',
					url: 'pedidos/solicitarCancelacion.php',
					data:{
						pedidoID: pedidoID
					},
					dataType: 'json',
					success: function(data){
						if(data['result']){
					        sessionStorage.setItem('alert', "true");    
					        window.location.reload();
						}
					}
				});
			}
		});
	});
</script>

</body>
</html>