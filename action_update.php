<?php
    include('connection.php');

    session_start();
    if(isset($_SESSION["user"])){

        $email = $_SESSION["user"];
    
    $nome = $_POST["upadateNome"];   
    $senha = $_POST["updateSenha"];
    
    $sql = "UPDATE usuario SET Nome = '$nome', Senha = '$senha' WHERE E_mail = '$email'";
}