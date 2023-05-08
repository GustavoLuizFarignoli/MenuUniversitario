<?php
    $servername = "127.0.0.1";
    $username = "root"; #"desenvolvedor";
    $password = "@BES123";    #"Bes@2022#";
    $dbname = "mu";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexão:" . $conn->connect_error);
    }

    /*echo "Conexão efetuada com sucesso!!!";*/
?>