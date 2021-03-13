@extends('layouts.app')
@section('content')
    <section class="mb-4">
        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <div id="contact-page" class="container">
            <div class="bg">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="title text-center"><strong>Liên Hệ Chúng Tôi</strong></h2>
{{--                        <div id="gmap" class="contact-map">--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="contact-form">
                            <h2 class="title text-center">Thông tin cần liên hệ</h2>
                            <div class="status alert alert-success" style="display: none"></div>
                            <form class="form-contact " action="" method="post" action="{{ route('contact.store') }}">
                            @csrf
                            <!--Grid row-->


                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <label for="name" class="">Họ và tên</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Nhập họ tên...">
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <label for="email" class="">Địa chỉ email</label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Nhập email...">
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <label for="phone" class="">Điện thoại</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại...">
                                    </div>
                                </div>
                                <!--Grid column-->


                                <!--Grid row-->

                                <!--Grid row-->

                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <label for="subject" class="">Tiêu đề</label>
                                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Nhập tiêu đề...">
                                    </div>
                                </div>

                                <!--Grid row-->

                                <!--Grid row-->


                                <!--Grid column-->
                                <div class="col-md-12">

                                    <div class="md-form">
                                        <label for="message">Nội dung</label>
                                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder="Nhập nội dung"></textarea>
                                    </div>

                                </div>

                                <!--Grid row-->

                                <button type="submit" name="send" class="btn btn-info btn-block">Gửi</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="contact-info">
                            <h2 class="title text-center">Contact Info</h2>
                            <address>
                                <p>E-Shopper Inc.</p>
                                <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                                <p>Newyork USA</p>
                                <p>Mobile: +2346 17 38 93</p>
                                <p>Fax: 1-714-252-0026</p>
                                <p>Email: info@e-shopper.com</p>
                            </address>
                            <div class="social-networks">
                                <h2 class="title text-center">Social Networking</h2>
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/#contact-page-->

@endsection