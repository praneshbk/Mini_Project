<?php
    include "connection.php";
    $msg = '';    
    if(isset($_POST['register'])){	
	$uname = $_POST['username'];
	$pass = $_POST['password'];
	$mail = $_POST['email'];
	$phone = $_POST['mobilenumber'];	

	$select_data = "SELECT * FROM login WHERE username= '".$uname."' or email_id= '".$mail."' ";
	$db_conn = mysqli_query($conn, $select_data);

	if(mysqli_num_rows($db_conn) > 0) {
        $msg = 'Username or email id already exists.';
	}else{
		$insert_form_data = "INSERT INTO user_details (username,password,email_id,mobile_number) VALUES ('".$uname."','".$pass."','".$mail."','".$phone."')";
        $result = mysqli_query($conn,$insert_form_data);
        $msg = 'Registered Successfully';
        header("Location: ../loginpage.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<style type="text/css">
    #userdetails {
        color: red;               
    }
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
		            <div class="modal-header">
				<p class="modal-title">KINDLY DO NOT USE ANY BANK ACCOUNT PASSWORD FOR REGISTRATION. WE HAVE NOT PROVIDED SECURITY ON THIS WEBSITE.</p>				
			</div>    			
        </div>
    </div>
</div>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form id="register" class="login100-form validate-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
					<span class="login100-form-title p-b-26">
                        Registration Page
                    </span>	
                                        
                    <div class="wrap-input100 validate-input" data-validate = "Valid Username is: lorem ipsum">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid Mobile Number is: +911234567890">
						<input class="input100" type="text" name="mobilenumber">
						<span class="focus-input100" data-placeholder="Mobile Number"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="register" value="Post">
								Sign Up
                            </button>
                            
                        </div>
                        <label id="userdetails"><?= $msg ?></label>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>