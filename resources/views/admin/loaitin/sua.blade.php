@extends('admin.layout.index')
<!-- Page Content -->
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loai Tin
                            <small>Sửa</small>
                        </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/loaitin/sua/{{$loaitin->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select class="form-control" name="theloai">
                        @foreach ($theloai as $values)
                            <option value="{{$values->id}}" @if($loaitin->idTheLoai == $values->id){{"selected"}}@endif>{{$values->Ten}}</option>
                        @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label>Tên Thể Loại</label>
                        <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{{$loaitin->Ten}}" />
                    </div>

                    <button type="submit" class="btn btn-default">Category Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection