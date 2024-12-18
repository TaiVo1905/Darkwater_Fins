<?php
    class UserModel extends Model{
        public function getUser($id){
            $query = $this->db->prepare("SELECT * FROM users WHERE user_id = :id");
            $query->execute(['id' => $id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function getUserByEmail($email){
            $query = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $query->execute([$email]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function updateUser($userID, $username, $imgUrl, $phone, $address){
            $query = $this -> db -> prepare("UPDATE users SET user_name = ?,
                                                            user_img_url = ?,
                                                            phone_number = ?,
                                                            address = ?  WHERE
                                                            user_id =?");
            return $query->execute([$username, $imgUrl, $phone, $address, $userID]);
             
        }

        public function verifyAccount($user_email, $user_password){
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$user_email]); //true false
            $user = $stmt->fetch(PDO::FETCH_OBJ);
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
                    $password_hash = password_hash($password_hash, PASSWORD_BCRYPT);
                }
                return $stmt->execute([$user_name, $user_email, $password_hash, 1]);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function updatePassword($user_id, $user_password){
            $stmt = $this->db->prepare("UPDATE users SET passwords =? WHERE user_id =?");
            return $stmt->execute([$user_password, $user_id]);
        }

        public function getOrder($user_id){
            $stmt = $this -> db -> prepare("SELECT 
                                                O.ORDER_ID,
                                                O.ORDER_STATUS, 
                                                P.PRODUCT_IMG_URL, 
                                                P.PRODUCT_NAME, 
                                                P.PRODUCT_CATEGORY, 
                                                OD.QUANTITY, 
                                                P.PROCUCT_PRICE, 
                                                OD.PRICE 
                                            FROM 
                                                ORDERS AS O
                                            JOIN 
                                                ORDER_DETAILS AS OD ON OD.ORDER_ID = O.ORDER_ID
                                            JOIN 
                                                PRODUCTS AS P ON P.PRODUCT_ID = OD.PRODUCT_ID
                                            WHERE 
                                                O.USER_ID = ?;
                                            ");
            $stmt->execute([$user_id]); //true false
            $orders = $stmt->fetch(PDO::FETCH_OBJ);    
            return $orders;                           
        }
        public function removeOrder($order_id){
            $stmt = $this -> db -> prepare("DELETE FROM ORDERS WHERE ORDER_ID =?");
            return $stmt->execute([$order_id]); 
        }
    }
?>