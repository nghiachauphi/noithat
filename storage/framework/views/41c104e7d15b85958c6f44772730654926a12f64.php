

<?php $__env->startSection('content'); ?>


	<div class="">
		<div class="card-header text-center"><h2>Khách hàng</h2></div>
		<div>
			<table class="table">
				<thead class="bg bg-primary table-striped">
				<tr>
					<th scope="col" class="text-table">STT</th>
					<th scope="col" class="text-table">Trạng thái</th>
				</tr>
				</thead>
				<tbody>
				<?php $__currentLoopData = $nguoidung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php
					$order = App\Order::where('nguoidung_id','=', $value->id)->get();

					?>

					<tr>
						<td>Khách hàng thứ <?php echo e($loop->iteration); ?></td>

						<td>

							<table class="table table-hover">
								<thead>
								<div class="bg-khachhang">
									<tr>
										<td class="text-table">
												Tên khách hàng:
										</td>
										<td>
											<b><?php echo e($value->name); ?></b>
										</td>
										<td class="text-table">
											Username:
										</td>
										<td>
											<b><?php echo e($value->username); ?></b>
										</td>
									</tr>

									<tr>
										<td class="text-table">
											Email:
										</td>
										<td>
											<b><?php echo e($value->email); ?></b>
										</td>
										<td class="text-table">
											Điện thoại:
										</td>
										<td>
											<b><?php echo e($value->phone); ?></b>
										</td>
									</tr>

									<tr>
										<td class="text-table">
											Địa chỉ:
										</td>
										<td>
											<b><?php echo e($value->address); ?></b>
										</td>
									</tr>
								</div>
									<tr>
										<th class="text-table">Thông tin giao hàng</th>
										<th class="text-table">Thông tin đơn hàng</th>
										<th class="text-table">Trạng thái</th>
										<th class="text-table">Xóa đơn</th>
									</tr>
								</thead>
								<tbody>
								<?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td>
											<p>
												Tên người nhận: <b><?php echo e($value->hovaten); ?></b>
											</p>
											<p>
												Địa chỉ: <b><?php echo e($value->diachi); ?></b>
											</p>
											<p>
												Email: <b><?php echo e($value->email); ?></b>
											</p>
											<p>
												Điện thoại: <b><?php echo e($value->dienthoai); ?></b>
											</p>
											<p>
												Ghi chú giao hàng: <b><?php echo e($value->ghichu); ?></b>
											</p>
											<p>
												Tổng tiền: <b><?php echo e(number_format($value->tongtien)); ?> VND</b>
											</p>
										</td>
										<td>
											<table class="table table-striped table-hover">
												<thead style="background-color: #67E7F8">
												<tr>
													<th>Tên sản phẩm</th>
													<th>Hình ảnh</th>
													<th>Giá</th>
													<th>Số lượng</th>
													<th>trọng lượng</th>
													<th>kích thước</th>
													<th>chất liệu</th>
												</tr>
												</thead>
												<tbody>
												<?php $__currentLoopData = $value->bill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>

														<td>
															<?php echo e($item->sanpham->tensanpham); ?>

														</td>
														<td>
															<img class="rounded" src="<?php echo e(asset('/public/upload/'.$item->sanpham->hinhanh)); ?>"  width="50;" height="50;"/>

														</td>
														<td>
															<?php echo e(number_format($item->price)); ?>

														</td>
														<td>
															<?php echo e($item->soluong); ?>

														</td>
														<td>
															<?php echo e($item->trongluong); ?>

														</td>
														<td>
															<?php echo e($item->kichthuoc); ?>

														</td>
														<td>
															<?php echo e($item->chatlieu); ?>

														</td>
													</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</tbody>
											</table>
										</td>

										<td>
											<div class="form-group">
												<a style="color: black"><?php if( $value->status==0): ?>
														Đợi xác nhận
													<?php elseif( $value->status==1): ?>
														Đang giao hàng
													<?php elseif( $value->status==2): ?>
														Đã Giao
													<?php endif; ?></a>
													</select>
													<?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
														<span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
												
												<hr>
											
											<form action="<?php echo e(url('/admin/khachhang/trangthai/'.$value->id)); ?>" method="post">

												<?php echo csrf_field(); ?>
												<div class="form-group">
													<select class="form-control" id="status" name="status">
															<option value="<?php echo e(0); ?>">Đợi xác nhận</option>
															<option value="<?php echo e(1); ?>">Đang giao hàng</option>
															<option value="<?php echo e(2); ?>">Đã Giao</option>
													</select>
													<input type="submit" class="btn btn-dark" value="Thay đổi trạng thái">
												</div>
												
											</form>
											
										</td>

										<td class="all-center">
											<form action="<?php echo e(URL('info/'. $value->id)); ?>" method="post">
												<?php echo csrf_field(); ?>
												<input type="hidden" name="cancel" value="Xóa đơn" class="btn btn-danger">
												<input type="submit" value="Xóa đơn" class="btn btn-danger">
											</form>
										</td>

									</tr>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>

						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
	<form action="<?php echo e(url('/khachhang/nhap')); ?>" method="post" enctype="multipart/form-data">
	<?php echo csrf_field(); ?>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Nhập từ excel</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			
			  <div class="form-group">
				<label for="recipient-name" class="col-form-label">Chọn tập tin excel</label>
				<input type="file" class="form-control-file" id="TapTinExcel" name="TapTinExcel">
			  </div>
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Hùy bỏ</button>
			<button type="submit" class="btn btn-primary">Nhập</button>
		  </div>
		</div>
	  </div>
	</div>
</form>
	<style>
		.bg-khachhang{
			background-color: #4f1915!important;
		}
	</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Wamp\www\noithat\resources\views/admin/khachhang/danhsach.blade.php ENDPATH**/ ?>