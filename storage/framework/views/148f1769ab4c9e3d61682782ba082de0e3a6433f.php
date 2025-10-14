

<?php $__env->startSection('title', 'Tambah Flyer'); ?>
<?php $__env->startSection('content_header_title', 'Tambah Flyer Baru'); ?>

<?php $__env->startSection('main-content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Upload Flyer (Preview)</h3>
    </div>
    
    <!-- Form untuk menyimpan flyer -->
    <form action="<?php echo e(route('admin.flyers.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="image_url">Gambar Flyer</label>
                <input type="file" name="image_url" id="image_url" class="form-control" onchange="previewImage(event)" required>
                
                <!-- Preview gambar -->
                <img id="preview" src="#" alt="Preview Flyer" style="max-width: 300px; display: none; margin-top: 10px;">
            </div>
        </div>
        <div class="card-footer">
            <a href="<?php echo e(route('admin.flyers.index')); ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<!-- Script untuk preview gambar sebelum submit -->
<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('preview');
        output.src = reader.result;
        output.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SEMESTER 5\PROYEK TEKNOLOGI INFORMASI\PERTEMUAN 5\djamoe-web-template\resources\views/admin/flyers/create.blade.php ENDPATH**/ ?>