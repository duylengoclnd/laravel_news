<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin - Ngoc Duy</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="css/admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/admin_assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/admin_assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/admin_assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="css/admin_assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="css/admin_assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        @include('admin.layout.header');

        <!-- Page Content -->
        @yield('content');
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="css/admin_assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="css/admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="css/admin_assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="css/admin_assets/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="css/admin_assets/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="css/admin_assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="css/admin_assets/ckeditor/ckeditor.js" ></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                    responsive: true
            });
        });
        $('.check').on('click',function(){
            var re = confirm('Bạn có chắc chắn xóa không?');
            if (re) {
                return true;
            }
            return false;
        });
        $('.msg-flash').delay(3000).slideUp();
    </script>
    @yield('script')
</body>

</html>
