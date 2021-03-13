

<?php $__env->startSection('pagetitle'); ?>
	Login
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header"><?php echo e(__('Login')); ?></div>
				<div class="card-body">
					<form method="post" action="<?php echo e(route('login')); ?>">
						<?php echo csrf_field(); ?>
						<div class="form-group">
							<label for="email"><?php echo e(__('Account name')); ?></label>
							<input type="text" class="form-control<?php echo e(($errors->has('email') || $errors->has('username')) ? ' is-invalid' : ''); ?>" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email address or Username" required />
							<?php if($errors->has('email') || $errors->has('username')): ?>
								<span class="invalid-feedback" role="alert"><strong><?php echo e(empty($errors->first('email')) ? $errors->first('username') : $errors->first('email')); ?></strong></span>
							<?php endif; ?>
						</div>
						<div class="form-group">
							<label for="password"><?php echo e(__('Password')); ?></label>
							<input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password" required />
							<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" type="checkbox" id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> />
								<label class="custom-control-label" for="remember"><?php echo e(__('Remember me')); ?></label>
							</div>
						</div>
						<div class="form-group mb-0">
							<button type="submit" class="btn btn-primary"><i class="fal fa-sign-in-alt"></i> <?php echo e(__('Login')); ?></button>
							<?php if(Route::has('password.request')): ?>
								<a class="btn btn-link" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot your password?')); ?></a>
							<?php endif; ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Wamp\www\noithat\resources\views/auth/login.blade.php ENDPATH**/ ?>