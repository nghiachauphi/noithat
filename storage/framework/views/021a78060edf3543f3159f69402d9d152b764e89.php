

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Mã giảm giá</div>
		<div class="card-body">
			<p><a href="<?php echo e(route('discount-code-add')); ?>" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">STT</th>
						<th class="w-10">Tên giảm giá</th>
						<th>Phần trăm giảm giá</th>
						<th class="w-15">Ngày tạo</th>
						<th class="w-15">Ngày hết hạn giảm giá</th>
						<th class="w-5">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $code; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($loop->iteration); ?></td>
							<td><?php echo e($value->name); ?></td>
							<td><?php echo e($value->discount); ?></td>
							<td><?php echo e($value->expire); ?></td>
							
							<td><?php echo e($value->created_at); ?></td>
							<td class="text-center"><a href="<?php echo e(url('/admin/discount/xoa/' . $value->id)); ?>"><i class="bi bi-trash-fill"></i></a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Wamp\www\noithat\resources\views/admin/discount_codes/list.blade.php ENDPATH**/ ?>