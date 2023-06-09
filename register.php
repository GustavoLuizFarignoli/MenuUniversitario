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

            <i class='bx bx-chevron-right toggle' style="color: white; background-color: #695CFE"></i>
        </header>   

        <div class="menu-bar">
            <div class="menu">
            <?php
                    if(isset($_SESSION["user"])){
                        echo '<li class="">' . '<a href="paginadousuario.php">' . "<i class='bx bx-user icon-login' >" . '</i>' . '<span class="text nav-text">'. $nome .'</span>' . '</a>' .'</li>';
                    } else {
                        echo '<li class="">' . '<a href="login.php">' . "<i class='bx bx-log-in'>" . '</i>' . '<span class="text nav-text">Login</span>' . '</a>' .'</li>';
                    } 
                ?>
            <ul class="menu-links">
                    <li class="nav-link">
                        <a href="pesquisa.php">
                        <i class='bx bx-search icon-pesquisar'></i>
                        <span class="text nav-text">Pesquisa</span>
                        </a>
                    </li>
                    
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
            </div>
        </div>
        </div>

    </nav>

    <section class="geral">
        <form action="action_register.php" method="post" id="register" name="register" onsubmit="if(validacao()){ return true}else{ return false}">
        <div class="container">    
            <div class="group">
                    <input type="radio" id="user" name="type" value="1" onclick="changetype(1)" checked>
                        <b>Cliente</b>
                    <input type="radio" id="ger" name="type" value="2" onclick="changetype(2)">                        
                        <b>Gerente</b>
            </div>   
                
            <div class="group">
                <div id="cnpjdiv" hidden>   
                    <input class="input" type="text" id="cnpj" placeholder="00.000.000/0000-00" pattern="^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><b>CNPJ</b></label>
                </div>
            </div>
            <div class="group">
                <input required="" type="text" class="input" name="nome" id="nome" pattern="[a-zA-Z ]*">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><b>Nome completo</b></label>
            </div>

            <div class="group">
                <input required="" type="email" class="input" name="email" id="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="preencha o dominio completo de e-mail incluindo .com ou .br entre outros">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><b>Email</b></label>
            </div>
                    
           
            <div class="group">
                <input required="" type="password" class="input" name="psw" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}"onkeyup="check();checkreg();" title="Sua senha deve conter no minimo 6 caracteres com pelo menos uma letra maíscula uma letra minuscula e um número">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><b>Senha</b></label>
            </div>
                <i class="bx bx-x" id="verify-reg" style="color: rgb(173, 21, 21); visibility: hidden;"></i>
              
            <div class="group">
                <input required="" type="password" class="input" name="psw-repeat" id="psw-repeat" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}" onkeyup="check();checkreg()" title="Sua senha deve conter no minimo 6 caracteres com pelo menos uma letra maíscula uma letra minuscula e um número">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><b>Confirmar senha</b></label>
            </div>
                <i class="bx bx-check" id="verify" style="color: rgb(21, 173, 21); visibility: hidden;"></i>
                
            <div class="group">
                <input type="checkbox" value="" id="showpassbox"> <b>Visualizar senha</b>
                <span class="highlight"></span>
                <span class="bar"></span>
                 
            </div>
          
            <button type="submit" class="registerbtn" >Registre-se</button>
          
            <div class="signin">
              <p>Já possui uma conta? <a href="login.php">Entrar</a>.</p>
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
        const pass = document.querySelector('#psw');
        const passconfirm = document.querySelector('#psw-repeat');


        toggle.addEventListener("click" , () =>{
            sidebar.classList.toggle("close");
        })

        modeSwitch.addEventListener("click" , () =>{
            body.classList.toggle("dark");
            
            if(body.classList.contains("dark")){
                modeText.innerText = "Modo Claro";
            }else{
                modeText.innerText = "Modo Escuro";
                
            }
        });

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
            const mask = element.placeholder.replace(/0/g, "_"),
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
        
        function check() {
            if (document.getElementById('psw').value ==
                document.getElementById('psw-repeat').value) {
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

        function validacao(){
            if (document.getElementById('psw').value ==
                document.getElementById('psw-repeat').value){
                    return true
                } else {
                    alert('As senhas não batem, por favor confirme sua senha novamente')
                    return false
                }
        }
    </script>
</body>
</html>