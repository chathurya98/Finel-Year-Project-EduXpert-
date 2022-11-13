<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../../scripts/simplyfi.js" defer></script>
    <title>Simplifyer</title>
</head>

<body>
    <div class="flex justify-center items-center h-screen bg-slate-900">
        <div class="w-full">
            <section class="w-full flex justify-center mb-8">
                <img src="../../img/logo.png" class="w-1/4" alt="">
            </section>
            <section class="w-full flex justify-center space-x-2">
                <input id="searchInput" type="text" placeholder="Search..."
                    class="w-1/3 hover:bg-slate-600 bg-slate-700 p-2 focus:outline rounded-md focus:outline-slate-500 text-slate-200">
                <button id="searchBtn" onclick="search()"
                    class="bg-sky-600 py-2 px-6 rounded-md text-gray-100 font-medium hover:bg-sky-500 ">Search</button>
            </section>
        </div>
    </div>
</body>

</html>