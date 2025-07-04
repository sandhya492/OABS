<?php
    session_start();
    if(isset($_POST['login'])){
        include('../includes/connection.php');
        $query = "select email,password,name from admins where email = '$_POST[email]' AND password = '$_POST[password]'";
        $query_run = mysqli_query($connection,$query);
        if(mysqli_num_rows($query_run)){
            $_SESSION['email'] = $_POST['email'];
            while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['name'] = $row['name'];
                // $_SESSION['uid'] = $row['id'];
            }
            echo "<script type='text/javascript'>
              window.location.href = 'admin_dashboard.php';
            </script>";
        }
        else{
          echo "<script type='text/javascript'>
              alert('Please enter correct email and password.');
              window.location.href = 'login.php';
          </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
                <h5 class="text-center mb-3 bg-secondary p-1 text-white">Admin Login Page!</h5>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Enter email ID" required>
                </div><br>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div><br>
                <input type="submit" class="btn btn-primary" value="Login" name="login">
            </form>
            </div>
        </div>
    </div>
</body>
</html>