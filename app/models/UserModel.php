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

        public function updateUser($userID, $username, $imgUrl, $password, $phone, $address){
            $query = $this -> db -> prepare("UPDATE users SET user_name = ?,
                                                            user_img_url = ?,
                                                            passwords = ?,
                                                            phone_number = ?,
                                                            address = ?  WHERE
                                                            user_id =?");
            return $query->execute([$username, $imgUrl, $password, $phone, $address, $userID]);
             
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


        //cart
        public function shoppingCart($user_id) {
            $stmt = $this->db->prepare("SELECT * FROm cart as c
                                        join products as p
                                        on c.product_id = p.product_id where user_id = ?");
            $stmt->execute([$user_id]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function changeQuantityCart($user_id, $product_id, $quantity) {
            $stmt = $this->db->prepare("UPDATE cart SET quantity = ? where user_id = ? AND product_id = ?");
            return $stmt->execute([$quantity, $user_id, $product_id]);
        }

        public function removeCart($user_id, $product_id) {
            $stmt = $this->db->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
            return $stmt->execute([$user_id, $product_id]);
        }

        public function countItems($user_id) {
            $stmt = $this->db->prepare("SELECT sum(quantity) AS totalQuantity FROM cart WHERE user_id = ?");
            $stmt->execute([$user_id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        private function getCart($user_id, $product_id) {
            $stmt = $this->db->prepare("SELECT count(*) AS hasItem FROM cart WHERE user_id = ? AND product_id = ?");
            $stmt->execute([$user_id, $product_id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function addToCart($user_id, $product_id) {
            if($this->getCart($user_id, $product_id)->hasItem != 0) {
                $stmt = $this->db->prepare("UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?");
                return $stmt->execute([1, $user_id, $product_id]);
            } else {
                $stmt = $this->db->prepare("INSERT INTO cart(user_id, product_id, quantity) VALUE (?, ?, ?)");
                return $stmt->execute([$user_id, $product_id, 1]);
            }
        }
    }
?>