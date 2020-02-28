<?php
  include('includes/config.php');
  $msg='';
  $error='';

    if(isset($_POST['send']))
    {
      $input1 = $_POST['name'];
      $input2 = $_POST['email'];
      $input3 = $_POST['subject'];
      $input4 = $_POST['message'];
      $status=1;
    
        $query = mysqli_query($con,"insert into form(name,email_id,subject,message)values('$input1','$input2','$input3','$input4')");
          
        if($query)
        {
        $msg="We got your request, We'll get in touch with you soon.. ";
        }else{
         $error="Something went wrong . Please try again.";    
        } 
  }



?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News Portal | Contact us</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <?php include('includes/header.php');?>
    <!-- Page Content -->
    <div class="container">

      <?php 
      $pagetype='contactus';
      $query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
      while($row=mysqli_fetch_array($query))
      {

      ?>
      <h1 class="mt-4 mb-3"><?php echo htmlentities($row['PageTitle'])?>
  
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Intro Content -->
<div class="row">

    <div class="col-lg-12">

      <div class="row">
        <div class="col-sm-12">
          <div class="card-box">
          <h4 class="m-t-0 header-title"><b>Get In Touch </b></h4>
          <hr />



          <div class="row">
          <div class="col-sm-6">  
          <!---Success Message--->  
          <?php if($msg){ ?>
          <div class="alert alert-success" role="alert">
          <strong>Well done!</strong> <?php echo htmlentities($msg);?>
          </div>
          <?php } ?>

          <!---Error Message--->
          <?php if($error){ ?>
          <div class="alert alert-danger" role="alert">
          <strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
          <?php } ?>


          </div>
          </div>                  
          <div class="row">    
          <div class="col-sm-8">
            <div class="contact-form">
            <div class="status alert alert-success" style="display: none"></div>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" id="main-contact-form" class="contact-form row" name="contact-form" method="POST">
                <div class="form-group col-md-6">
                  <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                  </div>
                  <div class="form-group col-md-6">
                  <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                  </div>
                  <div class="form-group col-md-12">
                  <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                  </div>
                  <div class="form-group col-md-12">
                  <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                  </div>                        
                  <div class="form-group col-md-12">
                  <input type="submit" name="send" class="btn btn-primary pull-right" value="Send Message">
                </div>
              </form>
            </div>
          </div>
          </div>  
          </div>
        </div>
      </div>          
    </div>
</div>
      <!-- /.row -->
<?php } ?>
    
    </div>
    <!-- /.container -->

    <!-- Footer -->
 <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
