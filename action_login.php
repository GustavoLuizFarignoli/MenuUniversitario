<?php
    include('connection.php');

    $email = $_POST["email"];
    $senha = $_POST["password"];
    $tipo = $_POST["type"];

    if ($tipo == 1){

        $sql = "SELECT senha FROM usuario WHERE E_mail = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                if(password_verify($senha, $row['senha'])){
                    if(!isset($_SESSION["user"])){
                        session_start();
                        $_SESSION["user"] = $email;
                    }
                    $message = "Login Realizado com Sucesso, Seja Bem-vindo";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    echo "<script type='text/javascript'>window.location.href = 'paginadousuario.php';</script>";
                    //header("Location: index.php");
                } else {
                    $message = "A senha inserida está incorreta, por-favor tente novamente";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
                    //header("Location: login.php"); // falta mandar via get que a senha está incorreta
                }
            }
        }
        $message = "Nenhum cadastro encontrado, por favor registre-se";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>window.location.href = 'register.php';</script>";
        // header("Location: login.php"); // mandar via get que o e-mail é inválido
    }


    if ($tipo == 2){
        $cnpj = $_POST["cnpj"];
        // É preciso preencher um pouco a db para que possa ser implementado esse registro
    }
    




?>