<?php
    require 'kanban.controller.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="sorcut icon" href="./assets/img/Logo-removebg-preview.png" type="image/png" style="width: 16px; height: 16px; transform: rotate(-1deg);">
    <link rel="stylesheet" href="./assets/css/gerenciadorProjetos.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script src="./assets/js/App.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    
</head>

<body>
    <header class="py-3 mb-3 border-bottom">
        <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
            <a href="./telaCarregamento.html" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <img class="gerenciadorLogo" src="./assets/img/Logo.png" alt="">
            </a>
    
          <div class="d-flex align-items-center">
            <form class="w-100 me-3" role="search">
              <input type="search" id="barraPesquisa" class="form-control" placeholder="Pesquisar..." aria-label="Search">
            </form>
    
            <div class="flex-shrink-0">
                <div class="text-end">
                    <div id="usuárioIdent"><?php
                        $string = $_SESSION['user_name'];
                        preg_match_all('/\b\w/u', $string, $m);
                        echo implode('',$m[0]);
                    ?></div>
                    <button type="button" class="btn btn-warning"><?php echo $_SESSION['user_name'] ?></button>
                </div>
            </div>
          </div>
        </div>
    </header>
  
    <main class="d-flex flex-nowrap">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; border-right: 1px solid white;" id="lateralGerenciador">
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item" id="teste1">
                <a href="#" class="nav-link" id="visaoGeral" onclick="abrir01()" style="color: white;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-columns-gap" viewBox="0 0 16 16">
                        <path d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z"/>
                    </svg>
                    Visão Geral
                </a>
                </li>
                <li>
                <a href="#" class="nav-link" id="visaoGeral02" onclick="abrir02()" style="color: white; background-color: #00b2f0;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-kanban" viewBox="0 0 16 16">
                        <path d="M13.5 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm-11-1a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                        <path d="M6.5 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1zm-4 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1zm8 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1z"/>
                      </svg>
                    kanban
                </a>
                </li>
                <li>
                <a href="#" class="nav-link" id="visaoGeral03" onclick="abrir03()" style="color: white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                      </svg>
                    Lista do Quadro
                </a>
                </li>
                <li>
                <a href="#" class="nav-link" id="visaoGeral04" onclick="abrir04()" style="color: white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4-event" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                        <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                      </svg>
                    Calendar
                </a>
                </li>
                <li>
                <a href="#" class="nav-link" id="visaoGeral05" onclick="abrir05()" style="color: white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z"/>
                      </svg>
                    Tabela - Estilo Excel
                </a>
                </li>
                <li>
                <a href="#" class="nav-link" id="visaoGeral06" onclick="abrir06()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                        <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                      </svg>
                    Dashboard
                </a>
                </li>
            </ul>
            <hr>
            <div class="flex-shrink-0"  id="UsuarioPg">
                <div class="text-center">
                    <div class="aside-footer">
                        <a href="login.controller.php?action=logout"><p>Sair <i class="fas fa-sign-out-alt"></i></p></a>
                    </div>
                </div>
            </div>
        </div>

        <section id="navPaginacao" class="navPaginacao">
            <nav id="subnavegacaoCentral">
                <ul class="nav nav-underline">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Usuários</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Adicionar Usuário</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Remover Usuário</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </nav>
            
            <object type="text/html" data="https://ge.globo.com/" id="testeInserir" style="display: none; transition: all .5s ease-out;">
            </object>

            <object type="text/html" data="./painel.php" id="testeInserir02" style="display: block; transition: all .5s ease-out;">
            </object>

            <object type="text/html" data="./login.html" id="testeInserir03" style="display: none; transition: all .5s ease-out;"></object>
            </object>

            <object type="text/html" data="./gerenciadorPaginas/selectable.html" id="testeInserir04" style="display: none; transition: all .5s ease-out;"></object>
            </object>

            <object type="text/html" data="./sobreOlkaha.html" id="testeInserir05" style="display: none; transition: all .5s ease-out;"></object>
            </object>
                
        </section>
    </main>

    <script src="./assets/js/functionAbrirPaginacao.js"></script>

</body>

</html>