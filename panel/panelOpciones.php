<?php

if($_SERVER['REQUEST_METHOD'] == 'GET') {
	if(isset($_GET['id'])) {
    	$id = $_GET['id'];

    	switch($id) {
    		case 'pedidos-lista':
    			break;

        	case 'empresas-lista':
				include 'empresas-tabla.php';
                break;

    		case 'clientes-lista':
				echo ('<h2 class="text-center">Clientes</h2>');
				include '../includes/tablas\clientes-tabla.php';
                break;
    		case 'empresas-lista':
				echo ('<h2 class="text-center">Empresas</h2>');
				include '../includes/tablas\empresas-tabla.php';
                break;

          	case 'vendedores-lista':
					echo ('<div id="dashboard" style="background-color: blue;">
				<p>Lorem ipsum dolor sit     amet, consectetur adipiscing elit. Phasellus venenatis dolor ligula. Cras consequat hendrerit purus facilisis molestie. Donec felis augue, placerat sed metus at, facilisis tristique diam. Praesent metus mi, pharetra a sodales ut, congue et tortor. Vestibulum nec lacus ornare, rhoncus mauris a, elementum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras scelerisque a elit nec tempor. Proin bibendum eros nec aliquet interdum. Mauris varius nec arcu in facilisis.

				Integer lacus dolor, dignissim a nibh sed, suscipit ullamcorper lacus. Praesent ullamcorper urna a eros vestibulum cursus. Quisque dignissim mattis vestibulum. Vivamus volutpat hendrerit diam, a ultricies odio viverra molestie. Nullam rutrum risus quis mi ornare pharetra. Proin non ante purus. Donec laoreet convallis orci a tincidunt.

				Pellentesque id tempor nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque varius malesuada ultricies. Nulla maximus metus ut risus sagittis, in rutrum tellus ullamcorper. Nam auctor nunc quis enim faucibus blandit. Nam cursus leo risus, a tempor orci ultricies non. Integer enim mauris, imperdiet eget pretium quis, sodales id tortor. Quisque convallis erat tincidunt feugiat finibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi vulputate lacinia felis. In odio ex, commodo id rutrum eget, facilisis a leo.</p>

				</div>');
                break;
          	case 'administradores-lista':

				echo ('<div id="dashboard" style="background-color: green;">
				<p>Lorem ipsum dolor sit     amet, consectetur adipiscing elit. Phasellus venenatis dolor ligula. Cras consequat hendrerit purus facilisis molestie. Donec felis augue, placerat sed metus at, facilisis tristique diam. Praesent metus mi, pharetra a sodales ut, congue et tortor. Vestibulum nec lacus ornare, rhoncus mauris a, elementum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras scelerisque a elit nec tempor. Proin bibendum eros nec aliquet interdum. Mauris varius nec arcu in facilisis.

				Integer lacus dolor, dignissim a nibh sed, suscipit ullamcorper lacus. Praesent ullamcorper urna a eros vestibulum cursus. Quisque dignissim mattis vestibulum. Vivamus volutpat hendrerit diam, a ultricies odio viverra molestie. Nullam rutrum risus quis mi ornare pharetra. Proin non ante purus. Donec laoreet convallis orci a tincidunt.

				Pellentesque id tempor nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque varius malesuada ultricies. Nulla maximus metus ut risus sagittis, in rutrum tellus ullamcorper. Nam auctor nunc quis enim faucibus blandit. Nam cursus leo risus, a tempor orci ultricies non. Integer enim mauris, imperdiet eget pretium quis, sodales id tortor. Quisque convallis erat tincidunt feugiat finibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi vulputate lacinia felis. In odio ex, commodo id rutrum eget, facilisis a leo.</p>

				</div>');
                break;
        } 
  	} 
} 

?>