<?php
class AquariumFishModel extends Model {
    public function getTopPurchasedFishes() {
        $query = $this->db->prepare("SELECT fish_name, fish_img_url, fish_price, fish_sub FROM Aquarium_Fishs ORDER BY purchases DESC LIMIT 4");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
