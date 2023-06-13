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
            $message = "Por favor, Faça seu login primeiro!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
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
            <?php
                    if(isset($_SESSION["user"])){
                        echo '<li class="">' . '<a href="destruirsession.php">' . "<i class='bx bx-log-out icon-sair' >" . '</i>' . '<span class="text nav-text">'. $nome .'</span>' . '</a>' .'</li>';
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

    </nav>

    <section class="home">
        <div class="text"><?php echo "Bem vindo " . $nome . " ;D"; ?></div> <!-- Tag php dentro da div pega o nome do usuário e escreve como texto -->
        <div class="text"><?php echo "E-mail:  " . $email; ?></div> <!-- Tag php dentro da div pega o nome do usuário e escreve como texto -->
        <button onclick="editar()">Editar Informações</button>
        <button style="background-color:red" onclick="deletar()">Excluir Conta</button>
    </section>

    <script>
        const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");


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

        function deletar(){
            if(confirm("Deseja excluir sua conta ? Essa ação é irreversivel")){
                alert("Conta excluida!")
                window.location.href = "action_delete.php" //envia para código que fara exclusão da conta
            }
        }
        function editar(){
            window.location.href = "editar.php" //envia para código que fara exclusão da conta
        }
    </script>

</body>
</html>