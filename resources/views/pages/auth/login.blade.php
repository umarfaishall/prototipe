<x-guest-layout>
  <section class="h-screen bg-gray-50">
    <div class="mx-auto flex flex-col items-center justify-center px-6 py-8">
      <div class="w-full rounded-lg border bg-white shadow sm:max-w-md md:mt-0 xl:p-0">
        <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
          <img class="mx-auto" src="{{ asset('assets/img/icon.svg') }}" alt="icons">
          <div class="space-y-1">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
              Login
            </h1>
            <p class="font-light text-gray-600">Silahkan login jika sudah memiliki akun.</p>
          </div>
          <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
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
            <div>
              <label for="password" class="mb-2 block text-sm font-medium text-gray-900">
                Password
              </label>
              <input type="password" name="password" id="password" placeholder="••••••••"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-orange-500 focus:ring-orange-500 sm:text-sm"
                required>
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="flex items-center justify-between">
              <div class="flex items-start">
                <div class="flex h-5 items-center">
                  <input id="remember" aria-describedby="remember" type="checkbox"
                    class="focus:ring-3 h-4 w-4 rounded border border-gray-300 bg-gray-50 text-orange-500 focus:ring-orange-300">
                </div>
                <div class="ml-3 text-sm">
                  <label for="remember" class="text-gray-500">Remember me</label>
                </div>
              </div>
              <a href="{{ route('password.request') }}" class="text-sm font-medium text-orange-500 hover:underline">Lupa
                password?</a>
            </div>
            <x-primary-button class="w-full">
              Sign in
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
