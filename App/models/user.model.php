<?php 
    class User
    {
        private $name;
        private $email;
        private $pass;
        private $db;

        public function __set($attr, $value){
            $this->$attr = $value;
        }

        public function login(){
            $sql = "SELECT user_id, user_name, user_email, user_pass FROM users WHERE user_email = :email && user_pass = md5(:pass)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':pass', $this->pass);
            $stmt->execute();

            return $array = $stmt->fetchAll();
        }

        public function logOut(){
            session_destroy();
        }

        public function register(){
            $sql = "INSERT INTO users(user_name, user_email, user_pass) VALUES(:name, :email, md5(:pass))";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':name', $this->name);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':pass', $this->pass);

            $stmt->execute();
        }

        public function getByEmail(){
            $sql = "SELECT user_id FROM users WHERE user_email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':email', $this->email);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
?>