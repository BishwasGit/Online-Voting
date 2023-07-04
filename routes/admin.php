<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("location: ../");
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "evms";
$connect = mysqli_connect($servername, $username, $password, $database);

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM user WHERE name LIKE '%$search%' OR mobile LIKE '%$search%'";
    $result = mysqli_query($connect, $sql);
} else {
    $sql = "SELECT * FROM user";
    $result = mysqli_query($connect, $sql);
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
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 60px;
            background-color: #204969;
            color: white;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .header form {
            display: flex;
            align-items: center;
        }

        .header input[type="text"] {
            padding: 5px;
        }

        .header button {
            background-color: #f0f0f0;
            font-weight: 550;
            padding: 8px 12px;
            border: 2px solid black;
            border-radius: 5px;
            margin-left: 10px;
        }

        body {
            margin: 0;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }

        table {
            width: 95%;
            table-layout: solid;
            margin-left: 25px;
        }

        tr:nth-child(even) {
            background-color: #D6EEEE;
        }

        .message {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Voter List</h1>
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search by name or mobile number">
            <button type="submit">Search</button>
            <button class="btn btn-outline-light"><a href="./adminboard.php"><i class="fas fa-sign-out-alt"></i> Back</a></button>

        </form>
    </div>

    <div>
        <h4>Voter list:</h4>
        <button class="btn btn-outline-primary" onclick="refreshStatus()">Refresh Status</button>
    </div>

    <div>
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Photo</th>
                <th>Address</th>
                <th>Age</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Operation</th>
            </tr>

            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><img src="../uploads/<?php echo $row['photo']; ?>" alt="user photo" width="50"></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <a class="btn btn-outline-success" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a class="btn btn-outline-secondary" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                echo "<tr><td colspan='10' class='message'>No matching records found.</td></tr>";
            }
            ?>
        </table>
    </div>

    <script>
        function refreshStatus() {
            if (confirm("Are you sure you want to refresh the status of all voters?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "reset_status.php", true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        location.reload();
                    }
                };
                xhr.send();
            }
        }
    </script>
</body>

</html>
