@extends('admin.layout.index');
@section('content');
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại tin
                    <small>Thêm</small>
                </h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên loại tin</label>
                    <input class="form-control" name="txtLoaiTin" placeholder="Nhập tên loại tin " />
                </div>
                <div class="form-group">
                    <label>Thể loại</label>
                    <select name="theloai" class="form-control">
                        @foreach($theloai as $item)
                        <option value="{{$item->id}}">{{$item->Ten}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-default">Thêm</button>
                <a href="admin/loaitin/them"><button type="button" class="btn btn-default">Reset</button></a>
                <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    @endsection