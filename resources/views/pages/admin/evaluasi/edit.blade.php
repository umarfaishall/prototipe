<x-app-layout>
  <div class="flex items-center gap-2">
    <a class="rounded-full bg-orange-400 px-1.5 py-0.5 text-white" href="{{ redirect()->back() }}">
      <i class="fas fa-arrow-left"></i>
    </a>
    <h1 class="my-5 text-2xl font-bold">Evaluasi Relawan {{ $activityRegistration->full_name }}</h1>
  </div>
  <form class="flex flex-col gap-8 bg-white p-5 sm:rounded-lg" action="{{ route('admin.aktivitas.evaluasi.update',$activityRegistration->id ) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="flex flex-1 flex-col gap-4">
      <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
        <label for="name" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Nama Relawan</label>
        <input type="text" id="name"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          placeholder="Nama Relawan" name="name" value="{{ $activityRegistration->full_name }}" required />
      </div>
      {{-- text area evaluasi --}}
      <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
        <label for="evaluation" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Evaluasi</label>
        <textarea id="evaluation"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          placeholder="evaluasi" name="evaluation" required></textarea>
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
