<?php
    include 'connection.php';        
        $ROWID = $_GET['ROWID'];    
        $approve_req = "INSERT INTO login (username,password) SELECT username,password FROM user_details WHERE ROWID=$ROWID";
        $product = mysqli_query($conn, $approve_req);

        $del_req = "DELETE FROM user_details WHERE ROWID=$ROWID";
        $result = mysqli_query($conn, $del_req);
        mysqli_close($conn);  
?>
<script>
alert('Account is verified and approved.')
document.location="requestapprove.php";
</script>