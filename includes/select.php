<?php 
	/*SELECT.PHP: Archivo PHP para hacer un select simple */


	$results;
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['tabla'])){



			$queryGenerico = new QueryGenerico();
			$queryGenerico->setTable($_POST['tabla']);
			if(isset($_POST['select'])){
				$queryGenerico->setSelect($_POST['select']);
			}
			if(isset($_POST['where'])){
				$queryGenerico->setWhere($_POST['where']);
			}
			
			$results = $queryGenerico->read();

			$results['match'] = 'true';
		} else {
			$results['match'] = 'false';
			$results['message'] = 'Table not set';
		}
		
	} else {
		$results['match'] = 'false';
		$results['message'] = 'Invalid request';
	}

	http_response_code(200);
	header('Content-Type: application/json');
	echo json_encode($results);
?>