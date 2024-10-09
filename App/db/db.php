<?php
    class Db {
        private $host = "localhost";
        private $db_name = "kanban";
        private $user = "root";
        private $pass = "";

        public function connect(){
            try {
                $connection = new PDO(
                    "mysql:host=$this->host;dbname=$this->db_name",
                    "$this->user",
                    "$this->pass"
                );

                return $connection;

            } catch(PDOException $e){
                $erro = $e->getMessage();
                echo "Erro ao conectar: $erro";
            }
        }
    }

?>