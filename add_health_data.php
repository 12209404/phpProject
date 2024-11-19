<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'database.php';
    $user_id = $_SESSION['user_id'];
    $steps = $_POST['steps'];
    $calories_burned = $_POST['calories_burned'];
    $weight = $_POST['weight'];
    $date = $_POST['date'];

    $stmt = $conn->prepare("INSERT INTO health_data (user_id, steps, calories_burned, weight, date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('iiids', $user_id, $steps, $calories_burned, $weight, $date);

    if ($stmt->execute()) {
        echo "<div style='text-align:center; font-family:Arial, sans-serif; color:green;'>Health data added successfully!</div>";
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
    <title>Add Health Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Add Health Data</h2>
        <input type="number" name="steps" placeholder="Steps" required>
        <input type="number" name="calories_burned" placeholder="Calories Burned" required>
        <input type="number" name="weight" step="0.1" placeholder="Weight (kg)" required>
        <input type="date" name="date" required>
        <button type="submit">Add Health Data</button>
    </form>
</body>
</html>
