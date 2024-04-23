<?php
// Establish database connection (replace with your own connection details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get total products in medicine table
$sql = "SELECT COUNT(*) AS total_medicine FROM medicine";
$result = $conn->query($sql);

// Check if query executed successfully
if ($result) {
    $row = $result->fetch_assoc();
    $totalmedicine = $row['total_medicine'];
} else {
    $totalmedicine = "N/A";
}



// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Pharmacy Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">

        <!-- Sidebar -->
         <!-- Sidebar -->
         <aside class="bg-gray-800 text-gray-100 w-64 flex flex-col h-full">
            <div class="p-4">
                <img src="logo.png" alt="City-Pharmacy Logo" class="mb-4">
            </div>
            <nav class="flex-1 overflow-y-auto">
                <ul class="space-y-4">
                    <li>
                        <a href="dashboard.php" class="block py-2 px-4 flex items-center hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd"
                                    d="M10 2a8 8 0 100 16 8 8 0 000-16zM3 10a7 7 0 1114 0 7 7 0 01-14 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="medicine.php" class="block py-2 px-4 flex items-center hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 00-2 2v2h2V4h8v2h2V4a2 2 0 00-2-2H6zm8 6H6v8h8V8zm-2 6v2H8v-2h4zM4 14H2v2a2 2 0 002 2h12a2 2 0 002-2v-2h-2v2H4v-2z"
                                    clip-rule="evenodd" />
                            </svg>
                            Medicines
                        </a>
                    </li>
                    <li>
                        <a href="inventory.php" class="block py-2 px-4 flex items-center hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 2a1 1 0 00-1 1v14a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1H3zm14-1a2 2 0 012 2v14a2 2 0 01-2 2H3a2 2 0 01-2-2V3a2 2 0 012-2h14z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M7 4a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1zm0 4a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1zm0 4a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            Inventory
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-4">
                <a href="Login.php"
                    class="block py-2 px-4 flex items-center bg-red-500 hover:bg-red-600 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 4a1 1 0 011-1h3a1 1 0 011 1v1h1a2 2 0 110 4h-1v2h1a2 2 0 110 4h-1v1a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1H9a2 2 0 110-4h1V9H9a2 2 0 110-4h1V4zm1 7h1a1 1 0 110 2h-1v-2z"
                            clip-rule="evenodd" />
                    </svg>
                    Logout
                </a>
            </div>
        </aside>

        <main class="flex-1 p-4">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">Dashboard Overview</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
        <div class="bg-purple-100 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-purple-700 mb-2">Total Products</h3>
            <p class="text-3xl font-bold text-purple-900"><?php echo $totalmedicine; ?></p>
        </div>
            <div class="bg-indigo-100 p-4 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-indigo-700 mb-2">Total Medicines</h3>
                <p class="text-3xl font-bold text-indigo-900"><?php echo $totalmedicine; ?></p>
            </div>
            
        </div>
     
        <div class="mt-8">
            <h3 class="text-lg font-semibold mb-4">Stock Status</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-green-100 p-4 rounded-lg shadow-md">
    <h4 class="text-lg font-semibold text-green-700 mb-2">IN STOCK MEDICINES</h4>
    <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch medicines that are in stock
$sql = "SELECT * FROM medicine WHERE QUANTITY > 30";
$result = $conn->query($sql);

// Check if there are any medicines in stock
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>";
        echo "<div class='bg-green-100 p-4 rounded-lg shadow-md'>";
        echo "<h4 class='text-lg font-semibold text-green-700 mb-2'>" . $row["NAME"] . "</h4>";
        echo "<p class='text-base text-green-900'>In Stock</p>";
        echo "<p class='text-base text-green-900'>IN STOCK</p>";
        echo "</div>";
        echo "<br>";
    }
} else {
    echo "<div class='bg-red-100 p-4 rounded-lg shadow-md'>";
    echo "<h4 class='text-lg font-semibold text-red-700 mb-2'>No Medicines in Stock</h4>";
    echo "</div>";
}

// Close database connection
$conn->close();
?>
</div>
<div class="bg-red-100 p-4 rounded-lg shadow-md">
    <h4 class="text-lg font-semibold text-red-700 mb-2">Low Stock Alert</h4>
    <?php
    // Establish database connection (replace with your own connection details)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacy";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch medicines with quantities less than 10
    $sql = "SELECT * FROM medicine WHERE QUANTITY < 10";
    $result = $conn->query($sql);

    // Check if there are any medicines with low stock
    if ($result && $result->num_rows > 0) {
        // Output data of medicines with low stock
        while($row = $result->fetch_assoc()) {
            echo "<div class='bg-red-100 p-4 rounded-lg shadow-md'>";
            echo "<p class='text-base text-red-900'><strong>" . $row["NAME"] . "</strong></p>";
            echo "<p class='text-sm text-red-700'>(Only " . $row["QUANTITY"] . " stocks left)</p>";
            echo "</div>";
        }
    } else {
        echo "<p class='text-base text-green-900'>No medicines with low stock</p>";
    }

 
    $conn->close();
    ?>
</div>
            </div>
        </div>
    </div>
</main>

    </div>
</body>

</html>
