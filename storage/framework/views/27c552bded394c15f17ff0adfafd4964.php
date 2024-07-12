<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  <h1 class="my-5 text-2xl font-bold">Dashboard</h1>
  <div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
    <div class="flex h-32 flex-col justify-between rounded-lg border-2 border-gray-200 bg-gray-200 p-5 md:h-64">
      <h2 class="text-xl font-semibold text-gray-800">Total Donatur</h2>
      <div class="flex items-center justify-between">
        <p class="text-3xl font-bold text-gray-800">100</p>
        <i class="fas fa-users text-6xl text-gray-800"></i>
      </div>
      <div class="border-t border-gray-900">
        <a href="#" class="mx-auto mt-2 flex w-fit items-center gap-2 text-lg text-blue-500">
          <span>
            Selengkapnya
          </span>
          <i class="fa-regular fa-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="flex h-32 flex-col justify-between rounded-lg border-2 border-gray-200 bg-gray-200 p-5 md:h-64">
      <h2 class="text-xl font-semibold text-gray-800">Total Dana Terkumpul</h2>
      <div class="flex items-center justify-between">
        <p class="text-3xl font-bold text-gray-800">Rp 100</p>
        <i class="fas fa-hand-holding-usd text-6xl text-gray-800"></i>
      </div>
      <div class="border-t border-gray-900">
        <a href="#" class="mx-auto mt-2 flex w-fit items-center gap-2 text-lg text-blue-500">
          <span>
            Selengkapnya
          </span>
          <i class="fa-regular fa-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="flex h-32 flex-col justify-between rounded-lg border-2 border-gray-200 bg-gray-200 p-5 md:h-64">
      <h2 class="text-xl font-semibold text-gray-800">Program Donasi</h2>
      <div class="flex items-center justify-between">
        <p class="text-3xl font-bold text-gray-800">10</p>
        <i class="fas fa-bullhorn text-6xl text-gray-800"></i>
      </div>
      <div class="border-t border-gray-900">
        <a href="#" class="mx-auto mt-2 flex w-fit items-center gap-2 text-lg text-blue-500">
          <span>
            Selengkapnya
          </span>
          <i class="fa-regular fa-circle-right"></i>
        </a>
      </div>
    </div>
  </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/pages/admin/dashboard.blade.php ENDPATH**/ ?>