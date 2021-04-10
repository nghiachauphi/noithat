<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | E-Shopper</title>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
	<link href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('public/css/font-awesome.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('public/css/prettyPhoto.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('public/css/price-range.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('public/css/animate.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('public/css/main.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('public/css/responsive.css')); ?>" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="<?php echo e(asset('public/js/html5shiv.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/respond.min.js')); ?>"></script>
    <![endif]-->
	<link rel="shortcut icon" href="<?php echo e(asset('public/images/ico/favicon.ico')); ?>">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(asset('public/images/ico/apple-touch-icon-144-precomposed.png')); ?>">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(asset('public/images/ico/apple-touch-icon-114-precomposed.png')); ?>">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(asset('public/images/ico/apple-touch-icon-72-precomposed.png')); ?>">
	<link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('public/images/ico/apple-touch-icon-57-precomposed.png')); ?>">

	<style>
		.all-center{
			display: flex;
			align-items: center;
			justify-content: center;
		}
	</style>
</head><!--/head-->

<body>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main class="pt-2">
	<?php echo $__env->yieldContent('content'); ?>
</main>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH E:\Wamp\www\noithat\resources\views/layouts/app.blade.php ENDPATH**/ ?>