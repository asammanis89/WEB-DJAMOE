

<?php $__env->startSection('title', 'Kelola Lokasi'); ?>
<?php $__env->startSection('content_header_title', 'Daftar Lokasi Outlet'); ?>

<?php $__env->startSection('main-content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Data Lokasi</h3>
        <div class="card-tools">
            <a href="<?php echo e(route('admin.locations.create')); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Lokasi</a>
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
                    <th>No</th>
                    <th>Nama Outlet</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($location->name); ?></td>
                    <td><?php echo e($location->address); ?></td>
                    <td><?php echo e($location->phone_number ?? '-'); ?></td>
                    <td class="text-center">
                        <a href="<?php echo e(route('admin.locations.edit', $location)); ?>" class="btn btn-info btn-xs" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                        <form action="<?php echo e(route('admin.locations.destroy', $location)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus lokasi ini?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-xs" title="Hapus"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data lokasi.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/admin/locations/index.blade.php ENDPATH**/ ?>