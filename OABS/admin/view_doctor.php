<html>
    <body>
    <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">Speciality</th>
        <th scope="col">Email ID</th>
        <th scope="col">Mobile No.</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        include('../includes/connection.php');
        $query = "select * from doctors";
        $query_run = mysqli_query($connection,$query);
        $sno = 1;
        while($row = mysqli_fetch_assoc($query_run)){
            ?>
            <tr>
                <th scope="row"><?php echo $sno; ?></th>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['speciality']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><a class="btn btn-sm btn-success" href="edit_doctor.php?did=<?php echo $row['id'];?>">Edit</a> <a class="btn btn-sm btn-danger" href="delete_doctor.php?did=<?php echo $row['id'];?>">Delete</a></td>
            </tr>
            <?php
            $sno++;
        }
    ?>
    </tbody>
  </table>
    </body>
</html>