<!DOCTYPE html>

<html lang="en">

<head>
    @include('lte3.components.header')
</head>

<body class=" hold-transition sidebar-mini">
    {{-- <pre>{{ print_r(session()->all()) }}</pre> --}}
    <div class="wrapper">

        <!-- Navbar -->
        @include('lte3.components.navbar')

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('lte3.components.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <x-breadcrumb :paths="$currentPath" />

                        </div>
                    </div>
                </div>
            </div>
           

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="">
                        
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    </div>
                    @yield('content')
                   
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.content -->
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            @include('lte3.components.footer')
        </footer>
    </div>


    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    @include('lte3.components.include-js')
    @yield('js')

</body>

</html>
