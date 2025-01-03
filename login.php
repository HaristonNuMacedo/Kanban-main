<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="sorcut icon" href="./assets/img/Logo-removebg-preview.png" type="image/png" style="width: 16px; height: 16px; transform: rotate(-1deg);">
    <link rel="stylesheet" href="./assets/css/login-style.css"><link rel="sorcut icon" href="img/logoPartnership.png" type="image/png" style="width: 16px; height: 16px; transform: rotate(-1deg);">
</head>
<body>
    <header>
        <div class="menu02">
            <div id="logoPrincipal">
                <a href="login.php">
                    <img src="./assets/img/Logo-removebg-preview.png">
                    <!--<h2><span>&nbsp; O</span>lkaha <span>S</span>oluções <span>C</span>orporativas</h2>-->
                </a>
            </div>
        </div>
    </header>

    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>

        <div class="boxLogin">
            <div class="square" style="--i:0"></div>
            <div class="square" style="--i:1"></div>
            <div class="square" style="--i:2"></div>
            <div class="square" style="--i:3"></div>
            <div class="square" style="--i:4"></div>

            <div class="container">
                <div class="form">
                    <h2>Efetuar Login</h2>
                    <form action="login.controller.php?action=login" method="post">
                        <div class="inputBox">
                            <input type="email" name="email" placeholder="E-mail">
                        </div>

                        <div class="inputBox">
                            <input type="password" name="pass" placeholder="Senha">
                        </div>

                        <div class="inputBox">
                            <input type="submit" value="Login">
                        </div>

                        <div class="inputBox">
                            <a href="./register.php">Cadastrar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>