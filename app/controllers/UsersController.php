<?php
    require_once("./app/models/ProductModel.php");
    class UsersController extends Controller {
        private $__userService;
        private $__orderService;
        private $__mailerService;

        public function __construct() {
            $this->service("User");
            $this->service("Order");
            $this->service("Mailer");
            $this->__userService = new UserService();
            $this->__orderService = new OrderService();
            $this->__mailerService = new MailerService();
        }
        //profile
        public function index(){
            $id = $_SESSION['user_id'];
            $userinfo = $this->__userService->getUserById($id);
            $order = $this->__orderService->getOrder($id);
            $data = array(
                'userInfo' => $userinfo,
                'order' => $order
            );
            
            $this->view('users/profile', $data);
        }

        public function updateProfile(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $id = $_SESSION['user_id'];
                $data = $this->__userService->getUserById($id);
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
                $this->__userService -> updateUser($id, $username, $user_img, $phone, $address);
                $userinfo = $this->__userService->getUserById($id);
                $order = $this->__orderService->getOrder($id);    
                $data = array(
                    'userInfo' => $userinfo,
                    'order' => $order
                );
                $this->view('users/profile', $data);
            }
        }

        public function executeChangePassword(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $id = $_SESSION['user_id'];
                $new_password = password_hash($_POST['new-password'], PASSWORD_BCRYPT);
                $this->__userService -> updatePassword($id, $new_password);
                $userinfo = $this->__userService->getUserById($id);
                $order =$this->__orderService->getOrder($id);
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
                    $user = $this->__userService->verifyAccount($user_email, $user_password);
                    if(!empty($user)) {
                        $_SESSION["user_id"] = $user->getUserId();
                        if($user->getRoles() == 1) {
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
                    $user_password_error  = "";
                    $user_name = $_POST["user_name"];
                    $user_email = $_POST["user_email"];
                    $user_password = $_POST["user_password"];
                    $user_confirm_password = $_POST["user_confirm_password"];
                    $user_authentication_code = $_POST["user_authentication_code"];
                    $codeCookie = isset($_COOKIE["code"]) ? $_COOKIE["code"] : "";
                    $emailCookie = isset($_COOKIE["email"]) ? $_COOKIE["email"] : "";
                    if (($user_authentication_code != $codeCookie && $user_email != $emailCookie) || $this->__userService->getUserByEmail($user_email)) {
                        $data = 
                            ["user_name" => $user_name,
                            "user_password" => $user_password,
                            "user_email" => $user_email,
                            "user_confirm_password" => $user_confirm_password,
                            "user_authentication_code" => $user_authentication_code
                            ];
                    } else {
                        if(isset($_COOKIE["code"])) {
                            unset($_COOKIE["code"]);
                        }
                        $user = new UserModel($user_name, $user_email, $user_password);
                        if($this->__userService->addUser($user)){
                            header("location:" . BASE_URL . "Users/LogIn");
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

        public function authEmail() {
            if (isset($_POST['email']) && isset($_POST["user_name"])) {
                $email = $_POST['email'];
                $user_name = $_POST['user_name'];
                echo $this->__mailerService->sendEmailCode($email, $user_name);
            } else { 
                echo "Tham số không hợp lệ.";
            }
        }
    }
?>