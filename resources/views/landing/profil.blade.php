@extends('landing.layouts.app')

@section('title', 'Profil Sekolah - SMPN 1 Singaparna')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Profil SMPN 1 Singaparna</h2>
        <p class="text-muted small">Mengenal Lebih Dekat Sekolah, Visi, dan Misi Kami</p>
    </div>

    <div class="row align-items-center g-4 mb-5">
        <div class="col-md-5">
            <div class="rounded-3 overflow-hidden bg-light shadow-sm">
                <img src="{{ asset('assets/images/smp.jpg') }}" 
                     class="w-100 h-100 object-fit-cover" 
                     style="max-height: 280px;" 
                     alt="SMPN 1 Singaparna"
                     onerror="this.onerror=null; this.src='https://via.placeholder.com/500x300?text=SMPN+1+Singaparna';">
            </div>
        </div>
        <div class="col-md-7">
            <h4 class="fw-bold text-dark mb-3">Mencetak Generasi Unggul & Berkarakter</h4>
            <p class="text-secondary mb-2">
                SMPN 1 Singaparna adalah lembaga pendidikan formal di Kabupaten Tasikmalaya yang berkomitmen memberikan layanan pendidikan terbaik bagi peserta didik.
            </p>
            <p class="text-secondary mb-0">
                Fokus utama kami adalah mengembangkan potensi akademik maupun non-akademik siswa melalui lingkungan belajar yang kondusif, religius, serta berwawasan lingkungan.
            </p>
        </div>
    </div>

    <hr class="my-5 opacity-10">

    <div class="row g-4">
        <div class="col-md-5">
            <div class="p-4 bg-light rounded-3 border-start border-4 border-primary h-100">
                <h5 class="fw-bold text-primary mb-3"><i class="fa-solid fa-eye me-2"></i>Visi Sekolah</h5>
                <p class="fst-italic text-secondary mb-0 leading-relaxed">
                    "Terwujudnya Peserta Didik yang Bertaqwa, Berprestasi, Berkarakter Mulia, dan Berwawasan Lingkungan."
                </p>
            </div>
        </div>

        <div class="col-md-7">
            <div class="p-4 bg-light rounded-3 h-100">
                <h5 class="fw-bold text-primary mb-3"><i class="fa-solid fa-list-check me-2"></i>Misi Sekolah</h5>
                <ol class="text-secondary mb-0 ps-3">
                    <li class="mb-2">Menumbuhkan keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa melalui kegiatan keagamaan secara rutin.</li>
                    <li class="mb-2">Melaksanakan pembelajaran yang efektif, inovatif, dan berorientasi pada pengembangan potensi siswa secara optimal.</li>
                    <li class="mb-2">Meningkatkan prestasi akademik dan non-akademik melalui kegiatan intrakurikuler serta ekstrakurikuler.</li>
                    <li>Mewujudkan lingkungan sekolah yang bersih, asri, aman, dan nyaman sebagai sarana pendukung pembelajaran.</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection