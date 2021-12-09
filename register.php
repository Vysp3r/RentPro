<?php require_once "./core/registerHandler.php"; ?>


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
<body class="h-100 d-flex align-items-center pt-5 pb-5 text-center">
<!-- MAIN -->
<main class="w-100 p-2 m-auto text-center" style="max-width: 330px">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h1 class="h3 mb-3 fw-normal">Please register</h1>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" value="<?php echo $firstname; ?>" name="firstname" id="fnInput" placeholder="First name" required>
            <label for="fnInput">First name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" value="<?php echo $lastname; ?>" name="lastname" id="lnInput" placeholder="Last name" required>
            <label for="lnInput">Last name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="tel" class="form-control" value="<?php echo $phone; ?>" name="phone" id="phoneInput" placeholder="Phone number" required>
            <label for="phoneInput">Phone number</label>
        </div>

        <div class="form-floating mb-3">
            <input type="email" class="form-control" value="<?php echo $email; ?>" name="email" id="emailInput" placeholder="Email address" required>
            <label for="emailInput">Email address</label>
            <p><?php echo $email_error; ?></p>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" id="passInput" placeholder="Password" required>
            <label for="passInput">Password</label>
        </div>

        <p>Already have an account? <a href="login.php">Click here!</a></p>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

        <p class="mt-3 text-muted">Made by <a href="https://github.com/Vysp3r">Vysp3r (Charles Malouin)</a></p>
    </form>
</main>
<!-- MAIN END -->
</body>
</html>