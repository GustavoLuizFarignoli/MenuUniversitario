<!DOCTYPE html>
<html lang="pt-br">
    <?php
        session_start();
        if(isset($_SESSION["user"])){

            include('connection.php');

            $email = $_SESSION["user"];

            $sql = "SELECT Nome, fk_Tipo_de_Usuario_id  FROM usuario WHERE E_mail = '$email'";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $nome = $row['Nome'];
                    $tipo = $row['fk_Tipo_de_Usuario_id'];
                }
            }

            if ($tipo == 2){
                header('Location: paginadogerente.php'); // essa página ainda precisa ser implementada
            }

            if ($tipo == 3){
                header('Location: paginadoadm.php'); // essa página ainda precisa ser implementada
            }

        } else {
            header('Location: paginadousuario.php');
        }
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bloco.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title><?php echo $nome . " - Menu Universitário"; ?></title>
    <link rel="icon" type="image/x-icon" href="./imagens/u.png">
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="./imagens/u.png" alt="logo">
                </span>

                <div class="text logo-text">
                    <span class="name">Menu Universitário</span>
                    <span class="profession">PUC-PR</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle' style="color: white; background-color: #695CFE"></i>
        </header>   

        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class='bx bx-search icon-pesquisar'></i>
                    <input type="text" placeholder="Pesquisar...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="index.php">
                            <i class='bx bx-home-alt icon-home' ></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="bloco.php?id=1">
                            <i class='bx bx-building icon-amarelo' ></i>
                            <span class="text nav-text" >Bloco Amarelo</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="bloco.php?id=2">
                            <i class='bx bx-building icon-azul'></i>
                            <span class="text nav-text">Bloco Azul</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="bloco.php?id=3">
                            <i class='bx bx-building icon-verde' ></i>
                            <span class="text nav-text">Bloco Verde</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="bloco.php?id=4">
                            <i class='bx bx-building icon-laranja' ></i>
                            <span class="text nav-text">Bloco Laranja</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="bloco.php?id=5">
                            <i class='bx bx-building icon-vermelho' ></i>
                            <span class="text nav-text">Bloco Vermelho</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="bloco.php?id=6">
                            <i class='bx bx-plus-medical icon-medicina' ></i>
                            <span class="text nav-text">Bloco de Medicina</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Modo Escuro</span>
                    
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

    <section class="home">
        <hr>
            <h3>Atualize as suas informações</h3>
        <hr>
        <div class="text">
            <form action="">
            <?php
                $useratual = $_SESSION["user"];
                $sql = "SELECT Nome, E_mail, Senha FROM usario WHERE user = '$useratual'"  

                $gotResultado = mysqli_query($conn,$sql);

                if($gotResultado){
                    if(mysqli_num_rows($gotResultado)>0){
                        while($row = mysqli_fetch_array($gotResultado)){
                            //print_r($row[Nome]);
                            ?>
                            <div class="text">
                                                <input type="email" name="updateEmail" class="input" value="<?php echo $row[E_mail]; ?>">
                                            </div>
                                            
                                            <div class="text">
                                                <input type="text" name="updateNome" class="input" value="<?php echo $row[Nome]; ?>">
                                            </div>
                                            
                                            <div class="text">
                                                <input type="text" name="updateSenha" class="input" value="<?php echo $row[Senha]; ?>">
                                            </div>

                                            <div class="text">
                                                <input type="submit" name="update" class="registerbtn" value="Atualizar">
                                            </div>
                            <?php
                        }
                    }
                }
            ?>
            
            </form>
        </div>
    </section>