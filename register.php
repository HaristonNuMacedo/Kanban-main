<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Formulário de cadastro</title>
        <link href="./assets/css/stylePG.css" rel="stylesheet">
        <script src="./assets/js/eventoFormularioRegister.js"></script> 
        <link rel="sorcut icon" href="./assets/img/Logo-removebg-preview.png" type="image/png" style="width: 16px; height: 16px; transform: rotate(-1deg);">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            input#valor {
                border: none;
                padding: 10px;
                margin-top: 10px;
                font-size: 18px;
                width: 150px;
            }

            #slider {
                width: 300px;
                margin-left: 18px;
            }
        </style>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="_scripts/jquery.maskedinput.js"></script>

    </head>
    <body>

    <section class="main-login">
        <main>
            <form action="login.controller.php?action=register" method="post">
            <h1>Formulário de cadastro</h1>
                <!-- VERIFICAR NOME -->
                <div id="msg"></div><div id="msg2"></div>
                <input type="text"  id="nome"   name="name"   data-color="#fff"  placeholder="Nome"  />

                <!-- VERIFICAR E-MAIL -->
                <div id="msgE"></div><div id="msgE2"></div>
                <input type="email" id="email"  name="email"   data-color2="#fff"  placeholder="Email" />	

                <input type="password" name="pass" placeholder="Digite a sua senha">

                <input type="submit" id="btn" value="Cadastrar" style="cursor: pointer;">

                <div class="container-p">
                    <a href="./index.php"><p>Voltar</p></a>
                </div>
            </form>
        </main>
    </section>
    </body>
    <script>
        
    </script>
</html>
