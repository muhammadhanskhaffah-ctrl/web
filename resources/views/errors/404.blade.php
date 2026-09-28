<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Halaman Tidak Ditemukan | Petra Textima</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #123968;
        }

        .error-container {
            width: 100%;
            max-width: 620px;
            padding: 50px 35px;
            text-align: center;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        }

        .logo {
            margin-bottom: 25px;
        }

        .logo img {
            width: 190px;
            max-width: 80%;
            height: auto;
        }

        .error-code {
            margin-bottom: 10px;
            font-size: 82px;
            line-height: 1;
            font-weight: 800;
            color: #123968;
        }

        .error-title {
            margin-bottom: 12px;
            font-size: 27px;
            font-weight: 700;
            color: #172554;
        }

        .error-message {
            max-width: 480px;
            margin: 0 auto 30px;
            color: #64748b;
            font-size: 15px;
            line-height: 1.7;
        }

        .btn-home {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            background: #2563eb;
            color: #ffffff;
            text-decoration: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .btn-home:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .brand {
            margin-top: 28px;
            color: #94a3b8;
            font-size: 13px;
            line-height: 1.6;
        }

        @media (max-width: 600px) {
            .error-container {
                padding: 40px 22px;
            }

            .error-code {
                font-size: 68px;
            }

            .error-title {
                font-size: 23px;
            }

            .error-message {
                font-size: 14px;
            }

            .logo img {
                width: 160px;
            }
        }
    </style>
</head>

<body>

    <div class="error-container">

        <div class="logo">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="Petra Textima"
            >
        </div>

        <div class="error-code">
            404
        </div>

        <div class="error-title">
            Halaman Tidak Ditemukan
        </div>

        <div class="error-message">
            Maaf, halaman yang Anda cari tidak tersedia atau alamat URL yang dimasukkan tidak benar.
            Silakan kembali ke dashboard untuk melanjutkan.
        </div>

        <a href="{{ url('/dashboard') }}" class="btn-home">
            ← Kembali ke Dashboard
        </a>

        <div class="brand">
            Sistem Informasi Kinerja Karyawan<br>
            PT. Petra Textima Mandiri
        </div>

    </div>

</body>
</html>