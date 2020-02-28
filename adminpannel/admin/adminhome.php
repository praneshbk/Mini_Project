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
		header("Location: index.php");
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
      <title>Home</title>
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
                     <li><a href='logout.php'><i style="font-size: 1.3em;" class="fas fa-sign-out-alt"></i></a></li>                                         
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
                     <li><a href="useraccount.php">Contact Us</a></li>
                     </ul>
                  </div>
               </aside>
               <!-- CONTENT -->
               <section class="s-12 l-6">
               <?php
                        $data = array();
                        include "connection.php";
                        $select_data = 'SELECT post_id,title,author_name ,data_description,DATE_FORMAT(date_time, "%d/%m/%Y %h:%m[AM|PM]") as date_time FROM userpost';
                        $db_conn = mysqli_query($conn, $select_data);
                        if(mysqli_num_rows($db_conn) > 0) {
                            while($row = mysqli_fetch_assoc($db_conn)){
                                $data[] = $row;
                                echo '<div id="heading-box">';
                                echo '<div id="heading-title">';
                                echo "<p>".$row['title']."</p>";
                                $ser = $_SERVER['PHP_SELF'];
                                echo "<form id=\"form_del\" action=\"$ser\" method=\"POST\">";
                                echo "<input type=\"hidden\" value=\"$row[post_id]\" name=\"post_id\">";
                                echo "<button type=\"submit\" name=\"delete_post\" value=\"Delete\"><i class=\"fas fa-trash-alt\"></i> </button>";
                                echo "</form>";
                                echo '</div>';
                                echo '<div id="heading-data_description">';
                                echo '<pre id="desc_data">'. $row['data_description'] .'</pre>';
                                echo '</div>';
                                echo '<br>';
                                echo '<div id="heading-footer">';
                                echo '<p id="posted_footer">Posted by <b>'.$row['author_name'].'</b> on '.$row['date_time'].'</p>';
                                echo '</div>';
                                echo '</div>';                                                                                            
                            }
                        }
                    ?>

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
                 <p>Copyright 2019, Vision Design - graphic zoo</p>
              </div>
              <div class="s-12 l-6">
                 <a class="right" href="http://www.myresponsee.com" title="Responsee - lightweight responsive framework">Design and coding by Responsee Team</a>
              </div>
           </div>
        </footer>
      </div>
      <script type="text/javascript" src="js/responsee.js"></script>
   </body>
</html>