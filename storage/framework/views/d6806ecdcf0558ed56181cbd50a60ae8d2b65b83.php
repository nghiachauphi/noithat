
<?php $__env->startSection('content'); ?>
<div>
    <div class="card-header h1 text-center " style="width: 100%"><a class="bg bg-dark">Xóa tài khoản</a></div>
    <table class="table table-striped table-hover style">
        <div class="card-body all-center " style="width: 100%;">
            <form class="form-group" action="<?php echo e(url('/info/delete-info/' . $user->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group all-center">
                    <div class="form-group" style="margin-right: 2%">
                        <p >Bạn có muốn xóa tài khoản <?php echo e($user->name); ?> không?</p>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
                    </div>

                </div>

            </form>
        </div>
    </table>
</div>
    <style>
        .style{
            border: thin solid red;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Wamp\www\noithat\resources\views/layouts/delete-info.blade.php ENDPATH**/ ?>