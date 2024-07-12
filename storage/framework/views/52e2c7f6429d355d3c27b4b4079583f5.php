<?php if (isset($component)) { $__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b = $attributes; } ?>
<?php $component = App\View\Components\HomeLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\HomeLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  <section class="flex flex-col gap-5">
    <h1 class="text-2xl font-bold">Aktivitas Membutuhkan Bantuan</h1>
    <div class="flex grow flex-wrap gap-4">
      <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if (isset($component)) { $__componentOriginal38a1d6d1c07e1f56c32149e4abe23e6d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal38a1d6d1c07e1f56c32149e4abe23e6d = $attributes; } ?>
<?php $component = App\View\Components\CollaborationCard::resolve(['id' => $activity->id,'title' => $activity->activity_name,'startDate' => $activity->start_date,'endDate' => $activity->end_date,'domicile' => $activity->domicile,'imagePath' => $activity->image_path] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('collaboration-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\CollaborationCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal38a1d6d1c07e1f56c32149e4abe23e6d)): ?>
<?php $attributes = $__attributesOriginal38a1d6d1c07e1f56c32149e4abe23e6d; ?>
<?php unset($__attributesOriginal38a1d6d1c07e1f56c32149e4abe23e6d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal38a1d6d1c07e1f56c32149e4abe23e6d)): ?>
<?php $component = $__componentOriginal38a1d6d1c07e1f56c32149e4abe23e6d; ?>
<?php unset($__componentOriginal38a1d6d1c07e1f56c32149e4abe23e6d); ?>
<?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="me-5">
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
  </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b)): ?>
<?php $attributes = $__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b; ?>
<?php unset($__attributesOriginal74bf5c5ceb04ec08d68cbab7bf77439b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b)): ?>
<?php $component = $__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b; ?>
<?php unset($__componentOriginal74bf5c5ceb04ec08d68cbab7bf77439b); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/pages/kolaborasi/index.blade.php ENDPATH**/ ?>