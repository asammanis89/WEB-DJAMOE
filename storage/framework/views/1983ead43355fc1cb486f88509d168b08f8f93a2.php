

<?php $__env->startSection('title', 'Kelola Produk'); ?>
<?php $__env->startSection('content_header_title', 'Daftar Produk'); ?>

<?php $__env->startSection('main-content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Data Produk</h3>
        <div class="card-tools">
            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Produk</a>
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
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th> 
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration + $products->firstItem() - 1); ?></td>
                    <td><img src="<?php echo e(asset('storage/' . $product->image_url)); ?>" alt="<?php echo e($product->product_name); ?>" class="img-thumbnail" width="100"></td>
                    <td><?php echo e($product->product_name); ?></td>
                    <td><?php echo e(Str::limit($product->description, 50)); ?></td>
                    <td><?php echo e($product->category->category_name ?? 'N/A'); ?></td>
                    <td>Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
                    <td>
                        
                        <?php if($product->is_bestseller): ?>
                            <span class="badge badge-success">Bestseller</span>
                        <?php else: ?>
                            <span class="badge badge-secondary">Reguler</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a href="<?php echo e(route('admin.products.edit', $product)); ?>" class="btn btn-info btn-xs" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                        <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-xs" title="Hapus"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="text-center">Belum ada data produk.</td> 
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="mt-3">
            <?php echo e($products->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/admin/products/index.blade.php ENDPATH**/ ?>