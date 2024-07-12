<x-app-layout>
  <div class="flex items-center gap-2">
    <a class="rounded-full bg-orange-400 px-1.5 py-0.5 text-white" href="{{ route('admin.relawan.index') }}">
      <i class="fas fa-arrow-left"></i>
    </a>
    <h1 class="my-5 text-2xl font-bold">Edit Relawan</h1>
  </div>
  <form class="flex flex-col gap-8 bg-white p-5 sm:rounded-lg" action="{{ route('admin.relawan.update', $user->id) }}"
    method="POST">
    @csrf
    @method('PUT')
    <img src="{{ asset('assets/img/icon.svg') }}" alt="aktivitas"
      class="h-auto w-28 self-center rounded-lg object-cover object-center">
    <div class="flex flex-1 flex-col gap-4">
      <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
        <label for="name" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Nama Relawan</label>
        <input type="text" id="name"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          placeholder="Nama Relawan" name="name" value="{{ $user->name }}" required />
      </div>
      <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
        <label for="email" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Email</label>
        <input type="email" id="email"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          placeholder="Email" name="email" value="{{ $user->email }}" required />
      </div>
      <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
        <label for="password" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Password</label>
        <input type="password" id="password"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          placeholder="Password" name="password" />
      </div>
      <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
        <label for="phone" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Nomor Telepon</label>
        <input type="text" id="phone"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          placeholder="Nomor Telepon" name="phone" value="{{ $user->phone }}" required />
      </div>
      <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
        <label for="domicile" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Domisili</label>
        <input type="text" id="domicile"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          placeholder="Domisili" name="domicile" value="{{ $user->domicile }}" required />
      </div>
      <div class="ms-auto flex">
        <button type="submit"
          class="rounded-lg bg-green-500 px-5 py-2.5 text-sm font-semibold text-white hover:bg-green-600">
          Update
        </button>
      </div>
    </div>
  </form>
</x-app-layout>
