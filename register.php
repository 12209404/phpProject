<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            background-image: url('background.jpg'); /* Replace with your image path */
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .form-container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .secondary-button {
            background: #007BFF;
        }
        .secondary-button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="register_action.php" method="post">
            <h2>Register</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <button class="secondary-button" onclick="location.href='login.php'">Login</button>
    </div>
</body>
</html>
