<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Example</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid black;
      padding: 8px;
    }
  </style>
</head>

<body>
  <?php
  if (isset($_POST['login'])) {
    // Authorisation details.
    $username = "remonstha01@gmail.com";
    $hash = "8bbdeeb4575762a3c0f34cd9c03a34fff6d02df058db67ab37ee0cf421b358f5";

    // Config variables. Consult http://api.txtlocal.com/docs for more info.
    $test = "0";
    $name = $_POST['name'];
    // Data for text message. This is the text message data.
    $sender = "bhu"; // This is who the message appears to be from.
    $numbers = $_POST['num']; // A single number or a comma-separated list of numbers
    $otp = mt_rand(100000, 999999);
    setcookie("otp", $otp);
    $message = "Hey " . $name . ", your otp is " . $otp;
    // 612 chars or less
    // A single number or a comma-separated list of numbers
    $message = urlencode($message);
    $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers . "&test=" . $test;
    $ch = curl_init('https://api.txtlocal.com/send/?');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); // This is the result from the API
    echo "OTP sent";
    curl_close($ch);
  }

  if (isset($_POST['ver'])) {
    $verotp = $_POST['otp'];
    if ($verotp == $_COOKIE['otp']) {
      echo "Login successful";
    } else {
      echo "Login failed";
    }
  }
  ?>

  <form method="post" action="otp.php">
    <table align="center">
      <tr>
        <th>Name</th>
        <td><input type="text" name="name" placeholder="Name"></td>
      </tr>
      <tr>
        <th>Phone</th>
        <td><input type="text" name="num" placeholder="Phone with +977"></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" name="login" value="Submit"></td>
      </tr>
      <tr>
        <td>Verify OTP</td>
        <td><input type="text" name="otp" placeholder="Enter the OTP"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="ver" value="Verify OTP"></td>
      </tr>
    </table>
  </form>
</body>

</html>
