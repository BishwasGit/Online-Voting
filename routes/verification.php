<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #2c4964;
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding-top: 30px;
        }

        .login-box {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .login-box h3 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .btn-register {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            padding: 10px 30px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-register:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }

        table {
            width: 95%;
            table-layout: solid;
            margin-left: 25px;
        }

        tr:nth-child(even) {
            background-color: #D6EEEE;
        }

        .message {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
    <title>Online Voting System - Registration</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid justify-content-between">
           
          <button > <a  href="../routes/adminlist.php">Back</a> </button>
        </div>
    </nav>

    <div class="container">
        <div class="login-box">
            <form action="../api/verification.php" class="was-validated" id="form2" method="POST"
                enctype="multipart/form-data">
                <h3>Registration</h3>

                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    <span class="mob-error text-danger d-inline-block"></span>
                </div>

                <div class="form-group">
                    <button class="btn btn-register" id="registerBtn" type="submit" name="registerBtn">Register</button>
                </div>
            </form>
        </div>
        
    </div>
    <div class="content">
    <h4>Verification List:</h4>

    <table>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
      
      </tr>

      <?php
      $connect = mysqli_connect("localhost", "root", "", "evms");
      $sql = "SELECT * FROM pre";
      $result = $connect->query($sql);

      if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
           
          </tr>
      <?php
        }
      } else {
        echo "<tr><td colspan='7'>Table is empty!</td></tr>";
      }
      ?>
    </table>
  </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

