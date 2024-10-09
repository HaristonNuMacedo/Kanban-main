<?php require 'assets/layout/header.php'; ?>

<section class="cards-container">

    <div class="task-register">
        <h3>Adicione uma nova tarefa</h3>
        <form action="kanban.controller.php?action=task-register" method="post">
            <div class="input-task">
                <label for="task"></label>
                <input name="task" type="text" placeholder="Digite a tarefa">
            </div>

            <input type="hidden" name="id" value="<?php echo $pId ?>">

            <label for="task-description"></label>
            <textarea name="taskDescription" placeholder="Escreva uma descrição"></textarea>
            
            <input type="submit" value="Cadastrar">
        </form>
    </div>

</section>

<?php require 'assets/layout/footer.php'; ?>