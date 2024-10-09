<?php
    session_start();
    require "App/db/db.php";
    require "App/models/user.model.php";
    require "App/models/project.model.php";
    require "App/models/task.model.php";

// LOGIN
    if(isset($_GET['action'])){
        if($_GET['action'] == 'login'){
            $db = new Db();
            $user = new User();

            $user->__set('db', $db->connect());
            $user->__set('email', $_POST['email']);
            $user->__set('pass', $_POST['pass']);

            $userInfo = $user->login();
            if(count($userInfo) == 1){
                $_SESSION['user_id'] = $userInfo[0]['user_id'];
                $_SESSION['user_name'] = $userInfo[0]['user_name'];

                header('location: painel.php?refresh');
            }else{
                echo 'Não foi possivel fazer o login';
            }
        }elseif($_GET['action'] == 'logout'){
            $user = new User;
            $user->logOut();
            header('location: index.php');
        }elseif($_GET['action'] == 'register'){
            $db = new Db;
            $user = new User;

            $user->__set('db', $db->connect());
            $user->__set('name', $_POST['name']);
            $user->__set('pass', $_POST['pass']);
            $user->__set('email', $_POST['email']);

            $user->register();
            $id = $user->getbyEmail();
            
            $project = new Project;
            $project->__set('db', $db->connect());
            $project->__set('project_name', 'Primeiro Projeto');
            $project->__set('user_id', $id[0]['user_id']);
            $project->newProject();

            $projectId = $project->getId();

            $task = new Task;
            $task->__set('db', $db->connect());
            $task->__set('taskName', 'Lorem Ipsum');
            $task->__set('taskDescription', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sodales ultricies mollis. Integer vestibulum euismod nunc, quis efficitur purus sagittis eget. Nulla condimentum tellus at massa rutrum venenatis.');
            $task->__set('projectId', $projectId[0]['project_id']);
            
            $task->__set('taskStatus', 1);
            $task->create();
            $task->create();
            $task->create();

            $task->__set('taskStatus', 2);
            $task->create();
            $task->create();

            $task->__set('taskStatus', 3);
            $task->create();
            $task->create();
            $task->create();
            $task->create();


            header('location: index.php');
        }
    }
?>