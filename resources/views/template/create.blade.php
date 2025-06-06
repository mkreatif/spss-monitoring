@extends('layouts.app')

@section('content')
<main class="flex-1 p-8">

    <div class="max-w-lg">
        <h2 class="text-xl font-semibold mb-4">Form Create Template</h2>

        <form id="user-form" class="space-y-4" autocomplete="off">
            @csrf

            <div>
                <label for="cabang" class="block font-bold text-sm text-indigo-700 mb-1">Template Name</label>
                <input type="text" name="cabang" value="{{ old('cabang') }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                @error('cabang') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>

            <div>
                <label for="expedition_id" class="block font-bold text-sm text-indigo-700 mb-1">Expedition</label>
                <select name="expedition_id"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                    <option value="">-- Pilih Ekspedisi --</option>
                    @foreach ($expeditions as $expedition)
                    <option value="{{ $expedition->id }}" {{ old('expedition_id') == $expedition->id ? 'selected' : '' }}>
                        {{ $expedition->expedition_name }}
                    </option>
                    @endforeach
                </select>
                @error('expedition_id') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div>
                <label for="is_need_matching" class="block font-bold text-sm text-indigo-700 mb-1">
                    This Template Need Matching
                </label>
                <select name="is_need_matching"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                    <option value="">-- Pilih --</option>
                    <option value="1" {{ old('is_need_matching') == '1' ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('is_need_matching') == '0' ? 'selected' : '' }}>No</option>
                </select>
                @error('is_need_matching') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div>
                <label for="awb_number" class="block font-bold text-sm text-indigo-700 mb-1">AWB Number Position in Column</label>
                <input type="number" name="awb_number" value="{{ old('awb_number') }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                @error('awb_number') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div>
                <label for="mo_number" class="block font-bold text-sm text-indigo-700 mb-1">MO Number Position in Column</label>
                <input type="number" name="mo_number" value="{{ old('mo_number') }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                @error('mo_number') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div>
                <label for="branch" class="block font-bold text-sm text-indigo-700 mb-1">Branch Position in Column</label>
                <input type="number" name="branch" value="{{ old('branch') }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                @error('branch') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div>
                <label for="dn_number" class="block font-bold text-sm text-indigo-700 mb-1">DN Number Position in Column</label>
                <input type="number" name="dn_number" value="{{ old('dn_number') }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                @error('dn_number') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div>
                <label for="item_code" class="block font-bold text-sm text-indigo-700 mb-1">Item Code Position in Column</label>
                <input type="number" name="item_code" value="{{ old('item_code') }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                @error('item_code') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div>
                <label for="item_description" class="block font-bold text-sm text-indigo-700 mb-1">Item Description Position in Column</label>
                <input type="number" name="item_description" value="{{ old('item_description') }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                @error('item_description') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div>
                <label for="receive_name" class="block font-bold text-sm text-indigo-700 mb-1">Receive Name Position in Column</label>
                <input type="number" name="receive_name" value="{{ old('receive_name') }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                @error('receive_name') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div>
                <label for="receive_date" class="block font-bold text-sm text-indigo-700 mb-1">Receive Date Position in Column</label>
                <input type="number" name="receive_date" value="{{ old('receive_date') }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                @error('receive_date') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div>
                <label for="receve_time" class="block font-bold text-sm text-indigo-700 mb-1">Receive Time Position in Column</label>
                <input type="number" name="receve_time" value="{{ old('receve_time') }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-indigo-500" required>
                @error('receve_time') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>

            <div class="flex space-x-4 mt-6">
                <a href="{{ route('template.index') }}"
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
            const response = await fetch('{{ route("template.store") }}', {
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
                showToast(data.message ?? 'Gagal menyimpan data.', 'red');
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
            toast.classList.add('opacity-0', 'hidden');
        }, 3000);
    }
</script>

@endpush