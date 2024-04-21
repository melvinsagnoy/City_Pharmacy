<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "pharmacy";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function fetchMedicines($conn) {
    $sql = "SELECT * FROM MEDICINE";
    $result = $conn->query($sql);
    return $result;
}

function addMedicine($conn, $name, $disease, $price, $quantity, $location) {
    $sql = "INSERT INTO MEDICINE (NAME, DISEASE, PRICE, QUANTITY, LOCATION) VALUES ('$name', '$disease', $price, $quantity, '$location')";
    return $conn->query($sql);
}

function updateMedicine($conn, $medicineId, $name, $disease, $price, $quantity, $location) {
    $sql = "UPDATE MEDICINE SET NAME='$name', DISEASE='$disease', PRICE=$price, QUANTITY=$quantity, LOCATION='$location' WHERE MEDICINEID=$medicineId";
    return $conn->query($sql);
}

function deleteMedicine($conn, $medicineId) {
    $sql = "DELETE FROM MEDICINE WHERE MEDICINEID=$medicineId";
    return $conn->query($sql);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        addMedicine($conn, $_POST["name"], $_POST["disease"], $_POST["price"], $_POST["quantity"], $_POST["location"]);
    } elseif (isset($_POST["update"])) {
        updateMedicine($conn, $_POST["medicineId"], $_POST["name"], $_POST["disease"], $_POST["price"], $_POST["quantity"], $_POST["location"]);
    } elseif (isset($_POST["delete"])) {
        deleteMedicine($conn, $_POST["medicineId"]);
    }
}

$medicines = fetchMedicines($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            transition: background-color 0.3s, color 0.3s;
        }

        /* Adjustments for modal */
        #updateModal {
            z-index: 9999;
        }

        #updateModal .modal-backdrop {
            z-index: 9998;
            background-color: rgba(0, 0, 0, 0.5);
        }

        #updateModal .modal-content {
            margin: 0 auto;
            top: 50%;
            transform: translateY(-50%);
        }

       
       
        .side-navigation {
            background-color: var(--side-background-color);
            color: var(--side-text-color);
            transition: background-color 0.3s, color 0.3s;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
    <aside class="bg-gray-800 text-gray-100 w-64 flex flex-col">
    <div class="p-4">
                <img src="logo.png" alt="City-Pharmacy Logo" class="mb-4">
                
            </div>
            <nav class="flex-1">
                <ul class="space-y-4">
                    <li>
                        <a href="dashboard.php" class="block py-2 px-4 flex items-center hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM3 10a7 7 0 1114 0 7 7 0 01-14 0z" clip-rule="evenodd" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="medicine.php" class="block py-2 px-4 flex items-center hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v2h2V4h8v2h2V4a2 2 0 00-2-2H6zm8 6H6v8h8V8zm-2 6v2H8v-2h4zM4 14H2v2a2 2 0 002 2h12a2 2 0 002-2v-2h-2v2H4v-2z" clip-rule="evenodd" />
                            </svg>
                            Medicines
                        </a>
                    </li>
                    <li>
                        <a href="inventory.php" class="block py-2 px-4 flex items-center hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 2a1 1 0 00-1 1v14a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1H3zm14-1a2 2 0 012 2v14a2 2 0 01-2 2H3a2 2 0 01-2-2V3a2 2 0 012-2h14z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M7 4a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1zm0 4a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1zm0 4a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                            Inventory
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-4">
                <a href="Login.php" class="block py-2 px-4 flex items-center bg-red-500 hover:bg-red-600 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 4a1 1 0 011-1h3a1 1 0 011 1v1h1a2 2 0 110 4h-1v2h1a2 2 0 110 4h-1v1a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1H9a2 2 0 110-4h1V9H9a2 2 0 110-4h1V4zm1 7h1a1 1 0 110 2h-1v-2z" clip-rule="evenodd" />
                    </svg>
                    Logout
                </a>
            </div>
        </aside>

        <main class="flex-1 p-4">
    <h1 class="text-4xl font-mono font-bold mb-4">MEDICINES</h1>
    <form action="" method="post" class="mb-8">
        <h2 class="text-xl font-semibold mb-2">Add Medicine</h2>
        <input type="text" name="name" placeholder="Name" class="border border-gray-300 p-2 mb-2 rounded" required>
        <input type="text" name="disease" placeholder="Disease" class="border border-gray-300 p-2 mb-2 rounded" required>
        <input type="number" name="price" placeholder="Price" class="border border-gray-300 p-2 mb-2 rounded" required>
        <input type="number" name="quantity" placeholder="Quantity" class="border border-gray-300 p-2 mb-2 rounded" required>
        <input type="text" name="location" placeholder="Location" class="border border-gray-300 p-2 mb-2 rounded" required>
        <button type="submit" name="add" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Add Medicine</button>
    </form>

    <h2 class="text-xl font-semibold mb-2">Medicine List</h2>
    <div class="overflow-x-auto mb-4">
        <table class="w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border-b border-gray-200">Medicine ID</th>
                    <th class="px-4 py-2 border-b border-gray-200">Name</th>
                    <th class="px-4 py-2 border-b border-gray-200">Disease</th>
                    <th class="px-4 py-2 border-b border-gray-200">Price</th>
                    <th class="px-4 py-2 border-b border-gray-200">Quantity</th>
                    <th class="px-4 py-2 border-b border-gray-200">Location</th>
                    <th class="px-4 py-2 border-b border-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $medicines->fetch_assoc()) { ?>
                    <tr>
                        <td class="px-4 py-2 border-b border-gray-200"><?php echo $row["MEDICINEID"]; ?></td>
                        <td class="px-4 py-2 border-b border-gray-200"><?php echo $row["NAME"]; ?></td>
                        <td class="px-4 py-2 border-b border-gray-200"><?php echo $row["DISEASE"]; ?></td>
                        <td class="px-4 py-2 border-b border-gray-200"><?php echo $row["PRICE"]; ?></td>
                        <td class="px-4 py-2 border-b border-gray-200"><?php echo $row["QUANTITY"]; ?></td>
                        <td class="px-4 py-2 border-b border-gray-200"><?php echo $row["LOCATION"]; ?></td>
                        <td class="px-4 py-2 border-b border-gray-200">
                            <button type="button" onclick="openUpdateModal('<?php echo $row["MEDICINEID"]; ?>', '<?php echo $row["NAME"]; ?>', '<?php echo $row["DISEASE"]; ?>', '<?php echo $row["PRICE"]; ?>', '<?php echo $row["QUANTITY"]; ?>', '<?php echo $row["LOCATION"]; ?>')" class="bg-green-500 text-white py-1 px-2 rounded hover:bg-green-600">Update</button>
                            <form action="" method="post" style="display: inline-block;">&nbsp;&nbsp;&nbsp;
                                <input type="hidden" name="medicineId" value="<?php echo $row["MEDICINEID"]; ?>">
                                <button type="submit" name="delete" class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this medicine?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>
    </div>

    <div id="updateModal" class="hidden fixed top-0 left-0 w-full h-full flex items-center justify-center">
    <div class="modal-backdrop"></div>
    <div class="modal-content bg-gray-500 w-3/4 p-8 rounded-lg shadow-lg">
        <h2 class="text-white text-2xl font-semibold mb-4">Update Medicine</h2>
        <form action="" method="post" class="grid grid-cols-2 gap-4">
            <input type="hidden" id="updateMedicineId" name="medicineId" placeholder="Medicine ID" class="border border-gray-300 p-2 rounded col-span-2">

            <label class="text-white" for="updateName" style="display: block;">Name:</label>
            <input type="text" id="updateName" name="name" placeholder="Name" class="border border-gray-300 p-2 rounded" style="display: block;">

            <label class="text-white" for="updateDisease" style="display: block;">Disease:</label>
            <input type="text" id="updateDisease" name="disease" placeholder="Disease" class="border border-gray-300 p-2 rounded" style="display: block;">

            <label class="text-white" for="updatePrice" style="display: block;">Price:</label>
            <input type="number" id="updatePrice" name="price" placeholder="Price" class="border border-gray-300 p-2 rounded" style="display: block;">

            <label class="text-white" for="updateQuantity" style="display: block;">Quantity:</label>
            <input type="number" id="updateQuantity" name="quantity" placeholder="Quantity" class="border border-gray-300 p-2 rounded" style="display: block;">

            <label class="text-white" for="updateLocation" style="display: block;">Location:</label>
            <input type="text" id="updateLocation" name="location" placeholder="Location" class="border border-gray-300 p-2 rounded" style="display: block;">

            <div class="col-span-2 flex justify-end">
                <button type="submit" name="update" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update</button>
                <button type="button" id="closeUpdateModal" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 ml-2">Close</button>
            </div>
        </form>

    </div>
</div>



   
    <script>
        
        function openUpdateModal(medicineId, name, disease, price, quantity, location) {
            const updateModal = document.getElementById('updateModal');
            const updateMedicineId = document.getElementById('updateMedicineId');
            const updateName = document.getElementById('updateName');
            const updateDisease = document.getElementById('updateDisease');
            const updatePrice = document.getElementById('updatePrice');
            const updateQuantity = document.getElementById('updateQuantity');
            const updateLocation = document.getElementById('updateLocation');
            const closeUpdateModal = document.getElementById('closeUpdateModal');

            updateMedicineId.value = medicineId;
            updateName.value = name;
            updateDisease.value = disease;
            updatePrice.value = price;
            updateQuantity.value = quantity;
            updateLocation.value = location;
            updateModal.classList.remove('hidden');
        }

     
        const closeUpdateModal = document.getElementById('closeUpdateModal');
        closeUpdateModal.addEventListener('click', () => {
            const updateModal = document.getElementById('updateModal');
            updateModal.classList.add('hidden');
        });
        function toggleDarkMode() {
            const body = document.body;
            body.classList.toggle('dark-mode');
        }
    </script>
</body>

</html>