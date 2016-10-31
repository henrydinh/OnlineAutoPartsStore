<?php
	// define variables to be used. Email address is the username
	$username = $password = "";
	
	// check if the request is POST
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = cleanInput($_POST["login_username"]);
		$password = cleanInput($_POST["login_password"]);
		
		if(validateUsername($username) && validatePassword($password)){
			// Connect to database
			$con = mysqli_connect('localhost', 'root', 'root', 'onlineautopartsstore');
			if(!$con){
				die('Could not connect: '.mysqli_error($con));
			}
			
			// check if username and password exist in database
			$sql = "SELECT * FROM User WHERE email='$username' AND hashed_password='$password' LIMIT 1";
			$result = $con->query($sql);
			
			if($result->num_rows > 0){
				// fetch user object from result
				$user_obj = $result->fetch_object();
				
				// Get user_ID, first_name, last_name, and email to store in session
				$user_ID = $user_obj->user_ID;
				$first_name = $user_obj->first_name;
				$last_name = $user_obj->last_name;
				
				// Start a session
				session_start();
				$_SESSION["username"] = $username;
				$_SESSION["user_ID"] = $user_ID;
				$_SESSION["first_name"] = $first_name;
				$_SESSION["last_name"] = $last_name;
				header('Location: my-account.php');
			}else{
				header('Location: login.html?login=false&reason=wrong_combo');
			}
			
			// Close Mysql connection
			$con->close();
		}else{
			// Redirect to login.html
			header('Location: login.html?login=false&reason=invalid');
		}
	}

	// cleans data by trimming, stripping slashes, and htmlspecialchars
	function cleanInput($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function validateUsername($input){
		// check if input matches with regex
		$regex = '/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i';
		if(preg_match($regex, $input)){
			return true;
		}else{
			return false;
		}
	}
	
	function validatePassword($input){
		// check if length of password is at least 8
		if(strlen($input) >= 8){
			return true;
		}else{
			return false;
		}
	}
?>