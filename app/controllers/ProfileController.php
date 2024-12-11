<?php
    class ProfileController extends Controller{
        public function index(){
            $this -> model('User');
            $user = new UserModel();
            $data = $user->getUser(1);
            $this->view('profile', $data);
        }
    }
?>