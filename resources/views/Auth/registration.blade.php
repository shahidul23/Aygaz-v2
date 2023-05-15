@extends('Layouts.main')
@section('main_content')

<div class="hold-transition register-page">
	<div>
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
	</div>
	<div class="register-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="{{ url('/') }}" class="h1"><b>AYGAZ - </b>Panel</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Register a new membership</p>

				<form action="{{ route('user-register') }}" method="post">
					@csrf
					<span class="text-danger">@error('name'){{$message}} @enderror</span>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Full name" name="name" autocomplete="off">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<span class="text-danger">@error('phone'){{$message}} @enderror</span>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Phone Numbers" name="phone" autocomplete="off">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-phone"></span>
							</div>
						</div>
					</div>
					<span class="text-danger">@error('email'){{$message}} @enderror</span>
					<div class="input-group mb-3">
						<input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<span class="text-danger">@error('password'){{$message}} @enderror</span>
					<div class="input-group mb-3">
						<!-- <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" autocomplete="current-password"> -->
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="current-password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<span class="text-danger">@error('password'){{$message}} @enderror</span>
					<div class="input-group mb-3">
						<!-- <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Retype password" name="password" autocomplete="current-password"> -->
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Retype password" autocomplete="current-password">
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
							<button type="submit" class="btn btn-primary btn-block">Register</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<a href="{{ route('login') }}" class="text-center">I already have a membership</a>
			</div>
			<!-- /.form-box -->
		</div><!-- /.card -->
	</div>
</div>

@endsection