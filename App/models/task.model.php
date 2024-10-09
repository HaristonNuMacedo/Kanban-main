<?php
    class Task {
        private $taskId;
        private $taskName;
        private $taskDescription;
        private $projectId;
        private $taskStatus;
        private $db;

        public function __set($key, $value){
            $this->$key = $value;
        }

        public function create(){
            $sql = "INSERT INTO tasks(task_name, task_description, fk_project_id, task_status) VALUES(:taskName, :taskDescription, :projectId, :taskStatus)";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':taskName', $this->taskName);
            $stmt->bindValue(':taskDescription', $this->taskDescription);
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
            $sql = "SELECT task_id, task_name, task_description, task_status FROM tasks WHERE fk_project_id = $this->projectId";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
            $tasks = $stmt->fetchAll();
            return $tasks;
        }

        public function update($par){
            if($par == 'task'){
                $sql = "UPDATE tasks SET task_name = :task, task_description = :descr WHERE task_id = $this->taskId";
            
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':task', $this->taskName);
                $stmt->bindValue(':descr', $this->taskDescription);
                $stmt->execute();
            
            } elseif($par == 'status'){
                $sql = "UPDATE tasks SET task_status = '$this->taskStatus' WHERE task_id = $this->taskId";

                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }
        }
    }
?>