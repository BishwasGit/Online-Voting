<?php
include '../api/connection.php';
$servername = "localhost";
$username = "root";
$password = "";
$database = "evms";
$connect = mysqli_connect($servername, $username, $password, $database);

if (isset($_POST['updatevoter'])) {
   $id = $_POST['id'];
   $name = $_POST['name'];
   $mobile = $_POST['mob'];
   $add = $_POST['add'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $pass = $_POST['pass'];
   $cpass = $_POST['cpass'];
  
   mysqli_query($connect, "UPDATE user SET name='$name', mobile='$mobile', address='$add', age='$age', gender='$gender', password='$pass' WHERE id=$id");
   
   if(mysqli_affected_rows($connect) > 0){
       header('location: ./admin.php');
   } else {
       echo "Error updating record: " . mysqli_error($connect);
   }
}
?>
