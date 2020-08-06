<?php
	session_start();
	if ( !isset($_SESSION['username']) ){
	header( "refresh:5;url=index.php" );
	die( "Acesso restrito." );
	}
	
?>
<!doctype html>


	<html lang="pt">
	
		<head>
		
		<title>Historico do LED</title>
		
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		</head>
		<body>
			<nav class="navbar navbar-expand-sm" style="background-color:#00b3b3">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item"><b>Histórico</b></li>
					</ul>
					<a style="text-decoration:none;color:grey" class="btn btn-sm btn-outline-dark my-2 my-sm-0" href="historicoAtuadores.php">Back</a>
				</div>
			</nav>
			
			<br>
			
			<div class="container text-center">
				<div class="container">
					<div class="card">
						<div class="card-header" style="background-color: lightgreen"> <h5>LED</h5> </div>
						<div class="card-body"> 
							<?php
							$log = file("api/files/led/log.txt");

							if ($log != 0) {
								$counter=0;
								$tamanho = count($log);
								$posicao=$tamanho-1;
								
								while ($counter<100 && $counter<$tamanho) {
									$log = str_replace(';',' - Valor: ',$log);
									echo $log[$posicao]."<br>";
									$counter++;
									$posicao--;
								}
							}									
							?>
						</div>
					</div>
				</div>
			</div>
		<br>
		</body>
		
	</html>