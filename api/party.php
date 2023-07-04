<?php
include("connection.php");

$name = $_POST['name'];
$mobile = $_POST['mob'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
$est = $_POST['est'];
$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];


if (strlen($mobile) != 10 || !startsWith($mobile, "98")  || !startsWith($mobile, "96")  || !startsWith($mobile, "97")) {
    echo "<script>
    alert('Mobile number must start with \"98\96\97\" and be 10 digits long');
    window.location.href = '../routes/party.php';
    </script>";
    return;
}

$namePattern = '/^[A-Z a-z]+$/';
if (!preg_match($namePattern, $name)) {
    echo '<script>
    alert("Only letters are allowed in the name field");
    window.location.href = "../routes/register.php";
    throw new Error("Invalid name");
    </script>';
    return;
}

if ($cpass != $pass) {
    echo '<script>
                alert("Passwords do not match!");
                window.location = "../routes/party.php";
            </script>';
} elseif ($est > date('Y-m-d')) {
    echo '<script>
                alert("Invalid date! Please select a date not beyond today.");
                window.location = "../routes/party.php";
            </script>';
} else {
    move_uploaded_file($tmp_name, "../uploads/$image");
    $insert = mysqli_query($connect, "INSERT INTO party (name, mobile, pass, est, photo) VALUES('$name', '$mobile', '$pass', '$est','$image') ");
    if ($insert) {
        echo '<script>
                    alert("Registration successful!");
                    window.location = "../";
                </script>';
    } else {
        echo '<script>
                    alert("Registration failed. Please try again.");
                    window.location = "../routes/party.php";
                </script>';
    }
}
?>

<html>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<!-- Register Js file -->
<script src="../assets/js/party.js"></script>

</html>
