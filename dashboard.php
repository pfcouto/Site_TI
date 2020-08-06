<?php
	session_start();
	if ( !isset($_SESSION['username']) ){
	header( "refresh:5;url=index.php" );
	die( "Acesso restrito." );
	}
	
	$valor_fumo = file_get_contents("api/files/fumo/valor.txt");
	$hora_fumo = file_get_contents("api/files/fumo/hora.txt");
	$nome_fumo = file_get_contents("api/files/fumo/nome.txt");
	
	$valor_movimento = file_get_contents("api/files/movimento/valor.txt");
	$hora_movimento = file_get_contents("api/files/movimento/hora.txt");
	$nome_movimento = file_get_contents("api/files/movimento/nome.txt");
	
	$valor_luminosidade = file_get_contents("api/files/luminosidade/valor.txt");
	$hora_luminosidade = file_get_contents("api/files/luminosidade/hora.txt");
	$nome_luminosidade = file_get_contents("api/files/luminosidade/nome.txt");
	
	$valor_temperatura = file_get_contents("api/files/temperatura/valor.txt");
	$hora_temperatura = file_get_contents("api/files/temperatura/hora.txt");
	$nome_temperatura = file_get_contents("api/files/temperatura/nome.txt");
	
	$valor_humidade = file_get_contents("api/files/humidade/valor.txt");
	$hora_humidade = file_get_contents("api/files/humidade/hora.txt");
	$nome_humidade = file_get_contents("api/files/humidade/nome.txt");
	
	$valor_agua = file_get_contents("api/files/agua/valor.txt");
	$hora_agua = file_get_contents("api/files/agua/hora.txt");
	$nome_agua = file_get_contents("api/files/agua/nome.txt");
	
	//Atuadores
	
	$hora_portao = file_get_contents("api/files/portao/hora.txt");
	$valor_portao = file_get_contents("api/files/portao/valor.txt");
	
	$hora_aspersor = file_get_contents("api/files/aspersor/hora.txt");
	$valor_aspersor = file_get_contents("api/files/aspersor/valor.txt");
	
	$hora_humidificador = file_get_contents("api/files/humidificador/hora.txt");
	$valor_humidificador = file_get_contents("api/files/humidificador/valor.txt");
	
	$hora_janela = file_get_contents("api/files/janela/hora.txt");
	$valor_janela = file_get_contents("api/files/janela/valor.txt");
	
	$hora_led = file_get_contents("api/files/led/hora.txt");
	$valor_led = file_get_contents("api/files/led/valor.txt");
	
	$hora_porta = file_get_contents("api/files/porta/hora.txt");
	$valor_porta = file_get_contents("api/files/porta/valor.txt");
	$portaTrancada = file_get_contents("api/files/porta_trancada/valor.txt");
	
	$hora_regador = file_get_contents("api/files/regador/hora.txt");
	$valor_regador = file_get_contents("api/files/regador/valor.txt");
	
	$hora_ventoinha = file_get_contents("api/files/ventoinha/hora.txt");
	$valor_ventoinha = file_get_contents("api/files/ventoinha/valor.txt");
	
	$fich_webcam = "webcam.jpg";


	
	if ($valor_portao == 1){
		$portaoStatus = "Aberto";
		$img_portao = "img/portao_open.png";
	}else{
		$portaoStatus = "Fechado";
		$img_portao = "img/portao_close.png";
	}
	
	if ($valor_aspersor == 1){
		$aspersorStatus = "ON";
		$img_aspersor = "img/sprinkler_on.png";
	}else{
		$aspersorStatus = "OFF";
		$img_aspersor = "img/sprinkler_off.png";
	}
	
	if ($valor_regador == 1){
		$regadorStatus = "ON";
		$img_regador = "img/regador_on.png";
	}else{
		$regadorStatus = "OFF";
		$img_regador = "img/regador_off.png";
	}
	
	if ($valor_humidificador == 1){
		$humidificadorStatus = "ON";
		$img_humidificador = "img/humidificador_on.png";
	}else{
		$humidificadorStatus = "OFF";
		$img_humidificador = "img/humidificador_off.png";
	}
	
	if ($valor_janela == 1){
		$janelaStatus = "Aberta";
		$img_janela = "img/window_open.png";
	}else{
		$janelaStatus = "Fechada";
		$img_janela = "img/window_close.png";
	}

	$ledStatus = "OFF";
	$img_led = "img/led_off.png";
	if($portaTrancada==1){
		$portaStatus = "Trancada";
		$img_porta = "img/porta_lock.png";
	}else{
		if ($valor_porta == 1){
			$portaStatus = "Aberta";
			$img_porta = "img/porta_open.png";
			if ($valor_led == 1){
				$ledStatus = "ON";
				$img_led = "img/led_on.png";
			}
		}else{
			$portaStatus = "Fechada";
			$img_porta = "img/porta_close.png";
		}
	}
	
	if ($valor_ventoinha == 1){
		$ventoinhaStatus = "ON";
		$img_ventoinha = "img/ventoinha_on.png";
	}else if($valor_ventoinha == 2){
		$ventoinhaStatus = "MAX";
		$img_ventoinha = "img/ventoinha_max.png";
	}else{
		$ventoinhaStatus = "OFF";
		$img_ventoinha = "img/ventoinha_off.png";
	}
	
	
	//BADGE LEVELS

	if ($valor_movimento == 1) {
		$nivel_movimento_badge = "badge badge-success";
		$nivel_movimento = "Sim";
	}else{
		$nivel_movimento_badge = "badge badge-warning";
		$nivel_movimento = "Não";
	}

	if($valor_temperatura <= 25){
		$nivel_temperatura_badge = "badge badge-success";
		$nivel_temperatura = "Boa";
	}else if($valor_temperatura > 25 && $valor_temperatura < 35){
		$nivel_temperatura_badge = "badge badge-warning";
		$nivel_temperatura = "Alta";
	}else{
		$nivel_temperatura_badge = "badge badge-danger";
		$nivel_temperatura = "Muito alta";
	}
	
	$nivel_fumo_badge = "badge badge-success";
	$nivel_fumo = "Bom";
	if($valor_fumo > 15){
		$nivel_fumo_badge = "badge badge-danger";
		$nivel_fumo = "Alto";
	}

	$nivel_agua_badge = "badge badge-success";
	$nivel_agua = "Bom";
	if($valor_agua < 3){
		$nivel_agua_badge = "badge badge-warning";
		$nivel_agua = "Baixo";
	}
	
	$nivel_humidade = "Boa";
	$nivel_humidade_badge = "badge badge-success";
	if($valor_humidade < 30){
		$nivel_humidade_badge = "badge badge-danger";
		$nivel_humidade = "Baixa";
	}

	$luminosidade="Noite";
	$img_luminosidade="img/night.png";
	$nivel_luminosidade_badge = "badge badge-primary";
	if($valor_luminosidade==1){
		$luminosidade="Dia";
		$img_luminosidade="img/day.png";
		$nivel_luminosidade_badge = "badge badge-info";
		$luminosidade="Dia";
	}
	
	//Admin extra
	
	$escondido=null;
	if($_SESSION['username']!="admin"){
		$escondido="hidden";
	}
	
?>



<!doctype html>
	<html lang="pt">
		<head>
		
			<title> Plataforma IoT </title>
			
			<meta charset="utf-8">
			
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			
			<link rel="stylesheet" type="text/css" href="mystyle1.css">
			
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			
			<meta http-equiv="refresh" content="5">
			
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			
			
			<script>
			$(document).ready(function(){
			
				$("#b1").click(function(){
					$.post("http://127.0.0.1/ti/api/api.php",
					{
						nome:"porta_trancada",
						valor:"1",
						hora:"<?php echo date('Y-m-d H:i:s'); ?>"
					},
					function(data,status){
					});
				});
			});
			
			</script>
			
			<script>
			$(document).ready(function(){
			
				$("#b2").click(function(){
					$.post("http://127.0.0.1/ti/api/api.php",
					{
						nome:"porta_trancada",
						valor:"0",
						hora:"<?php echo date('Y-m-d H:i:s'); ?>"
					},
					function(data,status){
					});
				});
			});
			
			</script>
			
		</head>
		




		
		<body>
			
			<!-- Side navigation -->
			<div class="sidenav">
			<p style="color:white; padding: 6px 8px 6px 16px; font-size: 26px;"><b>Dashboard EI-TI</b></p>
                <br>
                <a style="font-size: 24px">Histórico</a>
                <a href="historicoSensores.php" target="_blank">Sensores</a>
                <a href="historicoAtuadores.php" target="_blank">Atuadores</a>
                <br> 
                <br> 
                <br> 
                <br>
				
		
				
				<div <?php echo $escondido; ?> style="padding: 2px 8px 6px 16px;">
					<h6 <?php echo $escondido; ?> >Porta:
					<?php
						echo $portaStatus;
					?>
					</h6>
					<button <?php echo $escondido; ?> style="border-radius:6px" id="b1" onclick="alert('A porta foi trancada')"> Trancar</button>
					<button <?php echo $escondido; ?> style="border-radius:6px" id="b2" onclick="alert('A porta foi destrancada')"> Destrancar</button>
				</div>
				<br>
				<div style="padding: 6px 16px 6px 16px;
					color: black;
					font-size: 16px;
					display: inline-block;
					position: fixed;
					bottom:120px;
					"> 
					<h6>Criadores:</h6>
					<img src="img/mario.jpg" width="50" height="50" alt='Imagem Mario' style="border-radius:40px;display: inline-block;"> Mário Rui Santos Cruz
					<br>
					<img src="img/pedro.jpg" width="50" height="50" alt='Imagem Pedro' style="border-radius:40px;display: inline-block;"> Pedro Félix Couto
				</div>
			
			
				<div style="padding: 6px 16px 6px 16px;
					color: black;
					font-size: 18px;
					display: inline-block;
					position: fixed;
					bottom:0;
					"> 
					<table class="table">
						<tr style="text-align:center;">
							<th style="padding: 15px 32px 6px 16px;" scope="col">
								<?php 
									echo $_SESSION['username'];
								?>
							</th>
							<th scope="col">
								<a style="text-decoration:none;color:black;font-size: 14px;padding: 2px 3px 2px 3px;" class="btn btn-sm btn-outline-dark my-2 my-sm-0" href="logout.php">Logout</a>
							</th>
						</tr>
					</table>
			</div>
			</div>

			<!-- Page content -->
			<div class="main">
				<br>
				
				<div style="background-color:#e6ffff" class="jumbotron">
				
					<h1 style="color:#009999"> Servidor IoT </h1>
					<p> Tecnologias de Internet - Engenharia Informática </p>
					
				</div>
				
				
				
				
				<div class="container text-center">
					<div class="row">
						<div class="col-lg-3">
							<div class="card">
								<div class="card-header"><b>Porta: <?php echo $portaStatus ?> </b> </div>
								<div class="card-body"><img alt='Imagem da Porta' src='<?php echo $img_porta ?>'> </div>
								<div class="card-footer">Atualização: 
									<?php echo $hora_porta; ?> </div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card">
								<div class="card-header"> <b>Led: <?php echo $ledStatus;?> </b> </div>
								<div class="card-body"> <img alt='Imagem do Led' src='<?php echo $img_led ?>'> </div>
								<div class="card-footer">Atualização: <?php echo $hora_led; ?>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card">
								<div class="card-header"><b>Portão: <?php echo $portaoStatus; ?> </b> </div>
								<div class="card-body"> <img alt='Imagem do Portao' src='<?php echo $img_portao ?>'> </div>
								<div class="card-footer">Atualização: <?php echo $hora_portao; ?> </div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card">
								<div class="card-header"><b>Ventoinha: <?php echo $ventoinhaStatus; ?> </b> </div>
								<div class="card-body"> <img alt='Imagem da Ventoinha' src='<?php echo $img_ventoinha ?>'> </div>
								<div class="card-footer">Atualização: <?php echo $hora_ventoinha; ?> </div>
							</div>
						</div>
					</div>
					<br>
					
					
					<div class="row">
						<div class="col-lg-3">
							<div class="card">
								<div class="card-header"><b>Janela: <?php echo $janelaStatus; ?> </b> </div>
								<div class="card-body"> <img alt='Imagem da Janela' src='<?php echo $img_janela ?>'> </div>
								<div class="card-footer">Atualização: <?php echo $hora_janela; ?> </div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card">
								<div class="card-header"><b>Regador: <?php echo $regadorStatus; ?> </b> </div>
								<div class="card-body"> <img alt='Imagem do Regador' src='<?php echo $img_regador ?>'> </div>
								<div class="card-footer">Atualização: <?php echo $hora_regador; ?> </div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card">
								<div class="card-header"><b>Humidificador: <?php echo $humidificadorStatus; ?> </b> </div>
								<div class="card-body"> <img alt='Imagem do Humidificador' src='<?php echo $img_humidificador ?>'> </div>
								<div class="card-footer">Atualização: <?php echo $hora_humidificador; ?> </div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card">
								<div class="card-header"><b>Aspersor: <?php echo $aspersorStatus; ?> </b> </div>
								<div class="card-body"> <img alt='Imagem do aspersor' src='<?php echo $img_aspersor ?>'> </div>
								<div class="card-footer">Atualização: <?php echo $hora_aspersor; ?> </div>
							</div>
						</div>
					</div>
					<br>
					
					
					
					<div class="row">
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header"> <b>Webcam </b> </div>
								<div class="card-body"> <?php echo "<img  src='webcam.jpg?id=".time()."' alt='webcam' style='width:85%'>"; ?> </div>
								<div class="card-footer">Atualização: <?php echo date("Y/m/d h:i",filemtime("webcam.jpg")); ?> </div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header"><b>Luminosidade: <?php echo $luminosidade ?></b></div>
								<div class="card-body"> <img height="315" src='<?php echo $img_luminosidade ?>' alt='Imagem Estado Dia'> </div>
								<div class="card-footer"> Atualização: <?php echo $hora_luminosidade; ?> </div>
							</div>
						</div>
					</div>
				</div>
		
				<br>
		
		
				<div class="container">
					<div class="card">
						<div class="card-header"> <h5>Tabela de Sensores </h5> </div>
						<div class="card-body"> 
							<table class="table">
								<thead>
									<tr>
										<th> Tipo de Dispositivo IoT </th>
										<th scope="col"> Valor </th>
										<th scope="col"> Data de Atualização </th>
										<th scope="col"> Estado Alertas </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><a href="aguaHist.php" style="color:black" > <?php echo $nome_agua; ?> </a></td>
										<td> <?php echo $valor_agua; ?> </td>
										<td> <?php echo $hora_agua; ?> </td>
										<td> <span class="<?php echo $nivel_agua_badge; ?>"> Nivel: <?php echo $nivel_agua; ?> </span> </td>
									</tr>
									<tr>
										<td><a href="fumoHist.php" style="color:black" > <?php echo $nome_fumo; ?> </a></td>
										<td> <?php echo $valor_fumo; ?> </td>
										<td> <?php echo $hora_fumo; ?> </td>
										<td> <span class="<?php echo $nivel_fumo_badge; ?>"> Nivel: <?php echo $nivel_fumo; ?> </span> </td>
									</tr>
									<tr>
										<td><a href="temperaturaHist.php" style="color:black" > <?php echo $nome_temperatura; ?> </a></td>
										<td> <?php echo $valor_temperatura; ?> </td>
										<td> <?php echo $hora_temperatura; ?> </td>
										<td> <span class="<?php echo $nivel_temperatura_badge; ?>"> Temperatura: <?php echo $nivel_temperatura; ?> </span> </td>
									</tr>
									<tr>
										<td><a href="movimentoHist.php" style="color:black" > <?php echo $nome_movimento; ?> </a></td>
										<td> <?php echo $valor_movimento; ?> </td>
										<td> <?php echo $hora_movimento; ?> </td>
										<td> <span class="<?php echo $nivel_movimento_badge; ?>"> Movimento: <?php echo $nivel_movimento; ?> </span> </td>
									</tr>
									<tr>
										<td><a href="luminosidadeHist.php" style="color:black" > <?php echo $nome_luminosidade; ?> </a></td>
										<td> <?php echo $valor_luminosidade; ?> </td>
										<td> <?php echo $hora_luminosidade; ?> </td>
										<td> <span class="<?php echo $nivel_luminosidade_badge; ?>"> <?php echo $luminosidade; ?> </span> </td>
									</tr>
									<tr>
										<td><a href="humidadeHist.php" style="color:black" > <?php echo $nome_humidade; ?> </a></td>
										<td> <?php echo $valor_humidade; ?> </td>
										<td> <?php echo $hora_humidade; ?> </td>
										<td> <span class="<?php echo $nivel_humidade_badge; ?>"> Humidade: <?php echo $nivel_humidade; ?> </span> </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		

		</body>
		
	</html>