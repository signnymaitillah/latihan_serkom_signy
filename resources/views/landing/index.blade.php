@extends('landing.layouts.app')

@section('title', 'Beranda - SMPN 1 Singaparna')

@section('content')
    <div id="beranda" class="position-relative mb-4">
        <img src="{{ asset('assets/images/smp.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover; filter: brightness(55%);" alt="SMPN 1 Singaparna">
        <div class="position-absolute top-50 start-50 translate-middle text-center w-100 px-3">
            <h1 class="display-5 fw-bold text-white mb-2">Selamat Datang</h1>
            <h1 class="display-5 fw-bold text-white mb-2">SMPN 1 Singaparna</h1>
            <p class="lead text-light col-md-8 mx-auto">Mewujudkan Generasi Cerdas, Berkarakter, Berbudaya Lingkungan, dan Berprestasi Unggul.</p>
        </div>
    </div>

    <section class="py-4 bg-school-light border-bottom border-top">
        <div class="container">
            <div class="row text-center g-3">
                <div class="col-6 col-md-3">
                    <h3 class="fw-bold text-school mb-0">
                        <i class="fa-solid fa-user-graduate me-2"></i>{{ $totalSiswa ?? $totalSiswas ?? count($siswa ?? []) }}
                    </h3>
                    <p class="text-muted small mb-0">Siswa Aktif</p>
                </div>
                <div class="col-6 col-md-3">
                    <h3 class="fw-bold text-school mb-0">
                        <i class="fa-solid fa-chalkboard-user me-2"></i>{{ $totalGuru ?? count($gurus ?? []) }}
                    </h3>
                    <p class="text-muted small mb-0">Guru & Staf</p>
                </div>
                <div class="col-6 col-md-3">
                    <h3 class="fw-bold text-school mb-0">
                        <i class="fa-solid fa-newspaper me-2"></i>{{ $totalBerita ?? count($berita ?? []) }}
                    </h3>
                    <p class="text-muted small mb-0">Berita & Artikel</p>
                </div>
                <div class="col-6 col-md-3">
                    <h3 class="fw-bold text-school mb-0">
                        <i class="fa-solid fa-trophy me-2"></i>{{ $totalEkskul ?? count($ekstrakulikuler ?? []) }}
                    </h3>
                    <p class="text-muted small mb-0">Ekstrakurikuler</p>
                </div>
            </div>
        </div>
    </section>

    <section id="profil" class="py-5">
        <div class="container py-2">
            <div class="row align-items-center g-4">
                <div class="col-md-5 text-center">
                    <div class="p-3 bg-white rounded shadow-sm border border-primary border-opacity-25">
                        <img src="{{ asset('assets/images/kepala.jpg') }}" class="img-fluid rounded" alt="Kepala Sekolah">
                        <h5 class="fw-bold text-school mt-3 mb-1">Drs. Jamaludin Malik, M.M</h5>
                        <span class="badge bg-primary rounded-pill">Kepala SMPN 1 Singaparna</span>
                    </div>
                </div>
                <div class="col-md-7">
                    <h6 class="text-primary fw-bold text-uppercase">Sambutan Kepala Sekolah</h6>
                    <h2 class="fw-bold text-school mb-3">Selamat Datang di Portal Resmi Website Sekolah</h2>
                    <p class="text-secondary mb-3">
                        Puji dan syukur marilah kita panjatkan ke hadirat Allah SWT. Website ini dirancang sebagai sarana komunikasi dan informasi publik antara sekolah, siswa, orang tua, serta masyarakat.
                    </p>
                    <p class="text-secondary">
                        SMPN 1 Singaparna terus berbenah dan beradaptasi dengan perkembangan teknologi informasi demi memberikan pelayanan pendidikan terbaik dan memfasilitasi potensi seluruh peserta didik secara optimal.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="visi-misi" class="py-5 bg-light">
        <div class="container">
            <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white">
                <div class="text-center mb-5">
                    <span class="badge bg-primary-subtle text-primary fw-bold text-uppercase px-3 py-2 rounded-pill mb-2">Tentang Kami</span>
                    <h2 class="fw-bold text-school mb-3">Tentang SMPN 1 Singaparna</h2>
                    <p class="text-secondary leading-relaxed col-lg-10 mx-auto mb-0">
                        SMPN 1 Singaparna merupakan salah satu sekolah menengah pertama negeri rujukan di Kabupaten Tasikmalaya. Berdiri di lingkungan yang asri dan kondusif, sekolah kami didukung oleh tenaga pendidik yang profesional serta fasilitas belajar modern untuk membentuk lingkungan belajar yang efektif, bermakna, dan menyenangkan bagi peserta didik.
                    </p>
                </div>

                <hr class="my-4 opacity-10">

                <div class="row g-4 pt-2">
                    <div class="col-md-5 border-end-md">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa-solid fa-eye text-primary fa-lg me-2"></i>
                            <h4 class="fw-bold text-school mb-0">Visi Sekolah</h4>
                        </div>
                        <p class="fst-italic text-secondary fs-5 mb-0">
                            "Terwujudnya Generasi yang Bertaqwa, Cerdas, Berkarakter, Berbudaya Lingkungan, dan Berprestasi Unggul."
                        </p>
                    </div>

                    <div class="col-md-7 ps-md-4">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa-solid fa-bullseye text-primary fa-lg me-2"></i>
                            <h4 class="fw-bold text-school mb-0">Misi Sekolah</h4>
                        </div>
                        <ul class="list-unstyled text-secondary mb-0">
                            <li class="mb-2 d-flex align-items-start">
                                <i class="fa-solid fa-check text-primary me-2 mt-1"></i>
                                <span>Menumbuhkan kebiasaan beribadah dan akhlak mulia dalam kehidupan sehari-hari.</span>
                            </li>
                            <li class="mb-2 d-flex align-items-start">
                                <i class="fa-solid fa-check text-primary me-2 mt-1"></i>
                                <span>Melaksanakan proses pembelajaran yang inovatif, kreatif, dan berbasis teknologi informasi.</span>
                            </li>
                            <li class="mb-2 d-flex align-items-start">
                                <i class="fa-solid fa-check text-primary me-2 mt-1"></i>
                                <span>Mengembangkan minat dan bakat siswa melalui kegiatan ekstrakurikuler serta kompetisi.</span>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="fa-solid fa-check text-primary me-2 mt-1"></i>
                                <span>Mewujudkan lingkungan sekolah yang bersih, hijau, sehat, dan ramah anak.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="guru" class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <h6 class="text-primary fw-bold text-uppercase mb-1">Tenaga Pendidik</h6>
                    <h2 class="fw-bold text-school mb-0">Guru & Staf Pengajar</h2>
                </div>
                <div>
                    <a href="{{ route('landing.guru-staf') }}" class="btn btn-outline-primary rounded-pill btn-sm px-3">
                        Lihat Semua <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <div class="row g-3">
                @forelse($gurus->take(4) as $guru)
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="card h-100 border-0 shadow-sm text-center rounded-3 overflow-hidden p-2 d-flex flex-column justify-content-between">
                            <div>
                                <div class="card-thumb rounded-3 overflow-hidden d-flex align-items-center justify-content-center bg-light" style="height: 200px;">
                                    @if(!empty($guru->foto) && file_exists(public_path('uploads/guru/' . $guru->foto)))
                                        <img src="{{ asset('uploads/guru/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}" class="w-100 h-100" style="object-fit: contain;">
                                    @elseif(!empty($guru->foto) && file_exists(public_path('storage/' . $guru->foto)))
                                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}" class="w-100 h-100" style="object-fit: contain;">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($guru->nama_guru ?? 'Guru') }}&background=0d47a1&color=ffffff&size=300" alt="Guru" class="w-100 h-100" style="object-fit: contain;">
                                    @endif
                                </div>
                                
                                <div class="card-body p-2 mt-1">
                                    <h6 class="fw-bold text-school mb-1 text-truncate">{{ $guru->nama_guru ?? 'Nama Guru' }}</h6>
                                    <p class="text-muted small mb-0">{{ $guru->mapel ?? $guru->jabatan ?? 'Guru Mapel' }}</p>
                                </div>
                            </div>
                            <div class="p-2 pt-0">
                                <a href="{{ route('landing.guru.show', $guru->id_guru ?? $guru->id) }}" class="btn btn-outline-primary btn-sm w-100 rounded-pill">
                                    Detail <i class="fa-solid fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">Belum ada data guru.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="ekskul" class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <h6 class="text-primary fw-bold text-uppercase mb-1">Pengembangan Diri</h6>
                    <h2 class="fw-bold text-school mb-0">Ekstrakurikuler</h2>
                </div>
                <div>
                    <a href="{{ route('landing.ekskul') }}" class="btn btn-outline-primary rounded-pill btn-sm px-3">
                        Lihat Semua <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <div class="row g-3">
                @forelse($ekstrakulikuler->take(4) as $ekskul)
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden text-center p-2 d-flex flex-column justify-content-between">
                            <div>
                                {{-- Bingkai Gambar Proporsional --}}
                                <div class="rounded-3 overflow-hidden bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
                                    @if(!empty($ekskul->gambar) && file_exists(public_path('uploads/ekskul/' . $ekskul->gambar)))
                                        <img src="{{ asset('uploads/ekskul/' . $ekskul->gambar) }}" alt="{{ $ekskul->nama_eskul }}" class="w-100 h-100 object-fit-cover">
                                    @elseif(!empty($ekskul->gambar) && file_exists(public_path('storage/' . $ekskul->gambar)))
                                        <img src="{{ asset('storage/' . $ekskul->gambar) }}" alt="{{ $ekskul->nama_eskul }}" class="w-100 h-100 object-fit-cover">
                                    @else
                                        <div class="w-100 h-100 d-flex align-items-center justify-content-center text-primary bg-light">
                                            <i class="fa-solid fa-award fa-3x"></i>
                                        </div>
                                    @endif
                                </div>

                                {{-- Informasi Ekskul --}}
                                <div class="card-body p-2 mt-2">
                                    <h5 class="fw-bold text-school mb-1 text-truncate">{{ $ekskul->nama_eskul ?? $ekskul->nama_ekskul }}</h5>
                                </div>
                            </div>
                            <div class="p-2 pt-0">
                                <a href="{{ route('landing.ekskul.show', ($ekskul->id_ekstrakulikuler ?? $ekskul->id_ekskul ?? $ekskul->id ?? $ekskul->getKey())) }}" class="btn btn-outline-primary btn-sm w-100 rounded-pill">
                                Detail <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">Belum ada data ekstrakurikuler.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="berita" class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <h6 class="text-primary fw-bold text-uppercase mb-1">Informasi Terkini</h6>
                    <h2 class="fw-bold text-school mb-0">Berita & Artikel</h2>
                </div>
                <div>
                    <a href="{{ route('landing.berita') }}" class="btn btn-outline-primary rounded-pill btn-sm px-3">
                        Lihat Semua <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <div class="row g-3">
                @forelse($berita->take(4) as $item)
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden p-2 d-flex flex-column justify-content-between">
                            <div>
                                {{-- Bingkai Gambar Fixed Height --}}
                                <div class="rounded-3 overflow-hidden bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
                                    @if(!empty($item->gambar) && file_exists(public_path('uploads/berita/' . $item->gambar)))
                                        <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-100 h-100 object-fit-cover">
                                    @elseif(!empty($item->gambar) && file_exists(public_path('storage/' . $item->gambar)))
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-100 h-100 object-fit-cover">
                                    @else
                                        <div class="w-100 h-100 d-flex align-items-center justify-content-center text-primary bg-light">
                                            <i class="fa-solid fa-newspaper fa-3x"></i>
                                        </div>
                                    @endif
                                </div>

                                {{-- Isi Informasi Berita --}}
                                <div class="card-body p-2 mt-2">
                                    <small class="text-muted d-block mb-1">
                                        <i class="fa-solid fa-calendar-day me-1 text-primary"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at ?? now())->translatedFormat('d M Y') }}
                                    </small>
                                    <h6 class="fw-bold text-school mb-1 text-truncate">{{ $item->judul }}</h6>
                                    <p class="text-muted small mb-0 text-truncate">{{ strip_tags($item->isi ?? $item->konten) }}</p>
                                </div>
                            </div>
                            <div class="p-2 pt-0">
                                <a href="{{ route('landing.berita.show', $item->id_berita ?? $item->id) }}" class="btn btn-outline-primary btn-sm w-100 rounded-pill">
                                    Baca Selengkapnya <i class="fa-solid fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">Belum ada berita.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection