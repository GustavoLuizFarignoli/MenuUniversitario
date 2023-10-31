<?php
    /* Molec*/ 
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "mu";

    /*Vittorio - Connection
    $servername = "localhost:3307";
    $username = "desenvolvedor";
    $password = "Bes@2022#";
    $dbname = "mu";*/ 
    
    /* Gustavo - Connection
    $servername = "localhost";
    $username = "desenvolvedor";
    $password = "Bes@2022#";
    $dbname = "mu";
    */
    /* Breno - Connection
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "mu";
    */
    try{
        $conn = new mysqli($servername, $username, $password, $dbname);
    } catch(Exception $e){
        $message = "Não foi possível estabelecer conexão com o servidor, tente novamente mais tarde";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
    }

    /*echo "Conexão efetuada com sucesso!!!";*/
?> 