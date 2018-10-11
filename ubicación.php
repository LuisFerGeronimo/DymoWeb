<?php $paginaActual = "Ubicacion"; ?>

<?php include('includes/topHtml.php'); ?>

<body>
	<?php include('includes/header.php'); ?>


	<div class="mapouter">
		<div class="gmap_canvas">
			<iframe width="1000" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=239%20Coyuya&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
			<a href="https://www.crocothemes.net">crocothemes.net</a>
		</div>

		<style>
			.mapouter{
				text-align:right;
				height:500px;width:1000px;
			}

			.gmap_canvas {
				overflow:hidden;
				background:none!important;
				height:500px;
				width:1000px;
			}
		</style>

	</div>


	<?php include('includes/footer.php'); ?>

	
</body>
</html>