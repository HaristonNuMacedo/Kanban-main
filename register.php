<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Kanban - Login</title>
</head>
<body>
    <section class="main-login">
        <div class="container-login">
            <form action="login.controller.php?action=register" method="post">
                <p class="kanban-title">Crie sua conta para começar</p>

                <span><label>Nome</label></span>
                <input type="text" name="name" placeholder="Digite o seu nome">

                <span><label>Email</label></span>
                <input type="email" name="email" placeholder="Digite o seu email">
                
                <span><label>Senha</label></span>
                <input type="password" name="pass" placeholder="Digite a sua senha">

                <input type="submit" value="Cadastrar">

                <div class="container-p">
                    <a href="index.php"><p>Voltar</p></a>
                </div>
            </form>
        </div>
    </section>
</body>
</html>