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
		
		<title>Historico</title>
		
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<link rel="stylesheet" href="mystyle.css">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<style>
		.header-custom { 
			background-color: lightgreen; 
		}
		</style>
		</head>
		<body>
			
			<nav class="navbar navbar-expand-sm" style="background-color: #00b3b3">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link">Dashboard EI-TI</a>
					</li>
					<li class="nav-item">
						<a class="nav-link"><b>Histórico Atuadores</b></a>
					</li>
					<li class="nav-item">
						<a href="historicoSensores.php" class="nav-link"><b>Sensores</b></a>
					</li>
					</ul>
				</div>
			</nav>
			
			<br>
			
			<div class="container text-center">
				<div class="row">
					<div class="col-sm-6"> 
						<div class="container">
							<div class="card">
								<div class="card-header header-custom"> <a href="aspersorHist.php" style="color:black" ><h5>Aspersor</h5></a> </div>
								<div class="card-body"> 
									<?php
										$log = file("api/files/aspersor/log.txt");
										// Mecanismo de leitura de linhas para os ficheiros log utilizado em todos os históricos
										// $log é um vetor de strings que fica com uma linha do ficheiro enviado para o file() por cada posiçao. Isto é, $log[0]="Primeria linha"; $log[1]="Segunda linha"; ...
										if ($log != 0) {
											$counter=0;
											$tamanho = count($log);
											// $log[$posição] fica a apontar para a ultima linha lida para $log uma vez que posição fica com o indice de o numero de linhas lidas - 1 para compensar o facto de começar em indice 0
											$posicao=$tamanho-1;

											while ($counter<10 && $counter<$tamanho) {
												$log = str_replace(';',' - Valor: ',$log);
												// Fortamação da string trocando o ";" pelo desejado, neste caso " - Valor: "
												echo $log[$posicao]."<br>";
												$counter++;
												$posicao--;
												// Decremento da posição com objetivo de na proxima iteração imprimir a linha superior a última; 
											}
										}
										
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6"> 
						<div class="container">
							<div class="card">
								<div class="card-header header-custom"> <a href="humidificadorHist.php" style="color:black" ><h5>Humidificador</h5></a> </div>
								<div class="card-body"> 
									<?php
										$log = file("api/files/humidificador/log.txt");

										if ($log != 0) {
											$counter=0;
											$tamanho = count($log);
											$posicao=$tamanho-1;

											while ($counter<10 && $counter<$tamanho) {
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
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6"> 
						<div class="container">
							<div class="card">
								<div class="card-header header-custom"> <a href="janelaHist.php" style="color:black" ><h5>Janela</h5></a> </div>
								<div class="card-body"> 
									<?php
										$log = file("api/files/janela/log.txt");

										if ($log != 0) {
											$counter=0;
											$tamanho = count($log);
											$posicao=$tamanho-1;

											while ($counter<10 && $counter<$tamanho) {
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
					<div class="col-sm-6"> 
						<div class="container">
							<div class="card">
								<div class="card-header header-custom"> <a href="ledHist.php" style="color:black" ><h5>Led</h5></a> </div>
								<div class="card-body"> 
									<?php
										$log = file("api/files/led/log.txt");

										if ($log != 0) {
											$counter=0;
											$tamanho = count($log);
											$posicao=$tamanho-1;

											while ($counter<10 && $counter<$tamanho) {
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
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6"> 
						<div class="container">
							<div class="card">
								<div class="card-header header-custom"> <a href="portaHist.php" style="color:black" ><h5>Porta</h5></a> </div>
								<div class="card-body"> 
									<?php
										$log = file("api/files/Porta/log.txt");

										if ($log != 0) {
											$counter=0;
											$tamanho = count($log);
											$posicao=$tamanho-1;

											while ($counter<10 && $counter<$tamanho) {
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
					<div class="col-sm-6"> 
						<div class="container">
							<div class="card">
								<div class="card-header header-custom"> <a href="portaoHist.php" style="color:black" ><h5>Portao</h5></a> </div>
								<div class="card-body"> 
									<?php
										$log = file("api/files/portao/log.txt");

										if ($log != 0) {
											$counter=0;
											$tamanho = count($log);
											$posicao=$tamanho-1;

											while ($counter<10 && $counter<$tamanho) {
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
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6"> 
						<div class="container">
							<div class="card">
								<div class="card-header header-custom"> <a href="regadorHist.php" style="color:black" ><h5>Regador</h5></a> </div>
								<div class="card-body"> 
									<?php
										$log = file("api/files/regador/log.txt");

										if ($log != 0) {
											$counter=0;
											$tamanho = count($log);
											$posicao=$tamanho-1;

											while ($counter<10 && $counter<$tamanho) {
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
					<div class="col-sm-6"> 
						<div class="container">
							<div class="card">
								<div class="card-header header-custom"> <a href="ventoinhaHist.php" style="color:black" ><h5>Ventoinha</h5></a> </div>
								<div class="card-body"> 
									<?php
										$log = file("api/files/ventoinha/log.txt");

										if ($log != 0) {
											$counter=0;
											$tamanho = count($log);
											$posicao=$tamanho-1;

											while ($counter<10 && $counter<$tamanho) {
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
				</div>
			</div>
			<br>
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		</body>
		
	</html>