<!DOCTYPE html>
<html lang="en">

<head>
    @include('Template.head')
    <title>Laravel & Vue Js</title>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

        <!-- Navbar -->
        @include('Template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Template.left-sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">
                <router-view></router-view>
                <vue-progress-bar></vue-progress-bar>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        @include('Template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    @include('Template.script')
</body>

</html>
