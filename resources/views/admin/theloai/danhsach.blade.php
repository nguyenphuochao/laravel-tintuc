@extends('admin.layout.index');
@section('content');
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể loại
                    <small>Danh sách</small>
                </h1>
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                   @endif
            </div>
            </div>
         
    
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Tên không dấu</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($theloai as $item)
                    
            
                    <tr class="odd gradeX" align="center">
                
                        <td>{{$item->id}}</td>
                        <td>{{$item->Ten}}</td>
                        <td>{{$item->TenKhongDau}}</td>
                    
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a  onclick="return confirm('Bạn chắc xóa chứ??') "href="admin/theloai/xoa/{{$item->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/theloai/sua/{{$item->id}}">Edit</a></td>
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