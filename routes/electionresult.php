<?php
session_start();

// Check if the session variable is not set or is empty
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    // Redirect the user to the appropriate location
    header("location: ../");
    exit(); // Terminate further execution
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
                .navbar {
            background-color: #204969;
            color: white;
            padding: 10px;
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }
        .navbar-right {
            font-size: 18px;
        }
        .table-container {
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th,
        .table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .table tr:hover {
            background-color: #f5f5f5;
        }
        .party-image {
            max-width: 100px;
            height: auto;
        }
        .vote-bar-container {
            width: 100%;
            height: 20px;
            background-color: #f2f2f2;
            border-radius: 4px;
            overflow: hidden;
        }
        .vote-bar {
            height: 100%;
            width: 0;
            transition: width 1s ease-in-out;
        }
        .vote-count {
            margin-left: 5px;
        }

        /* Add custom colors for the vote bars */
        .vote-bar.red {
            background-color: #ff4d4d;
        }
        .vote-bar.blue {
            background-color: #4d94ff;
        }
        .vote-bar.green {
            background-color: #00cc99;
        }
        .vote-bar.yellow {
            background-color: #ffff66;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand">Election Result</span>
            <div class="navbar-right">
                <button class="btn btn-light"><a href="../routes/adminboard.php" style="text-decoration: none; color: black;"><i class="fas fa-sign-out-alt"></i> Back</a></button>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Party Image</th>
                        <th>Party Name</th>
                        <th>Votes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $connect = mysqli_connect("localhost", "root", "", "evms");
                    $sql = "SELECT name, photo, votes FROM party ORDER BY votes DESC";
                    $result = $connect->query($sql);
                    if ($result->num_rows > 0) {
                        $maxVotes = 0; // Variable to store the maximum number of votes
                        while ($row = mysqli_fetch_assoc($result)) {
                            $maxVotes = max($maxVotes, $row['votes']); // Update the maximum votes
                        }

                        if ($maxVotes !== 0) {
                            // Proceed with displaying the table if maxVotes is not zero
                            $colors = array("red", "blue", "green", "yellow"); // Define custom colors
                            $colorIndex = 0; // Initialize the color index

                            mysqli_data_seek($result, 0); // Reset the result set to the beginning
                            while ($row = mysqli_fetch_assoc($result)) {
                                $votePercentage = ($row['votes'] / $maxVotes) * 100;
                                $colorClass = $colors[$colorIndex];
                                $colorIndex = ($colorIndex + 1) % count($colors); // Rotate the color index

                                // Increment the color index if the party has the maximum votes
                                if ($row['votes'] == $maxVotes) {
                                    $colorIndex = ($colorIndex + 1) % count($colors);
                                }
                                ?>
                                <tr>
                                    <td><img src="../uploads/<?php echo $row['photo']; ?>" alt="Party Image" class="party-image"></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td>
                                        <div class="vote-bar-container">
                                            <div class="vote-bar <?php echo $colorClass; ?>" style="width: <?php echo $votePercentage; ?>%;"></div>
                                        </div>
                                        <span class="vote-count"><?php echo $row['votes']; ?></span>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo '<tr><td colspan="3">No votes have been cast yet.</td></tr>';
                        }
                    } else {
                        echo '<tr><td colspan="3">Table is empty!</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>
