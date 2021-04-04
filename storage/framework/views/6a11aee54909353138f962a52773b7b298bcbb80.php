

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header h2 text-center">Giỏ hàng</div>
		<div class="card-body">
			<form action="<?php echo e(route('send-cart')); ?>" method="post">
				<?php echo csrf_field(); ?>
			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th class="w-5">STT</th>
						<th class="w-10">Tên sản phẩm</th>
						<th>Hình ảnh</th>
						<th>Số lượng</th>
						<th>Trọng lượng</th>
						<th>Kích thước</th>
						<th>Chất liệu</th>
						<th class="w-5">Giá tiền</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($loop->iteration); ?></td>
							<td>
								<?php echo e($value->sanpham->tensanpham); ?>

							</td>
							<td><img src="<?php echo e(asset('public/upload/'.$value->sanpham->hinhanh)); ?>" width="50;" height="50;"></td>
							<td><?php echo e($value->soluong); ?></td>
							<td><?php echo e($value->trongluong); ?></td>
							<td><?php echo e($value->kichthuoc); ?></td>
							<td><?php echo e($value->chatlieu); ?></td>
							<td><?php echo e(number_format($value->price)); ?></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<tr>
                            <td class="font-weight-bold" colspan="3">Mã giảm giá (nếu có)</td>
                            <td>
                                <?php $__currentLoopData = $discountCodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label for="">
                                        <input name="code" onclick="pick(<?php echo e($code->discount); ?>)" type="radio" value="<?php echo e($code->discount); ?>">
                                        <?php echo e($code->name); ?>

                                    </label>
                                    <br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                        </tr>
						<tr>
							<td class="font-weight-bold" colspan="3">
							<label>Tổng tiền</label>
	                        </td>
	                        <td class="font-weight-bold" id="last-price">
	                        	<?php echo e(number_format($total)); ?>

	                        </td>
						</tr>
						<tr>
                            <td>
                                <label class="font-weight-bold">Địa chỉ nhận hàng</label>
                            </td>
                            <td colspan="3">
                                <div class="form-group">
                                    <input type="text" required class="form-control <?php $__errorArgs = ['diachi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="diachi" name="diachi"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="font-weight-bold">Số điện thoại liên hệ</label>
                            </td>
                            <td colspan="3">
                                <div class="form-group">
                                    <input type="text" required class="form-control <?php $__errorArgs = ['sdt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="sdt" name="sdt"/>
                                </div>
                            </td>
                        </tr>
				</tbody>
			</table>
				<center>
					<button type="submit" class="btn btn-primary">Gửi đơn hàng</button>
				</center>
			</form>
		</div>
	</div>
	<script>
    function pick(discount)
    {
        total = "<?php echo e($total); ?>";
        lastPrice =  total - total * discount/100;
        $('#last-price').html(lastPrice);
        //alert(discount);

    }
	<?php if(session('success')): ?>
		Swal.fire({
			title: "<?php echo e(session('success')); ?>",
			icon: "success",
			confirmButtonText: 'OK'
		});
	<?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Wamp\www\noithat\resources\views/layouts/cart/list.blade.php ENDPATH**/ ?>