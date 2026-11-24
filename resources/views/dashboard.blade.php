<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskKu - Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --navy: #071426;
            --navy-light: #102744;
            --gold: #e8c477;
            --blue: #3289e8;
            --text: #eaf1fc;
            --muted: #9aabc1;
            --glass: rgba(16, 35, 60, .78);
            --border: rgba(255,255,255,.09);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--navy);
            color: var(--text);
            font-family: 'Segoe UI', Arial, sans-serif;
            overflow-x: hidden;
        }

        /* ANIMATED WALLPAPER */

        .wallpaper {
            position: fixed;
            inset: 0;
            z-index: -5;
            overflow: hidden;
            background:
                linear-gradient(135deg, #061323, #0b1d35, #071426);
        }

        .glow {
            position: absolute;
            width: 550px;
            height: 550px;
            border-radius: 50%;
            filter: blur(110px);
            opacity: .25;
            animation: glowMove 16s ease-in-out infinite alternate;
        }

        .glow-one {
            background: #1478dc;
            top: -220px;
            left: -150px;
        }

        .glow-two {
            background: #c99b45;
            right: -200px;
            bottom: -220px;
            animation-delay: 3s;
        }

        .glow-three {
            background: #164b8c;
            left: 40%;
            bottom: 15%;
            animation-delay: 5s;
        }

        @keyframes glowMove {
            from {
                transform: translate(0, 0) scale(1);
            }
            to {
                transform: translate(100px, 80px) scale(1.3);
            }
        }

        .particles {
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(2px 2px at 20% 30%, rgba(255,255,255,.7) 50%, transparent 100%),
                radial-gradient(2px 2px at 70% 20%, rgba(232,196,119,.8) 50%, transparent 100%),
                radial-gradient(1px 1px at 40% 80%, rgba(255,255,255,.6) 50%, transparent 100%),
                radial-gradient(2px 2px at 85% 65%, rgba(255,255,255,.5) 50%, transparent 100%);
            background-size: 300px 300px;
            animation: particleMove 35s linear infinite;
            opacity: .4;
        }

        @keyframes particleMove {
            from {
                background-position: 0 0;
            }
            to {
                background-position: 300px -300px;
            }
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 255px;
            height: 100vh;
            padding: 27px 18px;
            background: rgba(5, 17, 33, .92);
            border-right: 1px solid var(--border);
            backdrop-filter: blur(20px);
            z-index: 100;
            display: flex;
            flex-direction: column;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 10px 35px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #e8c477, #bd8d3d);
            color: #10213a;
            font-size: 23px;
            box-shadow: 0 0 22px rgba(232,196,119,.2);
        }

        .brand h4 {
            color: white;
            font-weight: 800;
            letter-spacing: 1px;
            margin: 0;
        }

        .brand small {
            color: var(--gold);
            font-size: 10px;
            letter-spacing: 2px;
        }

        .menu-label {
            color: #71839a;
            font-size: 10px;
            letter-spacing: 2px;
            font-weight: 700;
            padding: 0 12px;
            margin: 8px 0 12px;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 15px;
            margin-bottom: 7px;
            color: #aabbd0;
            text-decoration: none;
            border-radius: 12px;
            transition: .3s;
            font-size: 14px;
        }

        .nav-link-custom i {
            font-size: 18px;
        }

        .nav-link-custom:hover,
        .nav-link-custom.active {
            color: white;
            background: linear-gradient(100deg, rgba(44,130,220,.28), rgba(232,196,119,.08));
            border: 1px solid rgba(90,155,225,.15);
            transform: translateX(4px);
        }

        .nav-link-custom.active i {
            color: var(--gold);
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 17px 13px;
            background: rgba(255,255,255,.04);
            border: 1px solid var(--border);
            border-radius: 13px;
        }

        .sidebar-bottom p {
            font-size: 12px;
            color: var(--muted);
            margin: 5px 0 0;
        }

        /* MAIN CONTENT */

        .main-content {
            width: calc(100% - 255px);
            min-height: 100vh;
            margin-left: 255px;
            padding: 30px 38px 40px;
            position: relative;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
            animation: fadeUp .7s ease both;
        }

        .page-header h1 {
            font-size: 27px;
            font-weight: 750;
            color: white;
            margin-bottom: 5px;
        }

        .page-header p {
            font-size: 13px;
            color: var(--muted);
            margin: 0;
        }

        .date-pill {
            border: 1px solid var(--border);
            border-radius: 30px;
            background: rgba(255,255,255,.05);
            padding: 10px 16px;
            color: #dce7f5;
            font-size: 12px;
            white-space: nowrap;
        }

        /* HERO */

        .hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(232,196,119,.22);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            background:
                linear-gradient(110deg, rgba(18,54,91,.93), rgba(12,31,55,.85));
            box-shadow: 0 15px 40px rgba(0,0,0,.15);
            animation: fadeUp .8s ease both;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            border: 1px solid rgba(232,196,119,.15);
            border-radius: 50%;
            right: -55px;
            top: -120px;
            box-shadow:
                0 0 0 25px rgba(232,196,119,.025),
                0 0 0 55px rgba(232,196,119,.02);
        }

        .hero h2 {
            color: white;
            font-size: 26px;
            font-weight: 750;
            margin-bottom: 10px;
        }

        .hero p {
            color: #bdcde0;
            font-size: 14px;
            max-width: 600px;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .gold-text {
            color: var(--gold);
        }

        .btn-gold {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            border-radius: 10px;
            padding: 11px 19px;
            color: #15233a;
            background: linear-gradient(135deg, #f0d38e, #c99b45);
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition: .3s;
        }

        .btn-gold:hover {
            transform: translateY(-3px);
            color: #15233a;
            box-shadow: 0 8px 25px rgba(232,196,119,.25);
        }

        /* STATISTICS */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 17px;
            margin-bottom: 23px;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            padding: 21px;
            min-height: 135px;
            border-radius: 17px;
            background: var(--glass);
            border: 1px solid var(--border);
            backdrop-filter: blur(14px);
            transition: .3s;
            animation: fadeUp .8s ease both;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(232,196,119,.35);
            box-shadow: 0 12px 30px rgba(0,0,0,.2);
        }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 90px;
            height: 90px;
            right: -30px;
            bottom: -40px;
            background: var(--accent);
            filter: blur(35px);
            opacity: .2;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
            background: color-mix(in srgb, var(--accent) 14%, transparent);
            font-size: 19px;
        }

        .stat-label {
            color: var(--muted);
            font-size: 12px;
        }

        .stat-number {
            color: white;
            font-size: 29px;
            font-weight: 800;
        }

        /* GLASS PANELS */

        .panel {
            padding: 22px;
            border-radius: 17px;
            background: var(--glass);
            border: 1px solid var(--border);
            backdrop-filter: blur(14px);
            box-shadow: 0 8px 28px rgba(0,0,0,.12);
            margin-bottom: 22px;
        }

        .panel-title {
            color: white;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .panel-subtitle {
            color: var(--muted);
            font-size: 12px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        /* PROGRESS */

        .progress {
            height: 10px;
            border-radius: 20px;
            background: rgba(255,255,255,.1);
        }

        .progress-bar {
            border-radius: 20px;
            background: linear-gradient(90deg, #287ed4, #e8c477);
        }

        .progress-number {
            font-size: 25px;
            font-weight: 800;
            color: var(--gold);
        }

        /* AGENDA */

        .agenda-item {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 0;
            border-bottom: 1px solid var(--border);
        }

        .agenda-item:last-child {
            border-bottom: none;
        }

        .agenda-icon {
            width: 39px;
            height: 39px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 11px;
            color: var(--gold);
            background: rgba(232,196,119,.1);
        }

        .agenda-info {
            flex: 1;
            min-width: 0;
        }

        .agenda-info strong {
            color: #edf4ff;
            display: block;
            font-size: 13px;
        }

        .agenda-info small {
            color: var(--muted);
            font-size: 11px;
        }

        /* TABLE */

        .table {
            color: #eaf1fc;
            margin-bottom: 0;
            --bs-table-bg: transparent;
            --bs-table-color: #eaf1fc;
            --bs-table-border-color: rgba(255,255,255,.09);
            --bs-table-hover-bg: rgba(255,255,255,.045);
            --bs-table-hover-color: white;
        }

        .table thead th {
            color: #a9bdd5;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .5px;
            padding: 13px 10px;
            border-bottom: 1px solid rgba(232,196,119,.2);
            white-space: nowrap;
        }

        .table tbody td {
            padding: 14px 10px;
            font-size: 12px;
            vertical-align: middle;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .task-title {
            color: white;
            font-weight: 650;
        }

        .task-subtitle {
            color: var(--muted);
            font-size: 11px;
            margin-top: 4px;
        }

        /* BADGES */

        .status-badge,
        .priority-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-done {
            color: #7ce0b2;
            background: rgba(45,190,125,.13);
        }

        .status-pending {
            color: #f0cf83;
            background: rgba(232,196,119,.13);
        }

        .priority-high {
            color: #ff9292;
            background: rgba(255,90,90,.13);
        }

        .priority-medium {
            color: #f0cf83;
            background: rgba(232,196,119,.13);
        }

        .priority-low {
            color: #83c5ff;
            background: rgba(65,155,235,.13);
        }

        .due-label {
            color: #ffaaaa;
            font-size: 11px;
        }

        /* BUTTONS */

        .btn-action {
            width: 30px;
            height: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            border-radius: 8px;
            color: #cbd8e9;
            background: rgba(255,255,255,.04);
            text-decoration: none;
            transition: .2s;
        }

        .btn-action:hover {
            color: var(--gold);
            border-color: var(--gold);
        }

        .btn-delete {
            border: none;
            background: transparent;
            color: #ff9292;
            padding: 5px;
        }

        .btn-delete:hover {
            color: #ff5555;
        }

        /* FILTER */

        .form-control,
        .form-select {
            color: white;
            background-color: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 9px;
            font-size: 12px;
            min-height: 40px;
        }

        .form-control:focus,
        .form-select:focus {
            color: white;
            background-color: rgba(255,255,255,.09);
            border-color: var(--gold);
            box-shadow: 0 0 0 .2rem rgba(232,196,119,.1);
        }

        .form-control::placeholder {
            color: #8194ac;
        }

        .form-select option {
            background: #102744;
            color: white;
        }

        .filter-label {
            color: #aebed2;
            font-size: 11px;
            margin-bottom: 7px;
        }

        .btn-outline-light-custom {
            color: #dce7f5;
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 9px;
            padding: 9px 14px;
            text-decoration: none;
            font-size: 12px;
        }

        .btn-outline-light-custom:hover {
            color: var(--gold);
            border-color: var(--gold);
        }

        /* GUIDE */

        .guide-card {
            height: 100%;
            padding: 18px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: rgba(255,255,255,.035);
        }

        .guide-card i {
            font-size: 23px;
            color: var(--gold);
        }

        .guide-card h6 {
            color: white;
            margin-top: 13px;
            font-weight: 700;
            font-size: 13px;
        }

        .guide-card p {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
            margin: 0;
        }

        .footer {
            text-align: center;
            padding: 20px 0 5px;
            color: #71839a;
            font-size: 11px;
            letter-spacing: .5px;
        }

        .empty-state {
            color: var(--muted);
            padding: 25px;
            text-align: center;
            font-size: 12px;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* RESPONSIVE */

        @media (max-width: 1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .main-content {
                padding: 25px 22px;
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 75px;
                padding: 20px 10px;
            }

            .brand {
                justify-content: center;
                padding: 5px 0 30px;
            }

            .brand-text,
            .menu-label,
            .nav-link-custom span,
            .sidebar-bottom {
                display: none;
            }

            .nav-link-custom {
                justify-content: center;
                padding: 14px 5px;
            }

            .nav-link-custom i {
                font-size: 20px;
            }

            .main-content {
                width: calc(100% - 75px);
                margin-left: 75px;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 20px 13px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .hero {
                padding: 23px 19px;
            }

            .hero h2 {
                font-size: 21px;
            }

            .stats-grid {
                gap: 10px;
            }

            .stat-card {
                padding: 15px;
                min-height: 120px;
            }

            .stat-number {
                font-size: 24px;
            }

            .panel {
                padding: 16px;
            }

            .table-responsive {
                overflow-x: auto;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
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
                <i class="bi bi-journal-check"></i>
            </div>

            <div class="brand-text">
                <h4>TaskKu</h4>
                <small>STUDENT PLANNER</small>
            </div>
        </div>

        <div class="menu-label">MENU UTAMA</div>

        <a href="{{ route('dashboard') }}"
           class="nav-link-custom active">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('tugas.create') }}"
           class="nav-link-custom">
            <i class="bi bi-plus-circle"></i>
            <span>Tambah Tugas</span>
        </a>

        <a href="{{ route('kalender') }}"
           class="nav-link-custom">
            <i class="bi bi-calendar3"></i>
            <span>Kalender</span>
        </a>

        <a href="{{ route('statistik') }}"
           class="nav-link-custom">
            <i class="bi bi-bar-chart-line"></i>
            <span>Statistik</span>
        </a>

        <div class="menu-label mt-4">LAINNYA</div>

        <a href="#panduan" class="nav-link-custom">
            <i class="bi bi-info-circle"></i>
            <span>Panduan</span>
        </a>

        <div class="sidebar-bottom">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-stars gold-text"></i>
                <strong style="font-size:12px;color:white;">Stay Productive!</strong>
            </div>
            <p>Atur tugasmu, raih tujuanmu.</p>
        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <!-- HEADER -->
        <div class="page-header">
            <div>
                <h1>Dashboard</h1>
                <p>Selamat datang kembali! Mari selesaikan tugasmu hari ini.</p>
            </div>

            <div class="date-pill">
                <i class="bi bi-calendar-event gold-text me-2"></i>
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>

        <!-- HERO -->
        <section class="hero">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="gold-text small fw-bold mb-2">
                        <i class="bi bi-stars me-1"></i>
                        YOUR PERSONAL STUDY PLANNER
                    </div>

                    <h2>
                        Kelola Tugasmu, <span class="gold-text">Raih Kesuksesan.</span>
                    </h2>

                    <p>
                        Semua tugas perkuliahan dalam satu tempat.
                        Atur jadwal, pantau tenggat waktu, dan selesaikan
                        pekerjaanmu dengan lebih terorganisir.
                    </p>

                    <a href="{{ route('tugas.create') }}" class="btn-gold">
                        <i class="bi bi-plus-lg"></i>
                        Tambah Tugas Baru
                    </a>
                </div>

                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                    <i class="bi bi-journal-bookmark-fill"
                       style="font-size:100px;color:rgba(232,196,119,.35);"></i>
                </div>
            </div>
        </section>

        <!-- STATISTICS -->
        <div class="stats-grid">

            <div class="stat-card" style="--accent:#55aaff;">
                <div class="stat-top">
                    <span class="stat-label">Total Tugas</span>
                    <div class="stat-icon">
                        <i class="bi bi-journal-text"></i>
                    </div>
                </div>
                <div class="stat-number">{{ $totalTugas }}</div>
            </div>

            <div class="stat-card" style="--accent:#e8c477;">
                <div class="stat-top">
                    <span class="stat-label">Belum Selesai</span>
                    <div class="stat-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                </div>
                <div class="stat-number">{{ $belumSelesai }}</div>
            </div>

            <div class="stat-card" style="--accent:#51d6a0;">
                <div class="stat-top">
                    <span class="stat-label">Sudah Selesai</span>
                    <div class="stat-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>
                </div>
                <div class="stat-number">{{ $sudahSelesai }}</div>
            </div>

            <div class="stat-card" style="--accent:#ff8585;">
                <div class="stat-top">
                    <span class="stat-label">Tugas Terlambat</span>
                    <div class="stat-icon">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>
                </div>
                <div class="stat-number">{{ $terlambat }}</div>
            </div>

        </div>

        <!-- PROGRESS -->
        <section class="panel">
            <div class="section-heading">
                <div>
                    <div class="panel-title">Progress Penyelesaian Tugas</div>
                    <div class="panel-subtitle">Pantau perkembangan tugas perkuliahanmu.</div>
                </div>

                <div class="progress-number">
                    {{ $persentase }}%
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

            <div class="d-flex justify-content-between mt-3">
                <small class="text-secondary">
                    {{ $sudahSelesai }} tugas selesai
                </small>
                <small class="text-secondary">
                    {{ $totalTugas }} total tugas
                </small>
            </div>
        </section>

        <!-- AGENDA DAN TUGAS TERDEKAT -->
        <div class="row">

            <!-- AGENDA HARI INI -->
            <div class="col-lg-5">
                <section class="panel h-100">
                    <div class="section-heading">
                        <div>
                            <div class="panel-title">Agenda Hari Ini</div>
                            <div class="panel-subtitle">Tugas dengan tenggat hari ini.</div>
                        </div>
                        <i class="bi bi-calendar-check gold-text fs-4"></i>
                    </div>

                    @php
                        $agendaHariIni = $tugas->filter(function ($item) {
                            return \Carbon\Carbon::parse($item->tenggat)->isToday();
                        });
                    @endphp

                    @forelse($agendaHariIni as $item)
                        <div class="agenda-item">
                            <div class="agenda-icon">
                                <i class="bi bi-journal-check"></i>
                            </div>

                            <div class="agenda-info">
                                <strong>{{ $item->judul }}</strong>
                                <small>{{ $item->mata_kuliah }}</small>
                            </div>

                            @if($item->status == 'Sudah Selesai')
                                <span class="status-badge status-done">Selesai</span>
                            @else
                                <span class="status-badge status-pending">Belum Selesai</span>
                            @endif
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="bi bi-calendar2-check fs-2 d-block mb-2"></i>
                            Tidak ada tugas dengan tenggat hari ini.
                        </div>
                    @endforelse
                </section>
            </div>

            <!-- TUGAS TERDEKAT -->
            <div class="col-lg-7">
                <section class="panel h-100">
                    <div class="section-heading">
                        <div>
                            <div class="panel-title">Tugas Terdekat</div>
                            <div class="panel-subtitle">Prioritaskan tugas yang segera dikumpulkan.</div>
                        </div>
                        <i class="bi bi-alarm gold-text fs-4"></i>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>TUGAS</th>
                                    <th>TENGGAT</th>
                                    <th>PRIORITAS</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($tugasTerdekat as $item)
                                    <tr>
                                        <td>
                                            <div class="task-title">{{ $item->judul }}</div>
                                            <div class="task-subtitle">{{ $item->mata_kuliah }}</div>
                                        </td>

                                        <td>
                                            <span class="text-light">
                                                {{ \Carbon\Carbon::parse($item->tenggat)->translatedFormat('d M Y') }}
                                            </span>

                                            @if(\Carbon\Carbon::parse($item->tenggat)->isToday())
                                                <div class="due-label">Hari ini</div>
                                            @elseif(\Carbon\Carbon::parse($item->tenggat)->isTomorrow())
                                                <div class="due-label">Besok</div>
                                            @endif
                                        </td>

                                        <td>
                                            @if($item->prioritas == 'Tinggi')
                                                <span class="priority-badge priority-high">Tinggi</span>
                                            @elseif($item->prioritas == 'Rendah')
                                                <span class="priority-badge priority-low">Rendah</span>
                                            @else
                                                <span class="priority-badge priority-medium">Sedang</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="empty-state">
                                            Belum ada tugas terdekat.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>

        </div>

        <!-- FILTER DAN DAFTAR TUGAS -->
        <section class="panel">

            <div class="section-heading">
                <div>
                    <div class="panel-title">Semua Daftar Tugas</div>
                    <div class="panel-subtitle">Cari, filter, dan kelola seluruh tugasmu.</div>
                </div>

                <a href="{{ route('tugas.create') }}" class="btn-gold">
                    <i class="bi bi-plus-lg"></i>
                    Tambah
                </a>
            </div>

            <!-- FILTER -->
            <form action="{{ route('tugas.index') }}" method="GET" class="mb-4">
                <div class="row g-3 align-items-end">

                    <div class="col-lg-5">
                        <label class="filter-label">Cari tugas atau mata kuliah</label>
                        <input
                            type="text"
                            name="cari"
                            class="form-control"
                            placeholder="Masukkan judul atau mata kuliah..."
                            value="{{ request('cari') }}">
                    </div>

                    <div class="col-lg-2">
                        <label class="filter-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="Belum Selesai" {{ request('status') == 'Belum Selesai' ? 'selected' : '' }}>
                                Belum Selesai
                            </option>
                            <option value="Sudah Selesai" {{ request('status') == 'Sudah Selesai' ? 'selected' : '' }}>
                                Sudah Selesai
                            </option>
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <label class="filter-label">Prioritas</label>
                        <select name="prioritas" class="form-select">
                            <option value="">Semua Prioritas</option>
                            <option value="Tinggi" {{ request('prioritas') == 'Tinggi' ? 'selected' : '' }}>
                                Tinggi
                            </option>
                            <option value="Sedang" {{ request('prioritas') == 'Sedang' ? 'selected' : '' }}>
                                Sedang
                            </option>
                            <option value="Rendah" {{ request('prioritas') == 'Rendah' ? 'selected' : '' }}>
                                Rendah
                            </option>
                        </select>
                    </div>

                    <div class="col-lg-3 d-flex gap-2">
                        <button type="submit" class="btn-gold flex-grow-1 justify-content-center">
                            <i class="bi bi-search"></i>
                            Cari
                        </button>

                        <a href="{{ route('tugas.index') }}" class="btn-outline-light-custom d-flex align-items-center">
                            Reset
                        </a>
                    </div>

                </div>
            </form>

            <!-- TABEL TUGAS -->
            <div class="table-responsive">
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>JUDUL TUGAS</th>
                            <th>MATA KULIAH</th>
                            <th>TENGGAT</th>
                            <th>PRIORITAS</th>
                            <th>STATUS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($daftarTugas as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>
                                    <div class="task-title">{{ $item->judul }}</div>
                                    @if($item->deskripsi)
                                        <div class="task-subtitle">
                                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 45) }}
                                        </div>
                                    @endif
                                </td>

                                <td>{{ $item->mata_kuliah }}</td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->tenggat)->translatedFormat('d M Y') }}

                                    @if($item->status != 'Sudah Selesai' && \Carbon\Carbon::parse($item->tenggat)->isPast() && !\Carbon\Carbon::parse($item->tenggat)->isToday())
                                        <div class="due-label">Terlambat</div>
                                    @elseif(\Carbon\Carbon::parse($item->tenggat)->isToday())
                                        <div class="due-label">Hari ini</div>
                                    @endif
                                </td>

                                <td>
                                    @if($item->prioritas == 'Tinggi')
                                        <span class="priority-badge priority-high">Tinggi</span>
                                    @elseif($item->prioritas == 'Rendah')
                                        <span class="priority-badge priority-low">Rendah</span>
                                    @else
                                        <span class="priority-badge priority-medium">Sedang</span>
                                    @endif
                                </td>

                                <td>
                                    @if($item->status == 'Sudah Selesai')
                                        <span class="status-badge status-done">
                                            <i class="bi bi-check-circle me-1"></i>Selesai
                                        </span>
                                    @else
                                        <span class="status-badge status-pending">
                                            <i class="bi bi-clock me-1"></i>Belum Selesai
                                        </span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('tugas.edit', $item->id) }}"
                                           class="btn-action"
                                           title="Edit tugas">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('tugas.destroy', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn-action btn-delete"
                                                    title="Hapus tugas">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="empty-state">
                                    <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                    Belum ada tugas yang ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </section>

        <!-- PANDUAN -->
        <section class="panel" id="panduan">

            <div class="section-heading">
                <div>
                    <div class="panel-title">Panduan Penggunaan TaskKu</div>
                    <div class="panel-subtitle">Mulai kelola tugasmu dengan lebih mudah.</div>
                </div>

                <i class="bi bi-lightbulb gold-text fs-4"></i>
            </div>

            <div class="row g-3">

                <div class="col-md-4">
                    <div class="guide-card">
                        <i class="bi bi-plus-circle"></i>
                        <h6>Tambah Tugas</h6>
                        <p>Masukkan judul, mata kuliah, deskripsi, tenggat, dan prioritas tugas.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="guide-card">
                        <i class="bi bi-calendar-week"></i>
                        <h6>Atur Jadwal</h6>
                        <p>Gunakan kalender untuk melihat jadwal dan tenggat tugasmu.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="guide-card">
                        <i class="bi bi-graph-up-arrow"></i>
                        <h6>Pantau Progress</h6>
                        <p>Lihat statistik tugas dan pantau perkembangan penyelesaiannya.</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- FOOTER -->
        <footer class="footer">
            © {{ date('Y') }} TASKKU — YOUR STUDY, YOUR PROGRESS
        </footer>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
