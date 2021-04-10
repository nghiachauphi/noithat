@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header text-center" style="margin-bottom: 2%"><h2>Thông tin tài khoản</h2></div>
        <div class="container">
            <div class="row">
                <div class="col all-center">
                    <form action="{{ url('info/'. $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group all-center">
                            <img class="rounded-circle" src="{{asset('/public/upload/'.$user->hinhanh)}}"  width="200;" height="200;"/>
                        </div>
                        <div class="form-group">
                            <input type="file" name="avatar" class="form-control">
                            <input type="hidden" name="hinhcu" class="form-control" value="{{$user->hinhanh}}">
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
                                <tr>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-edit"></i> Sửa thông tin</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-danger" name="XoaTaiKhoan" href="{{ url('/nguoidung/xoa/' . $user->id) }}">Xóa tài khoản
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
        @foreach( $order as $value)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <p>
                        Tên người nhận: <b>{{$value->hovaten}}</b>
                    </p>
                    <p>
                        Địa chỉ: <b>{{$value->diachi}}</b>
                    </p>
                    <p>
                        Email: <b>{{$value->email}}</b>
                    </p>
                    <p>
                        Điện thoại: <b>{{$value->dienthoai}}</b>
                    </p>
                    <p>
                        Ghi chú giao hàng: <b>{{$value->ghichu}}</b>
                    </p>
                    <p>
                        Tổng tiền: <b>{{number_format($value->tongtien)}} VND</b>
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
                        @foreach($value->bill as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{$item->sanpham->tensanpham}}
                                </td>
                                <td>
                                    <img class="rounded" src="{{asset('/public/upload/'.$item->sanpham->hinhanh)}}"  width="50;" height="50;"/>

                                </td>
                                <td>
                                    {{number_format($item->price)}}
                                </td>
                                <td>
                                    {{$item->soluong}}
                                </td>
                                <td>
                                    {{$item->trongluong}}
                                </td>
                                <td>
                                    {{$item->kichthuoc}}
                                </td>
                                <td>
                                    {{$item->chatlieu}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </td>
                <td>
                    @if($value->status == 0)
                        Đang giao
                    @elseif($value->status == 1)
                        Đã giao hàng
                    @elseif($value->status == 2)
                        Đã hủy đơn
                    @endif
                </td>



                <td class="text-center">
                    <form action="{{URL('info/'. $value->id)}}" method="post">
                        @csrf
                    <input type="hidden" name="cancel" value="Hủy đơn" class="btn btn-danger">
                    <input type="submit" value="Hủy đơn" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
        </div>
    </div>



    <form action="{{url('/info/' . $user->id)}}" method="post">
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