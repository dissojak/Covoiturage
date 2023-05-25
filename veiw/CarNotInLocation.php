<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Car Set for Location</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md max-w-md">
        <h1 class="text-2xl mb-4">You Have Not Set Your Car for Any Location</h1>
        <p class="text-gray-600 mb-6">For users to be located, you need to set your car's location.</p>
        <div class="flex space-x-4">
            <a href="AddLocation.php"
                class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 focus:bg-blue-600">Add Location</a>
            <a href="MakeLocation.php"
                class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600 focus:bg-green-600">Make Location</a>
        </div>
    </div>
</body>

</html>
