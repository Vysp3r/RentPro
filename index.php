<?php require_once "./core/indexHandler.php"; ?>


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
    <div class="container-fluid pt-5">
        <!-- ADVANCED SEARCH START -->
        <form class="form-inline " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-xl-5">
                        <div class="col">
                            <input class="form-control" type="text" placeholder="City" name="city" value="<?php echo $city ?>">
                        </div>
                        <div class="col mt-2 mt-xl-0">
                            <select class="form-select" name="type" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Number of bedrooms">
                                <?php loadType(); ?>
                            </select>
                        </div>
                        <div class="col mt-2 mt-xl-0">
                            <select class="form-select" name="bedrooms" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Number of bedrooms">
                                <?php loadBedrooms(); ?>
                            </select>
                        </div>
                        <div class="col mt-2 mt-xl-0">
                            <select class="form-select" name="price" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Maximum monthly price">
                                <?php loadPrice(); ?>
                            </select>
                        </div>
                        <div class="col mt-2 mt-xl-0">
                            <input id="submit" type="submit" class="btn btn-outline-light w-100" value="Search">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- ADVANCED SEARCH END -->
        <!-- RESULT START -->
        <div class="album mt-3">
            <div class='row row-cols-1 row-cols-sm-2 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6'>
                <?php loadProperties(""); ?>
            </div>
        </div>
        <!-- RESULT END -->
    </div>
</main>
<!-- MAIN END -->
<!-- FOOTER START -->
<?php loadFooter(); ?>
<!-- FOOTER END -->
</body>
</html>