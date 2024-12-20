<?php
        class ProfileController extends Controller{
            public function index(){
                $this -> model('User');
                $user = new UserModel();
                $id = $_SESSION['user_id'];
                $userinfo = $user->getUser($id);
                $order =$user->getOrder($id);
                $data = array(
                    'userInfo' => $userinfo,
                    'order' => $order
                );
                
                $this->view('profile', $data);
            }
            public function updateProfile(){
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    
                    $id = $_SESSION['user_id'];
                    $this -> model('User');
                    $user = new UserModel();
                    $data = $user->getUser($id);
                    $username = $_POST['username'];
                    // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];   
                    $uploadDir = './public/images/uploads/';
                    $user_img = $data -> user_img_url;  
                    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                        $fileName = basename($_FILES['image']['name']);
                        $filePath = $uploadDir . $fileName;
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                            $user_img = $filePath;  
                        } else {
                            echo "<p style='color: red;'>Failed to upload image.</p>";
                        }
                    }  
                    $user -> updateUser($id, $username,$user_img, $phone, $address);
                    $userinfo = $user->getUser($id);
                    $order =$user->getOrder($id);    
                    $data = array(
                        'userInfo' => $userinfo,
                        'order' => $order
                    );
                    $this->view('profile', $data);
                }
            }
            public function executeChangePassword(){
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $this -> model('User');
                    $user = new UserModel();
                    $id = $_SESSION['user_id'];
                    $new_password = password_hash($_POST['new-password'], PASSWORD_BCRYPT);
                    $user -> updatePassword($id, $new_password);
                    $userinfo = $user->getUser($id);
                    $order =$user->getOrder($id);
                    $data = array(
                        'userInfo' => $userinfo,
                        'order' => $order
                    );
                    $this->view('profile', $data);
                }
            }
            public function deleteOrder($order_id ){
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $this -> model('User');
                    $user = new UserModel();          
                    if($order_id){
                        $user -> removeOrder($order_id);
                    }
                    
                }
            }

            //checkout
            public function saveInfoCheckout() {
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    try{
                        $jsonData = file_get_contents("php://input");
                        $request = json_decode($jsonData, true);
                        $_SESSION["info_checkout"] = $request;
                        echo true;

                    } catch(PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            }
        }
?>