<?php
include 'connection.php';
	$post_id = $_GET['post_id'];
	$post_delete = "DELETE FROM userpost WHERE post_id= $post_id";
    $product = mysqli_query($conn, $post_delete);
    echo 'Post Deleted.';
?>