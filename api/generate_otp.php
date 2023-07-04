<?php
//include("connection.php");

function generateOTP($length = 6) {
    $otp = "";
    $digits = "0123456789";

    for ($i = 0; $i < $length; $i++) {
        $otp .= $digits[rand(0, strlen($digits) - 1)];
    }

    return $otp;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    // Retrieve the user's email from the login form
    $userEmail = $_POST['email'];

    // Generate a new OTP code
    $otpCode = generateOTP();

    // Store the OTP code and user data in the session
    session_start();
    $_SESSION['otp'] = $otpCode;
    $_SESSION['email'] = $userEmail;
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['mobile'] = $_POST['mob'];
    $_SESSION['pass'] = $_POST['pass'];
    $_SESSION['cpass'] = $_POST['cpass'];
    $_SESSION['add'] = $_POST['add'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['image'] = $_FILES['image']['name'];

    // Send the OTP code to the user's email address
    $subject = "Email Verification";
    $message = "Your verification code is: " . $otpCode;
    $headers = "From: YourWebsite <noreply@yourwebsite.com>";
    mail($userEmail, $subject, $message, $headers);

    // Redirect to the OTP verification page
    header("Location: verify_otp.php");
    exit();
}
?>
