<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location: index.php");
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Menu Universitário</title>
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
                <?php
                    if(isset($_SESSION["user"])){
                        echo '<li class="">' . '<a href="paginadousuario.php">' . "<i class='bx bx-user icon-login' >" . '</i>' . '<span class="text nav-text">Login</span>' . '</a>' .'</li>';
                    } else {
                        echo '<li class="">' . '<a href="login.php">' . "<i class='bx bx-log-in'>" . '</i>' . '<span class="text nav-text">Login</span>' . '</a>' .'</li>';
                    } 
                ?>
            </div>
        </div>
        </div>

    </nav>

    <?php
    include('connection.php');

    if(isset($_POST['submit'])){
        $alteração = 0;

        $email = $_SESSION["user"];

        if(!empty($_POST['nome'])){
            $nome = $_POST['nome'];

            $sql = "UPDATE usuario SET Nome = '$nome' WHERE E_mail = '$email'";
            if ($conn->query($sql) === TRUE) {
                $alteração += 1;
            }
        }
        if(!empty($_POST['psw'])){
            $senha = $_POST['psw'];
            $hash = password_hash($senha, PASSWORD_BCRYPT);

            $sql = "UPDATE usuario SET Senha = '$hash' WHERE E_mail = '$email'";
            if ($conn->query($sql) === TRUE) {
                $alteração += 1;
            }
        }

        if($alteração != 0){
            $message = "Alterações realizadas com sucesso";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script type='text/javascript'>window.location.href = 'destruirsession.php';</script>";
        } else {
            $message = "Abortando alterações";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script type='text/javascript'>window.location.href = 'paginadousuario.php';</script>";
        }
    }
    
    
    ?>

    <section class="geral">
        <form action="editar.php" method="post" id="edit" name="edit">
        <div class="container">    
            <div class="group">
                <input type="text" class="input" name="nome" id="nome" pattern="[a-zA-Z ]*">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><b>Alterar Nome</b></label>
            </div>
 
            <div class="group">
                <input type="password" class="input" name="psw" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}"onkeyup="checkreg();" title="Sua senha deve conter no minimo 6 caracteres com pelo menos uma letra maíscula uma letra minuscula e um número">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><b>Alterar Senha</b></label>
            </div>

            <div class="group">
                <input type="checkbox" value="" id="showpassbox"> <b>Visualizar senha</b>
                <span class="highlight"></span>
                <span class="bar"></span> 
            </div>
            
                <i class="bx bx-x" id="verify-reg" style="color: rgb(173, 21, 21); visibility: hidden;"></i>
              
            <button type="submit" name="submit" class="registerbtn" >Editar</button>
        </div>
        </form>
    </section>

    <script>
        const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");
        const cb = document.querySelector('#showpassbox');
        const pass = document.querySelector('#psw');


        toggle.addEventListener("click" , () =>{
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click" , () =>{
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click" , () =>{
            body.classList.toggle("dark");
            
            if(body.classList.contains("dark")){
                modeText.innerText = "Modo Claro";
            }else{
                modeText.innerText = "Modo Escuro";
                
            }
        });


        cb.addEventListener("click", function (){
            if (pass.type == 'password'){
                pass.type = 'text';
            } else {
                pass.type = 'password';
            }
        })

        pass.addEventListener("focus", function(){
            document.getElementById("verify-reg").style.visibility = "visible";
        })

        pass.addEventListener("blur", function(){
            document.getElementById("verify-reg").style.visibility = "hidden";
        })

        function checkreg() {
            if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$/.test(document.getElementById("psw").value)) {
                console.log("reg valid")
                document.getElementById("verify-reg").className = "bx bx-check";
                document.getElementById("verify-reg").style.color = "green";
            } else {
                console.log("reg invalid")
                document.getElementById("verify-reg").className = "bx bx-x";
                document.getElementById("verify-reg").style.color = "red";
            }
        }
    </script>
</body>
</html>