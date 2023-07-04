<?php
session_start();
include('connection.php');
if(isset($_POST['loginbtn'])){
    $mobile = $_POST['mob'];
    $pass = $_POST['pass'];

    $res = mysqli_query($connect,"SELECT * FROM user WHERE mobile='$mobile' ");

    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        $verify = password_verify($pass, $row['password']);
        if($verify){
            $_SESSION['id'] = $row['id'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['data'] = $row;

            $getParties = mysqli_query($connect, "SELECT name, id, votes, mobile, pass, est, photo from party");
            if(mysqli_num_rows($getParties) > 0){
                $parties = mysqli_fetch_all($getParties, MYSQLI_ASSOC);
                $_SESSION['parties'] = $parties;
            }
            
            header("Location: ../routes/dashboard.php");
        } else {
            $_SESSION['login_attempt'] += 1;
            $_SESSION['error'] = "Sorry, Credentials didn't match our records";
            echo '<script>
                        window.location = "../";
                    </script>';
        }

    }else{
        $_SESSION['login_attempt'] += 1;
        $_SESSION['error'] = "Sorry, Credentials didn't match our records";
        echo '<script>
                    window.location = "../";
                </script>';
    }  
}
?>
