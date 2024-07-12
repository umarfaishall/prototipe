<x-app-layout>
    <div class="flex items-center gap-2">
        <a class="rounded-full bg-orange-400 px-1.5 py-0.5 text-white" href="{{ route('admin.aktivitas.index') }}">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="my-5 text-2xl font-bold">Ubah Aktivitas</h1>
    </div>
    <form class="flex flex-col gap-8 bg-white p-5 sm:rounded-lg"
        action="{{ route('admin.aktivitas.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <img src="{{ $activity->image_path ? asset('storage/images/' . $activity->image_path) : '' }}" alt="aktivitas"
            class="image_preview h-auto w-72 self-center rounded-lg object-cover object-center">
        <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
            <label for="image_preview" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">
                Gambar Aktivitas
            </label>
            <div class="relative">
                <input type="file" id="image_path" name="image_path" accept="image/*" class="hidden" />
                <label for="image_path"
                    class="cursor-pointer rounded-lg bg-gray-200 px-5 py-2.5 text-sm font-semibold text-gray-900 hover:bg-gray-300">
                    Pilih Gambar
                </label>
                <span id="image-name" class="mt-2 block text-sm text-gray-500"></span>
            </div>
        </div>
        <div class="flex flex-1 flex-col gap-4">
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="pilar" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">
                    Pilar Kegiatan</label>
                <input type="text" id="pilar"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    placeholder="Pendidikan" name="pilar_name" value="{{ $activity->pilar_name }}" required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="kegiatan" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Nama
                    Kegiatan</label>
                <input type="text" id="kegiatan"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    placeholder="Kegiatan X" name="activity_name" value="{{ $activity->activity_name }}" required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="jumlah_relawan" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Jumlah
                    Relawan</label>
                <input type="number" id="jumlah_relawan"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    placeholder="100" name="volunteer_count" value="{{ $activity->volunteer_count }}" required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="domisili"
                    class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Domisili</label>
                <input type="text" id="domisili"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    placeholder="Yogyakarta" name="domicile" value="{{ $activity->domicile }}" required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="titik_kumpul" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Titik
                    Kumpul</label>
                <input type="text" id="titik_kumpul"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    placeholder="Kantor Lazismu DIY" name="rally_point" value="{{ $activity->rally_point }}" required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="periode" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">
                    Periode Kegiatan
                </label>
                <div class="flex w-full items-center gap-2">
                    <input type="date" id="periode"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                        name="start_date" value="{{ $activity->start_date->format('Y-m-d') }}" required />
                    <span>s/d</span>
                    <input type="date" id="periode"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                        name="end_date" value="{{ $activity->end_date->format('Y-m-d') }}" required />
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="jam_kerja" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Jam
                    Kerja</label>
                <div class="flex w-full items-center gap-2">
                    <input type="time" id="jam_kerja"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                        name="start_time" value="{{ $activity->start_time->format('H:i') }}" required />
                    <span>s/d</span>
                    <input type="time" id="jam_kerja"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                        name="end_time" value="{{ $activity->end_time->format('H:i') }}" required />
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="tugas" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Tugas</label>
                <input type="text" id="tugas"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    name="task" placeholder="Tugas X" value="{{ $activity->task }}" required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="kriteria"
                    class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Kriteria</label>
                <input type="text" id="kriteria"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    name="criteria" placeholder="Kriteria X" value="{{ $activity->criteria }}" required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="registration_limit" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">
                    Batas Pendaftaran
                </label>
                <input type="date" id="batas_pendaftaran"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    name="registration_limit" value="{{ $activity->registration_limit->format('Y-m-d') }}"
                    required />
            </div>
            <div class="ms-auto flex">
                <button type="submit"
                    class="rounded-lg bg-green-500 px-5 py-2.5 text-sm font-semibold text-white hover:bg-green-600">
                    Simpan
                </button>
            </div>
        </div>
    </form>
    <script>
        const image = document.getElementById('image_path');
        const imageName = document.getElementById('image-name');
        const imagePreview = document.querySelector('.image_preview');

        image.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    imagePreview.src = reader.result;
                }
                reader.readAsDataURL(file);
                imageName.textContent = file.name;
            }
        });    </script>
</x-app-layout>
