<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: ../");
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px, 60px;
            background-color: #204969;
            color: white;
        }
        body {
            margin: 0px;
        }
        .header button {
            background-color: #f0f0f0;
            font-weight: 550;
            padding: 8px 12px;
            border: 2px solid black;
            border-radius: 5px;
            margin-right: 10px;
        }
        .page {
            padding: 20px;
        }
        .page h2 {
            margin-bottom: 20px;
        }
        .card {
            border: none;
            background-color: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            height: 100%;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-body {
            display: flex;
            align-items: center;
        }
        .card-body h5 {
            margin-left: 10px;
        }
        .footer {
            background-color: #204969;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .footer a {
            color: white;
            text-decoration: none;
            margin: 0px 5px;
        }
    </style>
</head>
<body>
    <div class="header p-3">
        <span class="block-head h3">Admin Dashboard</span>
        <div>
       <a href="./adminlogin2.php" class="btn btn-primary btn-sm p-2"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
        </div>
    </div>
    <div class="page">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-primary"></i>
                        <h5 class="card-title">Voter List</h5>
                    </div>
                    <a href="./admin.php" class="btn btn-primary">View</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-success"></i>
                        <h5 class="card-title">Party List</h5>
                    </div>
                    <a href="./adminboard1.php" class="btn btn-success">View</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-success"></i>
                        <h5 class="card-title">Party Registration</h5>
                    </div>
                    <a href="./party.php" class="btn btn-success">View</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-vote-yea fa-3x text-danger"></i>
                        <h5 class="card-title">Election Results</h5>
                    </div>
                    <a href="./electionresult.php" class="btn btn-danger">View</a>
                </div>
            </div>
    </div>
    <footer class="footer p-3 bg-primary fixed-bottom">
        <p class="text-center">&copy; 2023 Vote Nepal</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-    g0qYd1kmAPBpExxG5JaA6JgyztjDB+m05w2q7s3zV5A5nY02j/U/kLGUiALXIKoR" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-    w4HyoNvuK5OrJ8LsPJ8r+Y6zT6JYZnTRqldFBRdB/aG8YR12pq13VXc6b1MW/5KL" crossorigin="anonymous"></script>
</body>
</html>
