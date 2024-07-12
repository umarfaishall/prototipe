<aside
  class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-white pt-16 transition-transform md:translate-x-0"
  aria-label="Sidenav" id="drawer-navigation">
  <div class="h-full overflow-y-auto bg-white px-3 py-5">
    <ul class="space-y-2">
      @if (auth()->user()->role == 'korlap')
        <li>
          <a href="{{ route('korlap.dashboardkor') }}"
            class="{{ request()->routeIs('korlap.dashboardkor')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100' }} group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fas fa-home {{ request()->routeIs('korlap.dashboardkor')? 'text-white' : 'text-gray-500 group-hover:text-gray-900' }} text-lg transition duration-75"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('korlap.aktivitas.index') }}"
            class="{{ request()->routeIs('korlap.aktivitas*')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100' }} group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fas fa-bullhorn {{ request()->routeIs('korlap.aktivitas*')? 'text-white' : 'text-gray-500 group-hover:text-gray-900' }} text-lg transition duration-75"></i>
            <span>Aktivitas</span>
          </a>
        </li>  
      @elseif (auth()->user()->role == 'pimpinan')
        <li>
          <a href="{{ route('pimpinan.dashboardpim') }}"
            class="{{ request()->routeIs('pimpinan.dashboardpim')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100' }} group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fas fa-home {{ request()->routeIs('pimpinan.dashboardpim')? 'text-white' : 'text-gray-500 group-hover:text-gray-900' }} text-lg transition duration-75"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('pimpinan.aktivitas.index') }}"
            class="{{ request()->routeIs('pimpinan.aktivitas*')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100' }} group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fas fa-bullhorn {{ request()->routeIs('pimpinan.aktivitas*')? 'text-white' : 'text-gray-500 group-hover:text-gray-900' }} text-lg transition duration-75"></i>
            <span>Aktivitas</span>
          </a>
        </li>
        <li>
          <a href="{{ route('pimpinan.relawan.index') }}"
            class="{{ request()->routeIs('pimpinan.relawan*')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100' }} group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fa-solid fa-handshake-angle {{ request()->routeIs('pimpinan.relawan*')? 'text-white' : 'text-gray-500 group-hover:text-gray-900' }} text-lg transition duration-75"></i>
            <span>Relawan</span>
          </a>
        </li>
      @elseif (auth()->user()->role == 'admin')
        <li>
          <a href="{{ route('admin.dashboard') }}"
            class="{{ request()->routeIs('admin.dashboard')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100' }} group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fas fa-home {{ request()->routeIs('admin.dashboard')? 'text-white' : 'text-gray-500 group-hover:text-gray-900' }} text-lg transition duration-75"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.aktivitas.index') }}"
            class="{{ request()->routeIs('admin.aktivitas*')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100' }} group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fas fa-bullhorn {{ request()->routeIs('admin.aktivitas*')? 'text-white' : 'text-gray-500 group-hover:text-gray-900' }} text-lg transition duration-75"></i>
            <span>Aktivitas</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.relawan.index') }}"
            class="{{ request()->routeIs('admin.relawan*')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100' }} group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fa-solid fa-handshake-angle {{ request()->routeIs('admin.relawan*')? 'text-white' : 'text-gray-500 group-hover:text-gray-900' }} text-lg transition duration-75"></i>
            <span>Relawan</span>
          </a>
        </li>
      @endif
    </ul>
  </div>
</aside>
