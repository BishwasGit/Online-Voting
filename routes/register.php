<html>

<head>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <title>Online voting system - Registratrion</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div style="display: flex; justify-content: space-between;flex-direction:row-reverse;">
    <div>Already user?<a href="../" class="style">Login here</a></div>
</div>

<body>
    <center>
        <div class="container login-box1 p-3">
            <form action="../api/register.php" class="was-validated" id="form2" method="POST" enctype="multipart/form-data">
                <h3>Registration Form</h3>
                    <div class="col-lg-6 py-1 px-0">
                        <input type="text" name="name" placeholder="Full Name" class="form-input form-control" required>
                    </div>
                    <div class="col-lg-6 py-1 px-0">
                        <input type="number" name="mob" id="mob" placeholder="Mobile Number" class="form-input form-control" required>
                        <span class="mob-error text-danger d-inline-block"></span>
                    </div>
                    <div class="col-lg-6 py-1 px-0">
                    <div class="input-group mb-3">
                    <input placeholder="Password" class="form-input form-control" type="password" name="pass" id="pass" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">Show password</button>
                        </div>
                    </div>
                    <div class="col-lg-6 py-1 px-0">
                        <div class="input-group mb-3">
                        <input placeholder="Confirm Password" class="form-input form-control" type="password" name="cpass" id="cpass" required>
                        <button class="btn btn-outline-secondary" type="button" id="ctogglePassword">Show password</button>
                        </div>
                    </div>
                    <div class="col-lg-6 py-1 px-0">
                        <input type="text" id="add" name="add" placeholder=" Address"  class="form-input form-control"required>
                        <span class="add-error text-danger d-inline-block"></span>
                    </div>
                    <div class="col-lg-6 py-1 px-0">
                        <input type="number" id="age" name="age" placeholder="Enter age" class="form-input form-control" required>
                        <span class="age-error text-danger d-inline-block"></span>
                    </div>
                <div class="col-lg-6 py-1 px-0">
                        <input type="email" name="email" id="email" placeholder="email" class="form-input form-control" required>
                        <span class="mob-error text-danger d-inline-block"></span>
                    </div>
                <div class="col-lg-6 pt-2">
                    Select your gender:
                    <select class="form-select" aria-label="Default select example" name="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">LGBTQIA+</option>
                    </select>
                </div><br>
                <div class="col-lg-12">
                    Upload image:<br> <input type="file" name="image" class="form-control" required>
                </div><br>
                <button type="submit" name="registerbtn" class="btn btn-danger p-3">Register</button><br><br>
            </form>
        </div>
    </center>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <!-- Login Js file -->
    <script src="../assets/js/register.js"></script>

</body>

</html>