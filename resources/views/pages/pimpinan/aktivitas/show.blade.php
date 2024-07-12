<x-app-layout>
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            <a class="rounded-full bg-orange-400 px-1.5 py-0.5 text-white" href="{{ route('pimpinan.aktivitas.index') }}">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="my-5 text-2xl font-bold">Detail Aktivitas</h1>
        </div>
        <div class="flex items-center gap-3">
            <a href={{ route('pimpinan.aktivitas.relawan.index', $activity->id) }}
                class="rounded-lg bg-blue-500 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-600">
                Relawan
            </a>
            <a href={{ route('pimpinan.aktivitas.absensi.index', $activity->id) }}
                class="rounded-lg bg-green-500 px-5 py-2.5 text-sm font-semibold text-white hover:bg-green-600">
                Absensi
            </a>
            {{-- <a href={{ route('admin.aktivitas.evaluasi.index', $activity->id) }}
                class="rounded-lg bg-green-500 px-5 py-2.5 text-sm font-semibold text-white hover:bg-green-600">
                Evaluasi
            </a> --}}
        </div>
    </div>
    <div class="flex flex-col gap-8 bg-white p-5 sm:rounded-lg">
        <img src="{{ $activity->image_path ? asset('storage/images/' . $activity->image_path) : asset('assets/img/icon.svg') }}"
            alt="aktivitas" class="h-auto w-28 self-center rounded-lg object-cover object-center">
        <div class="flex flex-1 flex-col gap-4">
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="pilar" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">
                    Pilar Kegiatan</label>
                <input type="text" id="pilar"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    placeholder="Pendidikan" name="pilar_name" value="{{ $activity->pilar_name }}" readonly
                    required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="kegiatan" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Nama
                    Kegiatan</label>
                <input type="text" id="kegiatan"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    placeholder="Kegiatan X" name="activity_name" value="{{ $activity->activity_name }}" readonly
                    required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="jumlah_relawan" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Jumlah
                    Relawan</label>
                <input type="number" id="jumlah_relawan"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    placeholder="100" name="volunteer_count" value="{{ $activity->volunteer_count }}" readonly
                    required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="domisili"
                    class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Domisili</label>
                <input type="text" id="domisili"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    placeholder="Yogyakarta" name="domicile" value="{{ $activity->domicile }}" readonly required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="titik_kumpul" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Titik
                    Kumpul</label>
                <input type="text" id="titik_kumpul"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    placeholder="Kantor Lazismu DIY" name="rally_point" value="{{ $activity->rally_point }}" readonly
                    required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="periode" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">
                    Periode Kegiatan
                </label>
                <div class="flex w-full items-center gap-2">
                    <input type="date" id="periode"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                        name="start_date" value="{{ $activity->start_date->format('Y-m-d') }}" readonly required />
                    <span>s/d</span>
                    <input type="date" id="periode"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                        name="end_date" value="{{ $activity->end_date->format('Y-m-d') }}" readonly required />
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="jam_kerja" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Jam
                    Kerja</label>
                <div class="flex w-full items-center gap-2">
                    <input type="time" id="jam_kerja"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                        name="start_time" value="{{ $activity->start_time->format('H:i') }}" readonly required />
                    <span>s/d</span>
                    <input type="time" id="jam_kerja"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                        name="end_time" value="{{ $activity->end_time->format('H:i') }}" readonly required />
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="tugas" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Tugas</label>
                <input type="text" id="tugas"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    name="task" placeholder="Tugas X" value="{{ $activity->task }}" readonly required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="kriteria"
                    class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Kriteria</label>
                <input type="text" id="kriteria"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    name="criteria" placeholder="Kriteria X" value="{{ $activity->criteria }}" readonly required />
            </div>
            <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
                <label for="registration_limit" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">
                    Batas Pendaftaran
                </label>
                <input type="date" id="batas_pendaftaran"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
                    name="registration_limit" value="{{ $activity->registration_limit->format('Y-m-d') }}" readonly
                    required />
            </div>
        </div>
    </div>
</x-app-layout>
