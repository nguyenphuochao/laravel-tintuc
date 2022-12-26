@extends('layout.index')
@section('content')
<div class="container">

	<!-- slider -->
	<div class="row carousel-holder">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">Đăng nhập</div>
				@if(session('thongbao'))
				<div class="alert alert-danger">{{session('thongbao')}}</div>
				@endif
				<div class="panel-body">
					@if ($errors->any())
					<ul>
						@foreach ($errors->all() as $error)
						<li style="background-color: red">{{ $error }}</li>
						@endforeach
					</ul>
					@endif
					<form action="" method="post">
						@csrf
						<div>
							<label>Email</label>
							<input type="email" class="form-control" placeholder="Email" name="txtEmail" 
							>
						</div>
						<br>	
						<div>
							<label>Mật khẩu</label>
							<input type="password" class="form-control" name="txtPassword">
						</div>
						<br>
						<button type="submit" class="btn btn-default">Đăng nhập
						</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
	<!-- end slide -->
</div>
@endsection