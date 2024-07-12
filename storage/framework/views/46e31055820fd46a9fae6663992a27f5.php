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
    <div class="flex flex-wrap gap-8">
        <section class="flex flex-1 flex-col gap-8">
          <h1 class="text-2xl font-semibold">Detail Kegiatan dan Absensi</h1>
          <table class="overflow-hidden rounded-lg bg-white shadow-lg text-left">
            <thead class="bg-gray-700 text-xs uppercase text-gray-50 p-4">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Aktivitas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi Pekerjaan
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Kehadiran
                  </th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $attendance_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-b bg-white hover:bg-gray-50">
                        <th class="px-6 py-4">
                            <?php echo e($loop->iteration); ?>

                        </th>
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                            <?php echo e(date('d F Y', strtotime($status['date']))); ?>

                        </th>
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                          <?php echo e($status['description']); ?> 
                        </th>
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                          <p class="inline-flex rounded-full px-2 text-xs font-semibold leading-7 uppercase"
                            style="background-color: <?php echo e($status['status'] === 'Hadir' ? 'green' : 'red'); ?>; color: white;">
                            <?php echo e($status['status']); ?>

                          </p>
                        </th>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
            
            
            <div class="flex flex-col flex-wrap gap-6">
                <h3 class="text-lg font-semibold">Keterangan: </h3>
                <div class="flex flex-col gap-2">
                    <div class="flex gap-4">
                        <div class="rounded-md bg-green-500 p-4"></div>
                        =
                        <span>Hadir</span>
                    </div>
                    <div class="flex gap-4">
                        <div class="rounded-md bg-red-500 p-4"></div>
                        =
                        <span>Tidak Hadir</span>
                    </div>
                </div>
                <span class="italic">
                    *Note : Jika terdapat kesalahan harap hubungi koordinator melalui grup whatsapp
                </span>
            </div>
        </section>
        <aside class="flex h-fit max-w-sm flex-1 flex-col gap-8 rounded-md border p-4 shadow-md">
            <h1 class="text-center text-xl font-semibold"><?php echo e($activity->activity_name); ?></h1>
            <div class="flex flex-col gap-4">
                <div  
                    class="text-orange-500 border border-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2 text-center me-2 mb-2 ">
                    <?php echo e($activity->pilar_name); ?>

                </div>
                <div class="flex items-center gap-2.5">
                    <i class="fas fa-calendar-alt text-orange-500"></i>
                    <span>Kegiatan</span>
                </div>
                <div class="flex items-start gap-2.5">
                    <i class="fa-solid fa-clock text-orange-500"></i>
                    <div class="-mt-1 flex flex-col gap-2">
                        <span>Jadwal Pelaksanaan</span>
                        <span> <?php echo e(\Carbon\Carbon::parse($activity->start_date)->translatedFormat('d F Y')); ?> -
                            <?php echo e(\Carbon\Carbon::parse($activity->end_date)->translatedFormat('d F Y')); ?></span>
                        <span><?php echo e(\Carbon\Carbon::parse($activity->start_time)->format('H:i')); ?> -
                            <?php echo e(\Carbon\Carbon::parse($activity->end_time)->format('H:i')); ?> WIB</span>
                    </div>
                </div>
                <div class="flex items-start gap-2.5">
                    <i class="fas fa-map-marker-alt text-orange-500"></i>
                    <span class="-mt-1">
                        <?php echo e($activity->rally_point); ?>

                    </span>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-2.5">
                    <i class="fas fa-info-circle text-red-600"></i>
                    <span class="text-red-600">Batas Pendaftaran :
                        <?php echo e(\Carbon\Carbon::parse($activity->registration_limit)->translatedFormat('d F Y')); ?></span>
                </div>
                
                <div class="grid grid-cols-1 gap-2.5 md:grid-cols-3">
                    <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"
                        class="flex items-center justify-center gap-2 rounded-md bg-blue-500 py-2 font-semibold text-white transition duration-200 hover:bg-blue-600">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://web.whatsapp.com/send?text=Check%20out%20this%20event%20on%20WhatsApp:%20https%3A%2F%2Fexample.com"
                        target="_blank" rel="noopener noreferrer"
                        class="flex items-center justify-center gap-2 rounded-md bg-green-500 py-2 font-semibold text-white transition duration-200 hover:bg-green-600">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com" target="_blank"
                        rel="noopener noreferrer"
                        class="flex items-center justify-center gap-2 rounded-md bg-blue-800 py-2 font-semibold text-white transition duration-200 hover:bg-blue-900">
                        <i class="fab fa-facebook"></i>
                    </a>
                </div>
            </div>
        </aside>
    </div>
    
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
<?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/pages/profile/show.blade.php ENDPATH**/ ?>