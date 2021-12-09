<?php require_once "./core/adHandler.php"; ?>

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
    <div class="container-fluid rounded p-5">
        <!-- AD INFO START -->
        <div class="card mt-5">
            <div class="card-body ">
                <div class="row justify-content-center">
                    <img src='data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image) ?>' class='bd-placeholder-img card-img-top' width='100%' height='100%'/>
                    <h3 class="mt-3">Information</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-product" style="--bs-table-striped-color:'#F4F8F2';">
                            <tbody>
                            <tr>
                                <td><h5>Address</h5></td>
                                <td><?php echo $address; ?></td>
                            </tr>
                            <tr>
                                <td><h5>City</h5></td>
                                <td><?php echo $city; ?></td>
                            </tr>
                            <tr>
                                <td ><h5>State</h5></td>
                                <td><?php echo $state; ?></td>
                            </tr>
                            <tr>
                                <td><h5>Type</h5></td>
                                <td><?php echo $type; ?></td>
                            </tr>
                            <tr>
                                <td><h5>Bedrooms #</h5></td>
                                <td><?php echo $bedrooms; ?></td>
                            </tr>
                            <tr>
                                <td><h5>Price</h5></td>
                                <td><?php echo $price; ?>$/monthly</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h3>Review</h3>
                <?php listComments();
                if(isset($_SESSION["id"])) { ?>
                    <hr>
                    <form class="form-inline" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="row row-cols-1">
                            <div class="col">
                                <h4>Leave a review : </h4>
                                <textarea class="form-control" name="review" rows="7" required></textarea>
                            </div>
                            <div class="col mt-3">
                                <h5 class="">Rate this ad:</h5>
                            </div>
                            <div class="col">
                                <input class="form-control" name="note" min="0" max="10" type="number" required/>
                                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
                            </div>
                            <div class="col mt-3">
                                <input class="btn btn-outline-dark w-100" type="submit" value="Envoyer">
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
        <!-- AD INFO END -->
    </div>
</main>
<!-- MAIN END -->
<!-- FOOTER START -->
<?php loadFooter(); ?>
<!-- FOOTER END -->
</body>
</html>