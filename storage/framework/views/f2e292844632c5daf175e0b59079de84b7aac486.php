
<?php $__env->startSection('title', 'Kelola Cerita Kami'); ?>
<?php $__env->startSection('content_header_title', 'Daftar Cerita Tentang Kami'); ?>

<?php $__env->startSection('main-content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Cerita</h3>
        <div class="card-tools">
            <a href="<?php echo e(route('admin.abouts.create')); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Cerita</a>
        </div>
    </div>
    <div class="card-body">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        <?php endif; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Teks Tahun</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><img src="<?php echo e(asset('storage/' . $about->image)); ?>" class="img-thumbnail" width="150"></td>
                    <td><?php echo e($about->year_text); ?></td>
                    <td><?php echo e($about->title); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.abouts.edit', $about)); ?>" class="btn btn-info btn-xs">Edit</a>
                        <form action="<?php echo e(route('admin.abouts.destroy', $about)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin?');">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4" class="text-center">Belum ada cerita.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/admin/abouts/index.blade.php ENDPATH**/ ?>