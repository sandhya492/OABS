<?php 
  session_start();
  if(isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment Booking System</title>
  <!-- External CSS File -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- Bootstrap Files -->
  <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
  <script src="../bootstrap-5/js/bootstrap.min.js"></script>
  <!-- jQuery Files -->
  <script src="../includes/jquery_latest.js"></script>
  <!-- Internal CSS -->
  <style>
    nav ul {
      display: flex;
      justify-content: center;
    }

    nav ul li {
      list-style-type: none;
      margin: 15px;
    }

    nav ul li a {
      text-decoration: none;
      font-size: 1.2rem;
    }
  </style>

</head>

<body>
  <div class="container-fluid header">
    <h2>Online Appointment Booking System</h2>
  </div>

  <div class="container text-center mt-3">
    <h5>Doctor Name: <?php echo $_SESSION['name'];?></h5>
  </div>
  <hr>
  <div class="container-fluid">
    <nav>
      <ul>
        <li><a class="btn btn-primary" href="dashboard.php">Dashboard</a></li>
        <li><a class="btn btn-success" id="view_appointments">View Appointments</a></li>
        <li><a class="btn btn-warning" href="edit_profile.php">Edit Profile</a></li>
        <li><a  class="btn btn-danger" href="../logout.php">Logout</a></li>
      </ul>
    </nav>
  </div>
  <hr>

  <div class="container" id="main_container">
  <h3>Welcome to Doctor dashboard Page!</h3><hr>
      <h5>Doctor can perform the following operations -</h5>
      <dl>
        <dt>1. Check Appointments</dt>
        <dd>Doctor can view all the appointments for the day and he can also delete any appointments.</dd>
        <dt>2. Edit Profile</dt>
        <dd>Doctor can edit his/her profile.</dd>
        <dt>3. Logout</dt>
        <dd>Admin can logout himself from the admin panel.</dd>
      </dl>
  </div>

  <!-- jQuery -->
  <script type="text/javascript">
    $(document).ready(function(){
      $("#view_appointments").click(function(){
        $("#main_container").load("appointments.php");
        });
    });
  </script>

</body>

</html>
<?php
    }
    else{
        header('Location:login.php');
    }
?>