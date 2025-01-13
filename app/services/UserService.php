<?php
    class UserService{
        private $__model;

        public function __construct() {
            $this->__model = new Model();
        }

        public function getUserById($id){
            $stmt = $this->__model->db->prepare("SELECT * FROM users WHERE user_id = ? AND banned = ?");
            $stmt->execute([$id, 0]);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "UserModel");
            return $stmt->fetch();
        }

        public function getAllUserNotBan() {
            $stmt = $this->__model->db->prepare("SELECT * FROM users WHERE banned = ?");
            $stmt->execute([0]);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "UserModel");
            return $stmt->fetchAll();
        }

        public function getUserByEmail($email){
            $stmt = $this->__model->db->prepare("SELECT * FROM users WHERE email = ? AND banned = ?");
            $stmt->execute([$email, 0]);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "UserModel");
            return $stmt->fetch();
        }

        public function updateUser(UserModel $user){
            $stmt = $this->__model -> db -> prepare("UPDATE users SET user_name = ?,
                                                            user_img_url = ?,
                                                            phone_number = ?,
                                                            address = ?  WHERE
                                                            user_id =?");
            return $stmt->execute([$user->getUserName(), $user->getUserImgUrl(), $user->getPhoneNumber(), $user->getAddress(), $user->getUserId()]);
             
        }

        public function verifyAccount($user_email, $user_password){
            $stmt = $this->__model->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$user_email]); //true false
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "UserModel");
            $user = $stmt->fetch();
            if($user && password_verify($user_password, $user->getPasswords())) {
                return $user;
            } else {
                return false;
            }
        }

        public function addUser(UserModel $user) {
            try {
                $stmt = $this->__model->db->prepare("INSERT INTO users(user_name, email, passwords, roles) VALUE (?, ?, ?, ?)");
                $password_hash = password_hash($user->getPasswords(), PASSWORD_BCRYPT);
                if(password_needs_rehash($password_hash, PASSWORD_BCRYPT)) {
                    $password_hash = password_hash($password_hash, PASSWORD_BCRYPT);
                }
                return $stmt->execute([$user->getUserName(), $user->getUserImgUrl(), $user->getEmail(), $password_hash, 0]);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function getAllUser() {
            $stmt = $this->__model->db->prepare("SELECT * FROM users");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "UserModel");
            return $stmt->fetchAll();
        }

        public function updatePassword($user_id, $user_password){
            $stmt = $this->__model->db->prepare("UPDATE users SET passwords =? WHERE user_id =?");
            return $stmt->execute([$user_password, $user_id]);
        }

        
        public function updateRole($userId, $role) {
            $stmt = $this->__model->db->prepare("UPDATE users SET roles = ? WHERE user_id = ?");
            return $stmt->execute([$role, $userId]);
        }
        
        public function banUser($userId) {
            try{
                $stmt = $this->__model->db->prepare("UPDATE users SET banned = ? WHERE user_id = ?");
                return $stmt->execute([1, $userId]);
            } catch(PDOException $e) {
                return  $e->getMessage();
            }
        }
    }
?>