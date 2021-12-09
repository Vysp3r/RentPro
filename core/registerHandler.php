<?php
	session_start();
	
	if(isset($_SESSION["id"])){
		header("location: ./");
		exit;
	}

	require_once "dbConfig.php";

    $firstname = "";
    if(isset($_SESSION["firstname"]))
        $firstname = $_SESSION["firstname"];
    $lastname = "";
    if(isset($_SESSION["lastname"]))
        $lastname = $_SESSION["lastname"];
    $phone = "";
    if(isset($_SESSION["phone"]))
        $phone = $_SESSION["phone"];
    $email = "";
    if(isset($_SESSION["email"]))
        $email = $_SESSION["email"];

    $email_error = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$firstname = trim($_POST['firstname']);
		$lastname = trim($_POST['lastname']);
		$phone = trim($_POST['phone']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

        if(!empty($firstname))
            $_SESSION["firstname"] = $firstname;
        if(!empty($lastname))
            $_SESSION["lastname"] = $lastname;
        if(!empty($phone))
            $_SESSION["phone"] = $phone;
        if(!empty($email))
            $_SESSION["email"] = $email;

        if(!empty($firstname) && !empty($lastname) && !empty($phone) && !empty($email) && !empty($password)){
			$query = "SELECT * FROM accounts WHERE email = '$email'";
            $result = mysqli_query($conn,$query);

			if($result->num_rows==0){
				$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
				$query= "insert into accounts (firstname,lastname,phone,email,password) VALUES ('$firstname','$lastname','$phone','$email','$hashedpassword')";
				mysqli_query($conn,$query);

                $query = "SELECT * FROM accounts WHERE email = '$email'";
                $result = mysqli_query($conn,$query);

				if($result->num_rows==1){
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					if(password_verify($password, $row['password'])){
                        session_start();

						$_SESSION["id"] = $row['id'];
						$_SESSION["email"] = $email;
                        $_SESSION["phone"] = $phone;
						$_SESSION["firstname"] = $firstname;
						$_SESSION["lastname"] = $lastname;

                        mysqli_close($conn);

                        header("location: ./");
					}
				}
			}

            $email_error = "Email already in use.";
		}
	}