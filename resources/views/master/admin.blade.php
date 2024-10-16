<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('anh/bon.jpg') }}">
    <title>AdminBon</title>

    <!-- Custom fonts for this template-->
    <link href="startbootstrap-sb-admin-2-4.1.4/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="startbootstrap-sb-admin-2-4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }

        .blinking-text {
            animation: blink 1s infinite;
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('master.partials.sidebar')

        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('master.partials.navbar')
                <!-- End of Topbar -->
                <div class="container-fluid">
                @if(Auth::check() && Auth::user()->role == 'employee')
                        @yield('tile')
                        @yield('main')
                    @else
                    <p class="blinking-text" style="margin-left: 300px;">Bạn không có quyền truy cập vào phần này nếu không có tài khoản admin !</p>
                    <img style="width: 100%;height: 600px;margin-bottom: 0;" src="{{ asset('anh/bon.jpg') }}" alt="Login Icon" id="loginIcon">
                    @endif
                </div>



            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('master.partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="startbootstrap-sb-admin-2-4.1.4/vendor/jquery/jquery.min.js"></script>
    <script src="startbootstrap-sb-admin-2-4.1.4/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="startbootstrap-sb-admin-2-4.1.4/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="startbootstrap-sb-admin-2-4.1.4/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="startbootstrap-sb-admin-2-4.1.4/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="startbootstrap-sb-admin-2-4.1.4/js/demo/chart-area-demo.js"></script>
    <script src="startbootstrap-sb-admin-2-4.1.4/js/demo/chart-pie-demo.js"></script>

</body>

</html>