<?php
    class UsersController extends Controller {
        //profile
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
            
            $this->view('users/profile', $data);
        }
        public function updateProfile(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                
                $id = $_SESSION['user_id'];
                $this -> model('User');
                $user = new UserModel();
                $data = $user->getUser($id);
                $username = $_POST['username'];
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
                $this->view('users/profile', $data);
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
                $this->view('users/profile', $data);
            }
        }

        //Login, register and logout
        public function logIn() {
            try {
                $data = null;
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $user_email = $_POST["user_email"];
                    $user_password = $_POST["user_password"];
                    $this->model("User");
                    $userModel = new UserModel();
                    $user = $userModel->verifyAccount($user_email, $user_password);
                    if(!empty($user)) {
                        session_start();
                        $_SESSION["user_id"] = $user->user_id;
                        if($user->roles = 1) {
                        header("location:" . BASE_URL . "admin");

                        } else {
                            header("location:" . BASE_URL . "home");
                        }
                        exit();
                    } else {
                        $data = ["user_email" => $user_email, "user_password" => $user_password];
                    }
                }
                $this->view("users/logIn", $data);
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        public function checkLogin() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if(isset($_SESSION["user_id"])) {
                    echo true;
                } else {
                    echo false;
                }
            }
        }
        public function register() {
            try {
                $data = null;
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $this->model("User");
                    $userModel = new UserModel();
                    $user_password_error  = "";
                    $user_name = $_POST["user_name"];
                    $user_email = $_POST["user_email"];
                    $user_password = $_POST["user_password"];
                    $user_confirm_password = $_POST["user_confirm_password"];
                    $user_authentication_code = $_POST["user_authentication_code"];
                    $codeCookie = isset($_COOKIE["code"]) ? $_COOKIE["code"] : "";
                    $emailCookie = isset($_COOKIE["email"]) ? $_COOKIE["email"] : "";
                    if (($user_authentication_code != $codeCookie && $user_email != $emailCookie) || $userModel->getUserByEmail($user_email)) {
                        $data = 
                            ["user_name" => $user_name,
                            "user_password" => $user_password,
                            "user_email" => $user_email,
                            "user_confirm_password" => $user_confirm_password,
                            "user_authentication_code" => $user_authentication_code
                            ];
                    } else {
                        if($userModel->addUser($user_name, $user_email, $user_password)){
                            header("location: users/LogIn");
                            exit();
                        };
                    }
                }
                $this->view("users/register", $data);

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        public function logOut() {
            session_unset();
            session_destroy();
            header("location:" . BASE_URL . "home");
            exit();
        }

        //order
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
        public function deleteOrder($order_id ){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $this -> model('User');
                $user = new UserModel();          
                if($order_id){
                    $user -> removeOrder($order_id);
                }
            }
        }
    }
?>