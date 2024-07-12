<x-app-layout>
  <h1 class="my-5 text-2xl font-bold">Relawan</h1>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-left text-sm text-gray-500">
      <caption class="bg-white p-5 text-left text-lg font-semibold text-gray-900">
        <div class="flex items-center justify-between">
          <h2>List Relawan</h2>
          <a href="{{ route('admin.relawan.create') }}">
            <x-primary-button class="font-semibold">
              Tambah Relawan
            </x-primary-button>
          </a>
        </div>
        <p class="mt-1 text-sm font-normal text-gray-500">
          Berikut adalah list relawan yang terdaftar di aplikasi ini.
        </p>
      </caption>
      <thead class="bg-gray-50 text-xs uppercase text-gray-700">
        <tr>
          <th scope="col" class="px-6 py-3">
            No
          </th>
          <th scope="col" class="px-6 py-3">
            Nama Lengkap
          </th>
          <th scope="col" class="px-6 py-3">
            Email
          </th>
          <th scope="col" class="px-6 py-3">
            Domisili
          </th>
          <th scope="col" class="px-6 py-3">
            Aksi
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($relawans as $relawan)
          <tr class="border-b bg-white hover:bg-gray-50">
            <th class="px-6 py-4">
              {{ $loop->iteration }}
            </th>
            <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
              {{ $relawan->name }}
            </th>
            <td class="whitespace-nowrap px-6 py-4">
              {{ $relawan->email }}
            </td>
            <td class="px-6 py-4 uppercase">
              {{ $relawan->domicile }}
            </td>
            <td class="flex items-center gap-3 px-6 py-4">
              <a href="{{ route('admin.relawan.edit', $relawan->id) }}"
                class="rounded-md border border-yellow-300 px-2 py-1 font-medium text-yellow-300 transition duration-300 ease-in-out hover:bg-yellow-300 hover:text-white hover:underline">
                <i class="fas fa-edit text-base"></i>
              </a>
              <form action="{{ route('admin.relawan.destroy', $relawan->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" data-toggle="tooltip" title="Delete"
                  class="show_confirm rounded-md border border-red-600 px-2 py-1 font-medium text-red-600 transition duration-300 ease-in-out hover:bg-red-600 hover:text-white hover:underline">
                  <i class="fas fa-trash text-base"></i>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <x-pagination :paginator="$relawans" />
  </div>
  <script type="text/javascript">
    $('.show_confirm').click(function(event) {
      const form = $(this).closest('form');
      const name = $(this).data('name');
      event.preventDefault();
      Swal.fire({
        title: `Apakah Anda yakin ingin menghapus data ini?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya!"
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  </script>
</x-app-layout>
