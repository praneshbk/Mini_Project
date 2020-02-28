<?php
	session_start();
	include 'connection.php';
	if(isset($_SESSION['mylogin'])) {
		//header("Location: page.php");
	}else {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query1 = "SELECT username, password FROM login WHERE username='".$username."' AND password='".$password."'";
		$task = mysqli_query($conn, $query1);
		// SELECT username FROM login WHERE
		$check = "SELECT * FROM user_details WHERE username NOT IN (SELECT username FROM user_details) ";
		$uname = mysqli_query($conn, $check);
		
		if(mysqli_num_rows($task) > 0){
			$userInfo = mysqli_fetch_row($task);
			$_SESSION['mylogin'] = $userInfo[0];
			header("Location: adminhome.php");
			//header("Location: home.php");
		}elseif(mysqli_num_rows($uname) < 1){
		?>
			<script type="text/javascript">
				alert("Your account is under review! \n Please contact your system administrator.");
				window.location.href="loginpage.php";
			</script>
		<?php
		}else{
		?>
			<script type="text/javascript">
				alert("Wrong Username or Password...!");
				window.location.href="loginpage.php";
			</script>
		<?php
			//header("Location: admin.php");
		}
	}
?>