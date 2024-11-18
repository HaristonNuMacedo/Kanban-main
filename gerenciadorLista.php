<?php
    require 'kanban.controller.php';

    if(isset($_GET['refresh'])){
        header('location: gerenciadorLista.php');
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
    <link rel="stylesheet" href="./assets/css/stylescarregarlista.css">
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
    <?php if($count1 == 0){
    ?>
        <div class="card">
            <div class="card-header-1">
            <p><i class="fas fa-thumbtack"></i>Pendente </p>
            <p><?php echo $count1 ?> &nbsp</p>
        </div>

        <div class="card-body-1">
            <div class="card-item">
                    <p style="font-size: 16px; color: #555"></p>
                </div>  
            </div>
        </div>
        
    <?php } else { ?>

    <?php if(isset($tasks)){foreach($tasks as $taskVerify){
        if($taskVerify['task_status'] == 1){
    ?>
        <div class="card">
            <div class="card-header-1">
                <div class="btnV" onclick="fecharLista()"><i class="fas fa-sort-down"></i></div>
                <div class="btnV2" onclick="abrirLista()"><i class="fas fa-sort-down"></i></div>
                <p class="txtPendente"><i class="fas fa-thumbtack"></i>Pendente </p>
                <p><?php echo $count1 ?> &nbsp</p>
            </div>
            
            <div class="card-body-1">

            <?php foreach($tasks as $task){ 
                if($task['task_status'] == 1){
            ?>
                <div class="card-item id<?php echo $task['task_id'] ?>">
                    <h2 style="margin-bottom: 5px"><?php echo $task['task_name'] ?></h2>
                        <p><?php echo $task['task_description'] ?></p>
                        <p class="dataTaskList"> <?php echo date('d/m/Y', strtotime($task['dataTask'])); ?></p>
                    <div class="prioridadeList" style="display:inline-flex;">
                        <span2 style="font-size: 14px; font-weight: 700;"><i class="fas fa-flag" 
                        <?php $task['task_prioridade'] ;
                        if ($task['task_prioridade'] == 'Urgente') {
                            $colorFlag = '#ff0000';
                        } else if ($task['task_prioridade'] == 'Alta') { $colorFlag = '#c0c000';}
                        else if ($task['task_prioridade'] == 'Normal') { $colorFlag = '#0000ff';}
                        else if ($task['task_prioridade'] == 'Baixa') { $colorFlag = '#008000';}
                        else { $colorFlag = '#000';}
                        ?> style="color: <?php echo $colorFlag; ?>; "></i></span2>
                        <p2 style="font-size: 13px; margin-left: 8px; position:relative;"><?php echo $task['task_prioridade'] ?></p2>
                    </div>
                </div>
            <?php } } ?>
            </div>
        </div>

    <?php break; } } } }?>

    <!-- /card pendente-->

    <!-- card em andamento -->

    <?php if($count2 == 0){
    ?>
        <div class="card">
            <div class="card-header">
            <p><i class="fas fa-clock"></i>Em andamento  </p>
            <p><?php echo $count2 ?> &nbsp</p>
        </div>

        <div class="card-body">
            <div class="card-item">
                    <p style="font-size: 16px; color: #555;"></p>
                </div>  
            </div>
        </div>

    <?php } else { ?>

    <?php if(isset($tasks)){foreach($tasks as $taskVerify){
            if($taskVerify['task_status'] == 2){
        ?>
        <div class="card">
            <div class="card-header">
                <div class="btnEA" onclick="fecharLista2()"><i class="fas fa-sort-down"></i></div>
                <div class="btnEA2" onclick="abrirLista2()"><i class="fas fa-sort-down"></i></div>
                <p class="txtPendente2"><i class="fas fa-clock"></i></i>Em andamento </p>
                <p><?php echo $count2 ?> &nbsp</p>
            </div>
            

            <div class="card-body">
                <?php foreach($tasks as $task){ 
                    if($task['task_status'] == 2){
                ?>
                    <div class="card-item">
                        <h2><?php echo $task['task_name'] ?></h2>
                        <p>
                            <?php echo $task['task_description'] ?>
                        </p>
                        <p class="dataTaskList"> <?php echo date('d/m/Y', strtotime($task['dataTask'])); ?></p>
                    <div class="prioridadeList" style="display:inline-flex;">
                        <span2 style="font-size: 14px; font-weight: 700;"><i class="fas fa-flag" 
                        <?php $task['task_prioridade'] ;
                        if ($task['task_prioridade'] == 'Urgente') {
                            $colorFlag = '#ff0000';
                        } else if ($task['task_prioridade'] == 'Alta') { $colorFlag = '#c0c000';}
                        else if ($task['task_prioridade'] == 'Normal') { $colorFlag = '#0000ff';}
                        else if ($task['task_prioridade'] == 'Baixa') { $colorFlag = '#008000';}
                        else { $colorFlag = '#000';}
                        ?> style="color: <?php echo $colorFlag; ?>; "></i></span2>
                        <p2 style="font-size: 13px; margin-left: 8px; position:relative;"><?php echo $task['task_prioridade'] ?></p2>
                    </div>
                    </div>
                <?php } } ?>
            </div>
        </div>
    <?php break; } } } }?>

    <!-- /card em andamento-->

    <!-- card conluído -->

    <?php if($count3 == 0){
    ?>
        <div class="card">
            <div class="card-header-3">
            <p><i class="fas fa-check-circle"></i>Concluído </p>
            <p><?php echo $count3 ?> &nbsp</p>
        </div>
    
        <div class="card-body-3">
            <div class="card-item">
                    <p style="font-size: 16px; color: #555"></p>
                </div>  
            </div>
        </div>

    <?php } else { ?>

    <?php if(isset($tasks)){foreach($tasks as $taskVerify){
            if($taskVerify['task_status'] == 3){
        ?>
    <div class="card">
        <div class="card-header-3">
            <div class="btnC" onclick="fecharLista3()"><i class="fas fa-sort-down"></i></div>
            <div class="btnC2" onclick="abrirLista3()"><i class="fas fa-sort-down"></i></div>
            <p class="txtPendente3"><i class="fas fa-check-circle"></i>Concluído </p>
            <p><?php echo $count3 ?> &nbsp</p>
        </div>

        <div class="card-body-3">
            <?php foreach($tasks as $task){ 
                if($task['task_status'] == 3){
            ?>
            <div class="card-item">
                <h2><?php echo $task['task_name']?></h2>
                <p>
                    <?php echo $task['task_description'] ?>
                </p>
                <p class="dataTaskList"> <?php echo date('d/m/Y', strtotime($task['dataTask'])); ?></p>
                <div class="prioridadeList" style="display:inline-flex;">
                    <span2 style="font-size: 14px; font-weight: 700;"><i class="fas fa-flag" 
                    <?php $task['task_prioridade'] ;
                        if ($task['task_prioridade'] == 'Urgente') {
                            $colorFlag = '#ff0000';
                        } else if ($task['task_prioridade'] == 'Alta') { $colorFlag = '#c0c000';}
                        else if ($task['task_prioridade'] == 'Normal') { $colorFlag = '#0000ff';}
                        else if ($task['task_prioridade'] == 'Baixa') { $colorFlag = '#008000';}
                        else { $colorFlag = '#000';}
                    ?> style="color: <?php echo $colorFlag; ?>; "></i></span2>
                    <p2 style="font-size: 13px; margin-left: 8px; position:relative;"><?php echo $task['task_prioridade'] ?></p2>
                </div>
            </div>
            <?php } } ?> 
        </div>
    </div>
    <?php break; } } } }?>
    <!-- /card concluído -->
</main>
</section>
</section>
</div>

<script src="assets/js/App.js"></script>
</body>
</html>