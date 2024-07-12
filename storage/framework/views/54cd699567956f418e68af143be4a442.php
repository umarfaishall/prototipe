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
      <h1 class="my-5 text-2xl font-bold">Relawan Aktivitas</h1>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-left text-sm text-gray-500">
        <caption class="bg-white p-5 text-left text-lg font-semibold text-gray-900">
          <div class="flex items-center justify-between">
            <h2>List Relawan - Aktivitas</h2>
          </div>
          <p class="mt-1 text-sm font-normal text-gray-500">
            Berikut adalah list relawan untuk aktivitas .
          </p>
        </caption>
        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
          <tr>
            <th scope="col" class="px-6 py-3">
              No
            </th>
            <th scope="col" class="px-6 py-3">
              Nama Relawan
            </th>
            <th scope="col" class="px-6 py-3">
              Email
            </th>
            <th scope="col" class="px-6 py-3">
              Nomor Telepon
            </th>
            <th scope="col" class="px-6 py-3">
              Status
            </th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $volunteer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="border-b bg-white hover:bg-gray-50" data-id="<?php echo e($item->id); ?>"
              data-full-name="<?php echo e($item->full_name); ?>" data-email="<?php echo e($item->email); ?>"
              data-reason1="<?php echo e($item->reason_1); ?>" data-reason2="<?php echo e($item->reason_2); ?>" data-phone="<?php echo e($item->phone); ?>">
              <th class="px-6 py-4">
                <?php echo e($loop->iteration); ?>

              </th>
              <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                <?php echo e($item->full_name); ?>

              </th>
              <td class="whitespace-nowrap px-6 py-4">
                <?php echo e($item->email); ?>

              </td>
              <td class="whitespace-nowrap px-6 py-4">
                <?php echo e($item->phone); ?>

              </td>
              <td class="px-6 py-4 uppercase">
                <?php if($item->status == 'approved'): ?>
                  <span class="rounded-full bg-green-200 px-2 py-1 font-semibold text-green-700">
                    Disetujui
                  </span>
                <?php elseif($item->status == 'rejected'): ?>
                  <span class="rounded-full bg-red-200 px-2 py-1 font-semibold text-red-700">
                    Ditolak
                  </span>
                <?php else: ?>
                  <span class="rounded-full bg-yellow-200 px-2 py-1 font-semibold text-yellow-700">
                    Menunggu
                  </span>
                <?php endif; ?>
              </td>
              
  
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      
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
  <?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/pages/pimpinan/aktivitas/relawan.blade.php ENDPATH**/ ?>