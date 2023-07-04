<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: ../");
    }
   
    
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="generator" content="Hugo 0.72.0">
  <title>Admin panel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 60px;
      background-color: #204969;
      color: white;
    }

    .navbar h1 {
      font-size: 24px;
      margin: 0;
    }

    .navbar button {
      background-color: #f0f0f0;
      font-weight: 550;
      padding: 8px 12px;
      border: 2px solid black;
      border-radius: 5px;
    }

    .content {
      max-width: 100%;
      margin: 0 20px; /* Adjust the left and right padding as needed */
      padding: 20px;
      background-color: #f9f9f9;
      height: 100vh;
      overflow-y: auto;
    }

    .content h4 {
      text-align: center;
      margin-top: 0;
    }

    table {
      width: 100%;
      table-layout: fixed;
    }

    th,
    td {
      border: 1px solid black;
      padding: 10px;
      text-align: center;
      width: 14.28%;
      word-wrap: break-word;
    }

    tr:nth-child(even) {
      background-color: #D6EEEE;
    }
  </style>
</head>

<body>
  <nav class="navbar">
    <h1>Party List</h1>
    <div>
      <button class="btn btn-outline-light"><a href="./adminboard.php"><i class="fas fa-sign-out-alt"></i> Back</a></button>
    </div>
  </nav>

  <div class="content">
    <h4>Party List:</h4>

    <table>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Photo</th>
        <th>Established</th>
        <th>Votes</th>
        <th>Operation</th>
      </tr>

      <?php
      $connect = mysqli_connect("localhost", "root", "", "evms");
      $sql = "SELECT * FROM party";
      $result = $connect->query($sql);

      if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><img src="../uploads/<?php echo $row['photo']; ?>" width="50"></td>
            <td><?php echo $row['est']; ?></td>
            <td><?php echo $row['votes']; ?></td>
            <td>
              <a class="btn btn-outline-success" href="edit1.php?id=<?php echo $row['id']; ?>">Edit</a>
              <a class="btn btn-outline-secondary" href="delete1.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
          </tr>
      <?php
        }
      } else {
        echo "<tr><td colspan='7'>Table is empty!</td></tr>";
      }
      ?>
    </table>
  </div>
</body>

</html>
