@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" id="TheLoai" required>
                          <option value="">Vui lòng chọn</option>
                          @foreach($theloai as $tl)
                          <option 
                          @if($tintuc->loaitin->theloai->id==$tl->id)
                          {{"selected"}}
                          @endif
                          value="{{$tl->id}}">{{$tl->Ten}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Loại tin</label>
                    <select class="form-control" id="LoaiTin" name="LoaiTin">
                        @foreach($loaitin as $l)
                        <option 
                        @if($tintuc->idLoaiTin==$l->id)
                        {{"selected"}}
                        @endif



                        value="{{$l->id}}">{{$l->Ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input class="form-control" name="TieuDe" placeholder="" value="{{$tintuc->TieuDe}}" />
                </div>
                <div class="form-group">
                    <label>Tóm tắt</label>
                    <input class="form-control" name="TomTat" placeholder="" value="{{$tintuc->TomTat}}"/>
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea id="demo" class="form-control ckeditor" cols="5" rows="10" name="NoiDung">{{$tintuc->NoiDung}}</textarea>
                </div>
                <div class="form-group">
                    <label>Hình</label>
                    <img src="upload/tintuc/{{$tintuc->Hinh}}" alt="">
                    <input type="file" name="HinhAnh" >
                </div>
                <div class="form-group">
                    <label>Nổi bật</label>

                    Có:<input type="radio" name="NoiBat" value="1" checked="checked">
                    Không:<input type="radio" name="NoiBat"  value="0">
                    
                </div>
                <button type="submit" class="btn btn-default">Sửa</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    @endsection
    @section('script')
    <script>
        $(document).ready(function(){

            $("#TheLoai").change(function(){

                var idTheLoai=$(this).val();

                $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                    $("#LoaiTin").html(data);
                });
            });
        });
    </script>
    @endsection
     @section('script')
    <script>
        $(document).ready(function(){

            $("#TheLoai").change(function(){

                var idTheLoai=$(this).val();

                $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                    $("#LoaiTin").html(data);
                });
            });
        });
    </script>
    @endsection