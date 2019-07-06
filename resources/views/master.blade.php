<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin - Khoa Phạm</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url('admin/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('admin/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{ url('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ url('admin/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Area - Khoa Phạm</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-user">
                        @if(Auth::check())
                        <li><i class="fa fa-user fa-fw"></i> {{ Auth::User()->username }}</a>
                        </li>
                        <li><a href="admin/user/sua/{{ Auth::User()->id }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{!! URL::route('getLogout') !!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                        @endif
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            @include('navigation')

        </nav>

        <!-- Page Content -->
        @yield('content')

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ url('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('admin/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ url('admin/dist/js/sb-admin-2.js')}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{ url('admin/bower_components/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ url('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
    {{-- My script --}}
    <script type="text/javascript" src="{{ url('ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{ url('ckeditor/ckfinder/ckfinder.js')}}"></script>


    <script type="text/javascript" src="{{ url('admin/dist/js/myscript.js')}}"></script>
    @yield('script')
</body>

</html>
