<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bloco.css">
    <link rel="stylesheet" href="css/style.css">
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

    </nav>  

    <section class="home">
        <?php

        include('connection.php');

        if(isset($_GET['id'])){
            
            $id = $_GET['id'];

            $sql = "SELECT * FROM estabelecimento WHERE fk_Bloco_Numero = '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $side = 0;
                while ($row = $result->fetch_assoc()){

                    $array = explode("- ",$row['Descricao']);

                    if(($side % 2) == 0){
                        # src="data:image/jpeg;base64,' . base64_encode($row['Imagem']) .' "
                        echo '
                        <div style="display: flex; flex-direction:row">
                            <a href="estabelecimento.php?id='.$row['id'].'"><img class="ibagem" src="getImage.php?id=' . $row['id']  .'"></a>
                            <div style="padding-top: 20px;">
                                <span class="text nav-text" style="margin:15px">'. $row['Nome'] . '</span>
                                    <ul style="color: var(--text-color); font-size: 20px; margin: 15px">
                                        <li>' . $array[1] . '</li>
                                        <li>' . $array[2] . '</li>
                                        <li>' . $array[3] . '</li>
                                    </ul>
                                    <button class="button" onclick="openmodal('.  $row['id'] .')">Consultar cardápio</button>
                                    <dialog id="'. $row['id'] .'">
                                        <button class="button" onclick="fecharmodal('.  $row['id'] .')">Fechar</button>
                                        <div class="text-cardapio-titulo">'. $row['Nome'] . '</div>';
                                        $idb = $row['id'];
                                        $sql2 = "SELECT * FROM produto WHERE fk_Estabelecimento_id = '$idb'";
                                        $result2 = $conn->query($sql2);
                                        if ($result2->num_rows > 0) {
                                            while ($row2 = $result2->fetch_assoc()){
                                                echo '
                                                <div class="cardapio-item">
                                                    <li class="modo-text text-cardapio">
                                                        <span class="modo-text text-cardapio">'.  $row2['Nome'] .'</span>
                                                        <span class="modo-text text-cardapio">Preço: R$'. $row2['Preco'] .'</span>';
                                                        if (isset($row2['Descrição'])){
                                                            echo '<span class="modo-text text-cardapio">Sabores: '. $row2['Descrição'] .'</span>';
                                                        }
                                                        if (isset($row2['fk_Categoria_id_categoria'])){
                                                            $categoria = $row2['fk_Categoria_id_categoria'];
                                                            $sql3 = "SELECT * FROM categoria WHERE id_categoria = '$categoria'";
                                                            $result3 = $conn->query($sql3);
                                                            if ($result3->num_rows > 0) {
                                                                while ($row3 = $result3->fetch_assoc()){
                                                                    echo '<span class="modo-text text-cardapio">Categoria: '. $row3['Nome_categoria'] .'</span>';
                                                                }
                                                            }
                                                        }
                                                        echo '
                                                    </li>
                                                </div>';
                                            }
                                        } else {
                                            echo '<span class="modo-text text-cardapio">Não há produtos cadastro para esse estabelecimento</span>';
                                        }
                                    echo '
                                    </dialog>
                            </div>
                        </div>';
                    } else {
                        echo '
                        <div style="display: flex; flex-direction:row-reverse">
                        <a href="estabelecimento.php?id='.$row['id'].'"><img class="ibagem" src="getImage.php?id=' . $row['id']  .'"></a>
                            <div style="padding-top: 20px;">
                                <span class="text nav-text" style="margin:15px">'. $row['Nome'] . '</span>
                                    <ul style="color: var(--text-color); font-size: 20px; margin: 15px">
                                        <li>' . $array[1] . '</li>
                                        <li>' . $array[2] . '</li>
                                        <li>' . $array[3] . '</li>
                                    </ul>
                                    <button class="button" onclick="openmodal('.  $row['id'] .')">Consultar cardápio</button>
                                    <dialog id="'. $row['id'] .'">
                                        <button class="button" onclick="fecharmodal('.  $row['id'] .')">Fechar</button>
                                        <div class="text-cardapio-titulo">'. $row['Nome'] . '</div>';
                                        $idb = $row['id'];
                                        $sql2 = "SELECT * FROM produto WHERE fk_Estabelecimento_id = '$idb'";
                                        $result2 = $conn->query($sql2);
                                        if ($result2->num_rows > 0) {
                                            while ($row2 = $result2->fetch_assoc()){
                                                echo '
                                                <div class="cardapio-item">
                                                    <li class="modo-text text-cardapio">
                                                        <span class="modo-text text-cardapio">'.  $row2['Nome'] .'</span>
                                                        <span class="modo-text text-cardapio">Preço: R$'. $row2['Preco'] .'</span>';
                                                        if (isset($row2['Descrição'])){
                                                            echo '<span class="modo-text text-cardapio">Sabores: '. $row2['Descrição'] .'</span>';
                                                        }
                                                        if (isset($row2['fk_Categoria_id_categoria'])){
                                                            $categoria = $row2['fk_Categoria_id_categoria'];
                                                            $sql3 = "SELECT * FROM categoria WHERE id_categoria = '$categoria'";
                                                            $result3 = $conn->query($sql3);
                                                            if ($result3->num_rows > 0) {
                                                                while ($row3 = $result3->fetch_assoc()){
                                                                    echo '<span class="modo-text text-cardapio">Categoria: '. $row3['Nome_categoria'] .'</span>';
                                                                }
                                                            }
                                                        }
                                                        echo '
                                                    </li>
                                                </div>';
                                            }
                                        }
                                    echo '
                                    </dialog>
                            </div>
                        </div>';
                    }

                    $side += 1;
                }
            } else {
                $message = "Não foi possível encontrar o bloco, tente novamente mais tarde";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
            }

        } else {
            $message = "Não foi possível encontrar o bloco, tente novamente mais tarde";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
        }
        ?>
    </section>


    <script>
        const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");


        function openmodal (parameter1) {
            modal = document.getElementById(parameter1)
            modal.showModal();
        };

        function fecharmodal(parameter2) {
            modal = document.getElementById(parameter2)
            modal.close();
        };

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
    </script>

</body>
</html>
