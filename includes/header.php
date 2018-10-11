<header>
	<div id="post-header">
		<div id="logo">
			<a href="index.php"><img id="dymosa-logo-trans"src="images/dymosa-logo-trans.png" alt="logo" /></a>
		</div>
		
		<div id="redes">
			<!-- <a href="">Facebook</a>
			<a href="">Instagram</a> -->
			<a id="fb" href="#Facebook"><img id="fb-icon2" src="images/fb-icon2.png"/></a>
			<a id="youtube" href="#YouTube"><img id="fb-icon2" src="images/youtube-icon2.png"/></a>
			<a id="instagram" href="#Instagram"><img id="instagram-icon2" src="images/instagram-icon2.png"/></a>
			<a id="twitter" href="#Twitter"><img id="twitter-icon2" src="images/twitter-icon2.png"/></a>
		</div>

		<div class="clear"></div>
	</div>
		
		
	<nav>
		<div id="post-nav">
			<ul>
				<li><a <?php if($paginaActual == "Inicio") { echo 'class = "activePage"';} ?> href="index.php">Inicio</a></li>
				<li><a <?php if($paginaActual == "Productos") { echo 'class = "activePage"';} ?> href="productos.php">Productos</a></li>
				<li><a <?php if($paginaActual == "Contacto") { echo 'class = "activePage"';} ?> href="contacto.php">Contacto</a></li>
				<li style="float:right"><a <?php if($paginaActual == "Acerca de") { echo 'class = "activePage"';} ?> href="acerca-de.php">Acerca de</a></li>
			</ul>
		</div>
	</nav>
</header>
