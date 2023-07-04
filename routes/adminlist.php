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
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        div.header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px, 60px;
            background-color: #204969;
            color: white;
        }

        body {
            margin: 0px;
        }

        .header button {
            background-color: #f0f0f0;
            font-weight: 550;
            padding: 8px 12px;
            border: 2px solid black;
            border-radius: 5px;
            margin-right: 10px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        tr:nth-child(even) {
            background-color: #D6EEEE;
        }

        table {
            width: 50%;
            table-layout: solid;
            margin: 20px auto;
            padding: 20px 20px 20px 0;
        }

        th,
        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Admin List</h1>
        <div>
            <button><a href="./adminregister.php"><i class="fas fa-sign-out-alt"></i> New Admin</a></button>
            <button><a href="./verification.php"><i class="fas fa-sign-out-alt"></i> verification</a></button>
            <button><a href="./adminboard.php"><i class="fas fa-sign-out-alt"></i> Back</a></button>
        </div>
    </div>

    <div>
        <h4>Admin list:</h4>
    </div>

    <div>
        <table border="1px" class="table">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Photo</th>
                <th>Address</th>
                <th>Age</th>
                <th>Gender</th>
            </tr>

            <?php
            $connect = mysqli_connect("localhost", "root", "", "evms");
            $sql = "SELECT * FROM admin";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo preg_replace("/[^A-Za-z]/", "", $row['name']); ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><img src="../uploads/<?php echo $row['photo']; ?>" alt="user photo" width="50"></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                    </tr>
            <?php
                }
            } else {
                echo "Table is empty!";
            }
            ?>
        </table>
    </div>

</body>

</html>
