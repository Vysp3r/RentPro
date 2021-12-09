<?php
	session_start();
	
	if(isset($_SESSION["id"])){
		header("location: ./");
		exit;
	}

	require_once "dbConfig.php";
	$err_connection = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		if(!empty($password) || !empty($email)){
			$query= "SELECT * FROM accounts WHERE email = '$email'";
			$result = mysqli_query($conn,$query);
		
			if($result -> num_rows == 1){
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				if(password_verify($password, $row['password'])){
					session_start();
                            
					$_SESSION["id"] = $row['id'];
					$_SESSION["email"] = $email;
                    $_SESSION["phone"] = $row['phone'];
					$_SESSION["firstname"] = $row['firstname'];
					$_SESSION["lastname"] = $row['lastname'];

					mysqli_close($conn);
					
					header("location: ./");
				}
			}
		}

		$err_connection = "Found one but password dont match.";
	}