@extends('admin.layouts')

@section('content')
	<div class="card">
		<div class="h2 card-header text-center">Thêm danh mục</div>
		<div class="card-body">
			<form action="{{ url('/admin/danhmuc/them') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="tendanhmuc">Tên danh mục</label>
					<input type="text" class="form-control @error('tendanhmuc') is-invalid @enderror" id="tendanhmuc" name="tendanhmuc"/>
					@error('tendanhmuc')
						<span class="invalid-feedback" role="alert">{{ $message }}</span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Thêm Danh Mục Mới</button>
			</form>
		</div>
	</div>
@endsection