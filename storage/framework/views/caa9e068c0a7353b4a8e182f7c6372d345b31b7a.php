

<?php $__env->startSection('content'); ?>


<div class="section pt-0">
	<div class="container">
		<div class="row">
			<h2><?php echo e($sanpham['tensanpham']); ?></h2>
			<div class="col-lg-6 all-center">

				<div class="form-group all-center">
					<img class="rounded" src="<?php echo e(asset('/public/upload/'.$sanpham['hinhanh'])); ?>" height="400px">
				</div>
			</div>

			<div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
				<h2 class="text-center">MÔ TẢ SẢN PHẨM </h2>
				<table class="table table-bordered table-sm" >
					<thead>

					<tr>
						<td class="title-item">Chất liệu</td>
												<td><?php echo e($sanpham->chatlieu); ?></td>
					</tr>
					<tr>
						<td class="title-item">Kích Thước</td>
												<td><?php echo e($sanpham->kichthuoc); ?></td>
					</tr>
					<tr>
						<td class="title-item">Trọng lượng</td>
												<td><?php echo e($sanpham->trongluong); ?></td>
					</tr>
					<tr>
						<td class="title-item">Số lượng</td>
												<td><?php echo e($sanpham->soluong); ?></td>
					</tr>
					<tr>
					</thead>
				</table>
				<div class="form-group">
					<label>Mô tả:</label>
					<a><?php echo e($sanpham['mota']); ?></a>
				</div>

				<div class="all-center">
					<label>Giá:&nbsp;</label>
					<a class="price btn btn-warning font-weight-bold" style="font-size: 30px;"><?php echo e(number_format($sanpham['giatien'])); ?>VNĐ</a>
				</div>

				<div class="form-group">
					<form action="<?php echo e(route('add-products', $sanpham['id'])); ?>" class="aaa" method="post">
						<div class="form-group all-center">
							<?php echo csrf_field(); ?>

							<input type="hidden" name="soluong" value="<?php echo e($sanpham->soluong); ?>">
							<input type="hidden" name="trongluong" value="<?php echo e($sanpham->trongluong); ?>">
							<input type="hidden" name="kichthuoc" value="<?php echo e($sanpham->kichthuoc); ?>">
							<input type="hidden" name="chatlieu" value="<?php echo e($sanpham->chatlieu); ?>">
							<input type="hidden" name="giatien" value="<?php echo e($sanpham->giatien); ?>">
							<label>Số lượng cần mua:</label>
							<input type="number" name="soluongmua">
							<hr />
							<button type="submit" class="btn btn-danger"> Chọn Mua</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Wamp\www\noithat\resources\views/layouts/chitietsp.blade.php ENDPATH**/ ?>