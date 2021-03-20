@extends('admin.layouts')

@section('content')
	@auth()
	@if(auth()->user()->level==1)
	<div class="card">
		<div class="card-header h2 text-center">Thêm sản phẩm</div>
		<div class="card-body">
			<form action="{{ url('/admin/sanpham/them') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="danhmuc_id">Danh mục</label>
					<select class="form-control @error('danhmuc_id') is-invalid @enderror" id="danhmuc_id" name="danhmuc_id">
						<option>Chọn danh mục</option>
						@foreach($danhmuc as $value)
							<option value="{{ $value->id }}">{{ $value->tendanhmuc }}</option>
						@endforeach
					</select>
					@error('danhmuc_id')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				 
				<div class="form-group">
					<label for="tensanpham">Tên sản phẩm</label>
					<input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham" name="tensanpham" />
					@error('tensanpham')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="mota">Mô tả</label>
					<input type="text" class="form-control @error('mota') is-invalid @enderror" id="mota" name="mota" />
					@error('mota')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="hinhanh">Hình ảnh</label>
					<input  type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" />
				</div>

				<div class="form-group">
					<label for="giatien">Giá tiền</label>
					<input type="number" class="form-control @error('giatien') is-invalid @enderror" id="giatien" name="giatien" />
					@error('giatien')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Thêm Danh Mục Mới</button>
			</form>
		</div>
	</div>
	@endif
	@endauth
@endsection