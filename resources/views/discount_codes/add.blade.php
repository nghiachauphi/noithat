@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Thêm mã giảm giá</div>
		<div class="card-body">
			@if(session('success'))
				<div class="alert alert-success">
					{{session('success')}}
				</div>
			@endif
            @if(count($errors->all()) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{$error}}<br>
                    @endforeach
                </div>
            @endif
			@if(session('error'))
			<div class="alert alert-danger">
				{{session('error')}}
			</div>
			@endif
			<form action="{{ route('discount-code-add') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="diachiip">Tên mã giảm giá</label>
					<input type="text" required placeholder="vd: VUICUOITUAN" class="form-control @error('diachiip') is-invalid @enderror" id="diachiip" name="name"/>
                </div>
                <div class="form-group">
					<label for="diachiip">Phần trăm giảm</label>
					<input type="number" required class="form-control @error('diachiip') is-invalid @enderror" id="diachiip" name="discount"/>
                </div>
                <div class="form-group">
					<label for="diachiip">Ngày hết hạn</label>
					<input type="date" required class="form-control @error('diachiip') is-invalid @enderror" id="diachiip" name="expire"/>
				</div>

				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
@endsection