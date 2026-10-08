@extends('landing.layouts.app')

@section('title', 'Visi & Misi - SMPN 1 Singaparna')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary">Visi & Misi</h2>
        <p class="text-muted">Pedoman dan Arah Kebijakan Pendidikan SMPN 1 Singaparna</p>
    </div>

    <div class="row justify-content-center g-4">
        <!-- Card Visi -->
        <div class="col-md-10">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4 text-center">
                    <span class="badge bg-primary px-3 py-2 rounded-pill mb-2">VISI SEKOLAH</span>
                    <h4 class="fw-bold text-dark mt-2 mb-3">
                        "Terwujudnya Lulusan yang Cerdas, Berkarakter, Berbudaya Lingkungan, dan Berprestasi Unggul"
                    </h4>
                    <p class="text-muted small mb-0">SMPN 1 Singaparna Kabupaten Tasikmalaya</p>
                </div>
            </div>
        </div>

        <!-- Card Misi -->
        <div class="col-md-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-primary mb-3 text-center">MISI SEKOLAH</h5>
                    <ol class="list-group list-group-numbered list-group-flush text-secondary">
                        <li class="list-group-item bg-transparent border-0 py-2">
                            Menyelenggarakan proses pembelajaran yang efektif, inovatif, dan berorientasi pada peningkatan prestasi akademik siswa.
                        </li>
                        <li class="list-group-item bg-transparent border-0 py-2">
                            Membina karakter peserta didik melalui penanaman nilai-nilai keagamaan, kedisiplinan, dan budi pekerti luhur.
                        </li>
                        <li class="list-group-item bg-transparent border-0 py-2">
                            Mengembangkan bakat dan minat siswa melalui kegiatan ekstrakurikuler serta kompetisi non-akademik.
                        </li>
                        <li class="list-group-item bg-transparent border-0 py-2">
                            Mewujudkan lingkungan sekolah yang bersih, hijau, sehat, dan kondusif untuk proses pembelajaran.
                        </li>
                        <li class="list-group-item bg-transparent border-0 py-2">
                            Meningkatkan pemanfaatan teknologi informasi dan komunikasi dalam tata kelola sekolah serta kegiatan pembelajaran.
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection