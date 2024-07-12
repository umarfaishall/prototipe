<x-home-layout>
  <section class="container flex flex-col gap-5">
    <h1 class="text-2xl font-bold">Profile</h1>
    <div class="flex flex-wrap justify-between gap-4">
      <div class="flex grow flex-col gap-4 rounded-lg border p-4 shadow-md">
        <div class="flex gap-4">
          <img class="size-14 rounded-full border" src="{{ Auth::user()->profile_image ? asset('storage/profile/' . Auth::user()->profile_image) : asset('assets/img/icon.svg') }}" alt="Rounded avatar">
          <div class="flex grow flex-col gap-2">
            <div class="flex items-center justify-between">
              <h2 class="text-xl font-bold">{{ $user->name }}</h2>
              <a href="{{ route('relawan.profil.edit') }}"
                class="rounded-lg border border-orange-500 px-4 py-1 text-orange-500 hover:bg-orange-500 hover:text-white">Edit</a>
            </div>
            <span>Domisili:{{ $user->domicile }}</span>
            <span>{{ $user->joined_since }}</span>
          </div>
        </div>
        <div class="border"></div>
        <div class="flex flex-wrap justify-between">
          <div class="flex gap-4">
            <i class="fas fa-users mt-1.5 text-orange-500"></i>
            <div class="flex flex-col gap-1">
              <span>Aktivitas Diikuti</span>
              <span class="text-gray-600">0</span>
            </div>
          </div>
          <div class="flex gap-4">
            <i class="fa-solid fa-trophy mt-1.5 text-orange-500"></i>
            <div class="flex flex-col gap-1">
              <span>Penghargaan Dimiliki</span>
              <span class="text-gray-600">0</span>
            </div>
          </div>
          <div class="flex gap-4">
            <i class="fa-solid fa-clock mt-1.5 text-orange-500"></i>
            <div class="flex flex-col gap-1">
              <span>Total Jam Kerja</span>
              <span class="text-gray-600">0</span>
            </div>
          </div>
        </div>
      </div>
      <div class="flex max-w-sm grow flex-col gap-4 rounded-lg border p-4 shadow-md">
        <div class="flex flex-col gap-1.5">
          <h2 class="text-lg font-semibold">Penghargaan yang dimiliki</h2>
          <div class="border"></div>
        </div>
        <div class="my-auto flex flex-col items-center justify-center gap-1">
          <i class="fas fa-database text-xl text-gray-500"></i>
          <span class="text-gray-500">Belum ada penghargaan</span>
        </div>
      </div>
    </div>
    <div class="flex grow flex-col gap-4 rounded-lg border p-4 shadow-md">
      <h2 class="text-lg font-semibold">Aktivitas</h2>
      <div class="border"></div>
      <div class="relative overflow-x-auto">
        <table class="w-full text-left">
          <thead class="border-b text-xs uppercase text-gray-700">
            <tr>
              <th scope="col" class="px-6 py-3">
                Nama Kegiatan
              </th>
              <th scope="col" class="px-6 py-3">
                Periode Kegiatan
              </th>
              <th scope="col" class="px-6 py-3">
                Lokasi
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
            {{-- @if ($user->activity_registration->count() > 0) --}}
              @foreach ($activityRegistration as $registration)
                <tr class="bg-white">
                  <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                    {{ $registration->activity->activity_name }}
                  </th>
                  <td class="whitespace-nowrap px-6 py-4">
                    {{ \Carbon\Carbon::parse($registration->activity->start_date)->translatedFormat('d F Y') }} -
                    {{ \Carbon\Carbon::parse($registration->activity->end_date)->translatedFormat('d F Y') }}
                  </td>
                  <td class="whitespace-nowrap px-6 py-4">
                    {{ $registration->activity->domicile }}
                  </td>
                  {{-- @foreach ($activityRegistration as $registration) --}}
                    <td class="px-6 py-4">
                      <span
                        class="inline-flex rounded-full px-2 text-xs font-semibold leading-7 uppercase
                        @if ($registration->status == 'approved')
                          bg-green-100 text-green-800
                        @elseif ($registration->status == 'pending')
                        bg-yellow-100 text-yellow-800
                        @else
                        bg-red-100 text-red-800
                        @endif">
                      {{ $registration->status }}
                      </span>
                    </td>
                  {{-- @endforeach --}}
                  <td class="whitespace nowrap px-6 py-4">
                    <a href="{{ route('relawan.profil.show', $registration->activity->id) }}"
                      class="rounded-md border border-blue-500 px-2 py-1 font-medium text-blue-500 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white hover:underline">
                      <i class="fas fa-eye text-base"></i>
                    </a>
                  </td>
                </tr>
              @endforeach

            {{-- @endif --}}
          </tbody>
        </table>
      </div>
    </div>
  </section>
</x-home-layout>
