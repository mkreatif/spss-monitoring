<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Monitoring Application</title>
    @vite('resources/css/app.css') {{-- Pastikan kamu pakai Vite --}}

    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body class="bg-white text-sm font-sans">

    <div class="flex justify-end p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="border border-blue-900 text-blue-900 px-4 py-1 font-bold">
                Exit
            </button>
        </form>
    </div>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5 border-r p-4 space-y-4">
            <a href="{{ route('user.index') }}" class="block text-center border border-blue-900 text-blue-900 font-bold py-2 hover:bg-blue-100">Master User</a>
            <a href="{{ route('expedition.index') }}" class="block text-center border border-blue-900 text-blue-900 font-bold py-2 hover:bg-blue-100">Master Expedition</a>
            <a href="{{ route('template.index') }}" class="block text-center border border-blue-900 text-blue-900 font-bold py-2 hover:bg-blue-100">Master Template</a>
            <a href="{{ route('matching.index') }}" class="block text-center border border-blue-900 text-blue-900 font-bold py-2 hover:bg-blue-100">Report Matching</a>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>

    {{-- jQuery & DataTables JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    {{-- Tempat script tambahan dari setiap halaman --}}
    @stack('scripts')

</body>

</html>