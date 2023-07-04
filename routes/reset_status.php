<?php
    session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "evms";
$connect = mysqli_connect($servername, $username, $password, $database);

$update_status = mysqli_query($connect, "UPDATE user SET status=0");
$update_votes = mysqli_query($connect, "UPDATE party SET votes=0");


if ($update_status && $update_votes) {
    $getUsers = mysqli_query($connect, "SELECT name, email FROM user");
    $users = mysqli_fetch_all($getUsers, MYSQLI_ASSOC);

    foreach ($users as $user) {
        $to = $user['email'];
        $subject = "Voting Status Reset";
        $message = "Dear " . $user['name'] . ",\n\nYour voting status has been reset. You can now vote again.\n\nBest regards,\nVote Nepal Team";
        $headers = "From: YourSenderEmail@example.com";

        mail($to, $subject, $message, $headers);
    }

    echo "success";
} else {
    echo "failure";
}

mysqli_close($connect);
?>