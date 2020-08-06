<?php
 header('Content-Type: text/html; charset=utf-8');

function save_file () {

    $target_file ="webcam.jpg";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Verifica se o ficheiro é uma imagem
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if($check !== false) {
            echo "O ficheiro é uma imagem.";
            $uploadOk = 1;
        } else {
            echo "O ficheiro não é uma imagem.";
            $uploadOk = 0;
        }
    }
    // Verificar o tamanho do ficheiro: se maior que 1000kB nao é permitido
    if ($_FILES["imagem"]["size"] > 1000000) {
        echo "O ficheiro é maior do que o permitido";
        $uploadOk = 0;
    }
    // Apenas os formatos .jpg e .png são permitidos
    if($imageFileType != "jpg" && $imageFileType != "png") {
        echo "Apenas os formatos jpg e png são permitidos";
        $uploadOk = 0;
    }
    // Se $uploadOk é igual a 0 ocorreu algum erro em algum lugar
    if ($uploadOk == 0) {
        echo "O ficheiro não foi enviado";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["imagem"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
 }

 if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_FILES['imagem'])){
        //print_r($_FILES['imagem']); 
        print_r($_FILES['imagem']['name']);
        print_r($_FILES['imagem']['size']);
        print_r($_FILES['imagem']['type']);
        save_file();

    }else{
        echo "ERRO: Nenhum elemento com o nome imagem";
    }
 }else{
    echo "ERRO: Nao foi recebido nenhum metodo POST";
    }
 ?>

