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
                    header("Location: index.php");
                } else {
                    header("Location: register.php"); // se não deu certo manda para o registro
                }
            }
        }
       
    }


    if ($tipo == 2){
        $cnpj = $_POST["cnpj"];
        // É preciso preencher um pouco a db para que possa ser implementado esse registro
    }
    




?>