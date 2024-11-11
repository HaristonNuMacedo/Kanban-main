<?php
    require 'kanban.controller.php';

    if(isset($_GET['refresh'])){
        header('location: painel.php');
    }
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script src="../js/App.js" defer></script>
    <title>Kanban Board</title>
</head>
<body>
    <div class="container" style="background-color: #fff!important;">

        <section class="main-content">

            <div class="hidden-menu" onclick="hideMenu()"></div>

            <!-- header -->
            <header class="main-header">
                <?php
                $pName = 'Nenhum projeto selecionado';
                    foreach($projArray as $project){
                        

                        if($project['project_status'] == 1){
                            $pName = $project['project_name'];
                            $pId = $project['project_id'];
                        }
                    }
                ?>

                <i class="fas fa-bars" onclick="showMenu()"></i>
                <div class="project-info">
                    <div class="text-container">
                        
                    </div>
                    <?php if(isset($pId)){ ?>
                    <div class="btn-container">
                        <i class="fas fa-pen" onclick="editProjectName(<?php echo $pId?>)"></i>
                        <a href="kanban.controller.php?action=deleteProject&id=<?php echo $pId;?>"><i class="fas fa-trash"></i></a>
                        
                        
                        <a href="task-register.php"><input type="button" value="adicionar tarefa"></a>
                    </div>
                </div>

                <h2 class="text-detail">Quadro</h2>
                <?php } ?>
            </header>
            <!-- /header -->

            <!-- main -->
            <main class="workspace-container">