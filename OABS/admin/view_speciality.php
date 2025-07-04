<html>
    <body>
    <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Speciality Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        include('../includes/connection.php');
        $query = "select * from specialities";
        $query_run = mysqli_query($connection,$query);
        $sno = 1;
        while($row = mysqli_fetch_assoc($query_run)){
            ?>
            <tr>
                <th scope="row"><?php echo $sno; ?></th>
                <td><?php echo $row['speciality']; ?></td>
                <td><a class="btn btn-sm btn-success" href="edit_speciality.php?sid=<?php echo $row['id'];?>">Edit</a> <a class="btn btn-sm btn-danger" href="delete_speciality.php?sid=<?php echo $row['id'];?>">Delete</a></td>
            </tr>
            <?php
            $sno++;
        }
    ?>
    </tbody>
  </table>
    </body>
</html>