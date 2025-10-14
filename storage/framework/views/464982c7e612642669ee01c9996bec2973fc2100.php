

<?php $__env->startSection('title', 'Manajemen Artikel'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Manajemen Artikel (Aktivitas)</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Artikel</h3>
        <div class="card-tools">
            <a href="<?php echo e(route('admin.articles.create')); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Artikel Baru
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <?php if(session('success')): ?>
            <div class="alert alert-success m-3">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 150px">Gambar</th>
                    <th>Judul</th>
                    <th>Sub Judul</th>
                    <th style="width: 120px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <img src="<?php echo e(asset('storage/' . $article->image)); ?>" alt="<?php echo e($article->title); ?>" class="img-thumbnail" style="width: 120px; height: auto; object-fit: cover;">
                        </td>
                        <td><?php echo e($article->title); ?></td>
                        <td><?php echo e($article->subtitle); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.articles.edit', $article)); ?>" class="btn btn-info btn-xs">Edit</a>
                            <form action="<?php echo e(route('admin.articles.destroy', $article)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?');" style="display: inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada artikel ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        <?php echo e($articles->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/admin/articles/index.blade.php ENDPATH**/ ?>