

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header h2 text-center">Sản Phẩm</div>
		<div class="card-body">
			<p><a href="<?php echo e(url('/admin/sanpham/them')); ?>" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Thêm mới</a>
			<a href="#nhap" class="btn btn-success" data-toggle="modal" data-target="#importModal"><i class="fal fa-upload"></i> Nhập từ Excel</a>
				<a href="<?php echo e(url('/admin/sanpham/xuat')); ?>" class="btn btn-info"><i class="fal fa-download"></i> Xuất ra Excel</a></p>
			<table class="table table-striped table-hover">
				<thead class="bg bg-primary">
					<tr>
						<th class="text-table">STT</th>
						<th class="text-table">Danh mục</th>
						<th class="text-table">Tên sản phẩm</th>
						<th class="text-table">Mô tả</th>
						<th class="text-table">Hình ảnh</th>
						<th class="text-table">Giá tiền</th>
						<th class="text-table">Trọng lượng</th>
						<th class="text-table">Kích thước</th>
						<th class="text-table">Chất liệu</th>
						<th class="text-table">Số lượng</th>
						<th class="text-table">Ngày tạo</th>
						<th class="text-table">Ngày sửa</th>
						<th class="text-table">Sửa</th>
						<th class="text-table">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $sanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="text-column"><?php echo e($loop->iteration); ?></td>
							<td class="text-column"><?php echo e($value->danhmuc->tendanhmuc); ?></td>
							<td class="text-column"><?php echo e($value->tensanpham); ?></td>
							<td class="text-column"><?php echo e($value->mota); ?></td>
							<td>
								<div class="d-flex" style="width: 500; height: 320; align-items: center; justify-content: center;">
                                <img class="rounded" src="<?php echo e(asset('public/upload/'.$value->hinhanh)); ?>" width="50;" height="50;">
                            </div>
							</td>
							<td class="text-column"><?php echo e($value->giatien); ?></td>
							<td class="text-column"><?php echo e($value->trongluong); ?></td>
							<td class="text-column"><?php echo e($value->kichthuoc); ?></td>
							<td class="text-column"><?php echo e($value->chatlieu); ?></td>
							<td class="text-column"><?php echo e($value->soluong); ?></td>
							<td class="text-column"><?php echo e($value->created_at); ?></td>
							<td class="text-column"><?php echo e($value->updated_at); ?></td>
							<td class="text-center"><a href="<?php echo e(url('/admin/sanpham/sua/' . $value->id)); ?>"><i class="bi bi-pencil-square"></i></a></td>
							<td class="text-center"><a href="<?php echo e(url('/admin/sanpham/xoa/' . $value->id)); ?>"><i class="bi bi-trash-fill"></i></a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>

	<form action="<?php echo e(url('/admin/sanpham/nhap')); ?>" method="post" enctype="multipart/form-data">
		<?php echo csrf_field(); ?>
		<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Chọn tập tin Excel</label>
							<input type="file" class="form-control-file" id="TapTinExcel" name="TapTinExcel" />
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
						<button type="submit" class="btn btn-primary">Nhập dữ liệu</button>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Wamp\www\noithat\resources\views/admin/sanpham/danhsach.blade.php ENDPATH**/ ?>