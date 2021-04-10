

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Thêm mã giảm giá</div>
		<div class="card-body">
			<?php if(session('success')): ?>
				<div class="alert alert-success">
					<?php echo e(session('success')); ?>

				</div>
			<?php endif; ?>
            <?php if(count($errors->all()) > 0): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($error); ?><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
			<?php if(session('error')): ?>
			<div class="alert alert-danger">
				<?php echo e(session('error')); ?>

			</div>
			<?php endif; ?>
			<form action="<?php echo e(route('discount-code-add')); ?>" method="post">
				<?php echo csrf_field(); ?>
				<div class="form-group">
					<label for="diachiip">Tên mã giảm giá</label>
					<input type="text" required placeholder="vd: VUICUOITUAN" class="form-control <?php $__errorArgs = ['diachiip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="diachiip" name="name"/>
                </div>
                <div class="form-group">
					<label for="diachiip">Phần trăm giảm</label>
					<input type="number" required class="form-control <?php $__errorArgs = ['diachiip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="diachiip" name="discount"/>
                </div>
                <div class="form-group">
					<label for="diachiip">Ngày hết hạn</label>
					<input type="date" required class="form-control <?php $__errorArgs = ['diachiip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="diachiip" name="expire"/>
				</div>

				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Wamp\www\noithat\resources\views/admin/discount_codes/add.blade.php ENDPATH**/ ?>