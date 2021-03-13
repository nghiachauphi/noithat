@extends('layouts.app')

@section('pagetitle')
	Reset password
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">{{ __('Reset password') }}</div>
				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							<i class="fal fa-info-circle"></i> {{ session('status') }}
						</div>
					@endif
					<form method="post" action="{{ route('password.email') }}">
						@csrf
						<div class="form-group">
							<label for="email">{{ __('E-Mail address') }}</label>
							<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required />
							@error('email')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
						<div class="form-group mb-0">
							<button type="submit" class="btn btn-primary"><i class="fal fa-paper-plane"></i> {{ __('Send password reset link') }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection