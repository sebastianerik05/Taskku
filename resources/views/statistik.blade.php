<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskKu - Statistik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            color: #e5e7eb;
            background: #071225;
            overflow-x: hidden;
            isolation: isolate;
        }

        /* WALLPAPER ANIMASI */
        .wallpaper {
            position: fixed;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: -1;
            background:
                radial-gradient(circle at 80% 10%, rgba(37,99,235,.12), transparent 30%),
                linear-gradient(135deg, #071225, #0c1830 50%, #101d37);
        }

        .glow {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            filter: blur(110px);
            opacity: .25;
        }

        .glow-one {
            background: #2563eb;
            top: -180px;
            right: -100px;
            animation: glowOne 14s ease-in-out infinite alternate;
        }

        .glow-two {
            background: #b88635;
            bottom: -200px;
            left: 10%;
            animation: glowTwo 17s ease-in-out infinite alternate;
        }

        .glow-three {
            background: #4f46e5;
            top: 40%;
            left: 35%;
            width: 300px;
            height: 300px;
            opacity: .12;
            animation: glowThree 18s ease-in-out infinite alternate;
        }

        @keyframes glowOne {
            from { transform: translate(0, 0) scale(1); }
            to { transform: translate(-100px, 100px) scale(1.3); }
        }

        @keyframes glowTwo {
            from { transform: translate(0, 0) scale(1); }
            to { transform: translate(100px, -80px) scale(1.2); }
        }

        @keyframes glowThree {
            from { transform: translate(0, 0); }
            to { transform: translate(100px, -80px); }
        }

        .particles {
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(2px 2px at 20% 30%, rgba(255,255,255,.35) 50%, transparent 100%),
                radial-gradient(2px 2px at 70% 60%, rgba(214,168,75,.4) 50%, transparent 100%),
                radial-gradient(2px 2px at 40% 80%, rgba(255,255,255,.25) 50%, transparent 100%),
                radial-gradient(2px 2px at 90% 20%, rgba(214,168,75,.3) 50%, transparent 100%);
            background-size: 350px 350px;
            animation: particleMove 25s linear infinite;
        }

        @keyframes particleMove {
            from { transform: translateY(0); }
            to { transform: translateY(-350px); }
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            position: fixed;
            inset: 0 auto 0 0;
            padding: 28px 20px;
            color: white;
            background: linear-gradient(180deg, #071225, #101e39 75%, #172b4c);
            border-right: 1px solid rgba(255,255,255,.08);
            box-shadow: 8px 0 35px rgba(0,0,0,.25);
            z-index: 5;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px;
            margin-bottom: 45px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: linear-gradient(135deg, #d6a84b, #f5d98b);
            color: #101827;
            font-size: 23px;
            box-shadow: 0 0 25px rgba(214,168,75,.3);
        }

        .brand h4 {
            font-weight: 800;
            margin: 0;
        }

        .menu-label {
            color: #91a6cb;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin: 0 12px 13px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #cbd5e1;
            text-decoration: none;
            padding: 13px 15px;
            margin-bottom: 8px;
            border-radius: 12px;
            font-size: 14px;
            transition: .3s;
        }

        .sidebar a i {
            font-size: 18px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            color: #fff;
            background: linear-gradient(100deg, #b88635, #d6a84b);
            box-shadow: 0 7px 20px rgba(214,168,75,.2);
            transform: translateX(4px);
        }

        .sidebar-info {
            position: absolute;
            bottom: 25px;
            left: 20px;
            right: 20px;
            padding: 18px;
            border-radius: 16px;
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.1);
        }

        .sidebar-info i {
            color: #e6bd69;
            font-size: 25px;
        }

        .sidebar-info p {
            color: #cbd5e1;
            font-size: 12px;
            margin: 8px 0 0;
            line-height: 1.6;
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: 260px;
            padding: 30px 42px;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            animation: fadeDown .7s ease both;
        }

        .topbar h5 {
            font-weight: 800;
            margin: 0;
            color: #f8fafc;
        }

        .topbar small {
            color: #a5b4cf;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 11px;
            background: rgba(255,255,255,.07);
            padding: 9px 15px;
            border-radius: 30px;
            border: 1px solid rgba(255,255,255,.12);
            backdrop-filter: blur(15px);
            color: white;
        }

        .profile-icon {
            width: 35px;
            height: 35px;
            display: grid;
            place-items: center;
            color: #101827;
            border-radius: 50%;
            background: linear-gradient(135deg, #d6a84b, #f5d98b);
        }

        .profile small {
            color: #a5b4cf;
        }

        /* HEADING */
        .page-heading {
            animation: headingEnter .9s ease both;
        }

        .eyebrow {
            color: #e6bd69;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .page-heading h2 {
            font-size: 30px;
            font-weight: 800;
            margin: 8px 0;
            color: #f8fafc;
        }

        .page-heading p {
            color: #a5b4cf;
        }

        /* KARTU */
        .stat-card,
        .panel {
            background: rgba(15,29,53,.82);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,.10);
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 18px 50px rgba(0,0,0,.22);
            height: 100%;
            color: #f8fafc;
            transition: transform .35s ease, border-color .35s ease, box-shadow .35s ease;
            animation: cardEnter .8s ease both;
        }

        .stat-card:hover,
        .panel:hover {
            transform: translateY(-7px);
            border-color: rgba(214,168,75,.4);
            box-shadow: 0 25px 60px rgba(0,0,0,.32);
        }

        .stat-card:nth-child(1) { animation-delay: .1s; }
        .stat-card:nth-child(2) { animation-delay: .2s; }
        .stat-card:nth-child(3) { animation-delay: .3s; }

        @keyframes cardEnter {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            font-size: 22px;
            margin-bottom: 18px;
        }

        .blue {
            color: #93c5fd;
            background: rgba(37,99,235,.2);
        }

        .green {
            color: #6ee7b7;
            background: rgba(16,185,129,.16);
        }

        .orange {
            color: #fcd34d;
            background: rgba(245,158,11,.16);
        }

        .stat-card h3 {
            font-size: 32px;
            font-weight: 800;
            margin: 0 0 5px;
            color: #fff;
        }

        .stat-card p {
            color: #a5b4cf;
            font-size: 13px;
            margin: 0;
        }

        .panel h5 {
            font-weight: 800;
            margin-bottom: 23px;
            color: #f8fafc;
        }

        /* PROGRESS */
        .progress {
            height: 13px;
            background: rgba(255,255,255,.10);
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-bar {
            background: linear-gradient(90deg, #2563eb, #d6a84b);
            border-radius: 20px;
            transform-origin: left;
            animation: progressEnter 1.5s ease both;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 12px;
            font-size: 13px;
        }

        .progress-info span {
            color: #a5b4cf;
        }

        .progress-info strong {
            color: #f8fafc;
        }

        .chart-row {
            margin-bottom: 22px;
        }

        .chart-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
            color: #cbd5e1;
        }

        .chart-label span:last-child {
            color: #fff;
        }

        .chart-track {
            height: 13px;
            background: rgba(255,255,255,.10);
            border-radius: 20px;
            overflow: hidden;
        }

        .chart-fill {
            height: 100%;
            border-radius: 20px;
            transform-origin: left;
            animation: progressEnter 1.5s ease both;
        }

        .chart-fill.done {
            background: linear-gradient(90deg, #059669, #6ee7b7);
        }

        .chart-fill.pending {
            background: linear-gradient(90deg, #d97706, #fbbf24);
        }

        @keyframes progressEnter {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        }

        /* ACHIEVEMENT */
        .achievement {
            display: flex;
            gap: 14px;
            align-items: center;
            padding: 17px;
            border-radius: 15px;
            background: linear-gradient(110deg, rgba(37,99,235,.17), rgba(214,168,75,.10));
            border: 1px solid rgba(255,255,255,.08);
            margin-top: 22px;
        }

        .achievement i {
            font-size: 30px;
            color: #e6bd69;
        }

        .achievement strong {
            font-size: 14px;
            color: #fff;
        }

        .achievement p {
            margin: 4px 0 0;
            color: #a5b4cf;
            font-size: 12px;
        }

        hr {
            border-color: rgba(255,255,255,.15);
        }

        .footer {
            text-align: center;
            color: #8293b1;
            font-size: 12px;
            margin-top: 28px;
        }

        @keyframes headingEnter {
            from {
                opacity: 0;
                transform: translateX(-25px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .sidebar {
                width: 75px;
                padding: 25px 10px;
            }

            .brand {
                justify-content: center;
                padding: 0;
            }

            .brand h4,
            .menu-label,
            .sidebar a span,
            .sidebar-info {
                display: none;
            }

            .sidebar a {
                justify-content: center;
                padding: 14px 8px;
            }

            .main-content {
                margin-left: 75px;
                padding: 25px;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 20px 12px;
            }

            .topbar small {
                display: none;
            }

            .page-heading h2 {
                font-size: 24px;
            }

            .stat-card,
            .panel {
                padding: 18px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

<!-- ANIMATED WALLPAPER -->
<div class="wallpaper">
    <div class="glow glow-one"></div>
    <div class="glow glow-two"></div>
    <div class="glow glow-three"></div>
    <div class="particles"></div>
</div>

<!-- SIDEBAR -->
<aside class="sidebar">

    <div class="brand">
        <div class="brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>
        <h4>TaskKu</h4>
    </div>

    <p class="menu-label">MENU UTAMA</p>

    <a href="{{ route('dashboard') }}">
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>

    <a href="{{ route('tugas.create') }}">
        <i class="bi bi-plus-circle-fill"></i>
        <span>Tambah Tugas</span>
    </a>

    <a href="{{ route('tugas.index') }}">
        <i class="bi bi-list-check"></i>
        <span>Daftar Tugas</span>
    </a>

    <a href="{{ route('kalender') }}">
        <i class="bi bi-calendar-week"></i>
        <span>Kalender</span>
    </a>

    <a href="{{ route('statistik') }}" class="active">
        <i class="bi bi-bar-chart-fill"></i>
        <span>Statistik</span>
    </a>

    <p class="menu-label mt-4">LAINNYA</p>

    <a href="{{ route('dashboard') }}#panduan">
        <i class="bi bi-question-circle-fill"></i>
        <span>Panduan Penggunaan</span>
    </a>

    <div class="sidebar-info">
        <i class="bi bi-mortarboard-fill"></i>
        <p>
            <strong>Terus berkembang!</strong><br>
            Pantau progres tugas dan capai target belajarmu.
        </p>
    </div>

</aside>

<!-- MAIN CONTENT -->
<main class="main-content">

    <div class="topbar">
        <div>
            <h5>TaskKu Workspace</h5>
            <small>Student Productivity Area</small>
        </div>

        <div class="profile">
            <div class="profile-icon">
                <i class="bi bi-person-fill"></i>
            </div>
            <div>
                <strong style="font-size:13px;">Mahasiswa</strong><br>
                <small>Student Account</small>
            </div>
        </div>
    </div>

    <!-- HEADING -->
    <div class="page-heading mb-4">
        <div class="eyebrow">Performance Overview</div>
        <h2>
            Statistik Tugas
            <i class="bi bi-graph-up-arrow" style="color:#d6a84b;"></i>
        </h2>
        <p>
            Lihat perkembangan dan pencapaian tugas kuliahmu secara keseluruhan.
        </p>
    </div>

    <!-- STATISTIK -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="bi bi-journal-text"></i>
                </div>
                <h3>{{ $totalTugas }}</h3>
                <p>Total Seluruh Tugas</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="bi bi-check-circle"></i>
                </div>
                <h3>{{ $sudahSelesai }}</h3>
                <p>Tugas Sudah Selesai</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon orange">
                    <i class="bi bi-hourglass-split"></i>
                </div>
                <h3>{{ $belumSelesai }}</h3>
                <p>Tugas Belum Selesai</p>
            </div>
        </div>

    </div>

    <!-- PROGRESS DAN RINGKASAN -->
    <div class="row g-4">

        <div class="col-lg-7">
            <section class="panel">

                <h5>
                    <i class="bi bi-pie-chart-fill me-2" style="color:#d6a84b;"></i>
                    Progres Penyelesaian
                </h5>

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div>
                        <div class="text-secondary small" style="color:#a5b4cf !important;">
                            Persentase tugas selesai
                        </div>
                        <div class="fw-bold fs-2">
                            {{ $persentase }}%
                        </div>
                    </div>

                    <div class="stat-icon green mb-0">
                        <i class="bi bi-trophy-fill"></i>
                    </div>

                </div>

                <div class="progress">
                    <div class="progress-bar"
                         role="progressbar"
                         style="width: {{ $persentase }}%;"
                         aria-valuenow="{{ $persentase }}"
                         aria-valuemin="0"
                         aria-valuemax="100">
                    </div>
                </div>

                <div class="progress-info">
                    <span>{{ $sudahSelesai }} tugas selesai</span>
                    <strong>{{ $persentase }}%</strong>
                </div>

                <div class="achievement">
                    <i class="bi bi-mortarboard-fill"></i>

                    <div>
                        <strong>
                            @if($totalTugas == 0)
                                Mulai Perjalananmu!
                            @elseif($persentase == 100)
                                Luar Biasa! Semua Tugas Selesai
                            @elseif($persentase >= 70)
                                Kerja Bagus! Terus Pertahankan
                            @elseif($persentase >= 40)
                                Progresmu Semakin Baik
                            @else
                                Tetap Semangat Menyelesaikan Tugas
                            @endif
                        </strong>

                        <p>
                            Setiap tugas yang selesai adalah satu langkah menuju keberhasilan.
                        </p>
                    </div>
                </div>

            </section>
        </div>

        <div class="col-lg-5">
            <section class="panel">

                <h5>
                    <i class="bi bi-bar-chart-fill me-2" style="color:#d6a84b;"></i>
                    Ringkasan Tugas
                </h5>

                <div class="chart-row">

                    <div class="chart-label">
                        <span>Tugas Selesai</span>
                        <span>{{ $sudahSelesai }}</span>
                    </div>

                    <div class="chart-track">
                        <div class="chart-fill done"
                             style="width: {{ $totalTugas > 0 ? ($sudahSelesai / $totalTugas) * 100 : 0 }}%;">
                        </div>
                    </div>

                </div>

                <div class="chart-row">

                    <div class="chart-label">
                        <span>Belum Selesai</span>
                        <span>{{ $belumSelesai }}</span>
                    </div>

                    <div class="chart-track">
                        <div class="chart-fill pending"
                             style="width: {{ $totalTugas > 0 ? ($belumSelesai / $totalTugas) * 100 : 0 }}%;">
                        </div>
                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between mb-3">
                    <span class="small" style="color:#a5b4cf;">
                        Total tugas tercatat
                    </span>
                    <strong>{{ $totalTugas }}</strong>
                </div>

                <div class="d-flex justify-content-between">
                    <span class="small" style="color:#a5b4cf;">
                        Tingkat penyelesaian
                    </span>
                    <strong style="color:#e6bd69;">
                        {{ $persentase }}%
                    </strong>
                </div>

            </section>
        </div>

    </div>

    <div class="footer">
        © {{ date('Y') }} TaskKu — Organize Your Tasks, Achieve Your Goals.
    </div>

</main>

</body>
</html>
