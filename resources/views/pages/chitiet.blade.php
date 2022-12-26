@extends('layout.index')
@section('content')
<div class="container">
	<div class="row">

		<!-- Blog Post Content Column -->
		<div class="col-lg-9">

			<!-- Blog Post -->

			<!-- Title -->
			<h1>{{$tintuc->TieuDe}}</h1>

			<!-- Author -->
			<p class="lead">
				by <a href="#">By admin</a>
			</p>

			<!-- Preview Image -->
			<img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">

			<!-- Date/Time -->
			<p><span class="glyphicon glyphicon-time"></span> {{$tintuc->created_at}}</p>
			<hr>

			<!-- Post Content -->
			<p class="lead">
				{!! $tintuc->NoiDung!!}
			</p>

			<hr>

			<!-- Blog Comments -->

			<!-- Comments Form -->
			@if(Auth::user())
			<div class="well">
				<h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
				<form role="form" method="post">
					@csrf
					<div class="form-group">
						<textarea class="form-control" rows="3" name="noidung"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Gửi</button>
				</form>
			</div>
			@else
			<div class="alert alert-danger">Bạn phải đăng nhập mới comment được</div>

			@endif

			<hr>

			<!-- Posted Comments -->

			<!-- Comment -->
			@foreach($tintuc->comment as $cm)
			<div class="media">
				<a class="pull-left" href="#">
					<img class="media-object" src="upload/tintuc/avatar.jfif" alt="" width="100px">
				</a>
				<div class="media-body">
					<h4 class="media-heading">{{$cm->users->name}}
						<small>{{$cm->created_at}}</small>

					</h4>
					{{$cm->NoiDung}}
				</div>
			</div>
			@endforeach
			<!-- Comment -->


		</div>

		<!-- Blog Sidebar Widgets Column -->
		<div class="col-md-3">

			<div class="panel panel-default">
				<div class="panel-heading"><b>Tin liên quan</b></div>
				<div class="panel-body">

					<!-- item -->
					@foreach($tinlienquan as $tt)
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-5">
							<a href="detail.html">
								<img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">
							</a>
						</div>
						<div class="col-md-7">
							<a href="#"><b>{{$tt->TieuDe}}</b></a>
						</div>
						<p>{{$tt->TomTat}}</p>
						<div class="break"></div>
					</div>
					@endforeach
					<!-- end item -->
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading"><b>Tin nổi bật</b></div>
				<div class="panel-body">
					@foreach($tinnoibat as $tinnb)
					<!-- item -->
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-5">
							<a href="detail.html">
								<img class="img-responsive" src="upload/tintuc/{{$tinnb->Hinh}}" alt="">
							</a>
						</div>
						<div class="col-md-7">
							<a href="#"><b>{{$tinnb->TieuDe}}</b></a>
						</div>
						<p>{{$tinnb->TomTat}}</p>
						<div class="break"></div>
					</div>
					<!-- end item -->
					@endforeach
				</div>
			</div>

		</div>

	</div>
	<!-- /.row -->
</div>
@endsection