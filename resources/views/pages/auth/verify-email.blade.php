<x-guest-layout>
  <section class="h-screen bg-gray-50">
    <div class="mx-auto flex flex-col items-center justify-center px-6 py-8 md:h-screen lg:py-0">
      <div class="w-full rounded-lg border bg-white shadow sm:max-w-md md:mt-0 xl:p-0">
        <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
          <img class="mx-auto" src="{{ asset('assets/img/icon.svg') }}" alt="icons">
          <div class="space-y-1">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
              Verifikasi Email
            </h1>
            <p class="font-light text-gray-600">
              Silahkan verifikasi email anda untuk melanjutkan.
            </p>
          </div>
          @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-sm font-medium text-green-600">
              {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
          @endif
          <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
              <x-primary-button>
                {{ __('Resend Verification Email') }}
              </x-primary-button>
            </div>
          </form>

          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
              class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              {{ __('Log Out') }}
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-guest-layout>
