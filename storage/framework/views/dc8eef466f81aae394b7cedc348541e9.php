<nav class="fixed left-0 right-0 top-0 z-50 border-b border-gray-200 bg-white px-4 py-2.5">
    <div class="flex flex-wrap items-center justify-between">
      <div class="flex items-center justify-start">
        <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
          aria-controls="drawer-navigation"
          class="mr-2 cursor-pointer rounded-lg p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 md:hidden">
          <i class="fas fa-bars text-xl"></i>
          <span class="sr-only">Toggle sidebar</span>
        </button>
        <a href="#" class="mr-4 flex items-center justify-between">
          <img src="<?php echo e(asset('assets/img/icon.svg')); ?>" class="-my-6 mr-3 h-24" alt="Logo" />
        </a>
      </div>
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
              <?php echo e(Auth::user()->name); ?>

            </span>
            <span class="block truncate text-sm text-gray-900">
              <?php echo e(Auth::user()->email); ?>

            </span>
          </div>
          <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
            <li>
              <a href="<?php echo e(route('korlap.profil')); ?>" class="block px-4 py-2 text-sm hover:bg-gray-100">Profil Saya</a>
            </li>
          </ul>
          <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
            <li>
              <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100"
                  onclick="event.preventDefault(); this.closest('form').submit();">Sign out</a>
              </form>
            </li>
            </li>
          </ul>
        </div>
      </div>
    </div>
</nav>
  <?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/layouts/navbar/dashboardkor.blade.php ENDPATH**/ ?>