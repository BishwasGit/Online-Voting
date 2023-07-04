<?php
session_start();

// Check if the OTP form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (strtolower($_POST['otp']) === strtolower($_SESSION['otp'])){
        // OTP is valid, register the user
        $name = $_SESSION['name'];
        $mobile = $_SESSION['mobile'];
        $pass = $_SESSION['pass'];
        $cpass = $_SESSION['cpass'];
        $add = $_SESSION['add'];
        $age = $_SESSION['age'];
        $email = $_SESSION['email'];
        $gender = $_SESSION['gender'];
        $image = $_SESSION['image'];
        // Perform the registration process and save the user data in the database
        include("connection.php");
        // Check for duplicate mobile number
        $duplicateMobile = mysqli_query($connect, "SELECT * FROM user WHERE mobile = $mobile");
        if (mysqli_num_rows($duplicateMobile) > 0) {
            echo "<script>
            alert('Mobile number has already been taken');
            window.location.href = '../routes/register.php';
            </script>";
            exit();
        }
        // Check for duplicate email in the user table
        $sameEmail = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email'");
        if (mysqli_num_rows($sameEmail) > 0) {
            echo "<script>
            alert('Email ID has already been used');
            window.location.href = '../routes/register.php';
            </script>";
            exit();
        }
        // Insert user data into the user table
        $insertUser = mysqli_query($connect, "INSERT INTO user (name, mobile, password, address, age, email, gender, photo) VALUES ('$name', '$mobile', '$pass', '$add', '$age', '$email', '$gender', '$image')");
        if ($insertUser) {
            session_unset();
            echo "<script>
            alert('Registration successful');
            window.location.href = '../index.php';
            </script>";
            exit();
        } else {
            echo "<script>
            alert('Failed to register user');
            window.location.href = '../routes/register.php';
            </script>";
            exit();
        }        
    } else {
        // Invalid OTP, show error message
        $error = "Invalid OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
</head>
<body>
    <?php     
        echo $_SESSION['otp'].'<br>';
        echo $_POST['otp'];
        ?>
    <h1>OTP Verification</h1>
    <form method="POST" action="">
        <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
        <p>Please enter the OTP sent to your email:</p>
        <input type="text" name="otp" placeholder="OTP" required>
        <br><br>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
