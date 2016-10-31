<?php
	session_start();
	
	if(isset($_SESSION['user_ID']) && isset($_SESSION['username'])){
		$username = $_SESSION['username'];	
		$user_ID = $_SESSION['user_ID'];
		$first_name = $_SESSION['first_name'];
		$last_name = $_SESSION['last_name'];
		echo "Hello, ".$first_name." ".$last_name."!";
		echo "<br>User ID: ".$user_ID;
		echo "<br>Email/username: ".$username;
	}else{
		// Redirect to login.html
		header('Location: login.html');
	}
?>