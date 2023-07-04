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
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <title>Admin - Login</title>
    <marquee direction="right" style="background-color:  #3498db;">Please Vote The Right Candidate....Please Vote The Right Candidate....Please Vote The Right Candidate....Please Vote The Right Candidate....Please Vote The Right Candidate....</marquee>
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="stylesheet" href="../style.css">
</head>
<script src='https://www.google.com/recaptcha/api.js'></script>

<body style="background-color: white;">
    <div class="header" style="display: flex; justify-content: space-between;flex-direction:row-reverse;">
        <div class="header-right" style="padding-top:8px;">
            <a class="active" href="../">Back</a>
            
        </div>
    </div>


    <center><br>
        <div id="loginSection" class="login-box">
            <form action="../api/login1.php" id="form1" method="POST">

                <h3><b>Admin Login</b></h3><br>
                <div>
                    <input type="text" class="input" id="name" name="name" placeholder="Enter name" required><br>
                    <p class="mob-error text-danger"></p>

                    <input type="password" class="input" style="width:98%" id="pass" name="pass" placeholder="Enter password" required id="id_password">
                    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                </div>
                <p class="pass-error text-danger"></p>
                <br>


                <div class="g-recaptcha" data-sitekey="6LflOtYjAAAAAA5h9Q4b0uxir84QAUkk45w1uQBA"></div>
                <br>
                <p class="captacha-error text-danger"></p>

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

              <!--  New user? <a href="routes/register.php" style="color: #03e9f4;">Register here</a>
                <br>
                <a href="routes/election.php" style="color: red; font-weight: bold; font-size: 21px;"> Election Result </a>
                -->



            </form>
        </div>

    </center> <br>

    <footer id="foot">
        <center>&copy; Copyright Government of Nepal, National Information Technology Center(NITC).</center>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <!-- Login Js file -->
    <script src="./assets/js/login.js"></script>
</body>

</html>