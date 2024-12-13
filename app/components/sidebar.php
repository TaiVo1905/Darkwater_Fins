<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <h2 class="sidebar-title mb-4">Price Filter</h2>
        <div class="filter-fiel">
            <input type="range" min="0" max="24" value="24" id="priceRange" class="price-slider w-100">
            <p>Selected Price: <span id="selectedPrice">$24</span></p>
            <button type="button" class="btn btn-primary" style="border-radius: 0">FILTER</button>
        </div>
        <h2 class="sidebar-title mb-4 mt-3">Categories</h2>
        <div class="checkbox-category">
            <input type="radio" id="type-1" name="type1" value="Seamless glass aquarium">
            <label for="type-1"> Seamless glass aquarium</label><br>
            <input type="radio" id="type-2" name="type2" value="3-in-1 aquarium">
            <label for="type-2"> 3-in-1 aquarium</label><br>
            <input type="radio" id="type-3" name="type3" value="Cast aquarium">
            <label for="type-3"> Cast aquarium</label><br>
            <input type="radio" id="type-4" name="type4" value="Glass jar aquarium">
            <label for="type-4"> Glass jar aquarium</label><br>
            <input type="radio" id="type-5" name="type5" value="Wood-framed aquarium">
            <label for="type-5"> Wood-framed aquarium</label><br>
            <input type="radio" id="type-6" name="type6" value="Cylindrical aquarium">
            <label for="type-6"> Cylindrical aquarium</label><br>
        </div>
        <h2 class="sidebar-title mb-4 mt-3">Tags</h2>
        <div class="tags_group">
            <button type="button" class="btn btn-primary tags-btn tags-btn-1">BETTA</button>
            <button type="button" class="btn btn-primary tags-btn tags-btn-2">FIGHTING</button>
            <button type="button" class="btn btn-primary tags-btn tags-btn-3">FOR BEGINER</button>
            <button type="button" class="btn btn-primary tags-btn tags-btn-4">FOR PROFI</button>
            <button type="button" class="btn btn-primary tags-btn tags-btn-5">TANKMATES</button>
        </div>
    </div>
</body>
</html>