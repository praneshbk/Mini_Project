<?php


// $msg = "hi gourav vinoo";
// $url = "http://bulksmspune.mobi/sendurlcomma.aspx?user=20089282&pwd=daya@1234&senderid=ABC&mobileno=8050476722&msgtext=".urlencode($msg);
// // $ch = curl_init($url);
// // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// // $curl_scraped_page = curl_exec($ch);
// // curl_close($ch);

// //echo $curl_scraped_page;

// $abc = file_get_contents($url);
//print_r($abc);
        


 session_start();

include('includes/config.php');
//include('index.php');

    if(isset($_POST['login']))
    {     
            $otp=$_POST['otp'];
            //$sql =mysqli_query($con,"SELECT OTP FROM otp WHERE username='$uname' ");
            $sql =mysqli_query($con,"SELECT * FROM otp WHERE OTP='$otp'");
            $num=mysqli_fetch_assoc($sql);

            $otp_time = $num['OTP_time'];
            $timestamp_otp = strtotime($otp_time);
            echo $timestamp_otp;
            echo '<br>';
            echo $currentTimestamp = strtotime(date("F d, Y h:i:s A"));
            exit;            

            if($num>0) {             
                echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
            } else {
                echo "<script>alert('Invalid OTP');</script>";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="News Portal.">
        <meta name="author" content="PHPGurukul">


        
        <title>News Portal | Admin Panel</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class=""></h2>
                                        <a href="index.html" class="text-success">
                                            <span>OTP Verification</span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" method="post">

                                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                                            <span class="btn-show-pass">
                                                <i class="zmdi zmdi-eye"></i>
                                            </span>
                                            <input class="input100" type="password" name="otp">
                                            <span class="focus-input100" data-placeholder="Password"></span>
                                        </div>
                     
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="login">Log In</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                    

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="js/main.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>

