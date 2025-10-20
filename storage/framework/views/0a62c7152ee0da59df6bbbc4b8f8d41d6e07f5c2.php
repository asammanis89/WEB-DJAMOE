


<?php $__env->startSection('title', 'Admin Panel | Djamoe'); ?>


<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark"><?php echo $__env->yieldContent('content_header_title', 'Dashboard'); ?></h1>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->yieldContent('main-content'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<script>
    // Inisialisasi plugin untuk menampilkan nama file pada input file bootstrap
    // Ini sangat berguna untuk semua form yang memiliki upload gambar
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>