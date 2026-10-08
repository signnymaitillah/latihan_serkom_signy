<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMPN 1 Singaparna')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root { --primary-blue: #0d47a1; }
        .bg-school { background-color: var(--primary-blue); }
        .text-school { color: var(--primary-blue); }
        
        /* Footer Links Style */
        .footer-link {
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .footer-link:hover {
            color: #ffffff;
            padding-left: 4px;
        }
        .social-btn {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .social-btn:hover {
            background-color: #ffffff;
            color: var(--primary-blue);
            transform: translateY(-3px);
        }
    </style>
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-school sticky-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-white d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/smp.png') }}" alt="Logo SMPN 1 Singaparna" class="me-2" style="height: 35px; width: auto; object-fit: contain;">
                <span>SMPN 1 SINGAPARNA</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fw-semibold">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'text-white fw-bold active' : 'text-white-50' }}" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('profil*') ? 'text-white fw-bold active' : 'text-white-50' }}" href="{{ url('/profil') }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('guru-staf*') ? 'text-white fw-bold active' : 'text-white-50' }}" href="{{ url('/guru-staf') }}">Guru & Staf</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('ekstrakulikuler-sekolah*') ? 'text-white fw-bold active' : 'text-white-50' }}" href="{{ url('/ekstrakulikuler-sekolah') }}">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('berita-sekolah*') ? 'text-white fw-bold active' : 'text-white-50' }}" href="{{ url('/berita-sekolah') }}">Berita</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="bg-school text-white pt-5 pb-3 mt-auto border-top border-4 border-light-subtle">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('assets/images/smp.png') }}" alt="" class="me-2" style="height: 40px; width: auto; object-fit: contain;">
                        <h5 class="fw-bold mb-0">SMPN 1 SINGAPARNA</h5>
                    </div>
                    <p class="small text-white-50 leading-relaxed mb-3">
                        Mewujudkan generasi cerdas, berkarakter, berbudaya lingkungan, dan berprestasi unggul di Kabupaten Tasikmalaya.
                    </p>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h6 class="fw-bold text-uppercase mb-3 border-bottom border-white border-opacity-25 pb-2">Navigasi</h6>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2"><a href="{{ url('/') }}" class="footer-link"><i class="fa-solid fa-angle-right me-1 small"></i> Beranda</a></li>
                        <li class="mb-2"><a href="{{ url('/profil') }}" class="footer-link"><i class="fa-solid fa-angle-right me-1 small"></i> Profil</a></li>
                        <li class="mb-2"><a href="{{ url('/guru-staf') }}" class="footer-link"><i class="fa-solid fa-angle-right me-1 small"></i> Guru & Staf</a></li>
                        <li class="mb-2"><a href="{{ url('/ekstrakulikuler-sekolah') }}" class="footer-link"><i class="fa-solid fa-angle-right me-1 small"></i> Ekstrakurikuler</a></li>
                        <li class="mb-2"><a href="{{ url('/berita-sekolah') }}" class="footer-link"><i class="fa-solid fa-angle-right me-1 small"></i> Berita</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold text-uppercase mb-3 border-bottom border-white border-opacity-25 pb-2">Hubungi Kami</h6>
                    <ul class="list-unstyled small text-white-50 mb-0">
                        <li class="mb-2 d-flex align-items-start">
                            <i class="fa-solid fa-location-dot me-2 mt-1 text-white"></i>
                            <span>Jl. Pahlawan KHZ. Musthafa, Singaparna, Kab. Tasikmalaya</span>
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="fa-solid fa-phone me-2 text-white"></i>
                            <span>(0265) 541000</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="fa-solid fa-envelope me-2 text-white"></i>
                            <span>info@smpn1singaparna.sch.id</span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold text-uppercase mb-3 border-bottom border-white border-opacity-25 pb-2">Jam Operasional</h6>
                    <ul class="list-unstyled small text-white-50 mb-0">
                        <li class="mb-2"><strong>Senin - Kamis:</strong> 07.00 - 15.00 WIB</li>
                        <li class="mb-2"><strong>Jumat:</strong> 07.00 - 11.30 WIB</li>
                        <li><strong>Sabtu - Minggu:</strong> <span class="badge bg-danger">Tutup</span></li>
                    </ul>
                </div>
            </div>

            <hr class="border-white opacity-25 my-3">

            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center small text-white-50">
                <p class="mb-2 mb-sm-0">&copy; {{ date('Y') }} SMPN 1 Singaparna. All Rights Reserved.</p>
                <p class="mb-0">Sistem Informasi Profil Sekolah</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>