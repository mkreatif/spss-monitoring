@extends('layouts.app')

@section('content')
<main class="flex-1 p-8">

    <div class="max-w-lg">
        <h2 class="text-xl font-semibold mb-4">Form Create User</h2>

        <form id="user-form" class="space-y-4" autocomplete="off">
            @csrf

            <div>
                <label for="name" class="block font-bold text-sm text-indigo-700 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                @error('name') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>

            <div>
                <label for="nik" class="block font-bold text-sm text-indigo-700 mb-1">NIK</label>
                <input type="text" name="nik" value="{{ old('nik') }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                @error('nik') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>

            <div>
                <label for="role_id" class="block font-bold text-sm text-indigo-700 mb-1">ROLE</label>
                <select name="role_id"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                    <option value="">-- Pilih Role --</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                    @endforeach
                </select>
                @error('role_id') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>

            <div>
                <label for="password" class="block font-bold text-sm text-indigo-700 mb-1">PASSWORD</label>
                <input type="password" name="password"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required autocomplete="new-password">
                @error('password') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>

            <div class="flex space-x-4 mt-6">
                <a href="{{ route('user.index') }}"
                    class="border border-gray-500 text-gray-700 px-4 py-2 rounded hover:bg-gray-100">
                    Cancel
                </a>
                <button type="submit" class="border border-indigo-700 text-white bg-indigo-700 px-6 py-2">Submit</button>
            </div>
        </form>
        <!-- Toast container -->
        <div id="toast" class="transition-all duration-300 opacity-0 fixed top-5 left-1/2 transform -translate-x-1/2 w-80 bg-green-500 text-white px-4 py-2 rounded shadow-lg">
            Data berhasil disimpan!
        </div>
    </div>

</main>
@endsection

@push('scripts')
<script>
    document.getElementById('user-form').addEventListener('submit', async function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        try {
            const response = await fetch('{{ route("user.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            const data = await response.json();

            if (data.success) {
                showToast('Data berhasil disimpan!', 'green');
                form.reset(); // opsional
            } else {
                showToast(data.message??'Gagal menyimpan data.', 'red');
            }
        } catch (error) {
            showToast('Terjadi kesalahan!', 'red');
            console.error(error);
        }
    });

    function showToast(message, color) {
        const toast = document.getElementById('toast');
        toast.textContent = message;
        toast.classList.remove('opacity-0', 'hidden');
        toast.classList.add(`bg-${color}-500`, 'opacity-100');

        setTimeout(() => {
            toast.classList.add('opacity-0','hidden');
        }, 3000);
    }
</script>

@endpush