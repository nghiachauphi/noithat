

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header h2 text-center">Xóa Sản Phẩm</div>
		<div class="card-body">
			<form action="<?php echo e(url('/admin/sanpham/xoa/' . $sanpham->id)); ?>" method="post">
				<?php echo csrf_field(); ?>
				<p>Bạn có muốn xóa sản phẩm <?php echo e($sanpham->tensanpham); ?> không?</p>
				<button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Wamp\www\noithat\resources\views/admin/sanpham/xoa.blade.php ENDPATH**/ ?>