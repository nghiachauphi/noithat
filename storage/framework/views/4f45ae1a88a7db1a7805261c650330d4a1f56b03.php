
<?php $__env->startSection('content'); ?>
    <div class="card-header text-center" style="margin-bottom: 2%"><h2>Thông tin sản phẩm đã mua</h2></div>

<div>
    <table class="table table-bordered table-sm">
        <thead style="background-color: #1D6ADD">
        <tr>
            <th>STT</th>
            <th>Thông tin khách hàng</th>
            <th>Trạng thái</th>
            <th>Xác nhận</th>
            <th>Xóa đơn</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
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
                            <th>STT</th>
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
                                <td><?php echo e($loop->iteration); ?></td>

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
                    <?php if($value->status == 0): ?>
                        Đang giao
                    <?php elseif($value->status == 1): ?>
                        Đã giao hàng
                    <?php elseif($value->status == 2): ?>
                        Đã hủy đơn
                    <?php endif; ?>
                </td>



                <td class="text-center">
                    <form action="<?php echo e(URL('info/'. $value->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="cancel" value="Hủy đơn" class="btn btn-danger">
                        <input type="submit" value="Hủy đơn" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\concac\noithat\resources\views/layouts/sanpham-damua.blade.php ENDPATH**/ ?>