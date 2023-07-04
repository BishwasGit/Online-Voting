<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Online voting system - Registratrion</title>
    <marquee direction="right" style="background-color:  #3498db;">Please Vote The Right Candidate....Please Vote The Right Candidate....Please Vote The Right Candidate....Please Vote The Right Candidate....Please Vote The Right Candidate....</marquee>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/style.css">



</head>
<style>
    form i {
        margin-left: -30px;
        cursor: pointer;
    }
</style>

<body>
    <div class="container mt-5 pt-5">
        <form action="../api/register.php" class="p-1" id="form2" method="POST" enctype="multipart/form-data">
            <div class="row p-2 jumbotron box8">
                <div class="col-sm-12 mb-4">
                    <h2 class="text-center text-secondary">Registration</h2>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="name-f">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name-f" placeholder="Enter your full name." required>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="mob">Mobile Number</label>
                    <input type="tel" name="mob" class="form-control" id="mob" placeholder="Enter Your Contact Number." required>
                </div>

                <div class="col-sm-6 form-group">
                    <label for="Date">Date Of Birth</label>
                    <input type="Date" name="dob" class="form-control" id="Date" placeholder="" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="add">Address</label>
                    <input type="tel" name="add" class="form-control" id="add" placeholder="Enter Your Address." required>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="sex">Gender</label>
                    <select id="sex" class="form-control browser-default custom-select">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="unspesified">Unspecified</option>
                    </select>
                </div>

                <div class="col-sm-6 form-group">
                    <label for="pass">Password</label>
                    <div class="d-flex align-items-center">
                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter your password." required>
                        <i class="far fa-eye" id="togglePassword" style="cursor: pointer"></i>
                    </div>

                </div>
                <div class="col-sm-6 form-group">
                    <label for="cpass">Confirm Password</label>
                    <div class="d-flex align-items-center">
                        <input type="password" name="cpass" class="form-control" id="cpass" placeholder="Re-enter your password." required>
                        <i class="far fa-eye" id="ctogglePassword" style="cursor: pointer"></i>
                    </div>
                </div>

                <div class="col-sm-12 form-group text-end  mb-0">
                    <button class="btn btn-primary">Register Now</button>
                </div>

            </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="../assets/js/register.js"></script>

</html>