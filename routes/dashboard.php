<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: ../");
    }
    $data = $_SESSION['data'];

    if($_SESSION['status']==1){
        $status = '<b style="color: green">Voted</b>';
    }
    else{
        $status = '<b style="color: red">Not Voted</b>';
    }
?>


<html>
    <head>
    <marquee behavior="slide" direction="right" style="background-color:  #3498db;">Please Vote The Right Candidate....Please Vote The Right Candidate....Please Vote The Right Candidate....Please Vote The Right Candidate....</marquee>
        <title>Online voting system - Dashboard</title>
        <style>
            #b{
                background-color: whitesmoke;font-family: Arial, Helvetica, sans-serif;
            }
            h2{
                font-family: Arial, Helvetica, sans-serif;
            }
           
        </style>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body id="b">
        
            <center>
            <div id="headerSection">
            <a href="../"><button id="back-button"> Back</button></a>
            <a href="logout.php"><button id="logout-button">Logout</button></a>
            <h2>Your vote matters</h2>  
            </div>
            </center>
            <hr>
            
            <div id="mainSection">
                <div id="profileSection">
                    <center><img src="../uploads/<?php echo $data['photo']?>" height="100" width="100"></center><br>
                    <b>Name : </b><?php echo $data['name'] ?><br><br>
                    <b>Mobile : </b><?php echo $data['mobile'] ?><br><br>
                    <b>Address : </b><?php echo $data['address'] ?><br><br>
                    <b>Gender : </b><?php echo $data['gender'] ?><br><br>
                    <b>Status : </b><?php echo $status ?>
                </div>
                <div id="groupSection">
                    <?php

                    if(isset($_SESSION['parties'])){
                        $parties = $_SESSION['parties'];
                        for($i=0; $i<count($parties); $i++){
                            ?>
                                <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                <img style="float: right" src="../uploads/<?php echo $parties[$i]['photo']?>" height="80" width="80">
                                <b>Party Name : </b><?php echo $parties[$i]['name']?><br><br>
                                <b>Votes :</b> <?php echo $parties[$i]['votes']?><br><br>
                                <b>Establishment :</b> <?php echo $parties[$i]['est']?><br><br>
                                <form method="POST" action="../api/vote.php">
                                <input type="hidden" name="gvotes" type="number" value="<?php echo $parties[$i]['votes'] ?>">
                                <input type="hidden" name = "gid" value="<?php echo $parties[$i]['id'] ?>">
                                <?php

                                if($_SESSION['status']==1){
                                    ?>
                                    <button disabled style="padding: 5px; font-size: 15px; background-color: #27ae60; color: white; border-radius: 5px;" type="button">Voted</button>
                                    <?php
                                }
                                else{
                                    ?>
                                    <button style="padding: 5px; font-size: 15px; background-color: #3498db; color: white; border-radius: 5px;" type="submit">Vote</button>
                                    <?php
                                }
                                ?>
                                </form>
                                </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                <b>No parties available right now.</b>    
                            </div>
                        <?php
                    }  
                    ?>
                </div>
            </div> 
    </body>
</html>