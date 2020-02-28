<?php
include 'connection.php';
	$ROWID = $_GET['ROWID'];
	$records = "DELETE FROM user_details WHERE ROWID= $ROWID";
	$product = mysqli_query($conn, $records);
?>
<script>
document.location="useraccount.php";
</script>