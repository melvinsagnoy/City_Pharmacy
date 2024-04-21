<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
            <div class="my-4">
                <h2 class="text-xl font-bold">Inventory Information</h2>
                <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="bg-blue-100 shadow-md rounded-lg p-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 mr-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M16 10.6c-.1-1.9-1.7-3.6-3.6-3.6H7.6c-1.9 0-3.5 1.7-3.6 3.6l-1.9 8.7c-.2 1 0 1.9.5 2.6.6.6 1.5.9 2.5.9h12c1 0 1.9-.3 2.5-.9.5-.7.7-1.6.5-2.6l-1.9-8.7zm-6 6.3c-.5 0-1-.4-1-1s.5-1 1-1 1 .4 1 1-.4 1-1 1zm1.9-5.5c-.3-.3-.6-.4-1.1-.4H7.2c-.5 0-.8.1-1.1.4-.3.3-.4.6-.4 1v.4c0 .4.1.8.4 1.1.3.3.6.4 1.1.4h3.6c.5 0 .8-.1 1.1-.4.3-.3.4-.6.4-1.1v-.4c-.1-.5-.2-.8-.5-1.1z" />
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Number of Medicines</h3>
                            <?php
                            
                            $numberOfMedicines = 100; 
                            
                            echo "<p class='text-xl'>$numberOfMedicines</p>";
                            ?>
                        </div>
                    </div>
                    <div class="bg-green-100 shadow-md rounded-lg p-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-500 mr-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 2a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V3zm10 3V3H7v2h6zM6 7v10a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V7H6z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Used Today</h3>
                            <?php
                           
                            $amountUsedToday = 25; 
                            
                            echo "<p class='text-xl'>$amountUsedToday</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
