<?php require 'assets/layout/header.php'; ?>

<section class="cards-container">

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
            <div class="inserirTask-container">
                <a href="task-register.php"><input type="button" value="Adicionar Tarefa &#43"></a>
            </div>
        </div>
        
    <?php } else { ?>

    <?php if(isset($tasks)){foreach($tasks as $taskVerify){
        if($taskVerify['task_status'] == 1){
    ?>
        <div class="card">
            <div class="card-header-1">
                <p><i class="fas fa-thumbtack"></i>Pendente </p>
                <p><?php echo $count1 ?> &nbsp</p>
            </div>
            
            <div class="card-body-1">

            <?php foreach($tasks as $task){ 
                if($task['task_status'] == 1){
            ?>
                <div class="card-item id<?php echo $task['task_id'] ?>">
                    <h2><?php echo $task['task_name'] ?></h2>
                    <p>
                    <span style="font-size: 14px; font-weight: 700;">Descrição:</span> <?php echo $task['task_description'] ?>
                    </p>
                    <p style="color: green;">
                        <span style="font-size: 14px; font-weight: 700;">Prioridade:</span> <?php echo $task['task_prioridade'] ?>
                    </p>
                    <div class="card-controls">
                        <i class="fas fa-edit" onclick="abrirCRUDproject(<?php echo $task['task_id'] ?>)" style="cursor: pointer; color: blue;"></i>
                        <a href="kanban.controller.php?action=deletetask&id=<?php echo $task['task_id']; ?>"><i class="fas fa-trash-alt" style="color: red;"></i></a>                    
                        <a href="kanban.controller.php?action=moveto&id=<?php echo $task['task_id']; ?>&status=2"><i class="fas fa-chevron-right" style="cursor: pointer;"></i></a>                        
                    </div>
                </div>
            <?php } } ?>
            <div class="inserirTask-container">
                <a href="task-register.php"><input type="button" value="Adicionar Tarefa &#43"></a>
            </div>
                    

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
            <div class="inserirTask-container2">
                <a href="task-register.php"><input type="button" value="Adicionar Tarefa &#43"></a>
            </div>
        </div>

    <?php } else { ?>

    <?php if(isset($tasks)){foreach($tasks as $taskVerify){
            if($taskVerify['task_status'] == 2){
        ?>
        <div class="card">
            <div class="card-header">
                <p><i class="fas fa-clock"></i></i>Em andamento </p>
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
                        <div class="card-controls">
                        <a href="kanban.controller.php?action=moveto&id=<?php echo $task['task_id']; ?>&status=3"><i class="fas fa-check" style="color: green;"></i></a> 
                            
                        </div>
                    </div>
                <?php } } ?>
                <div class="inserirTask-container2">
                    <a href="task-register.php"><input type="button" value="Adicionar Tarefa &#43"></a>
                </div>
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
            <div class="inserirTask-container3">
                <a href="task-register.php"><input type="button" value="Adicionar Tarefa &#43"></a>
            </div>
        </div>

    <?php } else { ?>

    <?php if(isset($tasks)){foreach($tasks as $taskVerify){
            if($taskVerify['task_status'] == 3){
        ?>
    <div class="card">
        <div class="card-header-3">
            <p><i class="fas fa-check-circle"></i>Concluído </p>
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
                <div class="card-controls">
                    <a href="kanban.controller.php?action=deletetask&id=<?php echo $task['task_id']; ?>"><i class="fas fa-trash-alt" style="color: red;"></i></a>
                </div>
            </div>
            <?php } } ?> 
            <div class="inserirTask-container3">
                <a href="task-register.php"><input type="button" value="Adicionar Tarefa &#43"></a>
            </div>
        </div>
    </div>
    <?php break; } } } }?>
    <!-- /card concluído -->

</section>

<?php require 'assets/layout/footer.php'; ?>