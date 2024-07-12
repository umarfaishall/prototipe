<x-guest-layout>
  <section class="h-full bg-gray-50">
    <div class="mx-auto flex flex-col items-center justify-center px-6 py-8">
      <div class="w-full rounded-lg border bg-white shadow sm:max-w-md md:mt-0 xl:p-0">
        <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
          <img class="mx-auto" src="{{ asset('assets/img/icon.svg') }}" alt="icons">
          <div class="space-y-1">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
              Register
            </h1>
            <p class="font-light text-gray-600">Mari bergabung bersama orang baik lainnya.</p>
          </div>
          <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            <div>
              <label for="name" class="mb-2 block text-sm font-medium text-gray-900">
                Nama Lengkap
              </label>
              <input type="text" name="name" id="name"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-orange-500 focus:ring-orange-500 sm:text-sm"
                placeholder="John Doe" required>
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
              <label for="email" class="mb-2 block text-sm font-medium text-gray-900">
                Email
              </label>
              <input type="email" name="email" id="email"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-orange-500 focus:ring-orange-500 sm:text-sm"
                placeholder="name@company.com" required>
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
              <label for="phone" class="mb-2 block text-sm font-medium text-gray-900">
                No Hp/WA
              </label>
              <input type="tel" name="phone" id="phone"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-orange-500 focus:ring-orange-500 sm:text-sm"
                placeholder="08xx-xxxx-xxxx" required>
              <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <div>
              <label for="password" class="mb-2 block text-sm font-medium text-gray-900">
                Password
              </label>
              <input type="password" name="password" id="password" placeholder="••••••••"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-orange-500 focus:ring-orange-500 sm:text-sm"
                required>
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            {{-- password confirmation --}}
            <div>
              <label for="password_confirmation" class="mb-2 block text-sm font-medium text-gray-900">
                Konfirmasi Password
              </label>
              <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-orange-500 focus:ring-orange-500 sm:text-sm"
                required>
              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="flex items-start">
              <div class="flex h-5 items-center">
                <input id="agreement" aria-describedby="agreement" type="checkbox"
                  class="focus:ring-3 h-4 w-4 rounded border border-gray-300 bg-gray-50 text-orange-500 focus:ring-orange-300"
                  required>
              </div>
              <div class="ml-3 text-sm">
                <label for="agreement" class="text-gray-500">
                  Dengan ini saya menyetujui dan mematuhi semua peraturan yang ada di website ini.
                </label>
              </div>
            </div>
            <x-primary-button class="w-full">
              Register
            </x-primary-button>
            <p class="text-sm font-light text-gray-500">
              Sudah punya akun?
              <a href="{{ route('login') }}" class="font-medium text-orange-500 hover:underline">
                Sign in
              </a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-guest-layout>
