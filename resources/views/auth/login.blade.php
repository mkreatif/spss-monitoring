<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Application</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white flex justify-center items-center min-h-screen">

    <div class="w-full max-w-md space-y-6 border-t border-b border-blue-500 py-10">
        <div class="text-center">
            <div class="inline-block border border-gray-200 px-4 py-2">
                <h1 class="text-sm font-semibold">LOGIN APPLICATION</h1>
            </div>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-5 px-8">
            @csrf

            <div class="border p-4">
                <label for="nik" class="block text-blue-900 font-bold">NIK</label>
                <input type="text" id="nik" name="nik" class="w-full mt-1 border-none focus:outline-none" placeholder="Nomor Induk Karyawan" required>
            </div>

            <div class="border p-4">
                <label for="password" class="block text-blue-900 font-bold">Password</label>
                <input type="password" id="password" name="password" class="w-full mt-1 border-none focus:outline-none" placeholder="Password" required>
            </div>

            <div class="border p-2 text-center">
                <button type="submit" class="w-full py-2 border border-blue-900 text-blue-900 hover:bg-blue-100 transition-all">
                    Login
                </button>
            </div>
        </form>

        @if($errors->any())
            <div class="text-red-500 text-center">
                {{ $errors->first() }}
            </div>
        @endif
    </div>

</body>
</html>
