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
                    $user_password_error  = "";
                    $user_name = $_POST["user_name"];
                    $user_email = $_POST["user_email"];
                    $user_password = $_POST["user_password"];
                    $user_confirm_password = $_POST["user_confirm_password"];
                    $user_authentication_code = $_POST["user_authentication_code"];
                    $codeCookie = isset($_COOKIE["code"]) ? $_COOKIE["code"] : "";
                    if ($user_authentication_code != $codeCookie) {
                        return 
                            ["user_name" => $user_name,
                            "user_password" => $user_password,
                            "user_email" => $user_email,
                            "user_confirm_password" => $user_confirm_password,
                            "user_authentication_code" => $user_authentication_code
                            ];
                    } else {
                        $this->model("User");
                        $userModel = new UserModel();
                        return $userModel->addUser($user_name, $user_email, $user_password);
                    }
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>