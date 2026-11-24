<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskKu - Edit Tugas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background: #243b64;
            color: white;
        }

        .sidebar a {
            color: #dce5f5;
            text-decoration: none;
            display: block;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 8px;
        }

        .sidebar a:hover {
            background: #3d5c91;
            color: white;
        }

        .content {
            padding: 35px;
        }

        .card {
            border: none;
            border-radius: 14px;
        }

        .brand {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 35px;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 sidebar p-4">
            <div class="brand">TaskKu.</div>

            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('tugas.index') }}">Daftar Tugas</a>
            <a href="{{ route('tugas.create') }}">Tambah Tugas</a>

            <div class="mt-5 text-white-50 small">
                Aplikasi Pengelola Tugas Mahasiswa
            </div>
        </div>

        <!-- Konten Edit -->
        <div class="col-md-9 col-lg-10 content">

            <h2 class="fw-bold">Edit Tugas</h2>

            <p class="text-secondary">
                Ubah informasi tugas kuliah kamu.
            </p>

            <div class="card shadow-sm p-4 mt-4">

                <form action="{{ route('tugas.update', ['tugas' => $tugas->id]) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <!-- Judul -->
                    <div class="mb-3">
                        <label class="form-label">Judul Tugas</label>

                        <input type="text"
                               name="judul"
                               class="form-control"
                               value="{{ old('judul', $tugas->judul) }}"
                               required>

                        @error('judul')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Mata Kuliah -->
                    <div class="mb-3">
                        <label class="form-label">Mata Kuliah</label>

                        <input type="text"
                               name="mata_kuliah"
                               class="form-control"
                               value="{{ old('mata_kuliah', $tugas->mata_kuliah) }}"
                               required>

                        @error('mata_kuliah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Tugas</label>

                        <textarea name="deskripsi"
                                  class="form-control"
                                  rows="3">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>

                        @error('deskripsi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tenggat -->
                    <div class="mb-3">
                        <label class="form-label">Tanggal Pengumpulan</label>

                        <input type="date"
                               name="tenggat"
                               class="form-control"
                               value="{{ old('tenggat', $tugas->tenggat) }}"
                               required>

                        @error('tenggat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label class="form-label">Status Tugas</label>

                        <select name="status" class="form-select" required>

                            <option value="Belum Selesai"
                                {{ old('status', $tugas->status) == 'Belum Selesai' ? 'selected' : '' }}>
                                Belum Selesai
                            </option>

                            <option value="Selesai"
                                {{ old('status', $tugas->status) == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                        </select>

                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol -->
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('dashboard') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>

            <p class="text-secondary text-center mt-4 small">
                © 2026 TaskKu - Pengelola Tugas Mahasiswa
            </p>

        </div>
    </div>
</div>

</body>
</html>
