<?php
    class UserModel extends Model{
        protected $userModel;

        public function getUser($id){
            $query = $this->db->prepare("SELECT * FROM users WHERE user_id = :id");
            $query->execute(['id' => $id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function verifyAccount($user_email, $user_password){
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            echo $stmt->execute([$user_email]); //true false
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            echo $user->passwords;
            $a = password_verify($user_password, $user->passwords);
            echo $a;
            if($user && password_verify($user_password, $user->passwords)) {
                return $user;
            } else {
                return false;
            }
        }

        public function addUser($user_name, $user_email, $user_password) {
            try {
                $stmt = $this->db->prepare("INSERT INTO users(user_name, email, passwords, roles) VALUE (?, ?, ?, ?)");
                $password_hash = password_hash($user_password, PASSWORD_BCRYPT);
                if(password_needs_rehash($password_hash, PASSWORD_BCRYPT)) {
                    $password_hash = password_hash($password_hash);
                    echo 1;
                }
                return $stmt->execute([$user_name, $user_email, $password_hash, 1]);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>