@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header text-center" style="margin-bottom: 2%"><h2>Thông tin tài khoản</h2></div>
        <div class="container">
            <div class="row">
                <div class="col all-center">
                    <form action="{{ url('nguoidung/'. $customer->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group all-center">
                            <img class="rounded-circle" src="/{{$customer->avatar}}"  width="200;" height="200;"/>
                        </div>
                        <div class="form-group">
                            <input type="file" name="avatar" class="form-control">
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
                                    <td>{{ $customer->last_name . ' ' . $customer->first_name }}</td>
                                </tr>
                                <tr>
                                    <td>Điện thoại</td>
                                    <td>{{ $customer->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $customer->email }}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>{{ $customer->address }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-edit"></i> Sửa thông tin</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-danger" name="XoaTaiKhoan" href="{{ url('/nguoidung/xoa/' . $customer->id) }}">Xóa tài khoản
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
        <div class="card-header text-center"><h2>Thông tin sản phẩm đã mua</h2></div>
        <table class="table table-success table-striped">
            <thead class="bg bg-primary">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>trọng lượng</th>
                <th>chất liệu</th>
                <th>Phần trăm giảm giá (nếu có)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bill as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{$item->product->name}}
                    </td>
                    <td>
                        {{number_format($item->price)}}
                    </td>
                    <td>
                        {{$item->quantity}}
                    </td>
                    <td>
                        {{$item->classifications->name}}
                    </td>
                    <td>
                        {{$item->vat}}
                    </td>
                    <td>
                        {{$item->discount}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <form action="{{url('/info/ . $user->id')}}" method="post">
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
                            <label for="recipient-name" class="col-form-label">Tên</label>
                            <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Họ và tên lót</label>
                            <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Điện thoại</label>
                            <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{$user->address}}">
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