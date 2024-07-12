<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo e(config('app.name', 'Laravel')); ?></title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Scripts -->
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="font-sans antialiased">
  <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <?php echo $__env->make('layouts.navbar.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <main class="container h-auto p-4 pb-12 pt-28">
    <?php echo e($slot); ?>

  </main>

  <footer class="border-t bg-white">
    <div class="container mx-auto w-full p-4 py-6 lg:py-8">
      <div class="md:flex md:items-center md:justify-between">
        <div class="mb-6 md:mb-0">
          <a href="/" class="flex items-center">
            <img src="<?php echo e(asset('assets/img/icon.svg')); ?>" class="-my-4 h-64" alt="Logo" />
          </a>
        </div>
        <div class="grid grid-cols-1 gap-8 sm:gap-6 md:grid-cols-2">
          <div>
            <h2 class="mb-6 text-sm font-semibold uppercase text-gray-900">Selengkapnya</h2>
            <ul class="space-y-4 font-medium text-gray-500">
              <li>
                <a href="#" class="hover:underline">Kebijakan Privacy</a>
              </li>
              <li>
                <a href="#" class="hover:underline">Syarat dan Ketentuan</a>
              </li>
              <li>
                <a href="#" class="hover:underline">Daftar Rekening</a>
              </li>
              <li>
                <a href="#" class="hover:underline">Tim Kami</a>
              </li>
            </ul>
          </div>
          <div>
            <h2 class="mb-6 text-sm font-semibold uppercase text-gray-900">Alamat</h2>
            <ul class="space-y-4 font-normal text-gray-500">
              <li class="flex items-start gap-2">
                <i class="fas fa-map text-lg text-orange-500"></i>
                <p class="max-w-xs">
                  Jl. Gedongkuning No. 152, RT. 41, Rejowinangun, Kec. Kotagede, Kota Yogyakarta,Daerah
                  Istimewa Yogyakarta 55171
                </p>
              </li>
              
              <li class="items flex gap-2">
                <i class="fas fa-phone text-lg text-orange-500"></i>
                <p class="max-w-xs">Phone : 0821-3833-9339</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <p class="my-4 max-w-md lg:my-0">
        LAZISMU adalah lembaga amil zakat nasional dengan SK. Menteri Agama RI No. 90 Tahun 2022, yang berkhidmat
        dalam pemberdayaan masyarakat, melalui pendayagunaan dana zakat, infaq dan dana kedermawanan lainnya baik
        dari perseorangan, lembaga, perusahaan dan instansi lainnya.
      </p>
      <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
      <div class="sm:flex sm:items-center sm:justify-between">
        <span class="text-sm text-gray-500 sm:text-center">© 2023 Lazismu D.I. Yogyakarta
        </span>
      </div>
    </div>
  </footer>

</body>

</html>
<?php /**PATH C:\laragon\www\lazizmu-laravel-main-3\resources\views/layouts/home.blade.php ENDPATH**/ ?>