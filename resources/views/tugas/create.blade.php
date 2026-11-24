<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskKu - Tambah Tugas</title>

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
            width: 550px;
            height: 550px;
            border-radius: 50%;
            filter: blur(110px);
            opacity: .25;
        }

        .glow-one {
            background: #2563eb;
            top: -200px;
            right: -150px;
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
            left: 30%;
            width: 300px;
            height: 300px;
            opacity: .12;
            animation: glowThree 18s ease-in-out infinite alternate;
        }

        @keyframes glowOne {
            from { transform: translate(0,0) scale(1); }
            to { transform: translate(-100px,100px) scale(1.3); }
        }

        @keyframes glowTwo {
            from { transform: translate(0,0) scale(1); }
            to { transform: translate(100px,-80px) scale(1.2); }
        }

        @keyframes glowThree {
            from { transform: translate(0,0); }
            to { transform: translate(100px,-80px); }
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
            left: 0;
            top: 0;
            padding: 28px 20px;
            color: white;
            background: linear-gradient(180deg, #071225, #101e39 75%, #172b4c);
            border-right: 1px solid rgba(255,255,255,.08);
            box-shadow: 8px 0 35px rgba(0,0,0,.25);
            z-index: 10;
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
            letter-spacing: .5px;
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
            transition: .3s;
            font-size: 14px;
        }

        .sidebar a i {
            font-size: 18px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            color: white;
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
            color: #f8fafc;
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
            margin-bottom: 25px;
            animation: headingEnter .9s ease both;
        }

        .page-heading .eyebrow {
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
            margin: 0;
        }

        /* FORM CARD */
        .form-card {
            max-width: 1050px;
            background: rgba(15,29,53,.86);
            backdrop-filter: blur(22px);
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 22px;
            padding: 32px;
            box-shadow: 0 25px 65px rgba(0,0,0,.28);
            animation: formEnter .9s ease both;
            transition: border-color .3s ease, box-shadow .3s ease;
        }

        .form-card:hover {
            border-color: rgba(214,168,75,.3);
            box-shadow: 0 28px 70px rgba(0,0,0,.35);
        }

        @keyframes formEnter {
            from {
                opacity: 0;
                transform: translateY(35px) scale(.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .form-header {
            display: flex;
            align-items: center;
            gap: 15px;
            padding-bottom: 22px;
            margin-bottom: 27px;
            border-bottom: 1px solid rgba(255,255,255,.12);
        }

        .form-header-icon {
            width: 52px;
            height: 52px;
            display: grid;
            place-items: center;
            border-radius: 16px;
            color: #101827;
            font-size: 24px;
            background: linear-gradient(135deg, #d6a84b, #f5d98b);
            box-shadow: 0 8px 25px rgba(214,168,75,.2);
            animation: iconFloat 3s ease-in-out infinite;
        }

        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }

        .form-header h5 {
            font-weight: 800;
            margin: 0 0 4px;
            color: #f8fafc;
        }

        .form-header p {
            color: #a5b4cf;
            font-size: 13px;
            margin: 0;
        }

        /* INPUT */
        .form-label {
            font-size: 13px;
            font-weight: 700;
            color: #dbeafe;
            margin-bottom: 9px;
        }

        .form-control,
        .form-select {
            min-height: 48px;
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 11px;
            padding: 12px 15px;
            background-color: rgba(255,255,255,.06);
            color: #f8fafc;
            font-size: 14px;
            transition: all .3s ease;
        }

        .form-control::placeholder {
            color: #8293b1;
        }

        textarea.form-control {
            min-height: 125px;
            resize: vertical;
        }

        .form-control:focus,
        .form-select:focus {
            color: white;
            background-color: rgba(255,255,255,.10);
            border-color: #d6a84b;
            box-shadow: 0 0 0 4px rgba(214,168,75,.12);
            transform: translateY(-2px);
        }

        .form-select option {
            color: #172554;
            background: #fff;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 15px;
            top: 15px;
            color: #d6a84b;
            transition: .3s ease;
        }

        .input-icon:focus-within i {
            color: #f5d98b;
            transform: scale(1.15);
        }

        .input-icon .form-control {
            padding-left: 43px;
        }

        /* TOMBOL */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
            padding-top: 23px;
            border-top: 1px solid rgba(255,255,255,.12);
        }

        .btn-cancel {
            padding: 12px 22px;
            border-radius: 11px;
            color: #dbeafe;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.12);
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            transition: .3s ease;
        }

        .btn-cancel:hover {
            color: white;
            background: rgba(255,255,255,.15);
            transform: translateY(-3px);
        }

        .btn-save {
            border: none;
            padding: 12px 25px;
            border-radius: 11px;
            color: #101827;
            background: linear-gradient(110deg, #d6a84b, #f5d98b);
            font-size: 14px;
            font-weight: 700;
            box-shadow: 0 8px 25px rgba(214,168,75,.2);
            transition: .3s ease;
        }

        .btn-save:hover {
            transform: translateY(-4px);
            color: #101827;
            box-shadow: 0 12px 30px rgba(214,168,75,.35);
        }

        .btn-save:active {
            transform: scale(.97);
        }

        /* VALIDASI */
        .alert-danger {
            color: #fecaca;
            background: rgba(127,29,29,.25);
            border: 1px solid rgba(248,113,113,.3);
        }

        .form-footer {
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
                padding: 20px 14px;
            }

            .form-card {
                padding: 20px;
            }

            .page-heading h2 {
                font-size: 24px;
            }

            .topbar small {
                display: none;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .form-actions a,
            .form-actions button {
                text-align: center;
                width: 100%;
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

    <a href="{{ route('tugas.create') }}" class="active">
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

    <a href="{{ route('statistik') }}">
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
            <strong>Belajar lebih teratur!</strong><br>
            Catat tugasmu dan selesaikan tepat waktu bersama TaskKu.
        </p>
    </div>

</aside>

<!-- KONTEN UTAMA -->
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
    <div class="page-heading">
        <div class="eyebrow">Manage Your Assignment</div>
        <h2>
            Tambah Tugas Baru
            <i class="bi bi-pencil-square" style="color:#d6a84b;"></i>
        </h2>
        <p>
            Catat tugas kuliahmu agar lebih teratur dan tidak ada tenggat yang terlewat.
        </p>
    </div>

    <!-- PESAN VALIDASI -->
    @if ($errors->any())
        <div class="alert alert-danger rounded-3">
            <strong>Periksa kembali data yang kamu masukkan:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORM -->
    <div class="form-card">

        <div class="form-header">
            <div class="form-header-icon">
                <i class="bi bi-journal-plus"></i>
            </div>

            <div>
                <h5>Informasi Tugas</h5>
                <p>Lengkapi informasi tugas pada formulir berikut.</p>
            </div>
        </div>

        <form action="{{ route('tugas.store') }}" method="POST">
            @csrf

            <div class="row g-4">

                <!-- JUDUL -->
                <div class="col-md-6">
                    <label class="form-label">Judul Tugas</label>

                    <div class="input-icon">
                        <i class="bi bi-pencil"></i>

                        <input
                            type="text"
                            name="judul"
                            class="form-control"
                            placeholder="Contoh: Membuat laporan praktikum"
                            value="{{ old('judul') }}"
                            required>
                    </div>
                </div>

                <!-- MATA KULIAH -->
                <div class="col-md-6">
                    <label class="form-label">Mata Kuliah</label>

                    <div class="input-icon">
                        <i class="bi bi-book"></i>

                        <input
                            type="text"
                            name="mata_kuliah"
                            class="form-control"
                            placeholder="Contoh: Pengembangan Aplikasi Web"
                            value="{{ old('mata_kuliah') }}"
                            required>
                    </div>
                </div>

                <!-- TENGGAT -->
                <div class="col-md-6">
                    <label class="form-label">Tanggal Tenggat</label>

                    <div class="input-icon">
                        <i class="bi bi-calendar-event"></i>

                        <input
                            type="date"
                            name="tenggat"
                            class="form-control"
                            value="{{ old('tenggat') }}"
                            required>
                    </div>
                </div>

                <!-- STATUS -->
                <div class="col-md-6">
                    <label class="form-label">Status Tugas</label>

                    <select name="status" class="form-select" required>

                        <option value="Belum Selesai"
                            {{ old('status', 'Belum Selesai') == 'Belum Selesai' ? 'selected' : '' }}>
                            Belum Selesai
                        </option>

                        <option value="Selesai"
                            {{ old('status') == 'Selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>

                    </select>
                </div>

                <!-- PRIORITAS -->
                <div class="col-md-6">
                    <label class="form-label">Prioritas Tugas</label>

                    <select name="prioritas" class="form-select" required>

                        <option value="Tinggi"
                            {{ old('prioritas') == 'Tinggi' ? 'selected' : '' }}>
                            🔴 Tinggi
                        </option>

                        <option value="Sedang"
                            {{ old('prioritas', 'Sedang') == 'Sedang' ? 'selected' : '' }}>
                            🟡 Sedang
                        </option>

                        <option value="Rendah"
                            {{ old('prioritas') == 'Rendah' ? 'selected' : '' }}>
                            🟢 Rendah
                        </option>

                    </select>
                </div>

                <!-- DESKRIPSI -->
                <div class="col-12">
                    <label class="form-label">Deskripsi Tugas</label>

                    <textarea
                        name="deskripsi"
                        class="form-control"
                        placeholder="Tuliskan detail atau keterangan tugas di sini...">{{ old('deskripsi') }}</textarea>
                </div>

            </div>

            <!-- TOMBOL -->
            <div class="form-actions">

                <a href="{{ route('dashboard') }}" class="btn-cancel">
                    <i class="bi bi-arrow-left me-1"></i>
                    Batal
                </a>

                <button type="submit" class="btn-save">
                    <i class="bi bi-check-circle me-1"></i>
                    Simpan Tugas
                </button>

            </div>

        </form>

    </div>

    <div class="form-footer">
        © {{ date('Y') }} TaskKu — Organize Your Tasks, Achieve Your Goals.
    </div>

</main>

</body>
</html>
