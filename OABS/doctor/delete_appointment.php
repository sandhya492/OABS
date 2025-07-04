<?php 
    include('../includes/connection.php');
    $query = "delete from appointments where id = $_GET[aid]";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
            alert('Appointment deleted successfully...');
            window.location.href = 'dashboard.php';  
        </script>";
    }
    else{
        echo "<script type='text/javascript'>
            alert('Error...Plz try again.');
            window.location.href = 'dashboard.php';
        </script>";
    }
?>