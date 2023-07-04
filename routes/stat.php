<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
        }

        .chart-bar {
            display: inline-block;
            vertical-align: middle;
            margin: 0 5px;
        }

        .chart-bar span {
            display: block;
            background-color: #007bff;
            height: 20px;
            transition: width 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "evms";

    $connect = mysqli_connect($servername, $username, $password, $dbname);
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Total number of users
    $sqlTotalUsers = "SELECT COUNT(*) AS totalUsers FROM user";
    $resultTotalUsers = mysqli_query($connect, $sqlTotalUsers);
    $totalUsers = mysqli_fetch_assoc($resultTotalUsers)['totalUsers'];

    // Total number of votes
    $sqlTotalVotes = "SELECT COUNT(*) AS totalVotes FROM user WHERE status = 1";
    $resultTotalVotes = mysqli_query($connect, $sqlTotalVotes);
    $totalVotes = mysqli_fetch_assoc($resultTotalVotes)['totalVotes'];

    // Total number of users who voted
    $sqlTotalVotedUsers = "SELECT COUNT(*) AS votedUsers FROM user WHERE status = 1";
    $resultTotalVotedUsers = mysqli_query($connect, $sqlTotalVotedUsers);
    $totalVotedUsers = mysqli_fetch_assoc($resultTotalVotedUsers)['votedUsers'];

    // Age groups
    $ageGroups = array(
        array('name' => '18-30', 'min' => 18, 'max' => 30),
        array('name' => '30-60', 'min' => 31, 'max' => 60),
        array('name' => '60+', 'min' => 61, 'max' => 150)
    );

    $ageData = array();
    foreach ($ageGroups as $group) {
        $groupName = $group['name'];
        $groupMin = $group['min'];
        $groupMax = $group['max'];

        // Total number of users in each age group
        $sqlAgeTotalUsers = "SELECT COUNT(*) AS totalUsers FROM user WHERE age >= $groupMin AND age <= $groupMax";
        $resultAgeTotalUsers = mysqli_query($connect, $sqlAgeTotalUsers);
        $ageTotalUsers = mysqli_fetch_assoc($resultAgeTotalUsers)['totalUsers'];

        // Total number of users who voted in each age group
        $sqlAgeVotedUsers = "SELECT COUNT(*) AS votedUsers FROM user WHERE age >= $groupMin AND age <= $groupMax AND status = 1";
        $resultAgeVotedUsers = mysqli_query($connect, $sqlAgeVotedUsers);
        $ageVotedUsers = mysqli_fetch_assoc($resultAgeVotedUsers)['votedUsers'];

        // Total number of users who have not voted in each age group
        $ageNotVotedUsers = $ageTotalUsers - $ageVotedUsers;

        $ageData[$groupName] = array(
            'totalUsers' => $ageTotalUsers,
            'votedUsers' => $ageVotedUsers,
            'notVotedUsers' => $ageNotVotedUsers
        );
    }

    // Genders
    $genders = array(
        'M' => 'Male',
        'F' => 'Female',
        'O' => 'LGBTQ+'
    );

    $genderData = array();
    foreach ($genders as $genderKey => $genderValue) {
        // Total number of users for each gender
        $sqlGenderTotalUsers = "SELECT COUNT(*) AS totalUsers FROM user WHERE gender = '$genderKey'";
        $resultGenderTotalUsers = mysqli_query($connect, $sqlGenderTotalUsers);
        $genderTotalUsers = mysqli_fetch_assoc($resultGenderTotalUsers)['totalUsers'];

        // Total number of users who voted for each gender
        $sqlGenderVotedUsers = "SELECT COUNT(*) AS votedUsers FROM user WHERE gender = '$genderKey' AND status = 1";
        $resultGenderVotedUsers = mysqli_query($connect, $sqlGenderVotedUsers);
        $genderVotedUsers = mysqli_fetch_assoc($resultGenderVotedUsers)['votedUsers'];

        // Total number of users who have not voted for each gender
        $genderNotVotedUsers = $genderTotalUsers - $genderVotedUsers;

        $genderData[$genderKey] = array(
            'totalUsers' => $genderTotalUsers,
            'votedUsers' => $genderVotedUsers,
            'notVotedUsers' => $genderNotVotedUsers
        );
    }

    // Function to get the key with the maximum value from an associative array
    function getKeyWithMaxValue($array) {
        $maxValue = max($array);
        foreach ($array as $key => $value) {
            if ($value === $maxValue) {
                return $key;
            }
        }
    }

    mysqli_close($connect);
    ?>

    <h1>User Information</h1>

    <h2>Age Groups</h2>
    <table>
        <tr>
            <th>Age Group</th>
            <th>Total Users</th>
            <th>Voted Users</th>
            <th>Not Voted Users</th>
            <th>Voted Users %</th>
        </tr>
        <?php foreach ($ageData as $groupName => $groupStats): ?>
            <tr>
                <td><?php echo $groupName; ?></td>
                <td><?php echo $groupStats['totalUsers']; ?></td>
                <td><?php echo $groupStats['votedUsers']; ?></td>
                <td><?php echo $groupStats['notVotedUsers']; ?></td>
                <td>
                    <?php if ($totalVotedUsers > 0): ?>
                        <?php echo round(($groupStats['votedUsers'] / $totalVotedUsers) * 100, 2); ?>%
                    <?php else: ?>
                        0%
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Genders</h2>
    <table>
        <tr>
            <th>Gender</th>
            <th>Total Users</th>
            <th>Voted Users</th>
            <th>Not Voted Users</th>
            <th>Voted Users %</th>
        </tr>
        <?php foreach ($genderData as $genderKey => $genderStats): ?>
            <tr>
                <td><?php echo $genders[$genderKey]; ?></td>
                <td><?php echo $genderStats['totalUsers']; ?></td>
                <td><?php echo $genderStats['votedUsers']; ?></td>
                <td><?php echo $genderStats['notVotedUsers']; ?></td>
                <td>
                    <?php if ($totalVotedUsers > 0): ?>
                        <?php echo round(($genderStats['votedUsers'] / $totalVotedUsers) * 100, 2); ?>%
                    <?php else: ?>
                        0%
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Conclusion</h2>
    <p>Total number of users: <?php echo $totalUsers; ?></p>
    <p>Total number of votes: <?php echo $totalVotes; ?></p>
    <p>Total number of users who voted: <?php echo $totalVotedUsers; ?></p>

</body>
</html>
