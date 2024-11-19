<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'database.php';
$user_id = $_SESSION['user_id'];

$result_health = $conn->query("SELECT * FROM health_data WHERE user_id = $user_id");
$result_exercises = $conn->query("SELECT * FROM exercises WHERE user_id = $user_id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007BFF;
            text-decoration: none;
            font-size: 16px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Progress</h1>
    <h2>Health Data</h2>
    <table>
        <tr>
            <th>Date</th>
            <th>Steps</th>
            <th>Calories Burned</th>
            <th>Weight</th>
        </tr>
        <?php while ($row = $result_health->fetch_assoc()): ?>
        <tr>
            <td><?= $row['date'] ?></td>
            <td><?= $row['steps'] ?></td>
            <td><?= $row['calories_burned'] ?></td>
            <td><?= $row['weight'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <h2>Exercises</h2>
    <table>
        <tr>
            <th>Date</th>
            <th>Exercise</th>
            <th>Duration</th>
            <th>Calories Burned</th>
        </tr>
        <?php while ($row = $result_exercises->fetch_assoc()): ?>
        <tr>
            <td><?= $row['date'] ?></td>
            <td><?= $row['exercise_name'] ?></td>
            <td><?= $row['duration'] ?> mins</td>
            <td><?= $row['calories_burned'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
