<!DOCTYPE html>
<html lang="pt-br">
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

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class='bx bx-search icon-pesquisar'></i>
                    <input type="text" placeholder="Pesquisar...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="./index.php">
                            <i class='bx bx-home-alt icon-home' ></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./blocoAmarelo/blocoAmarelo.php">
                            <i class='bx bx-building icon-amarelo' ></i>
                            <span class="text nav-text">Bloco Amarelo</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./blocoAzul/blocoAzul.php">
                            <i class='bx bx-building icon-azul'></i>
                            <span class="text nav-text">Bloco Azul</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./blocoVerde/blocoVerde.php">
                            <i class='bx bx-building icon-verde' ></i>
                            <span class="text nav-text">Bloco Verde</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./blocoLaranja/blocoLaranja.php">
                            <i class='bx bx-building icon-laranja' ></i>
                            <span class="text nav-text">Bloco Laranja</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./blocoVermelho/blocoVermelho.php">
                            <i class='bx bx-building icon-vermelho' ></i>
                            <span class="text nav-text">Bloco Vermelho</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./blocoMedicina/blocoMedicina.php">
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
                <li class="">
                    <a href="./login.php">
                        <i class='bx bx-user icon-login' ></i>
                        <span class="text nav-text">Login</span>
                    </a>
                </li>
            </div>
        </div>

    </nav>

    <section class="home">
        <form action="login_actionPOST.php" method="post" id="register" name="register">
            <div class="container">

                <div class="group">
                    <input required="" type="text" class="input" name="nome" id="nome" pattern="[a-zA-Z]*">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><b>Nome completo</b></label>
                </div>

                <div class="group">
                    <input required="" type="email" class="input" name="email" id="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><b>Email</b></label>
                </div>

                <div style="display: flex; flex-direction: row; align-self: center;">
                    <div class="group">
                        <input required="" type="password" class="input" name="psw" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,8}"onkeyup="check();checkreg();">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label><b>Senha</b></label>
                    </div>
                    <i class="bx bx-x" id="verify-reg" style="color: rgb(173, 21, 21); visibility: hidden;"></i>
                </div>
                <div style="display: flex; flex-direction: row; align-self: center;">
                    <div class="group">
                        <input required="" type="password" class="input" name="psw-repeat" id="psw-repeat" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,8}" onkeyup="check();checkreg()">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label><b>Confirmar senha</b></label>
                    </div>
                    <i class="bx bx-check" id="verify" style="color: rgb(21, 173, 21); visibility: hidden;"></i>
                </div>

                <div class="group">
                    <input type="checkbox" value="" id="showpassbox">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><b>Visualizar senha</b></label>
                </div>
          
                <button type="submit" class="registerbtn" >Registre-se</button>
            </div>
          
            <div class="signin">
              <p>Já possui uma conta? <a href="login.php">Entrar</a>.</p>
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
        const passconfirm = document.querySelector('#psw-repeat');


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
                passconfirm.type = 'text';
            } else {
                pass.type = 'password';
                passconfirm.type = 'password';
            }
        })

        pass.addEventListener("focus", function(){
            document.getElementById("verify-reg").style.visibility = "visible";
        })

        pass.addEventListener("blur", function(){
            document.getElementById("verify-reg").style.visibility = "hidden";
        })

        passconfirm.addEventListener("focus", function(){
            document.getElementById("verify").style.visibility = "visible";
        })

        passconfirm.addEventListener("blur", function(){
            document.getElementById("verify").style.visibility = "hidden";

        })

        function checkreg() {
            if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,8}$/.test(document.getElementById("psw").value)) {
                console.log("reg valid")
                document.getElementById("verify-reg").className = "bx bx-check";
                document.getElementById("verify-reg").style.color = "green";
            } else {
                console.log("reg invalid")
                document.getElementById("verify-reg").className = "bx bx-x";
                document.getElementById("verify-reg").style.color = "red";
            }
        }
        
        function check() {
            if (document.getElementById('psw').value ==
                document.getElementById('psw-repeat').value) {
                console.log("matching");
                document.getElementById("verify").className = "bx bx-check";
                document.getElementById("verify").style.color = "green";
                //document.getElementById('message').innerHTML = 'matching';
            } else {
                console.log("not matching");
                document.getElementById("verify").className = "bx bx-x";
                document.getElementById("verify").style.color = "red";
                
               //document.getElementById('message').innerHTML = 'not matching';
            }
            }
    </script>
</body>
</html>