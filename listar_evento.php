<?php

// Incluir o arquivo com a conexão com banco de dados
include_once './App/kanban.controller.php';

// Criar o array que recebe os eventos

$eventos = [];

foreach($tasks as $task){ 

$id = $task['task_id'];
$name = $task['task_name'];

if($task['task_status'] == 1){
    $color = '#888888';
} else if($task['task_status'] == 2){
    $color = '#609DF9';
} else if($task['task_status'] == 3) {
    $color = '#008844';
}
$data = $task['dataTask'];

$eventos[] = [
    'id' => $id,
    'title' => $name,
    'color' => $color,
    'start' => $data,
];

}

echo json_encode($eventos);

