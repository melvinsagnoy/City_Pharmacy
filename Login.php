<?php
session_start();

$servername = "localhost";
$db_username = "root"; 
$db_password = ""; 
$database = "pharmacy";

$conn = new mysqli($servername, $db_username, $db_password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) { 
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin_p WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($password == $row['password']) {
                $_SESSION['username'] = $username; 
                header("Location:dashboard.php");
                exit();
            } else {
                echo "<div style='background-color: #00ffa7; color: red; padding: 5px; margin-bottom: 10px;'>Invalid Password</div>";
            }
        } else {
            echo "<div style='background-color: #00ffa7; color: red; padding: 10px; margin-bottom: 10px;'>User Not Found</div>";
        }
    } else {
        echo "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(207 250 254);
        }

        .form-container {
            max-width: 400px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            backdrop-filter: blur(10px);
        }

        .form-container h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #4c68d7;
            text-align: center;
        }

        .form-container form {
            padding: 0 2rem 2rem;
            
        }

        .form-container label {
            font-size: 1rem;
            font-weight: 600;
            color: #718096;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.375rem;
            border: 1px solid #cbd5e0;
            margin-bottom: 1rem;
            transition: border-color 0.3s;
        }

        .form-container input[type="text"]:focus,
        .form-container input[type="password"]:focus {
            border-color: #4c68d7;
            outline: none;
        }

        .form-container button[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.375rem;
            background-color: #4c68d7;
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button[type="submit"]:hover {
            background-color: #667eea;
        }

        .error-message {
            background-color: #00ffa7;
            color: red;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="flex justify-center items-center h-screen">
        <div class="form-container ">
            <h2>User Login</h2>
            <?php if(isset($error_message)) echo "<div class='error-message'>$error_message</div>"; ?>
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
