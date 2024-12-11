<?php
    class UserModel extends Model{
        protected $userModel;

        public function __construct() {
            parent::__construct(); 
        }
        public function getUser($id){
            $query = $this->db->prepare("SELECT * FROM users WHERE user_id = :id");
            $query->execute(['id' => $id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }
    }
?>