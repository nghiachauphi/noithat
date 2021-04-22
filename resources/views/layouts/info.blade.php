@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header text-center" style="margin-bottom: 2%"><h2>Thông tin tài khoản</h2></div>
        <div class="container">
            <div class="row">
                <div class="col all-center">
                    <div class="form-group">
                        <img class="rounded-circle" src="{{asset('/public/upload/'.$user->hinhanh)}}"  width="200;" height="200;"/>
                    </div>
                </div>
                <div class="col">
                    <div class="order_review">
                        <div class="table-responsive order_table">
                            <table class="table table-bordered table-sm">

                                <thead >
                                <!-- xuất thông tin user -->
                                <tr>
                                    <td>Họ và tên</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Điện thoại</td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                <tr >
                                    <td><a>Xem sản phẩm đã mua</a></td>
                                    <td><a href="{{url('/sanpham-damua')}}">Xem tại đây <i class="bi bi-arrow-down-circle-fill"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-edit"></i> Sửa thông tin</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-danger" name="XoaTaiKhoan" href="{{ url('/info/delete-info/' . $user->id) }}">Xóa tài khoản
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


        <form action="{{url('/info/' . $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
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
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Họ và tên lót</label>
                                <input type="text" class="form-control" name="email" value="{{$user->email}}">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Điện thoại</label>
                                <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="{{$user->address}}">
                            </div>

                            <div class="form-group">
                                <img class="rounded-circle" src="{{asset('/public/upload/'.$user->hinhanh)}}"  width="50;" height="50;"/>
                            </div>
                            <div class="form-group">
                                <input type="file" name="avatar" class="form-control">
                                <input type="hidden" name="hinhcu" class="form-control" value="{{$user->hinhanh}}">
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

@endsection