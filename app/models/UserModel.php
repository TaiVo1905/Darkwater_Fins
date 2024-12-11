<?php
    class UserModel extends Model{
        public function getUser($id){
            $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $query->execute(['id' => $id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }
    }
?>