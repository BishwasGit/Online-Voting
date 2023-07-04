<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("connection.php");

if (isset($_POST['registerBtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
   

    function startsWith($string, $startString)
    {
        $len = strlen($startString);
        return substr($string, 0, $len) === $startString;
    }

    $emailPattern = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';

    if (!preg_match($emailPattern, $email)) {
        echo '<script>
        alert("Invalid email address");
        window.location.href = "../routes/register.php";
        </script>';
        return;
    }

    $duplicate = mysqli_query($connect, "SELECT * FROM pre WHERE email = '$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>
            alert('email has already added');
            window.location = '../routes/verification.php';
        </script>";
        return;
    }

    // JavaScript validation for name field
    $namePattern = '/^[A-Z a-z]+$/';
    if (!preg_match($namePattern, $name)) {
        echo '<script>
            alert("Only letters are allowed in the name field");
            window.location.href = "../routes/verification.php";
        </script>';
        return;
    }

    $insert = mysqli_query($connect, "INSERT INTO pre (name, email) VALUES('$name', '$email')");

    if ($insert) {
        echo '<script>
            alert("Registration successful!");
            window.location = "../routes/verification.php";
        </script>';
    } else {
        echo '<script>
            alert("Registration failed. Please try again.");
            window.location = "../routes/verification.php";
        </script>';
    }
}
?>
