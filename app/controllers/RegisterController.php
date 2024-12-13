<?php
    class RegisterController extends Controller{
        public function index () {
            $data = $this->register();
            if(empty($data)) {
            }
            $this->view("Register", $data);
            
        }
        public function register() {
            try {
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
                        return 
                            ["user_name" => $user_name,
                            "user_password" => $user_password,
                            "user_email" => $user_email,
                            "user_confirm_password" => $user_confirm_password,
                            "user_authentication_code" => $user_authentication_code
                            ];
                    } else {
                        if($userModel->addUser($user_name, $user_email, $user_password)){
                            header("location: LogIn");
                        };
                    }
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>