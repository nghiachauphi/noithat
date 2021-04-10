
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header text-center" style="margin-bottom: 2%"><h2>Thông tin tài khoản</h2></div>
        <div class="container">
            <div class="row">
                <div class="col all-center">
                    <form action="<?php echo e(url('info/'. $user->id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group all-center">
                            <img class="rounded-circle" src="<?php echo e(asset('/public/upload/'.$user->hinhanh)); ?>"  width="200;" height="200;"/>
                        </div>
                        <div class="form-group">
                            <input type="file" name="avatar" class="form-control">
                            <input type="hidden" name="hinhcu" class="form-control" value="<?php echo e($user->hinhanh); ?>">
                            <button type="submit" class="form-control btn btn-info"><i class="fal fa-save"></i> Thay đổi ảnh đại diện</button>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <div class="order_review">
                        <div class="table-responsive order_table">
                            <table class="table table-bordered table-sm">

                                <thead class="">
                                <!-- xuất thông tin user -->
                                <tr>
                                    <td>Họ và tên</td>
                                    <td><?php echo e($user->name); ?></td>
                                </tr>
                                <tr>
                                    <td>Điện thoại</td>
                                    <td><?php echo e($user->phone); ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo e($user->email); ?></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td><?php echo e($user->address); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-edit"></i> Sửa thông tin</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-danger" name="XoaTaiKhoan" href="<?php echo e(url('/nguoidung/xoa/' . $user->id)); ?>">Xóa tài khoản
                                            <i class="fal fa-trash-alt text-warning"></i>
                                        </a>
                                    </td>
                                </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div>

            </div>
        </div>

        <hr>
        <div class="card-header text-center"><h2>Thông tin sản phẩm đã mua</h2></div>
        <hr>

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



    <form action="<?php echo e(url('/info/' . $user->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Họ và tên</label>
                            <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Họ và tên lót</label>
                            <input type="text" class="form-control" name="email" value="<?php echo e($user->email); ?>">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Điện thoại</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo e($user->phone); ?>">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="<?php echo e($user->address); ?>">
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Wamp\www\noithat\resources\views/layouts/info.blade.php ENDPATH**/ ?>