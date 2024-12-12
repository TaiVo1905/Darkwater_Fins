<?php
class HomeController extends Controller {
    public function index() {
        $this->model('AquariumFish');
        $aquariumFishModel = new AquariumFishModel();
        $topFishes = $aquariumFishModel->getTopPurchasedFishes();
        $this->view('home', $topFishes);
    }
}
?>
