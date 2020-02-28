<?php
	include "connection.php";

    if(isset($_POST['post'])){
        $author1 = $_POST['author'];
        $title1 = $_POST['title'];
        $description1 = $_POST['description'];


        $select_data = "SELECT * FROM userpost WHERE title= '".$title1."' ";
        $db_conn = mysqli_query($conn, $select_data);


        if(mysqli_num_rows($db_conn) > 0) {
            echo "<h3>Title or Post name already exists.</h3>";
            echo "<a href='post.php'> <h3>Home</h3> </a>";
            mysqli_close($conn);
        }else{
            $insert_form_data = "INSERT INTO userpost (author_name , title , description) VALUES ('".$author1."','".$title1."','".$description1."')";
            $result = mysqli_query($conn,$insert_form_data);
            echo "<h3>Post has been submited.</h3>";
            echo "<a href='post.php'> <h3>Home</h3> </a>";
            mysqli_close($conn);
        }    
    }
    
?>