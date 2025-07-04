<?php 
    include('../includes/connection.php');
    $query = "select email from doctors where email = '$_POST[email]'";
    $query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run) == 0){
        echo "<b>Email doesn't exist. Add the doctor first.</b>";
    }
?>