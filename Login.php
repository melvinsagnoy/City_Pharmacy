<?php
session_start();

$servername = "localhost";
$db_username = "root"; // Changed variable name to avoid conflict
$db_password = ""; 
$database = "pharmacy";

$conn = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) { // Check if username and password are set
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin_p WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows == 1) { // Check if query was successful
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
</head>

<body class="bg-gray-100">
    <div class="flex justify-center items-center h-screen">
        <div class="max-w-sm w-full bg-white shadow-md rounded p-8">
            <h2 class="text-2xl font-semibold text-center mb-6">User Login</h2>
            <form action="login.php" method="post">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-semibold mb-2">Username:</label>
                    <input type="text" id="username" name="username" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password:</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition-colors duration-300">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
