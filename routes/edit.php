<?php

session_start();
if(!isset($_SESSION['id'])){
    header("location: ../");
}  


include '../api/connection.php';
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
        input[type="password"],
        select {
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
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM user WHERE id=$id";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $mobile = $row['mobile'];
            $pass = $row['password'];
            $add = $row['address'];
            $age = $row['age'];
            $gender = $row['gender'];
            $img = $row['photo'];
            ?>
            <h2>User update form</h2>
            <form action="./updatevoter.php" method="post">
                <fieldset>
                    <h3>Registration</h3>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" required>

                    <label for="mob">Mobile</label>
                    <input type="number" name="mob" id="mob" placeholder="Mobile" required value="<?php echo $mobile; ?>">

                  <!--  <label for="pass">Change Password</label>
<input type="password" name="pass" id="pass" placeholder="Change password" required value="<?php echo $pass; ?>">
<input type="checkbox" id="showPass" onclick="togglePasswordVisibility('pass', 'showPass')"> Show Password

<label for="cpass">Confirm Password</label>
<input type="password" name="cpass" id="cpass" placeholder="Confirm Password" required value="<?php echo $pass; ?>">
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
</script>-->

                    <label for="add">Address</label>
                    <input style="width: 95%" type="text" name="add" id="add" placeholder="Address" required value="<?php echo $add; ?>">

                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" placeholder="Enter age" required value="<?php echo $age; ?>">

                    <label for="gender">Gender</label>
                    <div id="upload" style="width: 95%">
                        <select name="gender" id="gender">
                            <option value="M" <?php if ($gender == 'M') echo 'selected'; ?>>Male</option>
                            <option value="F" <?php if ($gender == 'F') echo 'selected'; ?>>Female</option>
                            <option value="O" <?php if ($gender == 'O') echo 'selected'; ?>>LGBTQIA+</option>
                        </select>
                    </div>

                    <button id="updatevoter" type="submit" name="updatevoter">Update</button>
                </fieldset>
            </form>
            <?php
        } else {
            header("location: admin.php");
        }
    }
    ?>
</body>
</html>