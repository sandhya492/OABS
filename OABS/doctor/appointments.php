<?php 
  session_start();
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
</head>

<body>
  <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Patient Name</th>
        <th scope="col">Age</th>
        <th scope="col">Mobile No</th>
        <th scope="col">Email ID</th>
        <th scope="col">Appointment Time</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        include('../includes/connection.php');
        $today = date('y-m-d');
        $query = "select * from appointments where doctor = '$_SESSION[name]' and date = '$today'";
        $query_run = mysqli_query($connection,$query);
        $sno = 1;
        while($row = mysqli_fetch_assoc($query_run)){
            ?>
            <tr>
                <th scope="row"><?php echo $sno; ?></th>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['appointment']; ?></td>
                <td><a class="btn btn-sm btn-danger" href="delete_appointment.php?aid=<?php echo $row['id']; ?>">Delete</a></td>
            </tr>
            <?php
            $sno++;
        }
    ?>
    </tbody>
  </table>
</body>

</html>