@extends('admin.layout.index');
@section('content');
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tiêu đề</th>
                       <th>Tên không dấu</th>
                        <th>Tóm tắt</th>
                        <th>Hình</th>
                        <th>Nổi bật</th>
                        <th>Số lượt xem</th>
                        <th>Loại Tin</th>
                        <th>Thể loại</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
              @foreach($tintuc as $item)
                    <tr class="odd gradeX" align="center">
                       <td>{{$item->id}}</td>
                       <td>{{$item->TieuDe}}</td>
                       <td>{{$item->TieuDeKhongDau}}</td>
                       <td>{{$item->TomTat}}</td>
                       <td><img src="upload/tintuc/{{$item->Hinh}}" alt="" width="100px"></td>
                        <td>
                            @if($item->NoiBat==1)
                                {{"Nổi bật"}}
                            @else
                                {{"Không"}}
                            @endif
                        </td>
                        <td>{{$item->SoLuotXem}}</td>
                        <td>{{$item->loaitin->Ten}}</td>
                        <td>{{$item->loaitin->theloai->Ten}}</td>
                        <td></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw" ></i><a onclick="return confirm('Bạn chắc xóa chứ')" href="admin/tintuc/xoa/{{$item->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{$item->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection