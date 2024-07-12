<x-app-layout>
    <div class="flex items-center gap-2">
      <a class="rounded-full bg-orange-400 px-1.5 py-0.5 text-white" href="{{ url()->previous() }}">
        <i class="fas fa-arrow-left"></i>
      </a>
      <h1 class="my-5 text-2xl font-bold">Relawan Aktivitas</h1>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-left text-sm text-gray-500">
        <caption class="bg-white p-5 text-left text-lg font-semibold text-gray-900">
          <div class="flex items-center justify-between">
            <h2>List Relawan - Aktivitas</h2>
          </div>
          <p class="mt-1 text-sm font-normal text-gray-500">
            Berikut adalah list relawan untuk aktivitas .
          </p>
        </caption>
        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
          <tr>
            <th scope="col" class="px-6 py-3">
              No
            </th>
            <th scope="col" class="px-6 py-3">
              Nama Relawan
            </th>
            <th scope="col" class="px-6 py-3">
              Email
            </th>
            <th scope="col" class="px-6 py-3">
              Nomor Telepon
            </th>
            <th scope="col" class="px-6 py-3">
              Status
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($volunteer as $item)
            <tr class="border-b bg-white hover:bg-gray-50" data-id="{{ $item->id }}"
              data-full-name="{{ $item->full_name }}" data-email="{{ $item->email }}"
              data-reason1="{{ $item->reason_1 }}" data-reason2="{{ $item->reason_2 }}" data-phone="{{ $item->phone }}">
              <th class="px-6 py-4">
                {{ $loop->iteration }}
              </th>
              <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                {{ $item->full_name }}
              </th>
              <td class="whitespace-nowrap px-6 py-4">
                {{ $item->email }}
              </td>
              <td class="whitespace-nowrap px-6 py-4">
                {{ $item->phone }}
              </td>
              <td class="px-6 py-4 uppercase">
                @if ($item->status == 'approved')
                  <span class="rounded-full bg-green-200 px-2 py-1 font-semibold text-green-700">
                    Disetujui
                  </span>
                @elseif ($item->status == 'rejected')
                  <span class="rounded-full bg-red-200 px-2 py-1 font-semibold text-red-700">
                    Ditolak
                  </span>
                @else
                  <span class="rounded-full bg-yellow-200 px-2 py-1 font-semibold text-yellow-700">
                    Menunggu
                  </span>
                @endif
              </td>
              {{-- <td class="flex items-center gap-3 px-6 py-4">
                <a href="#"
                  class="view-details rounded-md border border-blue-500 px-2 py-1 font-medium text-blue-500 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white hover:underline"
                  data-id="{{ $item->id }}">
                  <i class="fas fa-eye text-base"></i>
                </a>
                <a href="#"
                  class="approve-status rounded-md border border-green-500 px-2 py-1 font-medium text-green-500 transition duration-300 ease-in-out hover:bg-green-500 hover:text-white hover:underline"
                  data-id="{{ $item->id }}">
                  <i class="fa-solid fa-check text-base"></i>
                </a>
                <a href="#"
                  class="reject-status rounded-md border border-red-500 px-2 py-1 font-medium text-red-500 transition duration-300 ease-in-out hover:bg-red-500 hover:text-white hover:underline"
                  data-id="{{ $item->id }}">
                  <i class="fa-solid fa-xmark text-base"></i>
                </a>
              </td> --}}
  
            </tr>
          @endforeach
        </tbody>
      </table>
      {{-- <x-pagination :paginator="$activities" /> --}}
    </div>
    {{-- <button data-modal-target="modal" data-modal-toggle="modal"
          class="block rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
          type="button">
          Toggle modal
      </button> --}}
    {{-- <div id="modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
      class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
      <div class="relative max-h-full w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow">
          <!-- Modal header -->
          <div class="flex items-center justify-between rounded-t border-b p-4 md:p-5">
            <h3 class="text-xl font-semibold text-gray-900">
              Relawan Aktivitas 1
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
            <form class="space-y-4" action="#">
              <div>
                <label for="name" class="mb-2 block text-sm font-medium text-gray-900">
                  Nama Lengkap
                </label>
                <input type="text" name="name" id="name"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-orange-500 focus:ring-orange-500"
                  readonly />
              </div>
              <div>
                <label for="reason" class="mb-2 block text-sm font-medium text-gray-900">
                  Mengapa Anda tertarik untuk menjadi relawan pada aktivitas ini?
                </label>
                <textarea name="reason" id="reason"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-orange-500 focus:ring-orange-500"
                  readonly></textarea>
              </div>
              <div>
                <label for="why" class="mb-2 block text-sm font-medium text-gray-900">
                  Mengapa Anda adalah relawan yang tepat untuk aktivitas ini?
                </label>
                <textarea name="why" id="why"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-orange-500 focus:ring-orange-500"
                  readonly></textarea>
              </div>
              <div class="flex flex-col gap-2">
                <div class="grid grid-cols-2 gap-4">
                  <div>
                    <label for="phone" class="mb-2 block text-sm font-medium text-gray-900">
                      Nomor Handphone
                    </label>
                    <input type="text" name="phone" id="phone"
                      class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-orange-500 focus:ring-orange-500"
                      readonly />
                  </div>
                  <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-gray-900">
                      Alamat Email
                    </label>
                    <input type="email" name="email" id="email"
                      class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-orange-500 focus:ring-orange-500"
                      readonly />
                  </div>
                </div>
              </div>
                <x-primary-button type="submit" class=" w-full" id="id">
                            Verifikasi Relawan
                        </x-primary-button>
            </form>
          </div>
        </div>
      </div>
    </div> --}}
  
    {{-- <script>
      $(document).ready(function() {
        $('.approve-status').on('click', function(e) {
          e.preventDefault();
          changeStatus('approved', $(this));
        });
  
        $('.reject-status').on('click', function(e) {
          e.preventDefault();
          changeStatus('rejected', $(this));
        });
  
        function changeStatus(action, element) {
          var id = element.data('id');
  
          $.ajax({
            url: '/admin/aktivitas/relawan/change-status', // URL endpoint di server Anda
            type: 'POST',
            data: {
              status: action,
              id: id,
              _token: '{{ csrf_token() }}' // Token CSRF untuk keamanan
            },
            success: function(response) {
  
              if (response.success) {
                Swal.fire({
                  icon: 'success',
                  title: 'Status berhasil diubah',
                  text: 'Status berhasil diubah ke ' + action,
                }).then(() => {
                  location.reload();
                });
              } else {
                alert('Gagal mengubah status.');
              }
            },
            error: function(xhr, status, error) {
              console.error('AJAX Error: ' + status + error);
            }
          });
        }
      });
  
      document.addEventListener('DOMContentLoaded', function() {
        const viewButtons = document.querySelectorAll('.view-details');
        const id = document.getElementById('id');
        const modal = document.getElementById('modal');
        const nameInput = document.getElementById('name');
        const reasonTextarea = document.getElementById('reason');
        const whyTextarea = document.getElementById('why');
        const phoneInput = document.getElementById('phone');
        const emailInput = document.getElementById('email');
  
        viewButtons.forEach(button => {
          button.addEventListener('click', function(event) {
            event.preventDefault();
            const row = this.closest('tr');
            const fullName = row.dataset.fullName;
            const email = row.dataset.email;
            const reason = row.dataset.reason1;
            const why = row.dataset.reason2;
            const phone = row.dataset.phone;
            const id = row.dataset.id;
  
            id.value = id;
            nameInput.value = fullName;
            reasonTextarea.value = reason;
            whyTextarea.value = why;
            phoneInput.value = phone;
            emailInput.value = email;
  
            // Initialize and show the modal
            const flowbiteModal = new Modal(modal);
            flowbiteModal.show();
          });
        });
  
        document.querySelectorAll('[data-modal-hide="modal"]').forEach(button => {
          button.addEventListener('click', () => {
            const flowbiteModal = new Modal(modal);
            flowbiteModal.hide();
          });
        });
      });
    </script> --}}
</x-app-layout>
  