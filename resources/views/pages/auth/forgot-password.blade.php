<x-guest-layout>
  <section class="h-screen bg-gray-50">
    <div class="mx-auto flex flex-col items-center justify-center px-6 py-8 md:h-screen lg:py-0">
      <div class="w-full rounded-lg border bg-white shadow sm:max-w-md md:mt-0 xl:p-0">
        <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
          <img class="mx-auto" src="{{ asset('assets/img/icon.svg') }}" alt="icons">
          <div class="space-y-1">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
              Lupa Password
            </h1>
            <p class="font-light text-gray-600">
              Silahkan masukkan email yang terdaftar untuk mendapatkan link reset password.
            </p>
          </div>
          <form class="space-y-4 md:space-y-6" action="{{ route('password.email') }}">
            @csrf
            <div>
              <label for="email" class="mb-2 block text-sm font-medium text-gray-900">
                Email
              </label>
              <input type="email" name="email" id="email"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-orange-500 focus:ring-orange-500 sm:text-sm"
                placeholder="name@company.com" required>
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <x-primary-button class="w-full">
              Lupa Password
            </x-primary-button>
            <p class="text-sm font-light text-gray-500">
              Belum punya akun?
              <a href="{{ route('register') }}" class="font-medium text-orange-500 hover:underline">
                Register
              </a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-guest-layout>
