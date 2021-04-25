<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="images/home/logo.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">

                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(auth()->user()): ?>

                                    <?php if(auth()->guard()->guest()): ?>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>"><i class="fal fa-sign-in-alt"></i> Đăng nhập</li>
                                         
                            
                                    <?php else: ?>
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-user"></i> <?php echo e(Auth::user()->name); ?> <span class="caret"></span></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <ul>
                                                    <li>
                                                        <a class="dropdown-item" href="<?php echo e(url('/info')); ?>"><i class="bi bi-info-circle-fill"></i> Thông tin tài khoản</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="<?php echo e(url('/logout')); ?>"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a>
                                                    </li>
                                                </ul>
                                                <form id="logout-form" action="<?php echo e(url('/info')); ?>" method="post" style="display: none;"><?php echo csrf_field(); ?></form>
                                            </div>
                                        </li>
                                    <?php endif; ?>

                                <?php endif; ?>

                                <?php else: ?>
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('register')); ?>"><i class="bi bi-box-arrow-down-left"></i> Đăng ký</li>
                                    <li><a href="<?php echo e(route('login')); ?>"><i class="fa fa-lock"></i> Login</a></li>

                                <?php endif; ?>

                            <li class="nav-item"><a href="<?php echo e(url('/cart')); ?>"><i class="fa fa-shopping-cart"></i> Cart</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?php echo e(route('home')); ?>" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.blade.php">Products</a></li>
                                    <li><a href="product-details.blade.php">Product Details</a></li>
                                    <li><a href="checkout.blade.php">Thông tin</a></li>
                                    <li><a href="cart.blade.php">Cart</a></li>
                                    <li><a href="login.blade.php">Login</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.blade.php">Blog List</a></li>
                                    <li><a href="blog-single.blade.php">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="info.blade.php">404</a></li>
                            <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                        <form action="<?php echo e(url('/search')); ?>" method="get" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="searchString" />
                                <input class="btn-info" type="submit" value="tìm kiếm" />
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header--><?php /**PATH E:\Wamp\www\noithat\resources\views/layouts/header.blade.php ENDPATH**/ ?>