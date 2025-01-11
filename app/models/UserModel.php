<?php
    #[AllowDynamicProperties]
    class UserModel {
        private $user_id;
        private $user_name;
        private $user_img_url;
        private $email;
        private $passwords;
        private $address;
        private $phone_number;
        private $roles;
        private $banned;

        public function __construct ($user_name = null, $user_img_url = null, $email = null, $passwords = null) {
            $this->user_name = $user_name;
            $this->user_img_url = $user_img_url;
            $this->email = $email;
            $this->passwords = $passwords;
        }

        //Getter
        public function getUserId() {
            return $this->user_id;
        }
        public function getUserName() {
            return $this->user_name;
        }
        public function getUserImgUrl() {
            return $this->user_img_url;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getPasswords() {
            return $this->passwords;
        }
        public function getAddress() {
            return $this->address;
        }
        public function getPhoneNumber() {
            return $this->phone_number;
        }
        public function getRoles() {
            return $this->roles;
        }
        public function getBanned() {
            return $this->banned;
        }

        //Setter
        public function setUserName($user_name) {
            $this->user_name = $user_name;
        }
        public function setUserImgUrl($user_img_url) {
            $this->user_img_url = $user_img_url;
        }
        public function setEmail($email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format.");
            }
            $this->email = $email;
        }        
        public function setPasswords($passwords) {
            $this->passwords = $passwords;
        }
        public function setAddress($address) {
            $this->address = $address;
        }
        public function setPhoneNumber($phone_number) {
            if (!preg_match('/^\d{10,11}$/', $phone_number)) {
                throw new Exception("Invalid phone number format.");
            }
            
            $this->phone_number = $phone_number;
        }         
        public function setRoles($roles) {
            if ($roles != 0 && $roles != 1){ 
                throw new Exception("Invalid role. Roles must be 0 or 1.");
            }
            $this->roles = $roles;
        }

        public function setBanned($banned) {
            if ($banned != 0 && $banned != 1) { 
                throw new Exception("Invalid banned value. Must be 0 or 1.");
            }
            $this->banned = $banned;
        }
    }
?>