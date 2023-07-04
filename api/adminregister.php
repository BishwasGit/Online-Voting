<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("connection.php");

if (isset($_POST['registerbtn'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mob'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $add = $_POST['add'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    function startsWith($string, $startString)
    {
        $len = strlen($startString);
        return substr($string, 0, $len) === $startString;
    }

    if (strlen($mobile) != 10 || !startsWith($mobile, "98")  || !startsWith($mobile, "96")  || !startsWith($mobile, "97")) {
        echo "<script>
        alert('Mobile number must start with \"98\96\97\" and be 10 digits long');
        window.location.href = '../routes/adminregister.php';
        </script>";
        return;
    }

    $duplicate = mysqli_query($connect, "SELECT * FROM admin WHERE mobile = '$mobile'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>
            alert('Mobile number has already been taken');
            window.location = '../routes/adminregister.php';
        </script>";
        return;
    }
    

    // JavaScript validation for name field
    $namePattern = '/^[A-Z a-z]+$/';
    if (!preg_match($namePattern, $name)) {
        echo '<script>
            alert("Only letters are allowed in the name field");
            window.location.href = "../routes/adminregister.php";
        </script>';
        return;
    }

    if ($age < 15 || $age > 110) {
        echo "<script>
            alert('You are not eligible for admin registration');
            window.location = '../';
        </script>";
        return;
    }

    if ($cpass != $pass) {
        echo '<script>
            alert("Passwords do not match!");
            window.location = "../routes/adminregister.php";
        </script>';
        return;
    }

    // Validate file upload
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        echo '<script>
            alert("Invalid file format! Only JPG, JPEG, and PNG files are allowed.");
            window.location = "../routes/adminregister.php";
        </script>';
        return;
    }

    $maxFileSize = 5 * 1024 * 1024; // 5MB
    if ($_FILES['image']['size'] > $maxFileSize) {
        echo '<script>
            alert("File size exceeds the limit of 5MB.");
            window.location = "../routes/adminregister.php";
        </script>';
        return;
    }

    // Move the uploaded file to the destination folder
    $uploadDir = "../uploads/";
    $destination = $uploadDir . $image;

    if (!move_uploaded_file($tmp_name, $destination)) {
        echo '<script>
            alert("Failed to upload image. Please try again.");
            window.location = "../routes/adminregister.php";
        </script>';
        return;
    }

    $hashedPass = password_hash($pass, PASSWORD_ARGON2I);
    $insert = mysqli_query($connect, "INSERT INTO admin (name, mobile, password, address, age, gender, photo, status, votes, role) VALUES('$name', '$mobile', '$hashedPass', '$add', '$age', '$gender', '$image', 0, 0, 0)");

    if ($insert) {
        echo '<script>
            alert("Registration successful!");
            window.location = "../routes/adminregister.php";
        </script>';
    } else {
        echo '<script>
            alert("Registration failed. Please try again.");
            window.location = "../routes/adminregister.php";
        </script>';
    }
}
?>
