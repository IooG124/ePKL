<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <div class="bg-[#f9fafb] rounded-lg p-6 shadow-md">
            <h1 class="text-3xl font-bold text-[#2d3748] mb-6">Edit DUDI</h1>
            <form action="{{ route('dudi.update', $dudi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="namadudi" class="block text-gray-700 font-bold">Nama DUDI</label>
                    <input type="text" id="namadudi" name="namadudi" class="w-full border border-gray-300 rounded-lg p-2" value="{{ $dudi->namadudi }}" required>
                </div>
                <div class="mb-4">
                    <label for="lokasi" class="block text-gray-700 font-bold">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi" class="w-full border border-gray-300 rounded-lg p-2" value="{{ $dudi->lokasi }}" required>
                </div>
                <div class="mb-4">
                    <label for="contactperson" class="block text-gray-700 font-bold">Contact Person</label>
                    <input type="text" id="contactperson" name="contactperson" class="w-full border border-gray-300 rounded-lg p-2" value="{{ $dudi->contactperson }}" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-mainTemplate>
