<?php
    include('connection.php');

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["psw"];
    $tipo = $_POST["type"];
    $hash = password_hash($senha, PASSWORD_BCRYPT);

    if ($tipo == 1){

        $sql = "SELECT Nome FROM usuario WHERE E_mail = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $message = "Este E-mail já foi registrado";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
        } else {
            $sql2 = "INSERT INTO usuario VALUES('$nome','$email', '$hash', null, '$tipo')";

            if ($conn->query($sql2) === TRUE) {
                session_start();
                $_SESSION["user"] = $email;
                $message = "Registro Bem-Sucedido";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
            }
            else {
                $message = "Não Foi Possível Finalizar o cadastro";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
            }
        }
    }


    if ($tipo == 2){
        $cnpj = $_POST["cnpj"];
        // É preciso preencher um pouco a db para que possa ser implementado esse registro
    }

?>