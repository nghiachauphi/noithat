@extends('layouts.app')

@section('pagetitle')
	Login
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">{{ __('Login') }}</div>
				<div class="card-body">
					<form method="post" action="{{ route('login') }}">
						@csrf
						<div class="form-group">
							<label for="email">{{ __('Account name') }}</label>
							<input type="text" class="form-control{{ ($errors->has('email') || $errors->has('username')) ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Email address or Username" required />
							@if ($errors->has('email') || $errors->has('username'))
								<span class="invalid-feedback" role="alert"><strong>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}</strong></span>
							@endif
						</div>
						<div class="form-group">
							<label for="password">{{ __('Password') }}</label>
							<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required />
							@error('password')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
								<label class="custom-control-label" for="remember">{{ __('Remember me') }}</label>
							</div>
						</div>
						<div class="form-group mb-0">
							<button type="submit" class="btn btn-primary"><i class="fal fa-sign-in-alt"></i> {{ __('Login') }}</button>
							@if (Route::has('password.request'))
								<a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
							@endif
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection