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
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                        <div class=" alert alert-success  msg-flash">
                            {{session('thongbao')}}
                        </div>
                    @endif

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Tên Thể Loại</th>
                                <th class="text-center">Slug</th>
                                <th class="text-center">Xóa</th>
                                <th class="text-center">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($theloai as $value)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$value->Ten}}</td>
                                    <td>{{$value->TenKhongDau}}</td>
                                    <td>{{$value->slug}}</td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/theloai/sua/{{$value->id}}">Sửa</a></td>
                                     <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/theloai/xoa/{{$value->id}}" class="check"> Xóa</a></td>
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