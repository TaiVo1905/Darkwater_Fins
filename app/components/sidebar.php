<div class="sidebar">
    <h2 class="sidebar-title mb-4">Price Filter</h2>
    <div class="filter-fiel">
        <input type="range" min="0" max="<?php echo $data[1] ?>" value="<?php echo $data[1] ?>" step="0.01" id="priceRange" class="price-slider w-100">
        <p>Selected Price: <span id="selectedPrice"><?php echo $data[1] ?>$</span></p>
        <button type="button" class="btn btn-primary" style="border-radius: 0">FILTER</button>
    </div>
    <h2 class="sidebar-title mb-4 mt-3">Categories</h2>
    <div class="checkbox-category form-check">
        <?php
            $html = "";
            if($url[1] == "fishes") {
                $category = 'fish_category';
            } elseif ($url[1] == "aquariums") {
                $category = 'aquarium_category';
            } else {
                $category = 'fishFood_category';
            }
            foreach($data[2] as $item) {
                $html .= '
                    <input class="form-check-input" type="checkbox" value="' . $item->$category . '" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        ' . $item->$category . '
                    </label></br>
                ';
            }
            echo $html;
        ?>
    </div>
</div>