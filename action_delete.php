<?php
    include('connection.php');

    session_start();
    if(isset($_SESSION["user"])){

        $email = $_SESSION["user"];

        $sql = "DELETE FROM usuario WHERE E_mail = '$email'";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php"); // deletado com sucesso
        }
        else {
            header("Location: paginadousuario.php"); // não foi possivel deletar conta
        }
    }else {
        header("Location: index.php"); // não esta logado
    }

?>