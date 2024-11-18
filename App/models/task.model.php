<?php
    class Task {
        private $taskId;
        private $taskName;
        private $taskDescription;
        private $dataTask;
        private $taskPrioridade;
        private $projectId;
        private $taskStatus;
        private $db;

        public function __set($key, $value){
            $this->$key = $value;
        }

        public function create(){
            $sql = "INSERT INTO tasks(task_name, task_description, dataTask, task_prioridade, fk_project_id, task_status) VALUES(:taskName, :taskDescription, :dataTask, :taskPrioridade, :projectId, :taskStatus)";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':taskName', $this->taskName);
            $stmt->bindValue(':taskDescription', $this->taskDescription);
            $stmt->bindValue(':dataTask', $this->dataTask);
            $stmt->bindValue(':taskPrioridade', $this->taskPrioridade);
            $stmt->bindValue(':projectId', $this->projectId);
            $stmt->bindValue(':taskStatus', $this->taskStatus);
            $stmt->execute();
        }

        public function delete(){
            $sql = "delete from tasks where task_id = :taskId";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':taskId', $this->taskId);
            $stmt->execute();
        }

        public function read(){
            $sql = "SELECT task_id, task_name, task_description, dataTask, task_prioridade, task_status FROM tasks WHERE fk_project_id = $this->projectId";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
            $tasks = $stmt->fetchAll();
            return $tasks;
        }

        public function update($par){
            if($par == 'task'){
                $sql = "UPDATE tasks SET task_name = :task, task_description = :descr, dataTask = :dataTk, task_prioridade = :priorid WHERE task_id = $this->taskId";
            
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':task', $this->taskName);
                $stmt->bindValue(':descr', $this->taskDescription);
                $stmt->bindValue(':dataTk', $this->dataTask);
                $stmt->bindValue(':priorid', $this->taskPrioridade);
                $stmt->execute();
            
            } elseif($par == 'status'){
                $sql = "UPDATE tasks SET task_status = '$this->taskStatus' WHERE task_id = $this->taskId";

                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }
        }
    }
?>