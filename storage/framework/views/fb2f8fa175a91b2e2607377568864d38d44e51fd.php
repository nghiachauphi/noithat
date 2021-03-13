

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Sản Phẩm</div>
		<div class="card-body">
			<p><a href="<?php echo e(url('/sanpham/them')); ?>" class="btn btn-primary"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">STT</th>
						<th class="w-10">Danh mục</th>
						<th>Tên sản phẩm</th>
						<th class="w-15">Mô tả</th>
						<th class="w-15">Hình ảnh</th>
						<th class="w-5">Giá tiền</th>
						<th class="w-5">Sửa</th>
						<th class="w-5">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $sanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($loop->iteration); ?></td>
							<td><?php echo e($value->danhmuc_id); ?></td>
							<td><?php echo e($value->tensanpham); ?></td>
							<td><?php echo e($value->mota); ?></td>
							<td>
								<div class="d-flex" style="width: 500; height: 320; align-items: center; justify-content: center;">
                                <img class="rounded" src="<?php echo e(asset('public/upload/'.$value->hinhanh)); ?>" width="50;" height="50;">
                            </div>
							</td>
							<td><?php echo e($value->giatien); ?></td>
							<td><?php echo e($value->created_at); ?></td>
							<td><?php echo e($value->updated_at); ?></td>
							<td class="text-center"><a href="<?php echo e(url('/sanpham/sua/' . $value->id)); ?>"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="<?php echo e(url('/sanpham/xoa/' . $value->id)); ?>"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Wamp\www\noithat\resources\views/sanpham/danhsach.blade.php ENDPATH**/ ?>