<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Menu Universitário</title>
    <link rel="icon" type="image/x-icon" href="imagens/u.png">
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
                        <a href="blocoAmarelo.php">
                            <i class='bx bx-building icon-amarelo' ></i>
                            <span class="text nav-text">Bloco Amarelo</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="blocoAzul.php">
                            <i class='bx bx-building icon-azul'></i>
                            <span class="text nav-text">Bloco Azul</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="blocoVerde.php">
                            <i class='bx bx-building icon-verde' ></i>
                            <span class="text nav-text">Bloco Verde</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="blocoLaranja.php">
                            <i class='bx bx-building icon-laranja' ></i>
                            <span class="text nav-text">Bloco Laranja</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="blocoVermelho.php">
                            <i class='bx bx-building icon-vermelho' ></i>
                            <span class="text nav-text">Bloco Vermelho</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="blocoMedicina.php">
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
                    <a href="#">
                        <i class='bx bx-user icon-login' ></i>
                        <span class="text nav-text">Login</span>
                    </a>
                </li>
            </div>
        </div>

    </nav>

    <section class="home">
        <form action="action_login.php" method="post" id="login" name="login">
        <div class="geral">
            <div class="card">
                    <div class="grupo">
                        <input type="radio" id="user" name="type" value="1" onclick="changetype(1)" checked> Cliente
                        <input type="radio" id="ger" name="type" value="2" onclick="changetype(2)"> Gerente
                    </div>
                    <div class="grupo">
                        <input class="input" type="email" name="email" id="email" placeholder="EMAIL" required>
                    </div>
                    <div class="grupo">
                        <input class="input" type="password" name="password" id="password" placeholder="SENHA" required>
                    </div>
                    <div id="cnpjdiv" hidden class="grupo">
                        <input class="input" type="text" id="cnpj" placeholder="CNPJ"
                        pattern="^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$">
                    </div>
                    <div class="grupo">
                        <input type="checkbox" value="" id="showpassbox">
                        <label for="showpassbox"> Visualizar senha </label>
                    </div>
                    <!--
                    <div>
                        <input type="checkbox" value="" id="remeberbox" checked>
                        <label for="remeberbox"> Lembrar de mim! </label>
                    </div>
                    <div>
                        <a href="#!">Esqueceu sua senha?</a>
                    </div>
                    -->
                    <button type="submit" class="grupo">Entrar</button>
                    <div class="text-center">
                        <p>Ainda não faz parte dessa comunidade? <a href="register.php">Registre-se</a></p>
                    </div>
            </div>
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
        const passbox = document.querySelector('#password');
        const cnpj = document.getElementById("cnpj")


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
            if (passbox.type == 'password'){
                passbox.type = 'text';
            } else {
                passbox.type = 'password'
            }
        })
  
        function changetype(type){
            var cnpjdiv = document.getElementById("cnpjdiv")
            var cnpjinput = document.getElementById("cnpj")
            if (type === 2){
                cnpjdiv.hidden = false;
                cnpjinput.setAttribute('required', ''); //adiciona required ao campo de cnpj
            } else {
                cnpjdiv.hidden = true;
                cnpjinput.removeAttribute('required'); //remove o required do campo cnpj
            }
        }


        cnpj.addEventListener("input", ()=> {formatmask(cnpj);});
        cnpj.addEventListener("focus", ()=> {formatmask(cnpj, "focus");});
        cnpj.addEventListener("focusout", ()=> {formatmask(cnpj, "focusout")})

        function formatmask(element, event){
            const mask = "__.___.___/____-__",
                masklen = mask.split("_").length - 1;
            if (event == "focusout" && element.value.replace(/[^0-9]/g, "").length == 0) {
                element.value = "";
                return;
            }
            if (event == "focus"){
                requestAnimationFrame(() => {
                    element.setSelectionRange(element.value.indexOf("_"), element.value.indexOf("_"));
                });
                return;
            }
            let position = element.selectionStart,
                input = element.value.replace(/[^0-9_]/g, ""),
                relativepos = position - mask.slice(0, position).replace(/[0-9_]/g, "").length,
                result = "";
            if (input.length < masklen){
                if (/[^0-9_]/.test(mask[position-1]) && position-1 >= 0){
                    position -= 1;
                }
                input = input.slice(0, relativepos)
                    + "_".repeat(masklen - input.length) + input.slice(relativepos);
            } else if (input.length > masklen){
                if (/[^0-9_]/.test(mask[position - 1])){
                    relativepos += 1;
                    position += 1;
                }
                input = input.slice(0, relativepos)
                    + input.slice(relativepos + input.length - masklen);
            }
            for (let m = 0, i = 0; m < mask.length; m++) {
                if (mask[m] == "_") {
                    result += input[i] || "_";
                    i++;
                } else {
                    result += mask[m];
                }
            }
            element.value = result;
            element.selectionEnd = position;
        }

    </script>
</body>
</html>