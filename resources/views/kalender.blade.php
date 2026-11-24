<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskKu - Kalender</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            color: #172554;
            background:
                radial-gradient(circle at 80% 10%, rgba(96,165,250,.3), transparent 28%),
                radial-gradient(circle at 20% 90%, rgba(129,140,248,.22), transparent 30%),
                linear-gradient(135deg, #eaf2ff, #dce8fb 50%, #eef2ff);
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            position: fixed;
            inset: 0 auto 0 0;
            padding: 28px 20px;
            color: white;
            background: linear-gradient(180deg, #101c3c, #172d58 75%, #1e3a6d);
            box-shadow: 8px 0 30px rgba(15,23,42,.12);
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
            background: linear-gradient(135deg, #60a5fa, #818cf8);
            font-size: 23px;
        }

        .brand h4 { font-weight: 800; margin: 0; }

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
            transition: .2s;
        }

        .sidebar a i { font-size: 18px; }

        .sidebar a:hover, .sidebar a.active {
            color: white;
            background: linear-gradient(100deg, #2563eb, #4f72e8);
            box-shadow: 0 7px 18px rgba(37,99,235,.25);
        }

        .sidebar-info {
            position: absolute;
            bottom: 25px;
            left: 20px;
            right: 20px;
            padding: 18px;
            border-radius: 16px;
            background: rgba(255,255,255,.09);
            border: 1px solid rgba(255,255,255,.12);
        }

        .sidebar-info i { color: #93c5fd; font-size: 25px; }
        .sidebar-info p { color: #cbd5e1; font-size: 12px; margin: 8px 0 0; line-height: 1.6; }

        .main-content {
            margin-left: 260px;
            padding: 30px 42px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .topbar h5 { font-weight: 800; margin: 0; }
        .topbar small { color: #64748b; }

        .profile {
            display: flex;
            align-items: center;
            gap: 11px;
            background: rgba(255,255,255,.65);
            padding: 9px 15px;
            border-radius: 30px;
            border: 1px solid white;
        }

        .profile-icon {
            width: 35px;
            height: 35px;
            display: grid;
            place-items: center;
            color: white;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #818cf8);
        }

        .eyebrow {
            color: #2563eb;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .page-heading h2 { font-size: 30px; font-weight: 800; margin: 8px 0; }
        .page-heading p { color: #64748b; }

        .calendar-card, .detail-card {
            background: rgba(255,255,255,.85);
            backdrop-filter: blur(15px);
            border: 1px solid white;
            border-radius: 22px;
            padding: 25px;
            box-shadow: 0 18px 50px rgba(30,64,175,.10);
        }

        .calendar-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .calendar-top h4 { font-weight: 800; margin: 0; }

        .month-button {
            border: 0;
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: #eaf1ff;
            color: #2563eb;
            margin-left: 5px;
        }

        .month-button:hover { background: #2563eb; color: white; }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, minmax(0, 1fr));
            gap: 8px;
        }

        .day-name {
            text-align: center;
            font-size: 12px;
            font-weight: 800;
            color: #64748b;
            padding: 10px 0;
        }

        .day-cell {
            min-height: 85px;
            border: 1px solid #e8eef7;
            background: rgba(248,250,252,.8);
            border-radius: 13px;
            padding: 10px;
            text-align: left;
            color: #334155;
            position: relative;
            transition: .2s;
        }

        button.day-cell { cursor: pointer; }

        .day-cell:hover {
            border-color: #60a5fa;
            background: #eff6ff;
        }

        .day-cell.other-month { opacity: .35; }

        .day-cell.today {
            border: 2px solid #60a5fa;
        }

        .day-cell.selected {
            color: white;
            background: linear-gradient(135deg, #2563eb, #6366f1);
            border-color: transparent;
        }

        .day-number { font-size: 13px; font-weight: 800; }

        .task-dot {
            display: inline-block;
            width: 7px;
            height: 7px;
            margin: 8px 3px 0 0;
            border-radius: 50%;
            background: #f59e0b;
        }

        .selected .task-dot { background: white; }

        .legend {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 20px;
            color: #64748b;
            font-size: 12px;
        }

        .legend span { display: flex; align-items: center; gap: 7px; }
        .legend-dot { width: 9px; height: 9px; border-radius: 50%; display: inline-block; }

        .detail-card { margin-top: 22px; }

        .detail-card h5 { font-weight: 800; margin-bottom: 18px; }

        .task-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 15px;
            margin-bottom: 10px;
            background: #f8fafc;
            border: 1px solid #e8eef7;
            border-radius: 13px;
        }

        .task-row strong { font-size: 14px; }
        .task-row small { display: block; color: #64748b; margin-top: 5px; }

        .empty-state {
            padding: 25px;
            text-align: center;
            color: #94a3b8;
            background: #f8fafc;
            border-radius: 14px;
        }

        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
            margin-top: 28px;
        }

        @media (max-width: 900px) {
            .sidebar { width: 75px; padding: 25px 10px; }
            .brand { justify-content: center; padding: 0; }
            .brand h4, .menu-label, .sidebar a span, .sidebar-info { display: none; }
            .sidebar a { justify-content: center; padding: 14px 8px; }
            .main-content { margin-left: 75px; padding: 25px; }
        }

        @media (max-width: 576px) {
            .main-content { padding: 20px 12px; }
            .calendar-card, .detail-card { padding: 14px; }
            .day-cell { min-height: 55px; padding: 6px; }
            .calendar-grid { gap: 4px; }
            .day-name { font-size: 10px; }
            .task-row { align-items: flex-start; flex-direction: column; }
            .topbar small { display: none; }
            .page-heading h2 { font-size: 24px; }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">
        <div class="brand-icon"><i class="bi bi-mortarboard-fill"></i></div>
        <h4>TaskKu</h4>
    </div>

    <p class="menu-label">MENU UTAMA</p>

    <a href="{{ route('dashboard') }}">
        <i class="bi bi-grid-fill"></i><span>Dashboard</span>
    </a>

    <a href="{{ route('tugas.create') }}">
        <i class="bi bi-plus-circle-fill"></i><span>Tambah Tugas</span>
    </a>

    <a href="{{ route('tugas.index') }}">
        <i class="bi bi-list-check"></i><span>Daftar Tugas</span>
    </a>

    <a href="{{ route('kalender') }}" class="active">
        <i class="bi bi-calendar-week"></i><span>Kalender</span>
    </a>

    <a href="{{ route('statistik') }}">
        <i class="bi bi-bar-chart-fill"></i><span>Statistik</span>
    </a>

    <p class="menu-label mt-4">LAINNYA</p>
    <a href="{{ route('dashboard') }}">
        <i class="bi bi-question-circle-fill"></i><span>Panduan Penggunaan</span>
    </a>

    <div class="sidebar-info">
        <i class="bi bi-mortarboard-fill"></i>
        <p><strong>Atur waktumu!</strong><br>Lihat semua tenggat tugas dalam satu kalender.</p>
    </div>
</aside>

<main class="main-content">

    <div class="topbar">
        <div>
            <h5>TaskKu Workspace</h5>
            <small>Student Productivity Area</small>
        </div>

        <div class="profile">
            <div class="profile-icon"><i class="bi bi-person-fill"></i></div>
            <div><strong style="font-size:13px;">Mahasiswa</strong><br><small>Student Account</small></div>
        </div>
    </div>

    <div class="page-heading mb-4">
        <div class="eyebrow">Schedule Planner</div>
        <h2>Kalender Tugas <i class="bi bi-calendar2-week text-primary"></i></h2>
        <p>Pantau jadwal dan tenggat tugas kuliahmu dengan lebih mudah.</p>
    </div>

    <section class="calendar-card">
        <div class="calendar-top">
            <div>
                <h4 id="monthYear">Kalender</h4>
                <small class="text-secondary">Pilih tanggal untuk melihat tugas</small>
            </div>

            <div>
                <button class="month-button" id="prevMonth" aria-label="Bulan sebelumnya">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="month-button" id="nextMonth" aria-label="Bulan berikutnya">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="calendar-grid" id="calendarDays">
            <div class="day-name">Sen</div>
            <div class="day-name">Sel</div>
            <div class="day-name">Rab</div>
            <div class="day-name">Kam</div>
            <div class="day-name">Jum</div>
            <div class="day-name">Sab</div>
            <div class="day-name">Min</div>
        </div>

        <div class="legend">
            <span><i class="legend-dot" style="background:#f59e0b;"></i> Ada tenggat tugas</span>
            <span><i class="legend-dot" style="background:#60a5fa;"></i> Hari ini</span>
        </div>
    </section>

    <section class="detail-card">
        <h5><i class="bi bi-clipboard2-check text-primary me-2"></i><span id="selectedDate"></span></h5>
        <div id="taskDetails"></div>
    </section>

    <div class="footer">
        © {{ date('Y') }} TaskKu — Organize Your Tasks, Achieve Your Goals.
    </div>

</main>

<script>
    const taskEvents = [
        @foreach($tugas as $item)
            {
                date: @json(\Carbon\Carbon::parse($item->tenggat)->format('Y-m-d')),
                title: @json($item->judul),
                course: @json($item->mata_kuliah),
                status: @json($item->status)
            },
        @endforeach
    ];

    const monthNames = [
        'Januari', 'Februari', 'Maret', 'April',
        'Mei', 'Juni', 'Juli', 'Agustus',
        'September', 'Oktober', 'November', 'Desember'
    ];

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    let currentDate = new Date(today.getFullYear(), today.getMonth(), 1);
    let selectedDate = new Date(today);

    function dateKey(date) {
        const y = date.getFullYear();
        const m = String(date.getMonth() + 1).padStart(2, '0');
        const d = String(date.getDate()).padStart(2, '0');
        return `${y}-${m}-${d}`;
    }

    function sameDay(a, b) {
        return dateKey(a) === dateKey(b);
    }

    function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        document.getElementById('monthYear').textContent =
            `${monthNames[month]} ${year}`;

        const container = document.getElementById('calendarDays');
        container.innerHTML = `
            <div class="day-name">Sen</div>
            <div class="day-name">Sel</div>
            <div class="day-name">Rab</div>
            <div class="day-name">Kam</div>
            <div class="day-name">Jum</div>
            <div class="day-name">Sab</div>
            <div class="day-name">Min</div>
        `;

        const firstDay = new Date(year, month, 1);
        const offset = (firstDay.getDay() + 6) % 7;
        const startDate = new Date(year, month, 1 - offset);

        for (let i = 0; i < 42; i++) {
            const date = new Date(startDate);
            date.setDate(startDate.getDate() + i);

            const key = dateKey(date);
            const events = taskEvents.filter(task => task.date === key);

            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'day-cell';

            if (date.getMonth() !== month) button.classList.add('other-month');
            if (sameDay(date, today)) button.classList.add('today');
            if (sameDay(date, selectedDate)) button.classList.add('selected');

            const number = document.createElement('div');
            number.className = 'day-number';
            number.textContent = date.getDate();
            button.appendChild(number);

            if (events.length > 0) {
                const dots = document.createElement('div');

                for (let j = 0; j < Math.min(events.length, 3); j++) {
                    const dot = document.createElement('span');
                    dot.className = 'task-dot';
                    dots.appendChild(dot);
                }

                button.appendChild(dots);
            }

            button.addEventListener('click', () => {
                selectedDate = new Date(date);
                currentDate = new Date(date.getFullYear(), date.getMonth(), 1);
                renderCalendar();
                showTasks();
            });

            container.appendChild(button);
        }
    }

    function showTasks() {
        const key = dateKey(selectedDate);
        const tasks = taskEvents.filter(task => task.date === key);

        document.getElementById('selectedDate').textContent =
            selectedDate.toLocaleDateString('id-ID', {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });

        const container = document.getElementById('taskDetails');
        container.innerHTML = '';

        if (tasks.length === 0) {
            const empty = document.createElement('div');
            empty.className = 'empty-state';
            empty.innerHTML = '<i class="bi bi-calendar-check fs-2 d-block mb-2"></i>Tidak ada tugas pada tanggal ini.';
            container.appendChild(empty);
            return;
        }

        tasks.forEach(task => {
            const row = document.createElement('div');
            row.className = 'task-row';

            const info = document.createElement('div');
            const title = document.createElement('strong');
            const course = document.createElement('small');

            title.textContent = task.title;
            course.textContent = task.course;

            info.appendChild(title);
            info.appendChild(course);

            const badge = document.createElement('span');
            badge.className = task.status === 'Selesai'
                ? 'badge bg-success'
                : 'badge bg-warning text-dark';
            badge.textContent = task.status;

            row.appendChild(info);
            row.appendChild(badge);
            container.appendChild(row);
        });
    }

    function changeMonth(amount) {
        currentDate = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth() + amount,
            1
        );

        renderCalendar();
    }

    document.getElementById('prevMonth').addEventListener('click', () => changeMonth(-1));
    document.getElementById('nextMonth').addEventListener('click', () => changeMonth(1));

    renderCalendar();
    showTasks();
</script>

</body>
</html>
