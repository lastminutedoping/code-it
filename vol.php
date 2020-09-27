<?php
	$Name = $_POST['Name'];
	
	$gender =($_POST['gender']);
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$date = $_POST['date'];
    $organization = $_POST['organization'];
	 $pincode = $_POST['pincode'];
	 $comment = $_POST['cpmment'];
	// Database connection
	$conn = new mysqli('localhost','root','','vol');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(Name, gender, email, mobile, date, organization, pincode, comment) values(?, ?, ?, ?, ?, ?, ? )");
		$stmt->bind_param("sssiisis", $Name, $gender, $email, $mobile, $date, $organization, $pincode, $comment);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>