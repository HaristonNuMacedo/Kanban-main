<?php
    session_start();
    require "App/db/db.php";
    require "App/models/project.model.php";
    require "App/models/task.model.php";
    require "App/models/user.model.php";

    if(!isset($_SESSION['user_id'])){
        header('location: index.php');
    }

    // recupera os projetos do usuário
    $db = new Db();
    $projects = new Project();

    $projects->__set('db', $db->connect());
    $projects->__set('user_id', $_SESSION['user_id']);
    $projArray = $projects->read();

    // recupera as tarefas do projeto selecionado
    foreach($projArray as $project){

        //retorna quantas tarefas o projeto contém
        $id = $project['project_id'];
        $taskModel = new Task();
        $taskModel->__set('projectId', $id);
        $taskModel->__set('db', $db->connect());
        $taskArray = $taskModel->read();

        //seta o total de tarefas cadastradas
        $total = count($taskArray);
        $setTotalTask = new Project();
        $setTotalTask->__set('project_id', $id);
        $setTotalTask->__set('db', $db->connect());
        $setTotalTask->__set('total', $total);
        $setTotalTask->setTotal();

        $done = 0;
        foreach($taskArray as $taskUnity){
            if($taskUnity['task_status'] == 3){
                $done ++;
            }
        }

        $setTotalTask->__set('done', $done); 
        $setTotalTask->setDone(); 

        if($project['project_status'] == 1){
            $task = new Task();
            $task->__set('projectId', $project['project_id']);
            $task->__set('user_id', $_SESSION['user_id']);
            $task->__set('db', $db->connect());
            $tasks = $task->read();
        }
    }

    //recupera o numero de tarefas em cada categoria e o total delas
    $count1 = 0;
    $count2 = 0;
    $count3 = 0;
    
    if(isset($tasks)){
        foreach($tasks as $taskCount){
            if($taskCount['task_status'] == 3){
                $count3++;
            }elseif($taskCount['task_status'] == 2){
                $count2++;
            }elseif($taskCount['task_status'] == 1){
                $count1++;
            }
        }
    }
    $countTotal = $count1 + $count2 + $count3;
    // echo $count1, $count2, $count3,  $countTotal;


    if(isset($_GET['action'])){
        // marca o projeto como selecionado para recuperar as tarefas
        if($_GET['action'] == 'selectProject'){
            $id = $_GET['id'];
            $db = new Db();
            $project = new Project();

            $project->__set('project_id', $id);
            $project->__set('user_id', $_SESSION['user_id']);
            $project->__set('db', $db->connect());

            $project->selectProject();

            header('location: painel.php');
        }

        //cria um novo projeto
        if($_GET['action'] == 'newProject'){
            $projectName = $_POST['projectName'];
            $db = new Db();

            $project = new Project();
            $project->__set('db', $db->connect());
            $project->__set('user_id', $_SESSION['user_id']);
            $project->__set('project_name', $projectName);

            $project->newProject();
            header('location: painel.php');
        }

        //exclui um projeto
        if($_GET['action'] == 'deleteProject'){
            $id = $_GET['id'];

            $db = new Db();
            $project = new Project();

            $project->__set('db', $db->connect());
            $project->__set('project_id', $id);
            $project->__set('user_id', $_SESSION['user_id']);
            
            $project->delete();
            
            header('location: painel.php');
        }

        //edita o nome do projeto
        if($_GET['action'] == 'editprojectname'){
            $id = $_GET['id'];

            $db = new Db();
            $project = new Project();

            $project->__set('db', $db->connect());
            $project->__set('user_id', $_SESSION['user_id']);
            $project->__set('project_name', $_POST['name']);
            $project->__set('project_id', $id);

            $project->editName();

            header('location: painel.php');
        }

        //deleta a tarefa
        if($_GET['action'] == 'deletetask'){
            $id = $_GET['id'];

            $db = new Db();
            $task = new Task();

            $task->__set('db', $db->connect());
            $task->__set('taskId', $id);

            $task->delete();

            header('location: painel.php?refresh');
        }

        // marca a tarefa como "em andamento"
        if($_GET['action'] == 'moveto'){
            $id = $_GET['id'];
            $status = $_GET['status'];

            $db = new Db();
            $task = new Task();

            $task->__set('db', $db->connect());
            $task->__set('taskId', $id);
            $task->__set('taskStatus', $status);

            $task->update('status');

            header('location: painel.php?refresh');
        }

        //cadastra nova tarefa no db
        if($_GET['action'] == 'task-register'){
            $db = new Db();
            $task = new Task();

            $task->__set('db', $db->connect());
            $task->__set('taskName', $_POST['task']);
            $task->__set('taskDescription', $_POST['taskDescription']);
            $task->__set('projectId', $_POST['id']);
            $task->__set('taskStatus', 1);

            $task->create();
            header('location: painel.php?refresh');
        }

        //edita a tarefa
        if($_GET['action'] == 'task-edit'){
            $db = new Db;
            $task = new Task();

            $task->__set('db', $db->connect());
            $task->__set('taskId', $_POST['id']);
            $task->__set('taskName', $_POST['task']);
            $task->__set('taskDescription', $_POST['description']);

            $task->update('task');
            header('location: painel.php');
        }



        
    }
?>