<?php
    session_start();
    include("connection.php");

    $votes = $_POST['gvotes'];

    $total_votes = $votes + 1;
    $pid = $_POST['gid'];
    $uid = $_SESSION['id'];

    $update_votes = mysqli_query($connect, "UPDATE party SET votes='$total_votes' WHERE id='$pid'");
    $update_status = mysqli_query($connect, "UPDATE user SET status=1 WHERE id='$uid'");

    if ($update_status && $update_votes) {
        $getParties = mysqli_query($connect, "SELECT name, id, votes, mobile, pass, est, photo FROM party");
        $parties = mysqli_fetch_all($getParties, MYSQLI_ASSOC);
        $_SESSION['parties'] = $parties;
        $_SESSION['status'] = 1;

        // Send email to the user
        $data = $_SESSION['data'];
        $to = $data['email'];
        $subject = "Thank you for voting";
        $message = "Dear " . $data['name'] . ",\n\nThank you for casting your vote.\n\nBest regards,\n Vote Nepal Team";
        $headers = "From: YourSenderEmail@example.com";

        if (mail($to, $subject, $message, $headers)) {
            echo '<script>
                    alert("Voting successful! Email sent to the user.");
                    window.location = "../routes/dashboard.php";
                </script>';
        } else {
            echo '<script>
                    alert("Voting successful! Email sending failed.");
                    window.location = "../routes/dashboard.php";
                </script>';
        }
    } else {
        echo '<script>
                    alert("Voting failed! Please try again.");
                    window.location = "../routes/dashboard.php";
                </script>';
    }
    
    mysqli_close($connect);
?>
