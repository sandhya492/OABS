<?php 
    include('includes/connection.php');
    if($_POST['type'] == ""){
        $query = "select distinct speciality from doctors";
        $query_run = mysqli_query($connection,$query);
        $str = "";
        while($row = mysqli_fetch_assoc($query_run)){
            $str .= "<option value='{$row['speciality']}'>{$row['speciality']}</option>";
        }
    }else{
        $query = "select name from doctors where speciality = '$_POST[spcl]'";
        $str = "<option value='not selected'>Select Doctor</option>";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            $str .= "<option value='{$row['name']}'>{$row['name']}</option>";
        }
    }
    
    echo $str;
?>