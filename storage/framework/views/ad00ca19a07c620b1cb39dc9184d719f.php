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
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            <a class="rounded-full bg-orange-400 px-1.5 py-0.5 text-white" href="<?php echo e(url()->previous()); ?>"> 
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="my-5 text-2xl font-bold">Absensi Aktivitas</h1>
        </div>
    </div>
    <form class="flex flex-col gap-8 bg-white p-5 sm:rounded-lg" action="<?php echo e(route('korlap.aktivitas.absensi.absen')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 bg-white">
                <thead class="bg-gray-50">
                    <tr class="items-center">
                        <th scope="col"
                            class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider text-gray-500">
                            No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider text-gray-500">
                            Nama Lengkap
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-sm font-medium uppercase tracking-wider text-gray-500">
                            Tanggal Aktivitas
                        </th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="flex justify-center gap-10 px-6 py-3">
                            <?php $__currentLoopData = $attendance_date; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="flex-1"><?php echo e($date->format('d')); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900"><?php echo e($loop->iteration); ?>

                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500"><?php echo e($user->name); ?></td>
                            <td class="flex justify-between gap-10 whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                <?php $__currentLoopData = $user->attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="checkbox" name="attendance[<?php echo e($attendance->id); ?>]" value="1"
                                    class="focus:ring-3 mx-auto rounded border border-gray-300 bg-gray-50 text-orange-500 focus:ring-orange-300"
                                    <?php echo e($attendance->is_attended? 'checked' : ''); ?>>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="ms-auto flex">
            <button type="submit"
              class="rounded-lg bg-green-500 px-5 py-2.5 text-sm font-semibold text-white hover:bg-green-600">
              Update Absensi
            </button>
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
<?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/pages/korlap/aktivitas/absensi.blade.php ENDPATH**/ ?>