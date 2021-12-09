<?php
    session_start();
    
    if(!isset($_SESSION["id"])){
        header("location: signin.php");
        exit;
    }

    require_once "navbar.php";
    require_once "footer.php";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "dbConfig.php";

        if(isset($_POST['listingOwned'])){
            $id = $_POST['listingOwned'];
            if($id != "none"){
                $query= "DELETE FROM ads WHERE id = '$id'";
                mysqli_query($conn,$query);
                $query= "DELETE FROM reviews WHERE ad = '$id'";
                mysqli_query($conn,$query);
                mysqli_close($conn);
            }
        }else{
            $address = trim($_POST['address']);
            $city = trim($_POST['city']);
            $state = trim($_POST['state']);
            $type = trim($_POST['type']);
            $bedrooms = trim($_POST['bedrooms']);
            $price = trim($_POST['price']);
            $owner = $_SESSION["id"];

            if(empty($address) || empty($city) || empty($state) || empty($type) || empty($bedrooms) || empty($price) || empty($_FILES["image"]["name"])){
                header("location: manage.php");
            } else{
                $fileName = basename($_FILES["image"]["name"]); 
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
                $allowTypes = array('jpg','png','jpeg','gif'); 
                if(in_array($fileType, $allowTypes)){ 
                    $image = $_FILES['image']['tmp_name']; 
                    $imgContent = addslashes(file_get_contents($image)); 
                    $query= "insert into ads (address,city,state,type,bedrooms,price,owner,image) VALUES ('$address','$city','$state','$type','$bedrooms','$price','$owner','$imgContent')";
                    mysqli_query($conn,$query);
                    mysqli_close($conn);
                    header("location: manage.php");
                }
            }
        }
	}

    function listProperties(){ ?>
        <option value='none'>
            Select an ad
        </option> <?php

        include "dbConfig.php";
        $owner = $_SESSION['id'];
        $query= "SELECT * FROM ads WHERE owner = " . $owner;
        $result = mysqli_query($conn,$query);
        
        while ($row = mysqli_fetch_array($result)) { ?>
            <option value='<?php echo $row['id']; ?>'>
                <?php echo $row['address'];?>,
                <?php echo $row['city'];?>,
                <?php echo $row['state'];?>
            </option>
        <?php }
        mysqli_close($conn);    
    }
?>