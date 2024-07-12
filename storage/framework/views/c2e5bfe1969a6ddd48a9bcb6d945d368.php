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
  <div class="flex items-center gap-2">
    <a class="rounded-full bg-orange-400 px-1.5 py-0.5 text-white" href="<?php echo e(url()->previous()); ?>">
        <i class="fas fa-arrow-left"></i>
    </a>
    <h1 class="my-5 text-2xl font-bold">Relawan</h1>
  </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-left text-sm text-gray-500">
        <caption class="bg-white p-5 text-left text-lg font-semibold text-gray-900">
          <div class="flex items-center justify-between">
            <h2>List Relawan</h2>
          </div>
          <p class="mt-1 text-sm font-normal text-gray-500">
            Berikut adalah list relawan yang terdaftar di aplikasi ini.
          </p>
        </caption>
        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
          <tr>
            <th scope="col" class="px-6 py-3">
              No
            </th>
            <th scope="col" class="px-6 py-3">
              Nama Lengkap
            </th>
            <th scope="col" class="px-6 py-3">
              Email
            </th>
            <th scope="col" class="px-6 py-3">
              Domisili
            </th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $relawans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relawan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="border-b bg-white hover:bg-gray-50">
              <th class="px-6 py-4">
                <?php echo e($loop->iteration); ?>

              </th>
              <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                <?php echo e($relawan->name); ?>

              </th>
              <td class="whitespace-nowrap px-6 py-4">
                <?php echo e($relawan->email); ?>

              </td>
              <td class="px-6 py-4 uppercase">
                <?php echo e($relawan->domicile); ?>

              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <?php if (isset($component)) { $__componentOriginald9373deb1a5851d9b00ecd5c1ba52da9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald9373deb1a5851d9b00ecd5c1ba52da9 = $attributes; } ?>
<?php $component = App\View\Components\Pagination::resolve(['paginator' => $relawans] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Pagination::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald9373deb1a5851d9b00ecd5c1ba52da9)): ?>
<?php $attributes = $__attributesOriginald9373deb1a5851d9b00ecd5c1ba52da9; ?>
<?php unset($__attributesOriginald9373deb1a5851d9b00ecd5c1ba52da9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald9373deb1a5851d9b00ecd5c1ba52da9)): ?>
<?php $component = $__componentOriginald9373deb1a5851d9b00ecd5c1ba52da9; ?>
<?php unset($__componentOriginald9373deb1a5851d9b00ecd5c1ba52da9); ?>
<?php endif; ?>
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
  <?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/pages/pimpinan/relawan/index.blade.php ENDPATH**/ ?>