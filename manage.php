<?php require_once "./core/manageHandler.php"; ?>


<!DOCTYPE html>
<html class="h-100">
<head>
    <title>RentPro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</head>
<body class="d-flex flex-column h-100">
<!-- HEADER START -->
<?php loadNavbar(); ?>
<!-- HEADER END -->
<!-- MAIN -->
<main class="flex-shrink-0">
    <div class="container-fluid p-5">
        <div class="row justify-content-center">
            <div class="card rounded mt-5">
                <h3 class="card-header text-uppercase">CREATE AN AD</h3>
                <div class="card-body align-items-center px-0">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="" name="address" id="addressInput" placeholder="Address" required>
                            <label for="addressInput">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="" name="city" id="cityInput" placeholder="City" required>
                            <label for="cityInput">City</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="" name="state" id="stateInput" placeholder="State" required>
                            <label for="stateInput">State</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="typeInput" name="type">
                                <option value="Apartment">Apartment</option>
                                <option value="Condo">Condo</option>
                                <option value="Studio">Studio</option>
                                <option value="Room & flatshare">Room & flatshare</option>
                                <option value="House">House</option>
                                <option value="Loft">Loft</option>
                                <option value="Cabin">Cabin</option>
                                <option value="Villa">Villa</option>
                                <option value="Other">Other</option>
                            </select>
                            <label for="typeInput">Type</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="bedroomsInput" type="number" min="1" name="bedrooms" placeholder="Bedrooms #" required>
                            <label for="bedroomsInput">Bedrooms #</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="priceInput" type="number" name="price" placeholder="Price" required>
                            <label for="priceInput">Price</label>
                        </div>
                        <input class="form-control" type="file" name="image" required/>
                        <div class="text-center">
                            <input class="btn btn-outline-light mt-3 w-100" type="submit" value="Publish">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card rounded mt-5">
                <h3 class="text-uppercase card-header">DELETE AN AD</h3>
                <div class="card-body align-items-center px-0">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <p>Which add do you want to delete?</p>
                        <select class="selectListing form-select" name="listingOwned" id="listingOwned">
                            <?php listProperties(); ?>
                        </select>
                        <div class="text-center">
                            <input class="btn btn-outline-light mt-3 w-100" type="submit" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- MAIN END -->
<!-- FOOTER START -->
<?php loadFooter(); ?>
<!-- FOOTER END -->
</body>
</html>