<?php
	include "connection.php";
	$uname = $_POST['username'];
	$pass = $_POST['Password'];
	$mail = $_POST['email'];
	$phone = $_POST['mobnumber'];

	$select_data = "SELECT * FROM user_details WHERE username= '".$uname."' or email_id= '".$mail."'";
	$db_conn = mysqli_query($conn, $select_data);

	if(mysqli_num_rows($db_conn) > 0) {
		echo "<h1>Username or email id already exists.</h1>";
        echo "<a href='index.php'> <h2>Home</h2> </a>";
        mysqli_close($conn);
	}else{
		$insert_form_data = "INSERT INTO user_details (username,password,email_id,mobile_number) VALUES ('".$uname."','".$pass."','".$mail."','".$phone."')";
		$result = mysqli_query($conn,$insert_form_data);
        mysqli_close($conn);
	}
?>