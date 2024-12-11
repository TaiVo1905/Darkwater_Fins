<?php
    class ProfileController extends Controller{
        public function index(){
            $this -> model('User');
            $this-> view('profile');
        }
    }
?>