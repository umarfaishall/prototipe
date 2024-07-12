<x-app-layout>
    <h1 class="my-5 text-2xl font-bold">Edit Profile</h1>
    <div class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-md">
      <form method="POST" action="">
        @csrf
        @method('PUT')
        <div class="mb-4">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="name">
            Name
          </label>
          <input type="text" name="name" id="name"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-orange-500 focus:ring-orange-500 sm:text-sm"
            value="{{ Auth::user()->name }}" required>
        </div>
        <div class="mb-6">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="email">
            Email
          </label>
          <input type="email" name="email" id="email"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-orange-500 focus:ring-orange-500 sm:text-sm"
            value="{{ Auth::user()->email }}" required>
        </div>
        <div class="mb-6">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="password">
            Password
          </label>
          <input type="password" name="password" id="password"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-orange-500 focus:ring-orange-500 sm:text-sm"
            required>
        </div>
        <div class="mb-6">
          <label class="mb-2 block text-sm font-bold text-gray-700" for="password_confirmation">
            Confirm Password
          </label>
          <input type="password" name="password_confirmation" id="password_confirmation"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-orange-500 focus:ring-orange-500 sm:text-sm"
            required>
        </div>
        <div class="flex items-center justify-between">
          <x-primary-button type="submit">
            Update
          </x-primary-button>
        </div>
      </form>
    </div>
</x-app-layout>
  