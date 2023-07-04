<?php

session_start();
if(!isset($_SESSION['id'])){
    header("location: ../");
}  


$servername = "localhost";
$username = "root";
$password = "";
$database = "evms";
$connect = mysqli_connect($servername, $username, $password, $database);
?>

<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #888;
        }

        input[type="text"],
        input[type="number"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-size: 14px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
<?php
$connect = mysqli_connect("localhost", "root", "", "evms");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM party WHERE id='$id'";
    $result = mysqli_query($connect, $sql);
    ?>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <h2>User update form</h2>
            <form action="./update.php" method="post" class="login-box">
                <br>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $row['name']; ?>">

                <label for="mob">Mobile</label>
                <input type="number" name="mob" id="mob" placeholder="Mobile" style="width:186px;" value="<?php echo $row['mobile']; ?>"><br><br>
<!--
                <label for="pass">Change Password</label>
                <input type="password" name="pass" id="pass" placeholder="Change password" required value="<?php echo $row['pass']; ?>">
                <input type="checkbox" id="showPass" onclick="togglePasswordVisibility('pass', 'showPass')"> Show Password

                <label for="cpass">Confirm Password</label>
                <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" required value="<?php echo $row['pass']; ?>">
                <input type="checkbox" id="showCPass" onclick="togglePasswordVisibility('cpass', 'showCPass')"> Show Password
                <script>
function togglePasswordVisibility(passwordId, checkboxId) {
  const passwordInput = document.getElementById(passwordId);
  const showPasswordCheckbox = document.getElementById(checkboxId);
  
  if (showPasswordCheckbox.checked) {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}
</script>

                <i class="far fa-eye" id="togglePass" style="margin-left: -30px; cursor: pointer;"></i><br><br>
-->
                <label for="est">Established-Date</label>
                <input style="width: 50%" type="text" name="est" id="est" placeholder="Established-Date" required value="<?php echo $row['est']; ?>"><br><br>

                <button id="update" type="submit" name="update">Update</button><br><br>
            <?php
        }
    }
}
?>
</form>
</body>
</html>