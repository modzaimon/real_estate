<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('storage/user/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Real estate</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
       @php
           $menu = json_decode('[
                { "name" : "Dashboard"  , "link" : "'.route('dashboard').'"         },
                { "name" : "Sale"       , "link" : "'.route('sale.index').'"       },
                { "name" : "Brand"      , "link" : "'.route('brand.index').'"       },
                { "name" : "Developer"  , "link" : "'.route('developer.index').'"   },
                { "name" : "Project"    , "link" : "'.route('project.index').'"     },
                { "name" : "Estate"     , "link" : "'.route('estate.index').'"      },
                { "name" : "Seller"     , "link" : "'.route('seller.index').'"      },
                { "name" : "Customer"   , "link" : "'.route('customer.index').'"    },
                { "name" : "Bank"       , "link" : "'.route('bank.index').'"        },
                { "name" : "Directsale" , "link" : "'.route('directsale.index').'"  }
            ]');
       @endphp

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <?php  ?>

                @foreach ($menu as $k => $v)
                <li class="nav-item">
                    <a href="{{$v->link}}" class="nav-link ">
                        <i class="fa-solid fa-arrow-right col-2"></i>
                        <p>{{$v->name}}</p>
                    </a>
                </li>
                @endforeach
                
            </ul>
        </nav>


        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
