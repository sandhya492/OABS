<?php 
  if(isset($_POST['book_appointment'])){
    include('includes/connection.php');
    $query1 = "select * from appointments where doctor = '$_POST[doctor]' and date = '$_POST[date]' and time = '$_POST[time]'";
    $query_run1 = mysqli_query($connection,$query1);
    $noa = mysqli_num_rows($query_run1);
    $time1 = [0,10,20,30,40,50,60,70,80,90,100,110,120,130,140,150,160,170,180];
    $time2 = [0,10,20,30,40,50,60,70,80,90,100,110,120,130,140,150,160,170,180];
    $msg = "";
    $app = "";
    $time = [];
    $curr_h = 0;
    $curr_m = 0;

    if($_POST['time'] === 'morning'){
      $time = $time1;
      $curr_h = 10;
      $curr_m = 0;
    }
    else{
      $time = $time2;
      $curr_h = 13;
      $curr_m = 0;
    }
    if($noa >= count($time)){
      echo "<script type='text/javascript'>
                alert('Appointment Not available for today');
              window.location.href = 'index.php';  
            </script>";
    }
    else{
      date_default_timezone_set("Asia/Kolkata");
      $wait_time = $time[$noa];

      $wait_hour = intdiv($wait_time,60);
      $wait_min = $wait_time % 60;

      $app_hour = $curr_h + $wait_hour;
      $app_min = $curr_m + $wait_min;

      if($app_min > 60){
        $app_hour = $app_hour + intdiv($app_min,60);
        $app_min = $app_min % 60;
      }
      $msg = $msg . " Appointment Booked for: " . $_POST['date'] . "/" . $app_hour . " : " . $app_min;
      $app = $app_hour . ":" . $app_min;
      $query = "insert into appointments values(null,'$_POST[name]',$_POST[age],'$_POST[email]',$_POST[mobile],'$_POST[date]','$_POST[time]','$_POST[speciality]','$_POST[doctor]','$app')";
      $query_run = mysqli_query($connection,$query);
      if($query_run){
        echo "<script type='text/javascript'>
                alert('$msg');
              window.location.href = 'index.php';  
            </script>";
      }
      else{
        echo "<script type='text/javascript'>
                alert('Error...please try again.');
              window.location.href = 'index.php';  
            </script>";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment Booking System</title>
  <!-- External CSS File -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Bootstrap Files -->
  <link rel="stylesheet" href="bootstrap-5/css/bootstrap.min.css">
  <script src="bootstrap-5/js/bootstrap.min.js"></script>
  <style>
    body{
      background-color:whitesmoke;
    }
    .card {
      background-color:#D8D9DA;
      color: black;
      padding: 15px;
      height:20vh;
      margin-bottom: 25px;
      border-radius: 15px;
      text-align:center;
      border-left-color:blue;

    }
  </style>
</head>

<body>
  <div class="container-fluid header">
    <h2>Online Appointment Booking System</h2>
  </div>
  <div class="container-fluid">
    <marquee class="mt-3"><b>This is an Online Appointment Booking System Project mainly for doctor and patient, where a
        patient can book his or her appointment before visiting the Hospitals.</b></marquee>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 m-auto">
        <hr>
        <h4 class="mt-3 pb-3 text-center">Book Your Appointment Here!</h4>
        <form action="" method="POST">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Patient Name" name="name" required>
            </div>
            <div class="col">
              <input type="number" class="form-control" placeholder="Patient Age" name="age" required>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <input type="email" class="form-control" placeholder="Email ID" name="email" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Mobile No" name="mobile" required>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <input type="date" class="form-control" placeholder="Select Date" name="date" required>
            </div>
            <div class="col">
            <select class="form-control" name="time" required>
                <option value="not selected">Select Time</option>
                <option value="morning">Morning</option>
                <option value="evening">Evening</option>
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <select class="form-control" name="speciality" id="speciality" required>
                <option value="not selected">Select Speciality</option>
              </select>
            </div>
            <div class="col">
              <select class="form-control" name="doctor" id="doctor" required>
                <option value="not selected">Select Doctor</option>
              </select>
            </div>
            <div class="row mt-3 mb-5">
              <div class="col-md-3 m-auto">
                <input type="submit" class="btn btn-success mt-3" value="Book Appointment" name="book_appointment">
              </div>
            </div>
          </div>
      </div>
    </div>
    </form>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Our Address:</h5>
            <p class="card-text">F-985 Vivek Vihar Coloney, Near New Bus Stand, Kolkata.</p>
          </div>
        </div>
      </div>

      <div class="col-lg">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Phone No:</h5>
            <p class="card-text">1800-7854-9635</p>
          </div>
        </div>
      </div>


      <div class="col-lg">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Email:</h5>
            <p class="card-text">bookonlineappointment@gmail.com</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript" src="includes/jquery_latest.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    function loadData(type,spcl){
      $.ajax({
        url: "load-doctor.php",
        type: "POST",
        data: {type: type, spcl:spcl},
        success: function(data){
          if(type == "doctorData"){
            $("#doctor").html(data);
          }else{
            $("#speciality").append(data);
          }
        }
      });
    }
    loadData();
    $("#speciality").on("change",function(){
      var spcl = $("#speciality").val();
      loadData("doctorData",spcl);
    });
  });

</script>
</html>