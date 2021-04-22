@extends('layouts.app')
@section('content')
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




@endsection