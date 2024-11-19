<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $exercise_name = $_POST['exercise_name'];
    $duration = $_POST['duration'];
    $calories_burned = $_POST['calories_burned'];
    $date = $_POST['date'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO exercises (user_id, exercise_name, duration, calories_burned, date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isdis", $user_id, $exercise_name, $duration, $calories_burned, $date);

    if ($stmt->execute()) {
        echo "<div style='text-align:center; font-family:Arial, sans-serif; color:green;'>Exercise added successfully! <a href='dashboard.php' style='color:blue;'>Back to Dashboard</a></div>";
    } else {
        echo "<div style='text-align:center; font-family:Arial, sans-serif; color:red;'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exercise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #28A745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Add Exercise</h2>
        <input type="text" name="exercise_name" placeholder="Exercise Name" required><br>
        <input type="number" name="duration" placeholder="Duration (minutes)" required><br>
        <input type="number" name="calories_burned" placeholder="Calories Burned" required><br>
        <input type="date" name="date" required><br>
        <button type="submit">Add Exercise</button>
    </form>
</body>
</html>
