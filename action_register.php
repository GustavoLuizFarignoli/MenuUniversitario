<?php
    include('connection.php');

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["psw"];
    $tipo = $_POST["type"];

    if ($tipo == 1){

        $sql = "INSERT INTO usuario VALUES('$nome','$email', '$senha', null, '$tipo')";

        if ($conn->query($sql) === TRUE) {
            echo "Insert Succeed!!!";
            header("Location: ./index.php");
            session_start();
            $_SESSION["user"] = $email;
        }
        else {
            echo ("alert('Insert fail!!!')");
            header("Location: ./login.php");
        }
    }


    if ($tipo == 2){
        $cnpj = $_POST["cnpj"];
        // É preciso preencher um pouco a db para que possa ser implementado esse registro
    }

?>