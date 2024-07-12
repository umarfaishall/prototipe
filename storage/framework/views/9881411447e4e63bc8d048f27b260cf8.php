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
    <h1 class="my-5 text-2xl font-bold">Aktivitas</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-left text-sm text-gray-500">
        <caption class="bg-white p-5 text-left text-lg font-semibold text-gray-900">
          <div class="flex items-center justify-between">
            <h2>List Aktivitas</h2>
          </div>
          <p class="mt-1 text-sm font-normal text-gray-500">
            Berikut adalah list aktivitas yang telah dibuat oleh admin.
          </p>
        </caption>
        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
          <tr>
            <th scope="col" class="px-6 py-3">
              No
            </th>
            <th scope="col" class="px-6 py-3">
              Nama Kegiatan
            </th>
            <th scope="col" class="px-6 py-3">
              Periode Kegiatan
            </th>
            <th scope="col" class="px-6 py-3">
              Status
            </th>
            <th scope="col" class="px-6 py-3">
              Aksi
            </th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="border-b bg-white hover:bg-gray-50">
              <th class="px-6 py-4">
                <?php echo e($loop->iteration); ?>

              </th>
              <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                <?php echo e($activity->activity_name); ?>

              </th>
              <td class="whitespace-nowrap px-6 py-4">
                <?php echo e($activity->start_date->translatedFormat('d F Y')); ?> -
                <?php echo e($activity->end_date->translatedFormat('d F Y')); ?>

              </td>
              <td class="px-6 py-4 uppercase">
                <?php echo e($activity->status); ?>

              </td>
              <td class="flex items-center gap-3 px-6 py-4">
                <a href="<?php echo e(route('korlap.aktivitas.show', $activity->id)); ?>"
                  class="rounded-md border border-blue-500 px-2 py-1 font-medium text-blue-500 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white hover:underline">
                  <i class="fas fa-eye text-base"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <?php if (isset($component)) { $__componentOriginald9373deb1a5851d9b00ecd5c1ba52da9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald9373deb1a5851d9b00ecd5c1ba52da9 = $attributes; } ?>
<?php $component = App\View\Components\Pagination::resolve(['paginator' => $activities] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
  <?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/pages/korlap/aktivitas/index.blade.php ENDPATH**/ ?>