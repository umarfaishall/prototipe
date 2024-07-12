<x-app-layout>
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            <a class="rounded-full bg-orange-400 px-1.5 py-0.5 text-white" href="{{ url()->previous() }}"> 
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="my-5 text-2xl font-bold">Absensi Aktivitas</h1>
        </div>
    </div>
    {{-- <form class="flex flex-col gap-8 bg-white p-5 sm:rounded-lg" action="{{ route('korlap.aktivitas.absensi.absen') }}" method="post"> --}}
        @csrf
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 bg-white">
                <thead class="bg-gray-50">
                    <tr class="items-center">
                        <th scope="col"
                            class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider text-gray-500">
                            No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider text-gray-500">
                            Nama Lengkap
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-sm font-medium uppercase tracking-wider text-gray-500">
                            Tanggal Aktivitas
                        </th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="flex justify-center gap-10 px-6 py-3">
                            @foreach ($attendance_date as $date)
                                <span class="flex-1">{{ $date->format('d') }}</span>
                            @endforeach
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($users as $user)
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ $user->name }}</td>
                            <td class="flex justify-between gap-10 whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                @foreach ($user->attendance as $attendance)
                                    @if ($attendance->is_attended)
                                        <i class="fas fa-check text-green-500"></i>
                                    @else
                                        <i class="fas fa-times text-red-500"></i>
                                    @endif
                                @endforeach
                                {{-- @foreach ($attendance_date as $date)
                                    @if ($date->user_id == $user->id)
                                        <!-- Ensure matching user -->
                                        <input data-id="{{ $date->id }}" type="checkbox"
                                            class="focus:ring-3 mx-auto rounded border border-gray-300 bg-gray-50 text-orange-500 focus:ring-orange-300"
                                            {{ $date->is_attended == 1 ? 'checked' : '' }}>
                                    @endif
                                @endforeach --}}
                            </td>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- <div class="ms-auto flex">
            <button type="submit"
              class="rounded-lg bg-green-500 px-5 py-2.5 text-sm font-semibold text-white hover:bg-green-600">
              Update Absensi
            </button>
          </div> --}}
    {{-- </form> --}}
    

    {{-- <script>
        $(document).ready(function() {
            $('input[type="checkbox"]').on('click', function() {
                let id = $(this).data('id');
                // let is_attended = $(this).prop('checked')? 1 : 0;

                $.ajax({
                    url: '/admin/aktivitas/absensi/absen',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Add CSRF token for Laravel
                        id: id,
                        // is_attended: is_attended,
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script> --}}
</x-app-layout>
