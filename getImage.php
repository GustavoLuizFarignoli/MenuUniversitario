<?php

    include('connection.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM estabelecimento WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        header("Content-type: image/jpeg");
        echo $row['Imagem'];


    } else {
        $message = "Um erro ocorreu";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
    }
?>