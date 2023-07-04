<?php
session_start();
include('connection.php');
if(isset($_POST['loginbtn'])){
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    $res = mysqli_query($connect,"SELECT * FROM admin WHERE name='bishwas' ");

    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        $verify =  $row['password'];
        if($verify){
            $_SESSION['id'] = $row['id'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['data'] = $row;
            
            header("Location: ../routes/adminboard.php");
        } else {
            $_SESSION['login_attempt'] += 1;
            $_SESSION['error'] = "Sorry, Credentials didn't match our records";
            echo '<script>
                        window.location = "../";
                    </script>';
        }

    }else{
        //echo "Please enter correct mobile number";
        $_SESSION['login_attempt'] += 1;
        $_SESSION['error'] = "Sorry, Credentials didn't match our records";
        echo '<script>
                    window.location = "../";
                </script>';
    }  
}
?>