<x-home-layout>
  <section class="container flex flex-col gap-5">
    <h1 class="text-2xl font-bold">Edit Profile</h1>
    <form action="{{ route('relawan.profil.update') }}" class="flex w-full flex-col gap-5" method="POST"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <img src="{{ Auth::user()->profile_image ? asset('storage/profile/' . Auth::user()->profile_image) : '' }}"
        alt="profile" class="image_preview size-20 self-center rounded-full object-cover object-center">
      <div class="mx-auto flex w-full justify-center gap-2">
        <label for="image" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">
          Foto Profil
        </label>
        <div class="relative">
          <input type="file" id="image" name="image" accept="image/*" class="hidden" />
          <label for="image"
            class="cursor-pointer rounded-lg bg-gray-200 px-5 py-2.5 text-sm font-semibold text-gray-900 hover:bg-gray-300">
            Pilih Gambar
          </label>
          <span id="image-name" class="mt-2 block text-sm text-gray-500"></span>
        </div>
      </div>
      <div class="flex justify-between">
        <label for="name" class="block flex-1 text-sm font-medium text-gray-900">Nama Lengkap</label>
        <input type="text" id="name" name="name"
          class="flex-1 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          value="{{ Auth::user()->name }}" required />
      </div>
      <div class="flex justify-between">
        <label for="email" class="block flex-1 text-sm font-medium text-gray-900">Email</label>
        <input type="email" id="email" name="email"
          class="flex-1 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          value="{{ Auth::user()->email }}" required />
      </div>
      <div class="flex justify-between">
        <label for="phone" class="block flex-1 text-sm font-medium text-gray-900">Nomor Telepon</label>
        <input type="tel" id="phone" name="phone"
          class="flex-1 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          value="{{ Auth::user()->phone }}" required />
      </div>
      <div class="flex justify-between">
        <label for="domicile" class="block flex-1 text-sm font-medium text-gray-900">Domisili</label>
        <input type="text" id="domicile" name="domicile"
          class="flex-1 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          value="{{ Auth::user()->domicile }}" required />
      </div>
      <x-primary-button class="ms-auto" type="submit">
        Simpan
      </x-primary-button>
    </form>
  </section>
  <script>
    const image = document.getElementById('image');
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
    });
  </script>
</x-home-layout>
