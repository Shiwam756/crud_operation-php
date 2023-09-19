<?php include("db_connect.php"); ?>

<?php

if (isset($_POST['add_students'])) {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone_no = $_POST['phone_no'];
    $email_id = $_POST['email_id'];

    if ($name == "" || empty($name)) {
        header('location:index.php?message=Please fill the Name');
    } else if ($age == "" || empty($age)) {
        header('location:index.php?message=Please fill the Age');
    } else if ($phone_no == "" || empty($phone_no)) {
        header('location:index.php?message=Please fill the Phone No.');
    } else if ($email_id == "" || empty($email_id)) {
        header('location:index.php?message=Please fill the Email Id');
    } else {
        $query = "insert into `student_details` (`name`, `age`, `phone_no`, `email_id`) values ('$name', '$age', '$phone_no', '$email_id')";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query Failed" . mysqli_error());
        } else {
            header('location:index.php?insert_msg=Your data has been added successfully!');
        }


    }

}
?>