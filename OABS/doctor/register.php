<?php
if(isset($_POST['register'])){
    include('../includes/connection.php');
    $query = "update doctors set password = '$_POST[password]' where email = '$_POST[email]'";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
              alert('Registered successfully...');
            window.location.href = 'login.php';  
          </script>";
    }
    else{
        echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
              window.location.href = 'register.php';
          </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Register</title>
    <!-- External CSS File -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Bootstrap Files -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid header">
        <h2>Online Appointment Booking System</h2>
    </div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4 m-auto mt-3">
                <h5 class="text-center mb-3 bg-secondary p-1 text-white">Doctor's Register Page!</h5>
                <!-- <p class="text-center p-1 text-danger">Note - Your Email ID will be the Login ID</p> -->
                <span class="text-center p-1 text-danger" id="text"></span>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email ID" required>
                </div><br>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Set Your Password" required>
                </div><br>
                <input type="submit" class="btn btn-primary" value="Set Password" name="register" id="register_button">
                <span>Already registered? </span><a href="login.php">Login here</a>
            </form>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="../includes/jquery_latest.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#email").blur(function(){
      var email = $(this).val();
      if(email == ""){
        $("#text").fadeOut();
      }
      else{
        $.ajax({
        url: "check-email.php",
        type: "POST",
        data: {email:email},
        success: function(data){
            $("#text").fadeIn().html(data);
            if(data == "<b>Email doesn't exist.</b>"){
                $("#register_button").prop("disabled",true);
            }
            else{
                $("#register_button").prop("disabled",false);
            }
        }
      });
      }
    });
  });
</script>
</html>