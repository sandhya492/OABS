<!DOCTYPE html>
<body>
<div class="row">
    <div class="col-md-4 m-auto">
    <h5 class="text-center mt-3">Add Doctor Here!</h5>
    <form action="" method="POST">
        <div class="form-group m-3">
            <input type="text" class="form-control" name="name" placeholder="Doctor's Name" required>
        </div>
        <div class="form-group m-3">
            <select name="speciality" class="form-control" required>
                <option value="not selected">-Select speciality-</option>
                <?php 
                    include('../includes/connection.php');
                    $query = "select speciality from specialities";
                    $query_run = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                            <option value="<?php echo $row['speciality'];?>"><?php echo $row['speciality'];?></option>
                        <?php 
                    }
                ?>
            </select>
        </div>
        <div class="form-group m-3">
            <input type="email" class="form-control" name="email" placeholder="Enter Email ID" required>
        </div>
        <div class="form-group m-3">
            <input type="text" class="form-control" name="mobile" placeholder="Mobile No." required>
        </div>
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary" value="Add doctor" name="add_doctor">
        </div>
    </form>
    </div>
</div>
</body>
</html>