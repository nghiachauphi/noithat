@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa lớp</div>
		<div class="card-body">
			<form action="{{ url('/sanpham/sua/' . $sanpham->id) }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="danhmuc_id">Danh mục</label>
					<select class="form-control @error('danhmuc_id') is-invalid @enderror" id="danhmuc_id" name="danhmuc_id" value="{{$sanpham->danhmuc_id}}">
						
						@foreach($danhmuc as $value)
							<option value="{{ $value->id }}">{{ $value->tendanhmuc }}</option>
						@endforeach
					</select>
					@error('danhmuc_id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="tensanpham">Mô tả</label>
					<input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham" name="tensanpham" value="{{ $sanpham->tensanpham }}" />
					@error('tensanpham')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				

				<div class="form-group">
					<label for="mota">Mô tả</label>
					<input type="text" class="form-control @error('mota') is-invalid @enderror" id="mota" name="mota" value="{{$sanpham->mota}}"/>
					@error('mota')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>

				<div class="row form-group">
					@foreach($sp as $value)
					<div class="d-flex col all-center">
                        <img class="rounded" src="{{asset('public/upload/'.$value->hinhanh)}}" width="100;" height="100;">
                    </div>
                @endforeach

                	<div class="col">
						
						<input  type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" />
					</div>
				</div>
				
				<div>
						
						<input  type="hidden" class="form-control @error('hinhcu') is-invalid @enderror" id="hinhcu" name="hinhcu" value="{{$value->hinhanh}}" />
				</div>

				<div class="form-group">
					<label for="giatien">Giá tiền</label>
					<input type="number" class="form-control @error('giatien') is-invalid @enderror" id="giatien" name="giatien" value="{{$sanpham->giatien}}"/>
					@error('giatien')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
@endsection