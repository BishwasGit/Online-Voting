<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: ../");
    }
   
    
?>

<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <scrip src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <title>Online voting system -Party Registratrion</title>
        <marquee behavior="slide" direction="right" style="background-color:  #3498db;">Please Vote The Right Candidate....Please Vote The Right Candidate....Please Vote The Right Candidate....Please Vote The Right Candidate....Please Vote The Right Candidate....</marquee>

        <!--  <link rel="stylesheet" href="../css/stylesheet.css"> -->
        <link rel="stylesheet" href="../css/style.css">


</head>

<a href="./adminboard.php"><button id="back"> Back</button></a>
<script src='https://www.google.com/recaptcha/api.js'></script><br><br><br>

<body>


    <center>
        <div class="login-box1">
            <form action="../api/party.php" id="form3" method="POST" enctype="multipart/form-data">
                <h3>Party-Registration</h3>

                <div>
                    <label> <input type="text" name="name" placeholder="Party-Name" required><br>

                    </label>&nbsp;
                    <label>
                        <input type="number" name="mob" id="mob" placeholder="Mobile" required>
                        <p class="mob-error text-danger"></p>
                    </label>
                </div>

                <div>

                    <label>
                        <input type="password" name="pass" id="pass" placeholder="Password" required>
                        <p class="pass-error text-danger"></p>
                    </label>&nbsp;
                    <label>
                        <input type="password" id="cpass" name="cpass" placeholder="Confirm Password" required class="eye">

                        <i class="far fa-eye" id="togglepasss" style="margin-left: -30px; cursor: pointer;"></i></label>
                </div>
                <div>
                    <label>
                        <input type="date"  name="est" placeholder="Established-Date" required><br><br>

                    </label>
                </div>




                <div style="width: 100%">
                    Upload image:<br> <input type="file" id="upload1" name="image" required>
                </div>
                <br>


                <div class="g-recaptcha" data-sitekey="6LflOtYjAAAAAA5h9Q4b0uxir84QAUkk45w1uQBA"></div>
                <p class="captacha-error text-danger"></p><br>
                <button id="loginbtn1" type="submit" name="registerbtn">Register</button><br><br>

            </form>
        </div>
    </center>
    <script>
        const togglePassword = document.querySelector('#togglepasss');
        const password = document.querySelector('.eye');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <!-- Login Js file -->
    <script src="../assets/js/party.js"></script>

</body>

</html>