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
    <h1 class="text-2xl font-bold">Edit Profile</h1>
    <form action="<?php echo e(route('relawan.profil.update')); ?>" class="flex w-full flex-col gap-5" method="POST"
      enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <img src="<?php echo e(Auth::user()->profile_image ? asset('storage/profile/' . Auth::user()->profile_image) : ''); ?>"
        alt="profile" class="image_preview size-20 self-center rounded-full object-cover object-center">
      <div class="mx-auto flex w-full justify-center gap-2">
        <label for="image" class="mb-2 block w-full text-sm font-medium text-gray-900 md:w-1/5">
          Foto Profil
        </label>
        <div class="relative">
          <input type="file" id="image" name="image" accept="image/*" class="hidden" />
          <label for="image"
            class="cursor-pointer rounded-lg bg-gray-200 px-5 py-2.5 text-sm font-semibold text-gray-900 hover:bg-gray-300">
            Pilih Gambar
          </label>
          <span id="image-name" class="mt-2 block text-sm text-gray-500"></span>
        </div>
      </div>
      <div class="flex justify-between">
        <label for="name" class="block flex-1 text-sm font-medium text-gray-900">Nama Lengkap</label>
        <input type="text" id="name" name="name"
          class="flex-1 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          value="<?php echo e(Auth::user()->name); ?>" required />
      </div>
      <div class="flex justify-between">
        <label for="email" class="block flex-1 text-sm font-medium text-gray-900">Email</label>
        <input type="email" id="email" name="email"
          class="flex-1 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          value="<?php echo e(Auth::user()->email); ?>" required />
      </div>
      <div class="flex justify-between">
        <label for="phone" class="block flex-1 text-sm font-medium text-gray-900">Nomor Telepon</label>
        <input type="tel" id="phone" name="phone"
          class="flex-1 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          value="<?php echo e(Auth::user()->phone); ?>" required />
      </div>
      <div class="flex justify-between">
        <label for="domicile" class="block flex-1 text-sm font-medium text-gray-900">Domisili</label>
        <input type="text" id="domicile" name="domicile"
          class="flex-1 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:ring-orange-500"
          value="<?php echo e(Auth::user()->domicile); ?>" required />
      </div>
      <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'ms-auto','type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-auto','type' => 'submit']); ?>
        Simpan
       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
    </form>
  </section>
  <script>
    const image = document.getElementById('image');
    const imageName = document.getElementById('image-name');
    const imagePreview = document.querySelector('.image_preview');

    image.addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function() {
          imagePreview.src = reader.result;
        }
        reader.readAsDataURL(file);
        imageName.textContent = file.name;
      }
    });
  </script>
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
<?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/pages/profile/edit.blade.php ENDPATH**/ ?>