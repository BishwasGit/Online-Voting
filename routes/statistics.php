<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../");
    exit(); // Add an exit statement after redirection
}

// Step 1: Establish a connection to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evms";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Write a SQL query to fetch the party names and vote counts
$sql = "SELECT `name`, `votes` FROM `party`";
$result = $conn->query($sql);

// Check if the query executed successfully
if ($result === false) {
    die("Query error: " . $conn->error);
}

// Step 3: Fetch the results and extract the party names and vote counts
$partyNames = [];
$voteCounts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $partyNames[] = $row['name'];
        $voteCounts[] = $row['votes'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Statistics</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .chart-container {
            width: 80%;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Statistics</h2>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var data = {
            labels: <?php echo json_encode($partyNames); ?>,
            datasets: [{
                label: 'Votes',
                data: <?php echo json_encode($voteCounts); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        var options = {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0 // Display integer values in the vertical axis ticks
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y.toFixed(0); // Display integer values in the tooltip
                        }
                    }
                }
            }
        };

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</body>
