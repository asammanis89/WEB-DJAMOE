

<?php $__env->startSection('title', 'Daftar Admin'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Manajemen Admin</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Buat Admin Baru
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="btn btn-sm btn-primary">Edit</a>
                        <form action="<?php echo e(route('admin.users.destroy', $user)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/admin/users/index.blade.php ENDPATH**/ ?>