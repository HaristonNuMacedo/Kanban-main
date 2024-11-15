<?php require 'assets/layout/header.php'; ?>

<section class="cards-container">

    <div class="task-register" id="task001">
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
                    <li class="options" id="opx">
                        <p id="opxText"></i>1 - Urgente</p>
                    </li>
                    <li class="options" id="op1">
                        <p id="op1Text">2 - Alta</p>
                    </li>
                    <li class="options" id="op2">
                        <p id="op2Text"></i>3 - Normal</p>
                    </li>
                    <li class="options" id="op3">
                        <p id="op3Text"></i>4 - Baixa</p>
                    </li>
                </ul>
            </div>
            
            <input type="submit" value="Cadastrar" style="margin-top: 15px;">
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
                list.classList.toggle("hide");
            } 
        } 
        
    </script>

</section>

<?php require 'assets/layout/footer.php'; ?>