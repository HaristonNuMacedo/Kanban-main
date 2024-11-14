<?php require 'assets/layout/header.php'; ?>

<section class="cards-container">

    <div class="task-register">
        <h3>Adicione uma nova tarefa</h3>
        <form action="kanban.controller.php?action=task-register2" method="post">
            <div class="input-task">
                <label for="task"></label>
                <input name="task" type="text" placeholder="Digite a tarefa">
            </div>

            <input type="hidden" name="id" value="<?php echo $pId ?>">

            <label for="task-description"></label>
            <textarea name="taskDescription" placeholder="Escreva uma descrição"></textarea>

            <div class="selector">
                <div id="selectField">
                    <input id="selectText" name="prioridade" type="text" value="Prioridade">
                </div>
                <ul id="list" class="hide">
                    <li class="options">
                        <p id="op1"><i class="fas fa-flag" style="color: red;"></i>Alta</p>
                    </li>
                    <li class="options">
                        <p id="op2"><i class="fas fa-flag" style="color: blue;"></i>Normal</p>
                    </li>
                    <li class="options">
                        <p id="op3"><i class="fas fa-flag" style="color: grey;"></i>Baixa</p>
                    </li>
                </ul>
            </div>
            
            <input type="submit" value="Cadastrar">
        </form>
    </div>


    <script>
        var selectField = document.getElementById("selectField");
        var selectText = document.getElementById("selectText");
        var options = document.getElementsByClassName("options");
        var list = document.getElementById("list");

        selectField.onclick = function() {
            list.classList.toggle("hide");
        }
        
        for(option of options) {
            option.onclick = function() {
                const espaco = this.textContent;
                const taskPrioridd = espaco.trim();
                selectText.value = taskPrioridd;
            } 
        } 
        
    </script>

</section>

<?php require 'assets/layout/footer.php'; ?>