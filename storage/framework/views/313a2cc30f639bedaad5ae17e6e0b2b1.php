<aside
  class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-white pt-16 transition-transform md:translate-x-0"
  aria-label="Sidenav" id="drawer-navigation">
  <div class="h-full overflow-y-auto bg-white px-3 py-5">
    <ul class="space-y-2">
      <?php if(auth()->user()->role == 'korlap'): ?>
        <li>
          <a href="<?php echo e(route('korlap.dashboardkor')); ?>"
            class="<?php echo e(request()->routeIs('korlap.dashboardkor')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100'); ?> group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fas fa-home <?php echo e(request()->routeIs('korlap.dashboardkor')? 'text-white' : 'text-gray-500 group-hover:text-gray-900'); ?> text-lg transition duration-75"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(route('korlap.aktivitas.index')); ?>"
            class="<?php echo e(request()->routeIs('korlap.aktivitas*')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100'); ?> group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fas fa-bullhorn <?php echo e(request()->routeIs('korlap.aktivitas*')? 'text-white' : 'text-gray-500 group-hover:text-gray-900'); ?> text-lg transition duration-75"></i>
            <span>Aktivitas</span>
          </a>
        </li>  
      <?php elseif(auth()->user()->role == 'pimpinan'): ?>
        <li>
          <a href="<?php echo e(route('pimpinan.dashboardpim')); ?>"
            class="<?php echo e(request()->routeIs('pimpinan.dashboardpim')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100'); ?> group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fas fa-home <?php echo e(request()->routeIs('pimpinan.dashboardpim')? 'text-white' : 'text-gray-500 group-hover:text-gray-900'); ?> text-lg transition duration-75"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(route('pimpinan.aktivitas.index')); ?>"
            class="<?php echo e(request()->routeIs('pimpinan.aktivitas*')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100'); ?> group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fas fa-bullhorn <?php echo e(request()->routeIs('pimpinan.aktivitas*')? 'text-white' : 'text-gray-500 group-hover:text-gray-900'); ?> text-lg transition duration-75"></i>
            <span>Aktivitas</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(route('pimpinan.relawan.index')); ?>"
            class="<?php echo e(request()->routeIs('pimpinan.relawan*')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100'); ?> group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fa-solid fa-handshake-angle <?php echo e(request()->routeIs('pimpinan.relawan*')? 'text-white' : 'text-gray-500 group-hover:text-gray-900'); ?> text-lg transition duration-75"></i>
            <span>Relawan</span>
          </a>
        </li>
      <?php elseif(auth()->user()->role == 'admin'): ?>
        <li>
          <a href="<?php echo e(route('admin.dashboard')); ?>"
            class="<?php echo e(request()->routeIs('admin.dashboard')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100'); ?> group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fas fa-home <?php echo e(request()->routeIs('admin.dashboard')? 'text-white' : 'text-gray-500 group-hover:text-gray-900'); ?> text-lg transition duration-75"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(route('admin.aktivitas.index')); ?>"
            class="<?php echo e(request()->routeIs('admin.aktivitas*')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100'); ?> group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fas fa-bullhorn <?php echo e(request()->routeIs('admin.aktivitas*')? 'text-white' : 'text-gray-500 group-hover:text-gray-900'); ?> text-lg transition duration-75"></i>
            <span>Aktivitas</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(route('admin.relawan.index')); ?>"
            class="<?php echo e(request()->routeIs('admin.relawan*')? 'bg-orange-500 text-white' : 'text-gray-900 hover:bg-gray-100'); ?> group flex items-center gap-3 rounded-lg p-3 text-base font-medium">
            <i
              class="fa-solid fa-handshake-angle <?php echo e(request()->routeIs('admin.relawan*')? 'text-white' : 'text-gray-500 group-hover:text-gray-900'); ?> text-lg transition duration-75"></i>
            <span>Relawan</span>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</aside>
<?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>