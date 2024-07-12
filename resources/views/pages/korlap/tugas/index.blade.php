<x-app-layout>
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            <a class="rounded-full bg-orange-400 px-1.5 py-0.5 text-white" href="{{ url()->previous() }}">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="my-5 text-2xl font-bold">Tugas Harian Relawan</h1>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-left text-sm text-gray-500">
            <caption class="bg-white p-5 text-left text-lg font-semibold text-gray-900">
                <div class="flex items-center justify-between">
                    <h2>List Tugas</h2>
                    <a href="{{ route('korlap.tugas.edit', $activity->id ) }}">
                        <x-primary-button class="font-semibold">
                            Tambah Detail Tugas
                        </x-primary-button>
                    </a>
                </div>
                <p class="mt-1 text-sm font-normal text-gray-500">
                    Berikut adalah list tugas yang dikerjakan pada pelaksanaan aktivitas
                </p>
            </caption>
            <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Aktivitas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi Pekerjaan
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                    <tr class="border-b bg-white hover:bg-gray-50">
                        <th class="px-6 py-4">
                            {{ $loop->iteration }}
                        </th>
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                            {{ date('d F Y', strtotime($detail->activity_date)) }}
                        </th>
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                            {{ $detail->description }}
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <x-pagination :paginator="$dates" /> --}}
    </div>
</x-app-layout>
