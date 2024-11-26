<?php
    require 'kanban.controller.php';

    if(isset($_GET['refresh'])){
        header('location: carregarTabela.php');
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
    <link rel="stylesheet" href="./assets/css/styleTabela.css">
    <script src="../js/App.js" defer></script>
    <script src="./assets/js/functionLista.js" defer></script>
    <title>Kanban Board</title>
</head>
<body>

<div class="container">
<section class="main-content">
<section class="cards-container">
<main class="workspace-container">
    <!-- card pendente -->
    <?php if($countTotal == 0){
    ?>
        <div class="card">
            <div class="card-header-1">
            <p>Sem tarefas adicionadas </p>
            <p><?php echo $countTotal ?> &nbsp</p>
        </div>

        <div class="card-body-1">
            <div class="card-item">
                </div>  
            </div>
        </div>
        
    <?php } else { ?>

    <?php if(isset($tasks)){foreach($tasks as $taskVerify){
        if($taskVerify['task_status'] != 3){
    ?>
        <div class="card">
            <div class="card-header-1">
                <p class="txtPendente"> </p>
                <p><?php ?> &nbsp</p>
            </div>
            
            <div class="card-body-1">
                <div class="card-item" style="background-color: #eee;">
                    <pcont>#</pcont>
                    <h3 style="margin-bottom: 5px;">Nome</h3>
                        <p>Descrição</p>
                        <div class="statusTaskList">
                            <p2 class="dataTaskList2">Status</p2>
                        </div>
                        <p class="dataTaskList"> Data</p>
                    <div class="prioridadeList" style="display:inline-flex;">
                        <p2 style="font-size: 13px; margin-left: -8px; position:relative;">Prioridade</p2>
                    </div>
                </div>

            <?php $countStatus=0; foreach($tasks as $task){ 
                
                if($task['task_status'] != 0 && $task['task_status'] != 3){ $countStatus++;
            ?>
                <div class="card-item id<?php echo $task['task_id'] ?>">
                    <pcont><?php echo $countStatus; ?></pcont>
                    <h2 style="margin-bottom: 5px"><?php echo $task['task_name'] ?></h2>
                        <p><?php echo $task['task_description'] ?></p>
                    <div class="statusTaskList">
                    <?php 
                        if ($task['task_status'] == 1) {?>
                            <p class="dataTaskList2" style="background-color: #888888;">
                        <?php echo 'Pendente';  ?>
                        </p> <?php
                        } else if ($task['task_status'] == 2) {?>
                            <p class="dataTaskList2" style="background-color: #609DF9;">
                        <?php echo 'Em andamento'; ?>
                        </p> <?php
                        } else if ($task['task_status'] == 3) {?>
                            <p class="dataTaskList2" style="background-color: #008844;">
                        <?php echo'Concluído';?>
                        </p> <?php
                        }?>
                    </div>
                        <p class="dataTaskList"> <?php echo date('d/m/Y', strtotime($task['dataTask'])); ?></p>
                    <div class="prioridadeList" style="display:inline-flex;">
                        <span2 style="font-size: 14px; font-weight: 700; align-content: center; "><i class="fas fa-flag" 
                        <?php $task['task_prioridade'] ;
                        if ($task['task_prioridade'] == 'Urgente') {
                            $colorFlag = '#ff0000';
                        } else if ($task['task_prioridade'] == 'Alta') { $colorFlag = '#c0c000';}
                        else if ($task['task_prioridade'] == 'Normal') { $colorFlag = '#0000ff';}
                        else if ($task['task_prioridade'] == 'Baixa') { $colorFlag = '#008000';}
                        else { $colorFlag = '#000';}
                        ?> style="color: <?php echo $colorFlag; ?>; "></i></span2>
                        <p2 style="font-size: 13px; margin-left: 8px; position:relative; align-content: center;"><?php echo $task['task_prioridade'] ?></p2>
                    </div>
                </div>
            <?php } } ?>
            </div>
        </div>

    <?php break; } } } }?>

    <!-- /card pendente-->
     
</main>
</section>
</section>
</div>

<script src="assets/js/App.js"></script>
</body>
</html>