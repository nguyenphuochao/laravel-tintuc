@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại tin
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="post">
                     <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <label>Tên loại</label>
                        <input class="form-control" name="txtLoaiTin" placeholder="" value="{{$loaitin->Ten}}" />
                    </div>
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <select name="txtTheLoai" class="form-control" required="required">
                            @foreach($theloai as $tl)
                            <option value="{{$tl->id}}" @if($tl->id==$loaitin->idTheLoai) selected @endif >{{$tl->Ten}}</option>
                            @endforeach
                        </select>

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