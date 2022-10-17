<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('storage/user/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Real estate</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
       

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link ">
                        <i class="fa-solid fa-gauge-high col-2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a href="{{ route('brand.index') }}" class="nav-link">
                        <i class="fa-solid fa-flag col-2"></i>
                        <p>Brand</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('developer.index') }}" class="nav-link">
                        <i class="fa-solid fa-building col-2"></i>
                        <p>Developer </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('project.index') }}" class="nav-link">
                        <i class="fa-solid fa-house-user col-2"></i>
                        <p>Project</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('estate.index') }}" class="nav-link">
                        <i class="fa-solid fa-house col-2"></i>
                        <p>Estate</p>
                    </a>
                </li>
                
            </ul>
        </nav>


        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
