<?php include("header.php"); ?>
<?php include("db_connect.php"); ?>
<div class="box1">
    <h3 class="float-start">All Students</h3>
    <button class="btn btn-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Students</button>
</div>
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr class="table-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Phone No</th>
            <th>Email Id</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query = "select * from `student_details`";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed" . mysqli_error());
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <th>
                        <?php echo $row["id"]; ?>
                    </th>
                    <td>
                        <?php echo $row["name"]; ?>
                    </td>
                    <td>
                        <?php echo $row["age"]; ?>
                    </td>
                    <td>
                        <?php echo $row["phone_no"]; ?>
                    </td>
                    <td>
                        <?php echo $row["email_id"]; ?>
                    </td>
                    <td><a href="update_page_1.php?id=<?php echo $row["id"]; ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php

            }
        }

        ?>
    </tbody>
</table>
<?php
if (isset($_GET['message'])) {
    echo "<h6 class='text-danger text-center'>" . $_GET['message'] . "</h6>";
}
?>
<?php
if (isset($_GET['insert_msg'])) {
    echo "<h6 class='text-success text-center'>" . $_GET['insert_msg'] . "</h6>";
}
?>
<?php
if (isset($_GET['update_msg'])) {
    echo "<h6 class='text-success text-center'>" . $_GET['update_msg'] . "</h6>";
}
?>
<?php
if (isset($_GET['delete_msg'])) {
    echo "<h6 class='text-success text-center'>" . $_GET['delete_msg'] . "</h6>";
}
?>
<!-- Modal -->
<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD STUDENTS</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" name="age">
                    </div>
                    <div class="form-group">
                        <label for="phone_no">Phone No.</label>
                        <input type="number" class="form-control" name="phone_no">
                    </div>
                    <div class="form-group">
                        <label for="email_id">Email Id</label>
                        <input type="text" class="form-control" name="email_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="add_students" value="Add">
                </div>
            </div>
        </div>
    </div>
</form>
<?php include("footer.php"); ?>