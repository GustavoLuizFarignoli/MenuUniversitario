<!DOCTYPE html>
<html lang="pt-br">
    <?php
        session_start();
        if(isset($_SESSION["user"])){
            include('connection.php');
        
            $email = $_SESSION["user"];

            $sql = "SELECT Nome FROM usuario WHERE E_mail = '$email'";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $nome = $row['Nome'];
                }
            }
        }
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bloco.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pesquisa.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Menu Universitário</title>
    <link rel="icon" type="image/x-icon" href="./imagens/u.png">
</head>
<body onload="displaypreco()">>
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
                        <a href="">
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

    <section class="home_pes">
        <form class="form" method="post">

            <div class="mydict">
                <div class="input-container">
                    <label><input type="radio" name="radiocat" value="1">
                    <span>Vegano</span></label>
                    
                    <label><input type="radio" name="radiocat" value="2">
                    <span>Vegetariano</span></label>
                    
                    <label><input type="radio" name="radiocat" value="3">
                    <span>Promoção</span></label>

                        <label><input type="radio" name="radiocat" value="0" checked="">
                        <span>Nenhum</span></label>
                </div>

                <div class="input-container">

                        <select name="blocos" id="blocos" onchange="atualizarestabelecimento()" class="select">
                            <option value="0">Bloco</option>
                            <?php
                                include('connection.php');

                                $sql = "SELECT * FROM bloco";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()){
                                        echo '<option value="'.$row['Numero'].'">'.$row['Nome'].'</option>';
                                    }
                                }

                            ?>
                        </select>

                        <select name="estabelecimento" id="estabelecimento" onchange="atualizarbloco()" class="select">
                        <option value="0">Estabelecimento</option>
                        <?php
                            include('connection.php');

                            $sql = "SELECT Nome, id, fk_Bloco_Numero FROM estabelecimento";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()){

                                    $idbloco = $row['fk_Bloco_Numero'];
                                    
                                    $sql2 = "SELECT Nome FROM bloco WHERE Numero = '$idbloco'";
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()){
                                            echo '<option value="'.$row['id'].'">'.$row['Nome'].' - Bloco '. $row2['Nome'] .'</option>';
                                        }
                                    }
                                }
                            }
                        ?>
                        </select> 
                </div>
            </div>

            <div class="input-container">
                <input type="text" autocomplete="off" placeholder="Busca no MU" name="produto" id="produto">
            </div> 

            <label for="preco">Preço Máximo</label>
            <input type="range" min="0" max="100" value="100" class="slider" id="preco" name="preco" onchange="displaypreco()" >
            <label id="precotexto"></label>

            <button type="submit" class="submit" name="submit" id="submit"> Buscar </button>     

        </form>
           
        <div>
            <?php
                if(isset($_POST['submit'])){
                    $categoria = $_POST['radiocat']; //retorna 0,1,2 ou 3
                    $nomeproduto = $_POST['produto']; //Sempre está setado porém pode ser vazio

                    if(isset($_POST['blocos'])){
                        $bloco = $_POST['blocos']; //retorna um valor de 0 a 10 (o id do bloco, zero sendo o valor nulo);
                    } else {
                        $bloco = 0;
                    }

                    if(isset($_POST['estabelecimento'])){
                        $estabelecimento = $_POST['estabelecimento']; //retorna um valor de 0 a 12 (o id do estabelecimento, zero sendo o valor nulo)
                    } else {
                        $estabelecimento  = 0;
                    }

                    if(isset($_POST['preco'])){
                        $preco = $_POST['preco']; //retorna o valor do slider se o usuário não alterar ele é não é setado
                    } else {
                        $preco = 100; //Settar o valor para 100 pois todos os valores estão abaixo dos 100 reais e por ser o valor padrão do slider
                    }
                    echo $preco;

                }
            ?>
        </div>
    </section>

    <script>    
        const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");

        const button = document.querySelector("button");
        const modal = document.querySelector("dialog");
        const buttonClose = document.querySelector("dialog button")

        var bloco = document.getElementById("blocos");
        var estabelecimento = document.getElementById("estabelecimento");
        var slider = document.getElementById("preco");
        var precotexto = document.getElementById("precotexto");

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

        buttonClose.onclick = function () {
            modal.close();
        };

        function atualizarbloco(){
            if (!(estabelecimento.value === "0")){
                bloco.value = "0";
                bloco.disabled = true;
            } else {
                bloco.disabled = false;
            }
        }

        function atualizarestabelecimento(){
            if (!(bloco.value === "0")){
                estabelecimento.value = "0";
                estabelecimento.disabled = true;
            } else {
                estabelecimento.disabled = false;
            }
        }

        function displaypreco(){
            precotexto.innerHTML = "R$ " + slider.value
        }

    </script>

</body>
</html>