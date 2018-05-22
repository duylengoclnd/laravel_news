@extends('admin.layout.index')
<!-- Page Content -->
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                            <small>Thêm</small>
                        </h1>
            </div>
                @if(session('thongbao'))
                    <div class=" alert alert-success  msg-flash">
                        {{session('thongbao')}}
                    </div>
                @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select class="form-control" id="theloai" name="theloai">
                            @foreach($theloai as $theloai)
                                <option value="{{$theloai->id}}">{{$theloai->Ten}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label>Loại Tin</label>
                        <select class="form-control" id="loaitin" name="loaitin">
                            @foreach($loaitin as $loaitin)
                                <option value="{{$loaitin->id}}">{{$loaitin->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="tieude" placeholder="Nhập Tiêu Đề" />
                    </div>

                    <div class="form-group">
                        <label>Tóm Tắt</label>
                        <textarea class="form-control ckeditor" rows="3" id="demo" name="tomtat"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea class="form-control ckeditor" rows="3" id="demo" name="noidung"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <input type="file" name="hinhanh">
                    </div>
                    <div class="form-group">
                        <label>Nổi Bật</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="0" checked="" type="radio">Không
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" type="radio">Có
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm Mới</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#theloai').change(function(){
                var idTheLoai = $(this).val();
                // $.get('admin/ajax/loaitin/'+idTheLoai,function(data){
                //     $('#loaitin').html(data);
                // });
                $.ajax({
                    type: 'get',
                    url: 'admin/ajax/loaitin/'+idTheLoai,
                    data: { idTheLoai: idTheLoai },
                    success: function(data) {
                        $('#loaitin').html(data);
                    },
            });
        });
    });
    </script>
@endsection