<?php
require '../vendor/autoload.php'; // Include PHPMailer

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

include("connection.php");

// Configure PHPMailer
$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = '06eb06875d0299';
$phpmailer->Password = 'a94051fc282be0';

// Retrieve user data from the form
$name = $_POST['name'];
$mobile = $_POST['mob'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
$add = $_POST['add'];
$age = $_POST['age'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

// Validate the mobile number
function startsWith($string, $startString)
{
    $len = strlen($startString);
    return substr($string, 0, $len) === $startString;
}

if (strlen($mobile) != 10 || (!startsWith($mobile, "98") && !startsWith($mobile, "96") && !startsWith($mobile, "97"))) {
    echo "<script>
    alert('Mobile number must start with \"98\", \"96\", or \"97\" and be 10 digits long');
    window.location.href = '../routes/register.php';
    </script>";
    exit();
}

// Check for duplicate mobile number
$duplicateMobile = mysqli_query($connect, "SELECT * FROM user WHERE mobile = $mobile");

if (mysqli_num_rows($duplicateMobile) > 0) {
    echo "<script>
    alert('Mobile number has already been taken');
    window.location.href = '../routes/register.php';
    </script>";
    exit();
}

// Validate the age
if ($age < 18 || $age > 110) {
    echo "<script>
    alert('You are not eligible for voting due to your age');
    window.location.href = '../routes/register.php';
    </script>";
    exit();
}

// Validate the email address
$emailPattern = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';

if (!preg_match($emailPattern, $email)) {
    echo '<script>
    alert("Invalid email address");
    window.location.href = "../routes/register.php";
    </script>';
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

// Validate the name field
$namePattern = '/^[A-Z a-z]+$/';
if (!preg_match($namePattern, $name)) {
    echo '<script>
    alert("Only letters are allowed in the name field");
    window.location.href = "../routes/register.php";
    </script>';
    exit();
}

// Validate password match
if ($cpass != $pass) {
    echo '<script>
    alert("Passwords do not match!");
    window.location.href = "../routes/register.php";
    </script>';
    exit();
}

// Validate file upload
$allowedExtensions = ['jpg', 'jpeg', 'png'];
$fileExtension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

if (!in_array($fileExtension, $allowedExtensions)) {
    echo '<script>
    alert("Invalid file format! Only JPG, JPEG, and PNG files are allowed.");
    window.location = "../routes/adminregister.php";
    </script>';
    exit();
}

// Generate OTP
$otp = mt_rand(100000, 999999);

// Set the sender and recipient
$phpmailer->setFrom('from@example.com', 'Sender Name');
$phpmailer->addAddress($email, $name);

// Set email content
$phpmailer->Subject = 'OTP Verification';
$phpmailer->Body = 'Your OTP for registration is: ' . $otp;

// Send the email
if (!$phpmailer->send()) {
    echo '<script>
    alert("Failed to send OTP email. Please try again later.");
    window.location.href = "../routes/register.php";
    </script>';
    exit();
}

// Store the user data and OTP in the session
session_start();
$_SESSION['name'] = $name;
$_SESSION['mobile'] = $mobile;
$_SESSION['pass'] = $pass;
$_SESSION['cpass'] = $cpass;
$_SESSION['add'] = $add;
$_SESSION['age'] = $age;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['image'] = $image;
$_SESSION['otp'] = $otp;

// Redirect to the OTP verification page
header('Location: verify_otp.php');
exit();
?>
