<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monitoring Application</title>
    @vite('resources/css/app.css') {{-- Pastikan kamu pakai Vite --}}
</head>
<body class="bg-white text-sm font-sans">

    <div class="flex justify-end p-4">
        <a href="{{ route('logout') }}" class="border border-blue-900 text-blue-900 px-4 py-1 font-bold">Exit</a>
    </div>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5 border-r p-4 space-y-4">
            <button class="w-full border border-blue-900 text-blue-900 font-bold py-2">Master User</button>
            <button class="w-full border border-blue-900 text-blue-900 font-bold py-2">Master Expedition</button>
            <button class="w-full border border-blue-900 text-blue-900 font-bold py-2">Master Template</button>
            <button class="w-full border border-blue-900 text-blue-900 font-bold py-2">Report Matching</button>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>

</body>
</html>
