<?php
    $servername = "127.0.0.1";
    #$username = "root";
    #$password = "@BES123";
    $username = "desenvolvedor";
    $password = "Bes@2022#";
    $dbname = "mu";

    try{
        $conn = new mysqli($servername, $username, $password, $dbname);
    } catch(Exception $e){
        $message = "Não foi possível estabelecer conexão com o servidor, tente novamente mais tarde";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
    }

    /*echo "Conexão efetuada com sucesso!!!";*/
?>