<?php
include '../api/connection.php';


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobile = $_POST['mob'];
    $pass = $_POST['pass'];
    $est = $_POST['est'];

    $query = "UPDATE party SET name='$name', mobile='$mobile', pass='$pass', est='$est' WHERE id=$id";
    $result = mysqli_query($connect, $query);
    
    if ($result) {
        // Success
        header('location: ./adminboard1.php');
    } else {
        // Error
        echo "Error updating record: " . mysqli_error($connect);
    }
}
?>
