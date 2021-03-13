@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Sửa lớp</div>
		<div class="card-body">
			<form action="{{ url('/chitietsp/sua/' . $chitietsp->id) }}" method="post">
				@csrf
				<div class="form-row">
				    <div class="form-group col-md-6">
				      	<label for="manhinh">Màn hình</label>
						<input type="text" class="form-control @error('manhinh') is-invalid @enderror" id="manhinh" name="manhinh" value="{{$chitietsp->manhinh}}" />
						@error('manhinh')
							<span class="invalid-feedback" role="alert">{{ $message }}</span>
						@enderror
				    </div>
				    <div class="form-group col-md-6">
				      	<label for="os">Hệ điều hành</label>
						<input type="text" class="form-control @error('os') is-invalid @enderror" id="os" name="os" value="{{$chitietsp->os}}"/>
						@error('os')
							<span class="invalid-feedback" role="alert">{{ $message }}</span>
						@enderror
				    </div>
				</div>
				<div class="form-row">
				    <div class="form-group col-md-6">
				      	<label for="camera_sau">Camera sau</label>
						<input type="text" class="form-control @error('camera_sau') is-invalid @enderror" id="camera_sau" name="camera_sau" value="{{$chitietsp->camera_sau}}"/>
						@error('camera_sau')
							<span class="invalid-feedback" role="alert">{{ $message }}</span>
						@enderror
				    </div>
				    <div class="form-group col-md-6">
				      	<label for="camera_truoc">Camera truoc</label>
						<input type="text" class="form-control @error('camera_truoc') is-invalid @enderror" id="camera_truoc" name="camera_truoc" value="{{$chitietsp->camera_truoc}}"/>
						@error('camera_truoc')
							<span class="invalid-feedback" role="alert">{{ $message }}</span>
						@enderror
				    </div>
				</div>
				<div class="form-row">
				    <div class="form-group col-md-6">
				      	<label for="pin">PIN</label>
						<input type="text" class="form-control @error('pin') is-invalid @enderror" id="pin" name="pin" value="{{$chitietsp->pin}}"/>
						@error('pin')
							<span class="invalid-feedback" role="alert">{{ $message }}</span>
						@enderror
				    </div>
				    <div class="form-group col-md-6">
				      	<label for="cpu">CPU</label>
						<input type="text" class="form-control @error('cpu') is-invalid @enderror" id="cpu" name="cpu" value="{{$chitietsp->cpu}}"/>
						@error('cpu')
							<span class="invalid-feedback" role="alert">{{ $message }}</span>
						@enderror
				    </div>
				</div>
				<div class="form-row">
				    <div class="form-group col-md-6">
				      	<label for="ram">RAM</label>
						<input type="text" class="form-control @error('ram') is-invalid @enderror" id="ram" name="ram" value="{{$chitietsp->ram}}"/>
						@error('ram')
							<span class="invalid-feedback" role="alert">{{ $message }}</span>
						@enderror
				    </div>
				    <div class="form-group col-md-6">
				      	<label for="bonhotrong">Bộ nhớ trong</label>
						<input type="text" class="form-control @error('bonhotrong') is-invalid @enderror" id="bonhotrong" name="bonhotrong" value="{{$chitietsp->bonhotrong}}"/>
						@error('bonhotrong')
							<span class="invalid-feedback" role="alert">{{ $message }}</span>
						@enderror
				    </div>
				</div>
				<div class="form-row">
				    <div class="form-group col-md-6">
				      	<label for="thenho">Thẻ nhớ</label>
						<input type="text" class="form-control @error('thenho') is-invalid @enderror" id="thenho" name="thenho" value="{{$chitietsp->thenho}}"/>
						@error('thenho')
							<span class="invalid-feedback" role="alert">{{ $message }}</span>
						@enderror
				    </div>
				    <div class="form-group col-md-6">
				      	<label for="sim">SIM</label>
						<input type="text" class="form-control @error('sim') is-invalid @enderror" id="sim" name="sim" value="{{$chitietsp->sim}}"/>
						@error('sim')
							<span class="invalid-feedback" role="alert">{{ $message }}</span>
						@enderror
				    </div>
				</div>
				<div class="form-row">
				    <div class="form-group col-md-6">
				      	<label for="pk_tainghe">Tai nghe</label>
						<input type="text" class="form-control @error('pk_tainghe') is-invalid @enderror" id="pk_tainghe" name="pk_tainghe" value="{{$chitietsp->pk_tainghe}}"/>
						@error('pk_tainghe')
							<span class="invalid-feedback" role="alert">{{ $message }}</span>
						@enderror
				    </div>
				    <div class="form-group col-md-6">
				      	<label for="pk_sac">Sạc</label>
						<input type="text" class="form-control @error('pk_sac') is-invalid @enderror" id="pk_sac" name="pk_sac" value="{{$chitietsp->pk_sac}}"/>
						@error('pk_sac')
							<span class="invalid-feedback" role="alert">{{ $message }}</span>
						@enderror
				    </div>
				</div>
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection