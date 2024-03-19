<body class="fixed-left">
 
    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

    <!-- Begin page -->
   

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>

            <!-- LOGO -->
            <div class="topbar">
                <div class="text-center">
                    <a href="{{ route('admin.dashboard') }}" class="logo">Viscomm</a>
                    <!-- <a href="index.html" class="logo"><img src="assets/images/logo.png" height="24" alt="logo"></a> -->
                </div>
            </div>
            
            
            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>

                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                                <i class="mdi mdi-airplay"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.user') }}" class="waves-effect">
                                <i class="mdi mdi-account"></i>
                                <span> Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.produk') }}" class="waves-effect">
                                <i class="mdi mdi-note"></i>
                                <span>Produk</span>
                            </a>
                        </li>
                      
                       

                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
            <div class="topbar mb-10" >

                <nav class="navbar-custom" style="background-color: white">

                    <ul class="list-inline float-right mb-0" >
                        <!-- language-->
                   
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false"> Halo {{ auth()->user()->name }}
                                <img src="/Foto/{{ auth()->user()->foto }}" alt="{{ auth()->user()->name }}" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                   
                                    <img src="/Foto/{{ auth()->user()->foto }}" alt="{{ auth()->user()->name }}" class="rounded-circle" height="20">
                                    <h5>{{ auth()->user()->name }}</h5>
                                    <p>{{ auth()->user()->email }}</p>
                                </div>
                                                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                            </div>
                        </li>

                    </ul>

                  

                    <div class="clearfix"></div>

                </nav>

            </div>
        <!-- Left Sidebar End -->
