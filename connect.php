<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$areacode = $_POST['areacode'];
	$phone = $_POST['phone'];
	$company = $_POST['company'];
	$caddress = $_POST['caddress'];
	$sad = $_POST['sad'];
	$sadl = $_POST['sadl'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$postal = $_POST['postal'];
	$country = $_POST['country'];
	$website = $_POST['website'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, email, password, areacode, phone, company, caddress, sad, sadl, city, state, postal, country, website) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssssssssssi", $firstName, $lastName, $email, $password, $areacode, $phone, $company, $caddress, $sad, $sadl, $city, $state, $postal, $country, $website);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>