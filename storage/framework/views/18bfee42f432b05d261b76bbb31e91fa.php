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
  <section class="container flex flex-col gap-5">
    <h1 class="text-2xl font-bold">Profile</h1>
    <div class="flex flex-wrap justify-between gap-4">
      <div class="flex grow flex-col gap-4 rounded-lg border p-4 shadow-md">
        <div class="flex gap-4">
          <img class="size-14 rounded-full border" src="<?php echo e(Auth::user()->profile_image ? asset('storage/profile/' . Auth::user()->profile_image) : asset('assets/img/icon.svg')); ?>" alt="Rounded avatar">
          <div class="flex grow flex-col gap-2">
            <div class="flex items-center justify-between">
              <h2 class="text-xl font-bold"><?php echo e($user->name); ?></h2>
              <a href="<?php echo e(route('relawan.profil.edit')); ?>"
                class="rounded-lg border border-orange-500 px-4 py-1 text-orange-500 hover:bg-orange-500 hover:text-white">Edit</a>
            </div>
            <span>Domisili:<?php echo e($user->domicile); ?></span>
            <span><?php echo e($user->joined_since); ?></span>
          </div>
        </div>
        <div class="border"></div>
        <div class="flex flex-wrap justify-between">
          <div class="flex gap-4">
            <i class="fas fa-users mt-1.5 text-orange-500"></i>
            <div class="flex flex-col gap-1">
              <span>Aktivitas Diikuti</span>
              <span class="text-gray-600">0</span>
            </div>
          </div>
          <div class="flex gap-4">
            <i class="fa-solid fa-trophy mt-1.5 text-orange-500"></i>
            <div class="flex flex-col gap-1">
              <span>Penghargaan Dimiliki</span>
              <span class="text-gray-600">0</span>
            </div>
          </div>
          <div class="flex gap-4">
            <i class="fa-solid fa-clock mt-1.5 text-orange-500"></i>
            <div class="flex flex-col gap-1">
              <span>Total Jam Kerja</span>
              <span class="text-gray-600">0</span>
            </div>
          </div>
        </div>
      </div>
      <div class="flex max-w-sm grow flex-col gap-4 rounded-lg border p-4 shadow-md">
        <div class="flex flex-col gap-1.5">
          <h2 class="text-lg font-semibold">Penghargaan yang dimiliki</h2>
          <div class="border"></div>
        </div>
        <div class="my-auto flex flex-col items-center justify-center gap-1">
          <i class="fas fa-database text-xl text-gray-500"></i>
          <span class="text-gray-500">Belum ada penghargaan</span>
        </div>
      </div>
    </div>
    <div class="flex grow flex-col gap-4 rounded-lg border p-4 shadow-md">
      <h2 class="text-lg font-semibold">Aktivitas</h2>
      <div class="border"></div>
      <div class="relative overflow-x-auto">
        <table class="w-full text-left">
          <thead class="border-b text-xs uppercase text-gray-700">
            <tr>
              <th scope="col" class="px-6 py-3">
                Nama Kegiatan
              </th>
              <th scope="col" class="px-6 py-3">
                Periode Kegiatan
              </th>
              <th scope="col" class="px-6 py-3">
                Lokasi
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
            
              <?php $__currentLoopData = $activityRegistration; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="bg-white">
                  <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                    <?php echo e($registration->activity->activity_name); ?>

                  </th>
                  <td class="whitespace-nowrap px-6 py-4">
                    <?php echo e(\Carbon\Carbon::parse($registration->activity->start_date)->translatedFormat('d F Y')); ?> -
                    <?php echo e(\Carbon\Carbon::parse($registration->activity->end_date)->translatedFormat('d F Y')); ?>

                  </td>
                  <td class="whitespace-nowrap px-6 py-4">
                    <?php echo e($registration->activity->domicile); ?>

                  </td>
                  
                    <td class="px-6 py-4">
                      <span
                        class="inline-flex rounded-full px-2 text-xs font-semibold leading-7 uppercase
                        <?php if($registration->status == 'approved'): ?>
                          bg-green-100 text-green-800
                        <?php elseif($registration->status == 'pending'): ?>
                        bg-yellow-100 text-yellow-800
                        <?php else: ?>
                        bg-red-100 text-red-800
                        <?php endif; ?>">
                      <?php echo e($registration->status); ?>

                      </span>
                    </td>
                  
                  <td class="whitespace nowrap px-6 py-4">
                    <a href="<?php echo e(route('relawan.profil.show', $registration->activity->id)); ?>"
                      class="rounded-md border border-blue-500 px-2 py-1 font-medium text-blue-500 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white hover:underline">
                      <i class="fas fa-eye text-base"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
          </tbody>
        </table>
      </div>
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
<?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/pages/profile/index.blade.php ENDPATH**/ ?>