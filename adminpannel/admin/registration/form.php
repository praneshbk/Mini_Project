<?php
	include "connection.php";
	$uname = $_POST['username'];
	$pass = $_POST['password'];
	$mail = $_POST['email'];
	$phone = $_POST['mobilenumber'];	

	$select_data = "SELECT * FROM login WHERE username= '".$uname."' or email_id= '".$mail."'";
	$db_conn = mysqli_query($conn, $select_data);

	if(mysqli_num_rows($db_conn) > 0) {
		
        echo "<a href='../loginpage.php'>";
        mysqli_close($conn);
	}else{
		$insert_form_data = "INSERT INTO user_details (username,password,email_id,mobile_number) VALUES ('".$uname."','".$pass."','".$mail."','".$phone."')";
		$result = mysqli_query($conn,$insert_form_data);
        mysqli_close($conn);
	}
?>