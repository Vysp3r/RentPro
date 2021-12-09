<?php

session_start();

require_once "navbar.php";
require_once "footer.php";

$city = "";
if(isset($_GET['city']))
    $city = $_GET['city'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = "location:./";

    if(isset($_POST['city']))
        if(trim($_POST['city']) != "")
            $location = $location . '?city=' . trim($_POST['city']);

    if(isset($_POST['bedrooms'])){
        if(trim($_POST['bedrooms']) != "Any" && $location == "location:./")
            $location = $location . '?bedrooms=' . trim($_POST['bedrooms']);
        else if(trim($_POST['bedrooms']) != "Any")
            $location = $location . '&bedrooms=' . trim($_POST['bedrooms']);
    }

    if(isset($_POST['type'])){
        if(trim($_POST['type']) != "Any" && $location == "location:./")
            $location = $location . '?type=' . trim($_POST['type']);
        else if(trim($_POST['type']) != "Any")
            $location = $location . '&type=' . trim($_POST['type']);
    }

    if(isset($_POST['price']) && $location == "location:./"){
        if(trim($_POST['price']) != "Unlimited")
            $location = $location . '?price=' . trim($_POST['price']);
    }
    else
        if(trim($_POST['price']) != "Unlimited")
            $location = $location . '&price=' . trim($_POST['price']);
    header($location);
}

function loadType(){
    $description = array("Any type", "Apartment", "Condo", "Studio", "Room & flatshare", "House", "Loft", "Cabin", "Villa", "Other");
    $type = array("Any","Apartment", "Condo", "Studio", "Room & flatshare", "House", "Loft", "Cabin", "Villa", "Other");
    for($x = 0; $x < 10; $x++){
        $isDefault = false;
        if(isset($_GET['type']))
            if($_GET['type'] == $type[$x])
                $isDefault = true;
        if($isDefault)
            echo '<option value="'.$type[$x].'" selected>'.$description[$x].'</option>';
        else
            echo '<option value="'.$type[$x].'">'.$description[$x].'</option>';
    }
}

function loadBedrooms(){
    $description = array("Any bedrooms amount", "1+ bedrooms", "2+ bedrooms", "3+ bedrooms", "4+ bedrooms", "5+ bedrooms");
    $bedrooms = array("Any", ">=1", ">=2", ">=3", ">=4", ">=5");
    for($x = 0; $x < 6; $x++){
        $isDefault = false;
        if(isset($_GET['bedrooms']))
            if($_GET['bedrooms'] == $bedrooms[$x])
                $isDefault = true;
        if($isDefault)
            echo '<option value="'.$bedrooms[$x].'" selected>'.$description[$x].'</option>';
        else
            echo '<option value="'.$bedrooms[$x].'">'.$description[$x].'</option>';
    }
}

function loadPrice(){
    $description = array("Unlimited", "<= 500$", "<= 1000$", "<= 1500$", ">= 1500$");
    $price = array("Unlimited","<=500","<=1000","<=1500",">=1500");
    for($x = 0; $x < 5; $x++){
        $isDefault = false;
        if(isset($_GET['price']))
            if($_GET['price'] == $price[$x])
                $isDefault = true;
        if($isDefault)
            echo '<option value="'.$price[$x].'" selected>'.$description[$x].'</option>';
        else
            echo '<option value="'.$price[$x].'">'.$description[$x].'</option>';
    }
}

function loadProperties(){
    include "dbConfig.php";
    $query= "SELECT * FROM ads";

    if(isset($_GET['bedrooms'])){
        $bedrooms = $_GET['bedrooms'];
        $query = $query . " WHERE bedrooms " . $bedrooms;
    }
    if(isset($_GET['city'])){
        $city = $_GET['city'];
        $separator = "WHERE";
        if(isset($_GET['bedrooms']))
            $separator = "AND";
        $query = $query . " " . $separator . " city = '$city'";
    }
    if(isset($_GET['type'])){
        $type = $_GET['type'];
        $separator = "WHERE";
        if(isset($_GET['bedrooms']) || isset($_GET['city']))
            $separator = "AND";
        $query = $query . " " . $separator . " type = '$type'";
    }
    if(isset($_GET['price'])){
        $price = $_GET['price'];
        $separator = "WHERE";
        if(isset($_GET['bedrooms']) || isset($_GET['city']) || isset($_GET['type']))
            $separator = "AND";
        $query = $query . " " . $separator . " price " . $price;
    }

    $result = mysqli_query($conn,$query);

    if(empty($result) || $result -> num_rows == 0){ ?>
        <div>
            <p>Aucune annonce disponibles selon les présents critères.</p>
        </div>
    <?php }else{
        while ($row = mysqli_fetch_array($result)) { ?>
            <div class='col mb-3'>
                <div class='card shadow-sm'>
                    <img src='data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']) ?>' class='bd-placeholder-img card-img-top' width='100%' height='225'/>
                    <div class='card-body text-white'>
                        <h3 class='card-text'><?php echo $row['price'] ?>$/month</h3>
                        <p><?php echo $row['city'] ?></p>
                        <p><?php echo $row['address'] ?></p>
                        <div class='d-flex justify-content-between align-items-center'>
                            <div class='btn-group'>
                                <a href='ad.php?id=<?php echo $row['id'] ?>'>
                                    <button type='button' class='btn btn-sm btn-outline-light'>Learn more</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    }
    mysqli_close($conn);
}