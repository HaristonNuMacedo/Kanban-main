<?php

// Incluir o arquivo com a conexão com banco de dados
include_once './App/kanban.controller.php';

// Criar o array que recebe os eventos

$eventos = [];

foreach($tasks as $task){ 

$id = $task['task_id'];
$name = $task['task_name'];
$data = $task['dataTask'];

$eventos[] = [
    'id' => $id,
    'title' => $name,
    'start' => $data,
];

}

echo json_encode($eventos);

