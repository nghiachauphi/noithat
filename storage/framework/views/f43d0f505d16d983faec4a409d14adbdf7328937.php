

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header text-center text-table h2">Danh sách liên hệ</div>
		<div class="card-body">
			<table class="table table-striped table-hover">
				<thead class="bg bg-primary">
					<tr>
						<th class="text-table">STT</th>
						<th class="text-table">Mã liên hệ</th>
						<th class="text-table">Tên người liên hệ</th>
						<th class="text-table">Email người liên hệ</th>
						<th class="text-table">Điện thoại người liên hệ</th>
						<th class="text-table">Tiêu đề</th>
						<th class="text-table">Nội dung liên hệ</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="text-column"><?php echo e($loop->iteration); ?></td>
							<td class="text-column"><?php echo e($value->id); ?></td>
							<td class="text-column"><?php echo e($value->name); ?></td>
							<td class="text-column"><?php echo e($value->email); ?></td>
							<td class="text-column"><?php echo e($value->phone); ?></td>
							<td class="text-column"><?php echo e($value->subject); ?></td>
							<td class="text-column"><?php echo e($value->message); ?></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Wamp\www\noithat\resources\views/admin/contact/danhsach.blade.php ENDPATH**/ ?>