<?php
    class LogInController extends Controller {
        public function index() {
            $data = $this->logIn();
            $this->view("logIn", $data);
        }
        public function logIn() {
            try {
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $user_email = $_POST["user_email"];
                    $user_password = $_POST["user_password"];
                    $this->model("User");
                    $userModel = new UserModel();
                    $user = $userModel->verifyAccount($user_email, $user_password);
                    if(!empty($user)) {
                        session_start();
                        $_SESSION["user_id"] = $user->user_id;
                        header("location: home");
                        exit();
                    } else {
                        return ["user_email" => $user_email, "user_password" => $user_password];
                    }
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>