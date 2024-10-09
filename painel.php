<?php require 'assets/layout/header.php'; ?>

<section class="cards-container">

    <!-- card fazer -->
    <?php if(isset($tasks)){foreach($tasks as $taskVerify){
        if($taskVerify['task_status'] == 1){
    ?>
        <div class="card">
            <div class="card-header">
                <p><i class="fas fa-thumbtack"></i>Fazer </p>
                <p><?php echo $count1 ?> / <?php echo $countTotal ?></p>
            </div>
            <div class="card-body">

            <?php foreach($tasks as $task){ 
                if($task['task_status'] == 1){
            ?>
                <div class="card-item id<?php echo $task['task_id'] ?>">
                    <h2><?php echo $task['task_name'] ?></h2>
                    <p>
                        <?php echo $task['task_description'] ?>
                    </p>
                    <div class="card-controls">
                        <i class="fas fa-edit" onclick="taskEdit(<?php echo $task['task_id'] ?>)"></i>
                        <a href="kanban.controller.php?action=deletetask&id=<?php echo $task['task_id']; ?>"><i class="fas fa-trash-alt"></i></a>                    
                        <a href="kanban.controller.php?action=moveto&id=<?php echo $task['task_id']; ?>&status=2"><i class="fas fa-chevron-right"></i></a>                    
                        
                    </div>
                </div>
            <?php } } ?>
                
            </div>
        </div>
    <?php break; } } }?>

    <!-- /card fazer-->

    <!-- card em andamento -->
    <?php if(isset($tasks)){foreach($tasks as $taskVerify){
        if($taskVerify['task_status'] == 2){
    ?>
        <div class="card">
            <div class="card-header">
                <p><i class="fas fa-clock"></i></i>Em andamento </p>
                <p><?php echo $count2 ?> / <?php echo $countTotal ?></p>
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
                        <a href="kanban.controller.php?action=moveto&id=<?php echo $task['task_id']; ?>&status=3"><i class="fas fa-check"></i></a> 
                            
                        </div>
                    </div>
                <?php } } ?>
            </div>
        </div>
    <?php break; } } } ?>
    <!-- /card em andamento-->


    <!-- card conluído -->
    <?php if(isset($tasks)){foreach($tasks as $taskVerify){
        if($taskVerify['task_status'] == 3){
    ?>
    <div class="card">
        <div class="card-header">
            <p><i class="fas fa-check-circle"></i>Concluído </p>
            <p><?php echo $count3 ?> / <?php echo $countTotal ?></p>
        </div>
        <div class="card-body">
            <?php foreach($tasks as $task){ 
                if($task['task_status'] == 3){
            ?>
            <div class="card-item">
                <h2><?php echo $task['task_name']?></h2>
                <p>
                    <?php echo $task['task_description'] ?>
                </p>
                <div class="card-controls">
                    <a href="kanban.controller.php?action=deletetask&id=<?php echo $task['task_id']; ?>"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
            <?php } } ?> 
        </div>
    </div>
    <?php break; } } } ?>
    <!-- /card concluído -->

</section>

<?php require 'assets/layout/footer.php'; ?>