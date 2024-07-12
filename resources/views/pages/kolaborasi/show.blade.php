<x-home-layout>
  <div class="flex flex-wrap gap-8">
    <section class="flex flex-1 flex-col gap-8">
      <img class="h-96 w-full rounded-lg object-cover"
        src="{{ $activity->image_path ? asset('storage/images/' . $activity->image_path) : 'https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' }}"
        alt="relawan1">
      <div class="flex flex-col gap-4">
        <h2 class="text-xl font-semibold uppercase">Detail Aktivitas</h2>
        <div class="grid grid-cols-2">
          <div class="flex flex-col gap-4">
            <span class="font-semibold">Nama Program</span>
            <span class="font-semibold">Relawan Dibutuhkan</span>
            <span class="font-semibold">Total Jam Kerja</span>
            <span class="font-semibold">Tugas Relawan</span>
            <span class="font-semibold">Kriteria Relawan</span>
            <span class="font-semibold">Domisili</span>
          </div>
          <div class="flex flex-col gap-4">
            <span>{{ $activity->activity_name }}</span>
            <span>{{ $activity->volunteer_count }} Orang</span>
            <span>{{ $activity->start_time->diffInHours($activity->end_time) }} Jam</span>
            <span>{{ $activity->task }}</span>
            <span>{{ $activity->criteria }}</span>
            <span>{{ $activity->domicile }}</span>
          </div>
        </div>
      </div>
      <div class="border"></div>
      <div class="flex flex-col gap-4">
        <h2 class="text-xl font-semibold uppercase">Relawan Bergabung</h2>
          <span class="text-gray-600">({{ $registrationCount }} Orang)</span>
          @if ($registrationCount)
            <div class="flex flex-wrap gap-4">
              @foreach ($registrations as $registration)
                <div class="flex flex-col gap-2">
                  <div class="flex flex-col items-center">
                    <i class="fas fa-user-circle text-4xl"></i>
                    <span>{{ $registration->full_name }}</span>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        
    </section>
    <aside class="flex h-fit max-w-sm flex-col gap-8 rounded-md border p-4 shadow-md">
      <h1 class="text-center text-xl font-semibold">{{ $activity->activity_name }}</h1>
      <div class="flex flex-col gap-4">
        <div  
          class="text-orange-500 border border-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2 text-center me-2 mb-2 ">
          {{ $activity->pilar_name }}
        </div>
        <div class="flex items-center gap-2.5">
          <i class="fas fa-calendar-alt text-orange-500"></i>
          <span>Kegiatan</span>
        </div>
        <div class="flex items-start gap-2.5">
          <i class="fa-solid fa-clock text-orange-500"></i>
          <div class="-mt-1 flex flex-col gap-2">
            <span>Jadwal Pelaksanaan</span>
            <span> {{ \Carbon\Carbon::parse($activity->start_date)->translatedFormat('d F Y') }} -
              {{ \Carbon\Carbon::parse($activity->end_date)->translatedFormat('d F Y') }}</span>
            <span>{{ \Carbon\Carbon::parse($activity->start_time)->format('H:i') }} -
              {{ \Carbon\Carbon::parse($activity->end_time)->format('H:i') }} WIB</span>
          </div>
        </div>
        <div class="flex items-start gap-2.5">
          <i class="fas fa-map-marker-alt text-orange-500"></i>
          <span class="-mt-1">
            {{ $activity->rally_point }}
          </span>
        </div>
      </div>
      <div class="flex flex-col gap-4">
        <div class="flex items-center gap-2.5">
          <i class="fas fa-info-circle text-red-600"></i>
          <span class="text-red-600">Batas Pendaftaran :
            {{ \Carbon\Carbon::parse($activity->registration_limit)->translatedFormat('d F Y') }}</span>
        </div>
        @guest
          <a href="{{ route('login') }}"
            class="flex items-center justify-center gap-2 rounded-md bg-orange-500 py-2 font-semibold text-white transition duration-200 hover:bg-orange-600">
            <i class="fas fa-users"></i>Daftar Sekarang
          </a>
        @endguest
        @auth
          @if (
              $activity->activity_registration->contains('user_id', auth()->id()) &&
                  $activity->activity_registration->contains('status', 'approved'))
            <button
              class="flex items-center justify-center gap-2 rounded-md bg-green-500 py-2 font-semibold text-white transition duration-200 hover:bg-green-600"
              type="button" disabled>
              <i class="fas fa-users"></i>Telah Terdaftar
            </button>
          @elseif (
              $activity->activity_registration->contains('user_id', auth()->id()) &&
                  $activity->activity_registration->contains('status', 'pending'))
            <button
              class="cancel-button flex items-center justify-center gap-2 rounded-md bg-red-500 py-2 font-semibold text-white transition duration-200 hover:bg-red-600"
              type="button" data-id="{{ $activity->id }}">
              <i class="fas fa-users"></i>Batalkan Pendaftaran
            </button>
          @else
            <button data-modal-target="modal" data-modal-toggle="modal"
              class="flex items-center justify-center gap-2 rounded-md bg-orange-500 py-2 font-semibold text-white transition duration-200 hover:bg-orange-600"
              type="button">
              <i class="fas fa-users"></i>Daftar Sekarang
            </button>
          @endif
          <div id="modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
            <div class="relative max-h-full w-full max-w-lg p-4">
              <!-- Modal content -->
              <div class="relative rounded-lg bg-white shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between rounded-t border-b p-4 md:p-5">
                  <h3 class="text-xl font-semibold text-gray-900">
                    Daftar Aktivitas
                  </h3>
                  <button type="button"
                    class="end-2.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                    data-modal-hide="modal">
                    <i class="fa-solid fa-xmark text-base"></i>
                    <span class="sr-only">Close modal</span>
                  </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                  <form class="space-y-4" action="{{ route('relawan.registrasi.store') }}" method="POST">
                    @csrf
                    <div>
                      <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                      <label for="full_name" class="mb-2 block text-sm font-medium text-gray-900">
                        Nama Lengkap
                      </label>
                      <input type="text" name="full_name" id="full_name"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-orange-500 focus:ring-orange-500" />
                    </div>
                    <div>
                      <label for="reason_1" class="mb-2 block text-sm font-medium text-gray-900">
                        Mengapa Anda tertarik untuk menjadi relawan pada aktivitas ini?
                      </label>
                      <textarea name="reason_1" id="reason_1"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-orange-500 focus:ring-orange-500"></textarea>
                    </div>
                    <div>
                      <label for="reason_2" class="mb-2 block text-sm font-medium text-gray-900">
                        Mengapa Anda adalah relawan yang tepat untuk aktivitas ini?
                      </label>
                      <textarea name="reason_2" id="reason_2"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-orange-500 focus:ring-orange-500"></textarea>
                    </div>
                    <div class="flex flex-col gap-2">
                      <div class="grid grid-cols-2 gap-4">
                        <div>
                          <label for="phone" class="mb-2 block text-sm font-medium text-gray-900">
                            Nomor Handphone
                          </label>
                          <input type="text" name="phone" id="phone"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-orange-500 focus:ring-orange-500" />
                        </div>
                        <div>
                          <label for="email" class="mb-2 block text-sm font-medium text-gray-900">
                            Alamat Email
                          </label>
                          <input type="email" name="email" id="email"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-orange-500 focus:ring-orange-500" />
                        </div>
                      </div>
                    </div>
                    <x-primary-button type="submit" class="w-full">
                      Kirim Pendaftaran
                    </x-primary-button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endauth
        <div class="grid grid-cols-1 gap-2.5 md:grid-cols-3">
          <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"
            class="flex items-center justify-center gap-2 rounded-md bg-blue-500 py-2 font-semibold text-white transition duration-200 hover:bg-blue-600">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="https://web.whatsapp.com/send?text=Check%20out%20this%20event%20on%20WhatsApp:%20https%3A%2F%2Fexample.com"
            target="_blank" rel="noopener noreferrer"
            class="flex items-center justify-center gap-2 rounded-md bg-green-500 py-2 font-semibold text-white transition duration-200 hover:bg-green-600">
            <i class="fab fa-whatsapp"></i>
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com" target="_blank"
            rel="noopener noreferrer"
            class="flex items-center justify-center gap-2 rounded-md bg-blue-800 py-2 font-semibold text-white transition duration-200 hover:bg-blue-900">
            <i class="fab fa-facebook"></i>
          </a>
        </div>
      </div>
    </aside>
  </div>
  <script>
    $(document).ready(function() {
      $('.cancel-button').click(function() {
        const activityId = $(this).data('id');
        const token = $('meta[name="csrf-token"]').attr('content');
        Swal.fire({
          title: "Apakah Anda yakin?",
          text: "Anda akan membatalkan pendaftaran pada aktivitas ini.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya!"
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: `/registrasi/delete/${activityId}`,
              type: 'DELETE',
              data: {
                _token: token
              },
              success: function(response) {
                window.location.reload();
              }
            });
          }
        });
      });
    });
  </script>
</x-home-layout>