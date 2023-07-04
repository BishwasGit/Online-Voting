<?php
session_start();

if (isset($_SESSION['wait_time'])) {
    $difference = time() - $_SESSION['wait_time'];
    if ($difference > 30) {
        unset($_SESSION['wait_time']);
        unset($_SESSION['login_attempt']);
    }
}

if (count($_POST) > 0) {
    if (empty($_POST['g-recaptcha-response'])) {
        echo "Please solve captcha";
    }
}



?>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Online voting system \- Home</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel='stylesheet' href="./assets/css/login.css"> -->
</head>
<script src='https://www.google.com/recaptcha/api.js'></script>

<body style="background-color: white; align-items:center;">
    <div class="header" style="display: flex; justify-content: space-between;flex-direction:row-reverse; ">
        <div class="header-right" style="padding-top:8px">
            <a class="active" href="#home">Home</a>
            <!--  <a href="routes/party.php">Party</a> -->
            <a href="routes/adminlogin2.php">Admin</a>
        </div>
    </div>
    <center><br>
        <div id="loginSection" class="login-box mb-5">
            <form action="api/login.php" id="form1" method="POST" class="form p-5 h-90">
                <h3><b>Login</b></h3><br>
                <div class="form-group">
                    <input type="number" class="form-input form-control" id="mob" name="mob" placeholder="Enter mobile" required><br>
                    <p class="mob-error text-danger"></p>
                    <input type="password" class="form-input form-control" id="pass" name="pass" placeholder="Enter password" required id="id_password">
                </div>
                <p class="pass-error text-danger"></p>
                <br>
                <?php
                if (isset($_SESSION['login_attempt']) && $_SESSION['login_attempt'] >= 3) {
                    echo "<p class='p-1 text-danger'> Please wait for 30 sec to login again!!! </p>";
                    $_SESSION['wait_time'] = time();
                } else {
                ?>
                    <button id="loginbtn" type="submit" class="btn btn-primary" name="loginbtn">Login</button>
                <?php } ?>
                <p class="text-danger">
                    <?php if (isset($_SESSION['error'])) {
                        $error = $_SESSION['error'];
                        echo $error;
                        unset($_SESSION['error']);
                    } ?></p>
                New user? <br>
                <a href="routes/register.php">Register here</a><br>
                <hr>
                <a href="routes/election.php" class="btn btn-sm btn-danger p-3"> View Election Result here</a>
            </form>
        </div>

    <footer id="foot" class="fixed-bottom p-3">
        <center>&copy; Copyright Government of Nepal, National Information Technology Center(NITC).</center>
    </footer>

   
                    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <!-- Login Js file -->
    <script src="./assets/js/login.js"></script>
</body>

</html>