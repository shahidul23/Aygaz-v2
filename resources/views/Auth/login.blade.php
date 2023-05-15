@extends('Layouts.main')
@section('main_content')
<div class="hold-transition login-page">
	@if(Session::has('success'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" style="color: red;">&nbsp&nbsp&nbsp&nbspX</button>
		{{Session::get('success')}}
	</div>
	@endif
	@if(Session::has('error'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" style="color: red;" >&nbsp&nbsp&nbsp&nbspX</button>
		{{Session::get('error')}}
	</div>
	@endif
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="{{ url('/') }}" class="h1"><b>AYGAZ - </b>Panel</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Sign in page</p>

				<form action="{{ route('user-login') }}" method="post">
					@csrf
					<span class="text-danger">@error('email'){{$message}} @enderror</span>
					<div class="input-group mb-3">
						<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<span class="text-danger">@error('password'){{$message}} @enderror</span>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Password" name="password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
						</div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<!-- <p class="mb-1">
					<a href="forgot-password.html">I forgot my password</a>
				</p> -->
      <!-- <p class="mb-0">
        <a href="{{ route('registration') }}" class="text-center">Register a new membership</a>
    </p> -->
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
@endsection