<?php
    #[AllowDynamicProperties]
    class UserCommentModel {
        private $user_comment_id;
        private $user;
        private $product;
        private $comment_content;
        private $date_create;

        public function __construct (UserModel $user = null, ProductModel $product = null, $comment_content = null, $date_create = null) {
            $this->user = $user;
            $this->product = $product;
            $this->comment_content = $comment_content;
            $this->date_create = $date_create;
        }

        //Getter
        public function getUser() {
            return $this->user;
        }
        public function getProduct() {
            return $this->product;
        }
        public function getCommentContent() {
            return $this->comment_content;
        }
        public function getDateCreate() {
            return $this->date_create;
        }

        //Setter
        public function setUser(UserModel $user) {
            $this->user = $user;
        }
        public function setProduct(ProductModel $product) {
            $this->product = $product;
        }
        public function setCommentContent($comment_content) {
            $this->comment_content = $comment_content;
        }
        public function setDateCreate($dateCreate) {
            $this->date_create = $date_create;
        }
    }
?>