<?php include("db_connect.php"); ?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "delete from `student_details` where `id` = '$id'";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Qoery Failed" . mysqli_error());
    } else {
        header("location:index.php?delete_msg=You have deleted the data successfully.");
    }
}

?>