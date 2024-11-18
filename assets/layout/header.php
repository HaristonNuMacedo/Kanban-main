<?php
    require 'kanban.controller.php';

    if(isset($_GET['refresh'])){
        header('location: painel.php');
    }

    $total = $_SESSION['user_id']; 

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
                $total = '0';
                $done = '0';
                    foreach($projArray as $project){
                        if($project['project_status'] == 1){
                            $pName = $project['project_name'];
                            $pId = $project['project_id'];
                        } 
                    }
                ?>
                <i class="fas fa-bars" onclick="showMenu()"></i>
                    <?php if(isset($pId)){ } 
                    foreach($projArray as $project){
                        if($project['project_status'] == 1){
                            $pName = $project['project_name'];
                            $pId = $project['project_id'];
                            $done = $project['n_done']; 
                            $total = $project['n_total']; ?>
                <?php } } ?>

                <h2 class="text-detail">Tarefas Totais - <?php echo $total; ?></h2>
                <h2 class="text-detail">Tarefas conluídas - <?php echo $done; ?></h2>
                <h2 class="text-detail">Tarefas NÃO conluídas - <?php $Nclu = $total-$done; echo $Nclu; ?></h2>

            </header>
            <!-- /header -->

            <!-- main -->
            <main class="workspace-container">