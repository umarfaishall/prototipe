<x-home-layout>
    <div class="flex flex-wrap gap-8">
        <section class="flex flex-1 flex-col gap-8">
          <h1 class="text-2xl font-semibold">Detail Kegiatan dan Absensi</h1>
          <table class="overflow-hidden rounded-lg bg-white shadow-lg text-left">
            <thead class="bg-gray-700 text-xs uppercase text-gray-50 p-4">
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
                    <th scope="col" class="px-6 py-3">
                      Kehadiran
                  </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendance_status as $status)
                    <tr class="border-b bg-white hover:bg-gray-50">
                        <th class="px-6 py-4">
                            {{ $loop->iteration }}
                        </th>
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                            {{ date('d F Y', strtotime($status['date'])) }}
                        </th>
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                          {{ $status['description'] }} 
                        </th>
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                          <p class="inline-flex rounded-full px-2 text-xs font-semibold leading-7 uppercase"
                            style="background-color: {{ $status['status'] === 'Hadir' ? 'green' : 'red' }}; color: white;">
                            {{ $status['status'] }}
                          </p>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
            {{-- <h1 class="text-2xl font-semibold">Detail Kehadiran</h1> --}}
            {{-- <div class="mx-auto w-full p-4">
                <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                    <div class="flex items-center justify-between bg-gray-700 px-6 py-3">
                        <button id="prevMonth" class="text-white">Previous</button>
                        <h2 id="currentMonth" class="text-white"></h2>
                        <button id="nextMonth" class="text-white">Next</button>
                    </div>
                    <div class="grid grid-cols-7 gap-2 p-4" id="calendar">
                        <!-- Calendar Days Go Here -->
                    </div>
                </div>
            </div> --}}
            <div class="flex flex-col flex-wrap gap-6">
                <h3 class="text-lg font-semibold">Keterangan: </h3>
                <div class="flex flex-col gap-2">
                    <div class="flex gap-4">
                        <div class="rounded-md bg-green-500 p-4"></div>
                        =
                        <span>Hadir</span>
                    </div>
                    <div class="flex gap-4">
                        <div class="rounded-md bg-red-500 p-4"></div>
                        =
                        <span>Tidak Hadir</span>
                    </div>
                </div>
                <span class="italic">
                    *Note : Jika terdapat kesalahan harap hubungi koordinator melalui grup whatsapp
                </span>
            </div>
        </section>
        <aside class="flex h-fit max-w-sm flex-1 flex-col gap-8 rounded-md border p-4 shadow-md">
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
                {{-- @guest
          <a href="{{ route('login') }}"
            class="flex items-center justify-center gap-2 rounded-md bg-orange-500 py-2 font-semibold text-white transition duration-200 hover:bg-orange-600">
            <i class="fas fa-users"></i>Daftar Sekarang
          </a>
        @endguest
        @auth
          @if ($activity->activity_registration->contains('user_id', auth()->id()) && $activity->activity_registration->contains('status', 'approved'))
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
        @endauth --}}
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
    {{-- <script>
        $(document).ready(function() {
            const attendanceDates = @json($attendance_date);
            // Function to generate the calendar for a specific month and year
            function generateCalendar(year, month) {
                const calendarElement = $('#calendar');
                const currentMonthElement = $('#currentMonth');

                // Create a date object for the first day of the specified month
                const firstDayOfMonth = new Date(year, month, 1);
                const daysInMonth = new Date(year, month + 1, 0).getDate();

                // Clear the calendar
                calendarElement.empty();

                // Set the current month text
                const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
                    'September',
                    'October', 'November', 'December'
                ];
                currentMonthElement.text(`${monthNames[month]} ${year}`);

                // Calculate the day of the week for the first day of the month (0 - Sunday, 1 - Monday, ..., 6 - Saturday)
                const firstDayOfWeek = firstDayOfMonth.getDay();

                // Create headers for the days of the week
                const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                daysOfWeek.forEach(day => {
                    const dayElement = $('<div>').addClass('text-center font-semibold').text(day);
                    calendarElement.append(dayElement);
                });

                // Create empty boxes for days before the first day of the month
                for (let i = 0; i < firstDayOfWeek; i++) {
                    const emptyDayElement = $('<div>');
                    calendarElement.append(emptyDayElement);
                }

                // Create boxes for each day of the month
                for (let day = 1; day <= daysInMonth; day++) {
                    const dayElement = $('<div>').addClass('text-center py-2 border cursor-pointer').text(day);
                    const currentDate = new Date();

                    const attendanceDate = attendanceDates.find(date => {
                        const dateObj = new Date(date.attendance_date);

                        if (dateObj.getDate() === day && dateObj.getMonth() === month && dateObj
                            .getFullYear() === year) {
                            if (day > currentDate.getDate() && month === currentDate.getMonth() && year ===
                                currentDate.getFullYear()) {
                                dayElement.addClass('bg-gray-500 text-white'); // Add classes for gray color
                            } else {
                                if (date.is_attended) {
                                    dayElement.addClass('bg-green-500 text-white');
                                } else {
                                    if (year === currentDate.getFullYear() && month === currentDate
                                        .getMonth() && day === currentDate.getDate()) {
                                        dayElement.addClass(
                                        'bg-blue-500 text-white'); // Add classes for the indicator
                                    } else {
                                        dayElement.addClass('bg-red-500 text-white');
                                    }
                                }
                            }
                        }
                    });

                    // Check if this date is the current date

                    // if (year === currentDate.getFullYear() && month === currentDate.getMonth() && day ===
                    //     currentDate
                    //     .getDate()) {
                    //     dayElement.addClass('bg-blue-500 text-white'); // Add classes for the indicator
                    // }
                    calendarElement.append(dayElement);
                }
            }
            // Initialize the calendar with the current month and year
            const currentDate = new Date();
            let currentYear = currentDate.getFullYear();
            let currentMonth = currentDate.getMonth();
            generateCalendar(currentYear, currentMonth);
            // Event listeners for previous and next month buttons
            $('#prevMonth').on('click', () => {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                generateCalendar(currentYear, currentMonth);
            });

            $('#nextMonth').on('click', () => {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                generateCalendar(currentYear, currentMonth);
            });
        });
    </script>
    </script> --}}
</x-home-layout>
