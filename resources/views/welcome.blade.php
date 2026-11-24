<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskKu - Kelola Tugas Lebih Mudah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            overflow: hidden;
            font-family: 'Segoe UI', sans-serif;
            color: white;
            background: #071426;
        }

        .background {
            position: fixed;
            inset: 0;
            overflow: hidden;
            background:
                radial-gradient(circle at 20% 20%, #153c67 0, transparent 35%),
                radial-gradient(circle at 80% 80%, #172c58 0, transparent 35%),
                linear-gradient(135deg, #061323, #0b1d35, #071426);
            z-index: -3;
        }

        .light {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            filter: blur(100px);
            opacity: .25;
            animation: floatLight 12s ease-in-out infinite alternate;
        }

        .light.one {
            background: #1687ff;
            top: -180px;
            left: -100px;
        }

        .light.two {
            background: #d6a84f;
            bottom: -220px;
            right: -100px;
            animation-delay: 2s;
        }

        @keyframes floatLight {
            from { transform: translate(0, 0) scale(1); }
            to { transform: translate(100px, 70px) scale(1.25); }
        }

        .stars {
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(2px 2px at 20% 30%, white 50%, transparent),
                radial-gradient(2px 2px at 70% 20%, white 50%, transparent),
                radial-gradient(1px 1px at 40% 80%, white 50%, transparent),
                radial-gradient(2px 2px at 85% 65%, white 50%, transparent),
                radial-gradient(1px 1px at 15% 75%, white 50%, transparent);
            background-size: 250px 250px;
            opacity: .35;
            animation: starsMove 30s linear infinite;
        }

        @keyframes starsMove {
            from { transform: translateY(0); }
            to { transform: translateY(-250px); }
        }

        .welcome {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
            text-align: center;
        }

        .content {
            max-width: 850px;
            animation: appear 1.3s ease forwards;
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(35px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            width: 95px;
            height: 95px;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(229, 190, 112, .65);
            border-radius: 28px;
            color: #e8c477;
            font-size: 42px;
            background: rgba(255, 255, 255, .07);
            box-shadow: 0 0 45px rgba(219, 174, 91, .2);
            animation: logoFloat 3s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0) rotate(0); }
            50% { transform: translateY(-12px) rotate(4deg); }
        }

        .brand {
            font-size: 18px;
            letter-spacing: 7px;
            color: #e8c477;
            font-weight: 700;
            margin-bottom: 22px;
        }

        h1 {
            font-size: clamp(40px, 7vw, 76px);
            font-weight: 800;
            line-height: 1.12;
            margin-bottom: 22px;
        }

        h1 span {
            background: linear-gradient(90deg, #ffffff, #e8c477, #ffffff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .description {
            max-width: 620px;
            margin: 0 auto;
            color: #b7c5d8;
            font-size: 17px;
            line-height: 1.8;
        }

        .features {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 25px;
            margin: 35px 0;
            color: #d4deeb;
            font-size: 14px;
        }

        .features i {
            color: #e8c477;
            margin-right: 7px;
        }

        .start-button {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 35px;
            border-radius: 50px;
            text-decoration: none;
            color: #101c2c;
            font-weight: 700;
            font-size: 16px;
            background: linear-gradient(135deg, #f1d28b, #c99b45);
            box-shadow: 0 10px 35px rgba(205, 159, 75, .25);
            transition: .35s ease;
        }

        .start-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 45px rgba(205, 159, 75, .45);
            color: #101c2c;
        }

        .footer {
            position: absolute;
            bottom: 25px;
            left: 0;
            right: 0;
            text-align: center;
            color: #71839a;
            font-size: 12px;
            letter-spacing: 1px;
        }

        @media (max-width: 576px) {
            .brand { letter-spacing: 5px; }
            .description { font-size: 15px; }
            .features { gap: 15px; }
            .logo { width: 80px; height: 80px; font-size: 35px; }
        }
    </style>
</head>

<body>
    <div class="background">
        <div class="light one"></div>
        <div class="light two"></div>
        <div class="stars"></div>
    </div>

    <main class="welcome">
        <div class="content">

            <div class="logo">
                <i class="bi bi-journal-check"></i>
            </div>

            <div class="brand">WELCOME TO TASKKU</div>

            <h1>
                Atur Tugas,<br>
                <span>Raih Tujuanmu.</span>
            </h1>

            <p class="description">
                Kelola semua tugas perkuliahan dalam satu tempat.
                Atur jadwal, pantau tenggat waktu, dan selesaikan
                setiap pekerjaan dengan lebih terorganisir.
            </p>

            <div class="features">
                <div><i class="bi bi-check-circle-fill"></i> Kelola Tugas</div>
                <div><i class="bi bi-calendar-check-fill"></i> Atur Jadwal</div>
                <div><i class="bi bi-graph-up-arrow"></i> Pantau Progres</div>
            </div>

            <a href="{{ route('dashboard') }}" class="start-button">
                Mulai Sekarang
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>
    </main>

    <div class="footer">
        © {{ date('Y') }} TASKKU — YOUR STUDY, YOUR PROGRESS
    </div>
</body>
</html>
