@extends('admin.layout.index')
<!-- Page Content -->
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                    @if(session('thongbao'))
                        <div class=" alert alert-success  msg-flash">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Thể Loại</th>
                                <th>Loại Tin</th>
                                <th>Nổi bật</th>
                                <th>Xem</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>{{$tt->TieuDe}}</td>
                                <td>{{$tt->loaitin->theloai->Ten}}</td>
                                <td>{{$tt->loaitin->Ten}}</td>
                                <td>{{$tt->NoiBat}}</td>
                                <td>{{$tt->SoLuotXem}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{$tt->id}}">Sửa</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{$tt->id}}"> Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection