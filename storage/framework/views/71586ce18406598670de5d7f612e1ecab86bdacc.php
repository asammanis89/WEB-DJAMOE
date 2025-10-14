

<?php $__env->startSection('title', 'Kelola Kategori'); ?>
<?php $__env->startSection('content_header_title', 'Daftar Kategori'); ?>

<?php $__env->startSection('main-content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Data Kategori</h3>
        <div class="card-tools">
            <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Kategori</a>
        </div>
    </div>
    <div class="card-body">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        <?php endif; ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">No</th>
                    <th>Gambar</th>
                    <th>Nama Kategori</th>
                    <th style="width: 150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    
                    <td><?php echo e($loop->iteration + ($categories->currentPage() - 1) * $categories->perPage()); ?></td>
                    <td>
                        <?php if($category->image_url): ?>
                            <img src="<?php echo e(asset('storage/' . $category->image_url)); ?>" alt="<?php echo e($category->category_name); ?>" class="img-thumbnail" width="100">
                        <?php else: ?>
                            <span class="text-muted">Tidak ada gambar</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($category->category_name); ?></td>
                    <td class="text-center">
                        <a href="<?php echo e(route('admin.categories.edit', $category)); ?>" class="btn btn-info btn-xs" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                        <form action="<?php echo e(route('admin.categories.destroy', $category)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-xs" title="Hapus"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center">Belum ada data kategori.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="mt-3">
            
            <?php echo e($categories->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>