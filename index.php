<?php

session_start();

$username1="pedro";
$password1="password1";
$username2="abadjar";
$password2="teste123";
$username3="admin";
$password3="admin";

if( isset($_POST['username']) && isset($_POST['password'])){
	
	if(($_POST['username']==$username1 && $_POST['password']==$password1) || ($_POST['username']==$username2 && $_POST['password']==$password2) || ($_POST['username']==$username3 && $_POST['password']==$password3)){
	
	  $_SESSION['username']=$_POST['username'];
	 
	 header('location: http://127.0.0.1/ti/dashboard.php');
	 
	}
	else{
		echo("Autenticação falhada <br>");
	}
}

?>

<!doctype html>
<html lang="pt">	


  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
 

    <title>PHP</title>
  </head>
  <body>
  	
		<div class="container" style="display:flex;align-items:center;justify-content:center">
        <form class="needs-validation" method="post">
			<a href="index.php"><img src="estg.png" alt="ESTG"></a>
			<br>
			<div class="form-group">
				<label for="usr">Username:</label><br>
				<input style="width:300px" name="username" id="usr" required type="text" placeholder="Escreva o username">
				<br>
				<label for="pwd">Password:</label><br>
				<input style="width:300px" name="password" id="pwd" required type="password" placeholder="Escreva a password">
			</div>
			<input type="submit" class="btn btn-info" value="Submeter">
		</form>
        </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>