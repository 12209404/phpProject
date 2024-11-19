<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }
        h1 {
            background-color: #007BFF;
            color: white;
            padding: 20px;
            margin: 0;
        }
        a {
            display: inline-block;
            margin: 15px;
            padding: 10px 20px;
            background-color: #28A745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        a:hover {
            background-color: #218838;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
    <h1>Welcome to Fitness Tracker</h1>
    <div class="container">
        <a href="add_health_data.php">Add Health Data</a>
        <a href="add_exercise.php">Add Exercise Routine</a>
        <a href="view_progress.php">View Progress</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
