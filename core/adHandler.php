<?php
    session_start();

    require_once "navbar.php";
    require_once "footer.php";

    include "dbConfig.php";
    $id = $_GET['id'];
    $query= "SELECT * FROM ads WHERE id = " . $id;
    $result = mysqli_query($conn,$query);
    $address = "";
    $city = "";
    $state = "";
    $type = "";
    $bedrooms = "";
    $price = "";
    $image = "";

    if($result -> num_rows == 0)
        header("location: ./");

    while ($row = mysqli_fetch_array($result)) {
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $type = $row['type'];
        $bedrooms = $row['bedrooms'];
        $price = $row['price'];
        $image = $row['image'];
    }

	if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "dbConfig.php";

        $review = trim($_POST['review']);
        $note = trim($_POST['note']);
        $ad = trim($_POST['id']);

        if(!empty($review) || !empty($note) || !empty($id)){
            $reviewer = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
            $query= "insert into reviews (comments,reviewer,ad,note) VALUES ('$review','$reviewer','$ad','$note')";
            mysqli_query($conn,$query);
            mysqli_close($conn);
        }

        header("location: ad.php?id=".$id);
	}

    function listComments(){
        include "dbConfig.php";
        $query= "SELECT * FROM reviews WHERE ad = " . $_GET['id'];
        $result = mysqli_query($conn,$query);
        mysqli_close($conn);
        while ($row = mysqli_fetch_array($result)) { ?>
            <div class='row'>
                <div class='col-12 mb-2'>
                    <p class='fs-5'><?php echo $row['reviewer'] ?></p>
                    <p class='fs-6'><?php echo $row['comments'] ?></p>
                    <span class='fw-bold'><?php echo $row['note'] ?>/10</span>
                </div>
            </div>
        <?php }
    }
?> 