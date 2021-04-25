

<?php $__env->startSection('content'); ?>
    <?php if(Session::has('error')): ?>
        <div class="alert alert-success all-center">
            <?php echo e(Session::get('error')); ?>

        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header h2 text-center bg-dark" style="padding-bottom: 2%">Giỏ hàng</div>
        <div class="card-body">

            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th class="w-5">STT</th>
                    <th class="w-10">Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Cập nhật số lượng</th>
                    <th>Trọng lượng</th>
                    <th>Kích thước</th>
                    <th>Chất liệu</th>
                    <th class="w-5">Giá tiền</th>
                    <th class="w-5">Cập nhật</th>
                </tr>
                </thead>
                <tbody >
                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                        $product = App\SanPham::where('id', '=', $value->sanpham_id)->first();
                        $soluongkho = $product->soluong;

                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $regisSP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                                <?php echo e($value->sanpham->tensanpham); ?>

                            </td>
                            <td><img src="<?php echo e(asset('public/upload/'.$value->sanpham->hinhanh)); ?>" width="50;" height="50;"></td>
                            <td>

                                <?php echo e($value->soluong); ?>

                                <input type="hidden" name="soluongkho" value="<?php echo e($soluongkho); ?>">
                                <input type="hidden" name="regis_id" value="<?php echo e($value->id); ?>">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="soluong_update" />
                            </td>
                            <td><?php echo e($value->trongluong); ?></td>
                            <td><?php echo e($value->kichthuoc); ?></td>
                            <td><?php echo e($value->chatlieu); ?></td>
                            <td><?php echo e(number_format($value->price)); ?></td>
                            <td>
                                <input type="submit" value="Cập Nhật">
                            </td>
                        </tr>
                    </form>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Wamp\www\noithat\resources\views/layouts/cart/sua-giohang.blade.php ENDPATH**/ ?>