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
      <h1 class="my-5 text-2xl font-bold">Tugas Harian</h1>
    </div>
    <form class="flex flex-col gap-8 bg-white p-5 sm:rounded-lg" action="<?php echo e(route('korlap.tugas.update', $activity->id )); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <div class="flex flex-1 flex-col gap-4">
        <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
            <label for="date" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Tanggal Aktivitas</label>
            <input type="text" id="activity_date"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
              placeholder="Tangal Aktivitas" name="activity_date[]" value="<?php echo e(date('d F Y', strtotime($detail->activity_date))); ?>" readonly/>
          </div>
          
          <div class="flex flex-wrap items-center gap-2 md:flex-nowrap">
            <label for="description" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">Deskripsi</label>
            <textarea id="description"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
              placeholder="description" name="description[]" required><?php echo e($detail->description); ?></textarea>

          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="ms-auto flex">
          <button type="submit"
            class="rounded-lg bg-green-500 px-5 py-2.5 text-sm font-semibold text-white hover:bg-green-600">
            Update
          </button>
        </div>
      </div>
    </form>
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


  <?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/pages/korlap/tugas/edit.blade.php ENDPATH**/ ?>