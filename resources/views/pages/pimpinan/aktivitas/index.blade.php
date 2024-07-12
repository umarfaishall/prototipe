<x-app-layout>
    <h1 class="my-5 text-2xl font-bold">Aktivitas</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-left text-sm text-gray-500">
        <caption class="bg-white p-5 text-left text-lg font-semibold text-gray-900">
          <div class="flex items-center justify-between">
            <h2>List Aktivitas</h2>
          </div>
          <p class="mt-1 text-sm font-normal text-gray-500">
            Berikut adalah list aktivitas yang telah dibuat oleh admin.
          </p>
        </caption>
        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
          <tr>
            <th scope="col" class="px-6 py-3">
              No
            </th>
            <th scope="col" class="px-6 py-3">
              Nama Kegiatan
            </th>
            <th scope="col" class="px-6 py-3">
              Periode Kegiatan
            </th>
            <th scope="col" class="px-6 py-3">
              Status
            </th>
            <th scope="col" class="px-6 py-3">
              Aksi
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($activities as $activity)
            <tr class="border-b bg-white hover:bg-gray-50">
              <th class="px-6 py-4">
                {{ $loop->iteration }}
              </th>
              <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                {{ $activity->activity_name }}
              </th>
              <td class="whitespace-nowrap px-6 py-4">
                {{ $activity->start_date->translatedFormat('d F Y') }} -
                {{ $activity->end_date->translatedFormat('d F Y') }}
              </td>
              <td class="px-6 py-4 uppercase">
                {{ $activity->status }}
              </td>
              <td class="flex items-center gap-3 px-6 py-4">
                <a href="{{ route('pimpinan.aktivitas.show', $activity->id) }}"
                  class="rounded-md border border-blue-500 px-2 py-1 font-medium text-blue-500 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white hover:underline">
                  <i class="fas fa-eye text-base"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <x-pagination :paginator="$activities" />
    </div>
</x-app-layout>
  