<?php
	session_start();
	include 'connection.php';

	if(isset($_SESSION['mylogin'])) {
		$userID = $_SESSION['mylogin'];
		$query1 = "SELECT username FROM login WHERE username='".$username."' ";
		$task = mysqli_query($conn, $query1);
		$userInfo = mysqli_fetch_row($task);

		}else {
		?>
		<script type="text/javascript">			
			window.location.href="loginpage.php";
		</script>
		<?php
		//header("Location: index.php");
	}
?>

<?php 
    include 'connection.php';    
    $msg = '';
    $error_msg = '';

    if(isset($_POST['register']))   {
        $uname = $_POST['username'];
        $pass = $_POST['Password'];
        $mail = $_POST['email'];
        $phone = $_POST['mobnumber'];

        $select_data = "SELECT * FROM user_details WHERE username= '".$uname."' or email_id= '".$mail."'";
        $db_conn = mysqli_query($conn, $select_data);

        if(mysqli_num_rows($db_conn) > 0) {
            $msg = 'Username or email id already exists.';
        }else{
            $insert_form_data = "INSERT INTO user_details (username,password,email_id,mobile_number) VALUES ('".$uname."','".$pass."','".$mail."','".$phone."')";
            $result = mysqli_query($conn,$insert_form_data);
            $msg = 'Registered Successfully';
        }
    }

    if(isset($_POST['post'])){
        
        $author1 = htmlspecialchars($_POST['author']);
        $title1 = htmlspecialchars($_POST['title']);
        $data_description1 = htmlspecialchars($_POST['data_description']);

        $select_data = "SELECT * FROM userpost WHERE title= '".$title1."' ";
        $db_conn = mysqli_query($conn, $select_data);

        if(mysqli_num_rows($db_conn) > 0) {                      
            $error_msg = 'Title or Post name already exists';                        
        }else{
            $insert_form_data = "INSERT INTO userpost (author_name , title , data_description) VALUES ('".$author1."','".$title1."','".$data_description1."')";
            if(mysqli_query($conn,$insert_form_data)){
                $error_msg = 'Post has been submited.';    
            }else{
                $error_msg = 'Failed to submited.';            
            }
            
        }    
    }	

    if(isset($_POST['delete_post'])){
        include 'connection.php';
        $post_id = $_POST['post_id'];
        $post_delete = "DELETE FROM userpost WHERE post_id= $post_id";
        $product = mysqli_query($conn, $post_delete);
        echo 'Post Deleted.';
    }
?>
<?php 
    include 'connection.php';
    $count = '';        
        $select_data = "SELECT * FROM user_details WHERE username NOT IN(SELECT username FROM login)";        
        $db_conn = mysqli_query($conn, $select_data);
        $count = mysqli_num_rows($db_conn);             
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
                     <li><a href="requestapprove.php">Request Approve <label id="countdata"><?= $count ?></label></a></li>
                        
                     </ul>
                  </div>
               </aside>
               <!-- CONTENT -->
               <section class="s-12 l-6">
               <table class="table table-border table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>USERNAME</th>
								<th>E-MAIL ID</th>								
								<th>MOBILE NUMBER</th>
								<th><a href="deleteall.php" onClick="return confirm('Are you sure you want to delete All Details?')" >  Delete ALL</a></th>
                        
							</tr>
						</thead>

						<?php
							$sql = "SELECT * FROM user_details";
							

							if($result = mysqli_query($conn, $sql)){
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_array($result)){
											echo "<tr>";
											echo "<td>" . $row['ROWID'] . "</td>";
											echo "<td>" . $row['username'] . "</td>";
											echo "<td>" . $row['email_id'] . "</td>";											
                                 echo "<td>" . $row['mobile_number'] . "</td>";
                                 echo "<td><a href=\"edituser.php?ROWID=$row[ROWID]\">Edit</a> | <a href=\"delete.php?ROWID=$row[ROWID]\" onClick=\"return confirm('Are you sure?')\" >Delete</a></td>";                                 
											echo "</tr>";
											$data[] = $row;
										}

										echo "</table>";
										mysqli_free_result($result);
									} else{
								}
							} else{
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
							} 
						?>	
					</table>
               
               </section>
               <!-- ASIDE NAV 2 -->
               <aside class="s-12 l-3">
                  <h3>User Account</h3>
                  <div class="aside-nav">
                     
                  </div>
               </aside>
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