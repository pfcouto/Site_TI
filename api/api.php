<?php

 header('Content-Type: text/html; charset=utf-8');
 
 if($_SERVER["REQUEST_METHOD"]=="POST"){
		echo "Recebido um POST\n";
		 print_r($_POST);
		 if (isset($_POST["nome"]) && isset($_POST[valor]) && isset($_POST[hora])){
		 file_put_contents("files/".$_POST["nome"]."/valor.txt",$_POST["valor"]);
		 file_put_contents("files/".$_POST["nome"]."/hora.txt",$_POST["hora"]);
		 file_put_contents("files/".$_POST["nome"]."/log.txt", $_POST["hora"].";".$_POST["valor"] . PHP_EOL, FILE_APPEND);
		 file_put_contents("files/".$_POST["nome"]."/nome.txt", $_POST["nome"]);
		 }
 }elseif ($_SERVER["REQUEST_METHOD"]=="GET"){
	 
	 
	 if(isset($_GET["nome"])){
		 if (is_dir("files/".$_GET["nome"])){
			 echo file_get_contents("files/".$_GET["nome"]."/valor.txt");
		 }else{
			 http_response_code(403);
		 }
		 
	 }else{
		 echo "faltam parametros no Get";
		 http_response_code(400);
	 }
 }else {
	 echo "metodo nao permitido\n";
 }

 ?>
