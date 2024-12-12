<?php
    class UserModel extends Model{
        protected $userModel;

        public function getUser($id){
            $query = $this->db->prepare("SELECT * FROM users WHERE user_id = :id");
            $query->execute(['id' => $id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }
        public function updateUser($userID, $username, $imgUrl, $password, $phone, $address){
            $query = $this -> db -> prepare("UPDATE users SET user_name = ?,
                                                            user_img_url = ?,
                                                            passwords = ?,
                                                            phone_number = ?,
                                                            address = ?  WHERE
                                                            user_id =?");
            return $query->execute([$username, $imgUrl, $password, $phone, $address, $userID]);
             
        }
    }
?>