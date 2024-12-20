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


        //cart
        public function shoppingCart($user_id) {
            $stmt = $this->db->prepare("SELECT * FROM cart AS c
                                        JOIN products AS p
                                        ON c.product_id = p.product_id WHERE user_id = ?");
            $stmt->execute([$user_id]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function changeQuantityCart($user_id, $product_id, $quantity) {
            try{
                $stmt = $this->db->prepare("UPDATE cart SET quantity = ? where user_id = ? AND product_id = ?");
                $stmt->execute([$quantity, $user_id, $product_id]);
                return [
                    "status" => "success"
                ];
            } catch(PDOException $e) {
                $this->db->rollback();
                return [
                    "status" => "fall",
                    "code" => $e->getCode(),
                    "message" => $e->getMessage()
                ];
            }
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

        //checkout
        public function getProductBeforCheckout($user_id ,$product_id_list) {
            $place = implode(", ", array_fill(0, count($product_id_list), "?"));
            $stmt = $this->db->prepare("SELECT * FROM cart AS c
                                        JOIN products AS p
                                        ON c.product_id = p.product_id WHERE c.user_id = ? AND c.product_id IN ($place)");
            $stmt->execute(array_merge([$user_id], $product_id_list));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function completedOrder($user_id ,$product_id_list) {
            try {
                $this->db->beginTransaction();
                $itemCheckouts = $this->getProductBeforCheckout($user_id ,$product_id_list);
                $stmt = $this->db->prepare("INSERT INTO orders(user_id, order_status, order_date) VALUE (?, 'pending', NOW())");
                $stmt->execute([$user_id]);

                $stmt = $this->db->prepare("SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1");
                $stmt->execute();
                $order_id = $stmt->fetch(PDO::FETCH_OBJ)->order_id;

                $stmt = $this->db->prepare("INSERT INTO order_details(order_id, product_id, price, quantity) VALUE (?, ?, ?, ?)");
                foreach($itemCheckouts as $item) {
                    $stmt->execute([$order_id, $item->product_id, $item->product_price, $item->quantity]);
                }

                $stmt = $this->db->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
                foreach($product_id_list as $id) {
                    $stmt->execute([$user_id, $id]);
                }
                $this->db->commit();
                return [
                    "status" => "success"
                ];
            } catch(PDOException $e) {
                $this->db->rollback();
                return [
                    "status" => "fall",
                    "code" => $e->getCode(),
                    "message" => $e->getMessage()
                ];
            }
        }
    }
?>