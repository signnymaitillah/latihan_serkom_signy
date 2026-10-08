<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Admin - SMPN 1 SINGAPARNA')</title>
    
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    
    <style>
  
        .navbar.default-layout-navbar {
            background: linear-gradient(to right, #1c47e5, #3f7ced) !important;
        }
        
        .navbar.default-layout-navbar .navbar-brand-wrapper {
            background: #2452f9 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0 !important;
        }

   
        .navbar .navbar-brand-wrapper .navbar-brand.brand-logo {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: auto !important;
            margin: 0 !important;
            padding: 0 !important;
        }

      
        .brand-img-logo {
            width: 32px !important;
            height: 32px !important;
            object-fit: contain !important;
            margin-right: 8px !important; 
        }

       
        .navbar-brand-text {
            color: #ffffff !important;
            font-weight: 700 !important;
            font-size: 0.95rem !important;
            letter-spacing: 0px !important;
            white-space: nowrap !important;
            margin: 0 !important;
        }

        
        .sidebar .nav .nav-item.active > .nav-link {
            background: #e6f5ff !important;
            color: #008be3 !important;
            border-left: none !important; 
            box-shadow: 0 4px 12px rgba(0, 139, 227, 0.15) !important;
            border-radius: 8px !important; 
        }

        .sidebar .nav .nav-item.active > .nav-link .menu-title,
        .sidebar .nav .nav-item.active > .nav-link .menu-icon {
            color: #008be3 !important;
            font-weight: 600 !important;
        }

     
        .btn-gradient-primary, 
        .bg-gradient-primary {
            background: linear-gradient(to right, #008be3, #1db0f6) !important;
            border: none !important;
        }

        .text-primary {
            color: #008be3 !important;
        }

        .placeholder-white::placeholder {
            color: rgba(255, 255, 255, 0.8) !important;
        }
    </style>

    @stack('styles')
</head>
<body>
    <div class="container-scroller">
      
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">
                
                <a class="navbar-brand brand-logo d-flex align-items-center justify-content-center text-decoration-none" href="{{ url('/dashboard') }}">
                    <img src="{{ asset('assets/images/smp.png') }}" alt="logo" class="brand-img-logo" onError="this.style.display='none'" />
                    <span class="navbar-brand-text">SMPN 1 SINGAPARNA</span>
                </a>

                <a class="navbar-brand brand-logo-mini text-decoration-none text-center" href="{{ url('/dashboard') }}">
                    <img src="{{ asset('assets/images/smp.png') }}" alt="logo" style="width: 30px; height: 30px; object-fit: contain;" />
                </a>
            </div>
            
            <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-end">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle text-white" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="{{ asset('assets/images/user.avif') }}" alt="image">
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-white fw-bold">{{ Auth::user()?->username }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <div class="dropdown-divider"></div>
                            
                            <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger border-0 bg-transparent w-100 text-start">
                                    <i class="mdi mdi-logout me-2 text-danger"></i> Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
        
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="{{ asset('assets/images/user.avif') }}" alt="profile" />
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-1">{{ Auth::user()?->username }}</span>
                                <span class="text-secondary text-small text-capitalize">{{ Auth::user()?->role ?? 'User' }}</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profil-sekolah') }}">
                            <span class="menu-title">Profil Sekolah</span>
                            <i class="mdi mdi-school menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/siswa') }}">
                            <span class="menu-title">Data Siswa</span>
                            <i class="mdi mdi-account-group menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/guru') }}">
                            <span class="menu-title">Data Guru</span>
                            <i class="mdi mdi-human-male-board menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/ekstrakulikuler') }}">
                            <span class="menu-title">Ekstrakulikuler</span>
                            <i class="mdi mdi-run menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/berita') }}">
                            <span class="menu-title">Berita</span>
                            <i class="mdi mdi-newspaper menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/galeri') }}">
                            <span class="menu-title">Galeri</span>
                            <i class="mdi mdi-image-multiple menu-icon"></i>
                        </a>
                    </li>

                    @if(Auth::check() && Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user') }}">
                            <span class="menu-title">Manajemen User</span>
                            <i class="mdi mdi-account-key menu-icon"></i>
                        </a>
                    </li>
                    @endif
                </ul>
            </nav>

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
         
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                            Copyright © {{ date('Y') }} SMPN 1 SINGAPARNA. All rights reserved.
                        </span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                            Singaparna, Jawa Barat <i class="mdi mdi-heart text-danger"></i>
                        </span>
                    </div>
                </footer>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    @stack('scripts')
</body>
</html>