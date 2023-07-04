
<?php 
if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "evms";
    $connect = mysqli_connect($servername, $username, $password, $database);

  //  $sql = "DELETE FROM party WHERE id = $id";
   // $connect->query($sql);
    $sql = "DELETE FROM user WHERE id = $id";
    $connect->query($sql);
    
 
}
header("location: admin.php");
exit;

?>
