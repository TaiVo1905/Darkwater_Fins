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
                $uploadDir = './storage/uploads/';
                $user_img_url = $data->getUserImgUrl();  
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $fileName = basename($_FILES['image']['name']);
                    $filePath = $uploadDir . $fileName;
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                        $user_img_url = $filePath;  
                    } else {
                        echo "<p style='color: red;'>Failed to upload image.</p>";
                    }
                }
                $data->setUserName($username);
                $data->setUserImgUrl($user_img_url);
                $data->setPhoneNumber($phone);
                $data->setAddress($address);
                $this->__userService->updateUser($data);
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
                $user = $this->__userService->getUserById($id);
                $json = file_get_contents('php://input');
                $data = json_decode($json, true);
                $oldPassword = $data['oldPassword'];
                $newPassword = $data['newPassword'];
                $confirmPassword = $data['confirmPassword'];
                if(password_verify($oldPassword, $user->getPasswords()) && $newPassword == $confirmPassword){
                    $new_password = password_hash($newPassword, PASSWORD_BCRYPT);
                    $this->__userService -> updatePassword($id, $new_password);
                }else{
                    echo 2;
                }
            }
        }

        //Login, register and logout
        public function SignIn() {
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
            if($_SERVER["REQUEST_METHOD"] == "GET") {
                if(isset($_SESSION["user_id"])) {
                    echo true;
                } else {
                    echo false;
                }
            }
        }

        public function SignUp() {
            try {
                $data = null;
                if($_SERVER["REQUEST_METHOD"] == "POST") {
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
                            header("location:" . BASE_URL . "Users/SignIn");
                            exit();
                        };
                    }
                }
                $this->view("users/register", $data);

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function forgottenPassword() {
            try {
                $data = null;
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $user_email = $_POST["user_email"];
                    $user_password = $_POST["user_password"];
                    $user_confirm_password = $_POST["user_confirm_password"];
                    $user_authentication_code = $_POST["user_authentication_code"];
                    $codeCookie = isset($_COOKIE["code"]) ? $_COOKIE["code"] : "";
                    $emailCookie = isset($_COOKIE["email"]) ? $_COOKIE["email"] : "";
                    if (($user_authentication_code != $codeCookie && $user_email != $emailCookie)) {
                        $data = 
                            ["user_password" => $user_password,
                            "user_email" => $user_email,
                            "user_confirm_password" => $user_confirm_password,
                            "user_authentication_code" => $user_authentication_code
                            ];
                    } else {
                        if(isset($_COOKIE["code"])) {
                            unset($_COOKIE["code"]);
                        }
                        
                        $user = $this->__userService->getUserByEmail($user_email);
                        $password_hash = password_hash($user_password, PASSWORD_BCRYPT);
                        if(password_needs_rehash($password_hash, PASSWORD_BCRYPT)) {
                            $password_hash = password_hash($password_hash, PASSWORD_BCRYPT);
                        }
                        echo var_dump($user);
                        $user->setPasswords($password_hash);
                        if($this->__userService->addUser($user)){
                            header("location:" . BASE_URL . "Users/SignIn");
                            exit();
                        };
                    }
                }
                $this->view("Users/ForgottenPassword", $data);

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
                if($this->__userService->getUserByEmail($email)) {
                    echo $this->__mailerService->sendEmailCode($email, $user_name);
                } else {
                    echo "This account was banned!";
                }
            } else { 
                echo "Tham số không hợp lệ.";
            }
        }

        public function _404() {
            $this->view('users/404');
        }
    }
?>