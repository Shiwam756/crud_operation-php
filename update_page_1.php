<?php include("header.php"); ?>
<?php include("db_connect.php"); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "select * from `student_details` where `id` = '$id'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error());
    } else {
        $row = mysqli_fetch_assoc($result);
        //    print_r($row);
    }
}
?>

<?php
if (isset($_POST['update_students'])) {

    if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone_no = $_POST['phone_no'];
    $email_id = $_POST['email_id'];

    $query = "update `student_details` set `name` = '$name', `age` = '$age', `phone_no` = '$phone_no', `email_id` = '$email_id' where `id` = '$idnew'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error());
    } else {
        header('location:index.php?update_msg=You have successfully updated the data.');
    }

}
?>

<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control mb-4" name="name" value="<?php echo $row['name']; ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control mb-4" name="age" value="<?php echo $row['age']; ?>">
    </div>
    <div class="form-group">
        <label for="phone_no">Phone No.</label>
        <input type="number" class="form-control mb-4" name="phone_no" value="<?php echo $row['phone_no']; ?>">
    </div>
    <div class="form-group">
        <label for="email_id">Email Id</label>
        <input type="text" class="form-control mb-4" name="email_id" value="<?php echo $row['email_id']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="update_students" value="Update">
</form>

<?php include("footer.php"); ?>