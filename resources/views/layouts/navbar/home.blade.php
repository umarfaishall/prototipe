<nav class="fixed start-0 top-0 z-20 w-full border-b border-gray-200 bg-white shadow-lg">
  <div class="container mx-auto flex flex-wrap items-center justify-between p-4">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('assets/img/icon.svg') }}" class="-my-5 mr-3 h-20" alt="Logo" />
    </a>
    <div class="flex space-x-3 rtl:space-x-reverse md:order-2 md:space-x-0">
      @if (Auth::guest())
        <div class="flex gap-2">
          <a href="{{ route('login') }}">
            <button type="button"
              class="rounded-lg bg-orange-500 px-4 py-2 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-4 focus:ring-orange-300">
              Masuk
            </button>
          </a>
          <a href="{{ route('register') }}">
            <button type="button"
              class="rounded-lg bg-gray-500 px-4 py-2 text-center text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300">
              Daftar
            </button>
          </a>
        </div>
      @else
        @if (Auth::user()->role == 'admin')
          <a href="{{ route('admin.dashboard') }}">
            <x-primary-button type="button">
              Dashboard
            </x-primary-button>
          </a>
        @endif
        <div class="flex items-center lg:order-2">
          <button type="button"
            class="mx-3 flex rounded-full bg-gray-800 px-2.5 py-1 text-sm focus:ring-4 focus:ring-gray-300 md:mr-0"
            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
            <span class="sr-only">Open user menu</span>
            <i class="fas fa-user text-lg text-white"></i>
          </button>
          <!-- Dropdown menu -->
          <div class="z-50 my-4 hidden w-56 list-none divide-y divide-gray-100 rounded-xl bg-white text-base shadow"
            id="dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm font-semibold text-gray-900">
                {{ Auth::user()->name }}
              </span>
              <span class="block truncate text-sm text-gray-900">
                {{ Auth::user()->email }}
              </span>
            </div>
            <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
              <li>
                <a href="{{ route('relawan.profil') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Profil
                  Saya</a>
              </li>
              <li>
                <a href="{{ route('relawan.profil.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Edit
                  Profil</a>
              </li>
            </ul>
            <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100"
                    onclick="event.preventDefault(); this.closest('form').submit();">Sign out</a>
                </form>
              </li>
              </li>
            </ul>
          </div>
        </div>
      @endif
      <button data-collapse-toggle="navbar-sticky" type="button"
        class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden"
        aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto" id="navbar-sticky">
      <ul
        class="mt-4 flex flex-col rounded-lg p-4 font-medium rtl:space-x-reverse md:mt-0 md:flex-row md:space-x-8 md:border-0 md:p-0">
        <li>
          <a href="{{ route('home') }}"
            class="{{ request()->routeIs('home') ? 'bg-orange-500 text-white md:text-orange-500' : 'text-gray-900 md:hover:bg-transparent md:hover:text-orange-500' }} block rounded px-3 py-2 md:bg-transparent md:p-0">
            Home
          </a>
        </li>
        <li>
          <a href="#"
            class="flex w-full items-center justify-between rounded px-3 py-2 text-gray-900 md:w-auto md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-orange-500">
            Tentang Kami 
          </a>
          <!-- Dropdown menu -->
          {{-- <div id="tentangKami"
            class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white font-normal shadow">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a>
              </li>
            </ul>
          </div> --}}
        </li>
        <li>
          <a href="#"
            class="flex w-full items-center justify-between rounded px-3 py-2 text-gray-900 md:w-auto md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-orange-500">
            Program 
          </a>
          <!-- Dropdown menu -->
          {{-- <div id="program" class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white font-normal shadow">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a>
              </li>
            </ul>
          </div> --}}
        </li>
        <li>
          <a href="#"
            class="flex w-full items-center justify-between rounded px-3 py-2 text-gray-900 md:w-auto md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-orange-500">
            Layanan
          </a>
        </li>
        <li>
          <a href="{{ route('kolaborasi') }}"
            class="{{ request()->routeIs('kolaborasi*') ? 'bg-orange-500 text-white md:text-orange-500' : 'text-gray-900 md:hover:bg-transparent md:hover:text-orange-500' }} block rounded px-3 py-2 md:bg-transparent md:p-0"">
            Kolaborasi
          </a>
        </li>
        <li>
          <a href="#"
            class="block rounded px-3 py-2 text-gray-900 md:p-0 md:hover:bg-transparent md:hover:text-orange-500">
            Berita
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
