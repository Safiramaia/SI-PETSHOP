<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Memasukkan jQuery dari CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart Datatables -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

</head>

<body class="min-h-screen bg-gray-100">
    <x-navbar_admin/>

    <!-- Main Content -->
    
    <div class="p-4 ml-30">
        <div class="p-2  rounded-lg  mt-10">
            {{$slot}}
        </div>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <!-- Tambahkan skrip Flowbite sebelum penutup </body> -->
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>

    <!-- Import jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
</body>

</html>