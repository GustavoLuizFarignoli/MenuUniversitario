<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Universitário</title>
    <link rel="icon" type="image/x-icon" href="imagens/icon.png">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <head>
        <nav id="nav">
            <div>
                <div class="toggle-btn" onclick="toggleSidebar(this)">
                    <span></span>
                    <span></span>
                    <span></span> <!-- Estes span são o que formam o icone da side bar -->
                </div>
            </div>
            <ul id="listanav">
                <li><h1 class="navp">Menu Universitário</h1></li>
            </ul>
        </nav>
    </head>

    <div id="sidebar">
    <div class="list">
        <div class="item">Bloco 1 - Amarelo</div>
        <div class="item">Bloco 2 - Azul</div>
        <div class="item">Bloco 3 - Verde</div>
        <div class="item">Bloco 4 - Laranja</div>
        <div class="item">Bloco 5 - Vermelho</div>
        <div class="item">Bloco 6 - Medicina</div>
    </div>
    </div>
    <script lang="javascript">
        function toggleSidebar(ref){
            document.getElementById("sidebar").classList.toggle('active');
        }
    </script>
</body>
</html>