<!DOCTYPE html>
<html lang="pt-br">
<?php
        session_start();
        if(isset($_SESSION["user"])){

            include('connection.php');

            $email = $_SESSION["user"];
        }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bloco.css">
    <link rel="stylesheet" href="./css/register.css">
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

    <section class="home">

            <h3 class="text" style="align-self: center;color:black; font-weight: bold">Atualize as suas informações</h3>
        <hr>
        <div class="container" style="align-self: center;">
            <form action="action_update.php" method="post" id="update" name="update">
                
            
            <div class="group">
                <input type="text" name="updateNome" id ='updateNome' class="input" pattern="[a-zA-Z ]*" value="<?php echo $nome; ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><b>Nome completo</b></label>
            </div>                                           
            <div class="group">
                <input type="text" name="updateSenha" id = "updateSenha" class="input" value="<?php echo $senha; ?>"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}"onkeyup="check();checkreg();" title="Sua senha deve conter no minimo 6 caracteres com pelo menos uma letra maíscula uma letra minuscula e um número">
                <span class="bar"></span>
                <label><b>Senha</b></label>
            </div> 
            <button type="submit" class="registerbtn">Atualizar</button>
                    
            
            </form>
        </div>
    </section>
        <script>
            const body = document.querySelector("body"),
            sidebar = body.querySelector(".sidebar"),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");

            toggle.addEventListener("click", ()=>{
                body.classList.toggle("close");
            });

            modeSwitch.addEventListener("click", ()=>{
                body.classList.toggle("dark");
            });
        
    </script>
</body>
</html>