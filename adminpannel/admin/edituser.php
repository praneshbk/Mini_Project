<?php
	session_start();
	include 'connection.php';

	if(isset($_SESSION['mylogin'])) {
		$userID = $_SESSION['mylogin'];
		$query1 = "SELECT username FROM login WHERE username='".$username."' ";
		$task = mysqli_query($conn, $query1);
		$userInfo = mysqli_fetch_row($task);
		}else{
?>

		<script type="text/javascript">
			window.location.href="loginpage.php";
		</script>
<?php } ?>

<?php
        //header("Location: index.php");
        //Edit user data on demand
        include 'connection.php';

        if(isset($_POST['update'])) {    
            $set_id = $_POST['ROWID'];
            $email=$_POST['email'];
            $mobnum=$_POST['mobnum'];                
                $result5 = "UPDATE user_details SET email_id='".$email."', mobile_number='".$mobnum."' WHERE ROWID='".$set_id."'";
                //$vl1 = mysqli_query($conn, $result5);
                $conn->query($result5);
                header("Location: useraccount.php");
        }else {
        ?>
        
        <?php
        include 'connection.php';
        $edit_id = $_GET['ROWID'];         
        $sql = "SELECT * FROM user_details WHERE ROWID=$edit_id";
        $result = $conn->query($sql);
        $res = $result->fetch_assoc();
        if(!empty($res)) {
            $pname_old = $res['email_id'];
            $mob_old = $res['mobile_number'];
        } 	
   
?>

<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>User Account</title>
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/responsee.css">
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="css/template-style.css">  
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>  
      <link rel="stylesheet" href="style.css">  
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/main.css">  
   </head>
   <body class="size-1280">
      <!-- TOP NAV WITH LOGO -->
      <header>
         <nav>
            <div class="line">
               
               <div class="top-nav s-12 l-10 right">
                  <p class="nav-text">Custom menu text</p>
                  <ul class="right">                     
                     <li><a href='logout.php'>Logout</a></li>
                  </ul>
               </div>
            </div>
         </nav>
      </header>
            <!-- ASIDE NAV AND CONTENT -->
            <div class="line">
         <div class="box  margin-bottom">
            <div class="margin2x">
               <!-- ASIDE NAV 1 -->
               <aside class="s-12 l-3">
                  
                  <div class="aside-nav">
                     <ul>
                     <li><a href="adminhome.php">Manage Post</a></li>
                     <li><a href="post.php">Post</a></li>
                     <li><a href="useraccount.php">User Account</a></li> 
                        
                     </ul>
                  </div>
               </aside>
               <!-- CONTENT -->
               
               <form id="post" class="contact100-form validate-form" action="edituser.php" method="POST">

                    <span class="contact100-form-title">
                    Update User Details            
                    </span>                    
           
                    <label class="label-input100" for="email">Enter New E-mail Id </label>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: Eg. lorem ipsum">               
                    <input id="message" type="text" name="email" class="input100" value="<?php echo $pname_old; ?>" placeholder="Eg. lorem ipsum" required>
                        <span class="focus-input100"></span>
                    </div>

                    <label class="label-input100" for="phone">Enter New Mobile Number</label>
                    <div class="wrap-input100">               
                    <input id="message" type="text" name="mobnum" class="input100" value="<?php echo $mob_old; ?>" placeholder="Eg. lorem ipsum" required>
                        <span class="focus-input100"></span>
                    </div>
                   
                    <div class="container-contact100-form-btn">
                    <input type="hidden" name="ROWID" value="<?php echo $_GET['ROWID'];?>">
                    <button class="contact100-form-btn" type="submit" name="update" value="update">
                            Update
                        </button>				               
                    </div>               

                </form>
               
               
            </div>
         </div>
      </div>   
               
      <!-- FOOTER -->
      <div class="line">
        <footer class="box">           
              <div class="s-12 l-6">
                 <p>##</p>
              </div>
              <div class="s-12 l-6">
                 <a class="right" href="http://www.myresponsee.com" title="Responsee - lightweight responsive framework">##</a>
              </div>
           </div>
        </footer>
      </div>
      <script type="text/javascript" src="js/responsee.js"></script>
   </body>
</html>
<?php } ?>
