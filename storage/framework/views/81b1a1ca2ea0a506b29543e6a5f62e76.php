<nav class="flex-column flex flex-wrap items-center justify-between p-4 md:flex-row" aria-label="Table navigation">
  <span class="mb-4 block w-full text-sm font-normal text-gray-500 md:mb-0 md:inline md:w-auto">
    Showing <span class="font-semibold text-gray-900"><?php echo e($paginator->firstItem()); ?>-<?php echo e($paginator->lastItem()); ?></span>
    of
    <span class="font-semibold text-gray-900"><?php echo e($paginator->total()); ?></span>
  </span>
  <ul class="inline-flex h-8 -space-x-px text-sm rtl:space-x-reverse">
    <?php if($paginator->onFirstPage()): ?>
      <li aria-disabled="true" aria-label="Previous">
        <span
          class="ms-0 flex h-8 cursor-not-allowed items-center justify-center rounded-s-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500">
          <i class="fas fa-chevron-left"></i>
        </span>
      </li>
    <?php else: ?>
      <li>
        <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"
          class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700"
          aria-label="Previous">
          <i class="fas fa-chevron-left"></i>
        </a>
      </li>
    <?php endif; ?>
    <?php $__currentLoopData = $paginator->links()->elements[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($page == $paginator->currentPage()): ?>
        <li aria-current="page">
          <span
            class="flex h-8 items-center justify-center border border-gray-300 bg-orange-50 px-3 text-orange-600"><?php echo e($page); ?></span>
        </li>
      <?php else: ?>
        <li>
          <a href="<?php echo e($url); ?>"
            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700"><?php echo e($page); ?></a>
        </li>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($paginator->hasMorePages()): ?>
      <li>
        <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"
          class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700"
          aria-label="Next">
          <i class="fas fa-chevron-right"></i>
        </a>
      </li>
    <?php else: ?>
      <li aria-disabled="true" aria-label="Next">
        <span
          class="flex h-8 cursor-not-allowed items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500">
          <i class="fas fa-chevron-right"></i>
        </span>
      </li>
    <?php endif; ?>
  </ul>
</nav>
<?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/components/pagination.blade.php ENDPATH**/ ?>