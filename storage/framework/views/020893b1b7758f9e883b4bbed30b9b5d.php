<div class="max-w-xs grow rounded-lg border shadow-md">
  <a href="kolaborasi/<?php echo e($id); ?>">
    <img class="h-auto max-h-52 w-full rounded-t-lg object-cover object-center"
      src="<?php echo e($imagePath ? asset('storage/images/' . $imagePath) : 'https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); ?>"
      alt="<?php echo e($title); ?>" loading="lazy">
  </a>
  <div class="space-y-4 p-4">
    <div class="min-h-14 flex max-h-14 items-center">
      <h2 class="line-clamp-2 text-lg font-semibold"><?php echo e($title); ?></h2>
    </div>
    <div class="border-t-2"></div>
    <div class="flex flex-col gap-2">
      <div class="flex items-center gap-2.5">
        <i class="fas fa-calendar text-orange-500"></i>
        <span class="text-base font-medium">
          <?php echo e(\Carbon\Carbon::parse($startDate)->translatedFormat('d F Y')); ?> -
          <?php echo e(\Carbon\Carbon::parse($endDate)->translatedFormat('d F Y')); ?>

        </span>
      </div>
    </div>
    <div class="flex items-center gap-2.5">
      <i class="fa-solid fa-location-dot text-orange-500"></i>
      <span class="text-base font-medium"><?php echo e($domicile); ?></span>
    </div>
  </div>
</div>
<?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/components/collaboration-card.blade.php ENDPATH**/ ?>