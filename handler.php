<?php
echo htmlspecialchars($_SERVER["PHP_SELF"]);

$nameErr = $emailErr = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Name is required";
	} else {
		$name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		  $nameErr = "Only letters and white space allowed";
		}
	}

	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	} else {
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format";
	}

	if (empty($_POST["message"])) {
		$message = "";
	} else {
		$message = test_input($_POST["message"]);
	}	
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
// 	$name = test_input($_POST["name"]);
// 	$email = test_input($_POST["email"]);
// 	$message = test_input($_POST["message"]);
// }

// function test_input($data) {
// 	$data = trim($data);
// 	$data = stripslashes($data);
// 	$data = htmlspecialchars($data);
// 	return $data;
// }
?>