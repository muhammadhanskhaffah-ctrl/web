<x-guest-layout>

    <style>

        /* ==============================
           HALAMAN LOGIN
        ============================== */

        body {
            background: linear-gradient(
                135deg,
                #0b1f3a 0%,
                #2563eb 100%
            ) !important;

            min-height: 100vh;
        }


        .login-container {
            width: 100%;
        }


        /* ==============================
           LOGO
        ============================== */

        .login-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }


        .login-logo img {
            width: 300px;
            height: 130px;
            object-fit: cover;
            object-position: center;
            display: block;
        }


        /* ==============================
           JUDUL
        ============================== */

        .login-title {
            text-align: center;
            margin-bottom: 6px;
            color: #0f172a;
            font-size: 24px;
            font-weight: 700;
        }


        .login-subtitle {
            text-align: center;
            margin-bottom: 28px;
            color: #64748b;
            font-size: 14px;
        }


        /* ==============================
           LABEL
        ============================== */

        .login-label {
            display: block;
            margin-bottom: 7px;
            color: #334155;
            font-size: 14px;
            font-weight: 600;
        }


        /* ==============================
           INPUT
        ============================== */

        .login-input {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 11px 13px;
            font-size: 14px;
            color: #0f172a;
            background: #ffffff;
            transition: all 0.2s ease;
        }


        .login-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
            outline: none;
        }


        .login-input::placeholder {
            color: #94a3b8;
        }


        /* ==============================
           TOMBOL LOGIN
        ============================== */

        .login-button {
            width: 100%;
            border: none;
            border-radius: 8px;
            padding: 12px 15px;
            margin-top: 22px;

            background: #2563eb;
            color: white;

            font-size: 14px;
            font-weight: 600;

            cursor: pointer;
            transition: all 0.2s ease;
        }


        .login-button:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }


        .login-button:active {
            transform: translateY(0);
        }


        /* ==============================
           REMEMBER ME
        ============================== */

        .remember-wrapper {
            display: flex;
            align-items: center;
            margin-top: 18px;
        }


        .remember-wrapper input {
            width: 16px;
            height: 16px;
            accent-color: #2563eb;
        }


        .remember-wrapper label {
            margin-left: 8px;
            color: #64748b;
            font-size: 13px;
            cursor: pointer;
        }


        /* ==============================
           LUPA PASSWORD
        ============================== */

        .forgot-password {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #2563eb;
            font-size: 13px;
            text-decoration: none;
        }


        .forgot-password:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }


        /* ==============================
           FOOTER
        ============================== */

        .login-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 18px;
            border-top: 1px solid #e2e8f0;
            color: #94a3b8;
            font-size: 11px;
        }


        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 640px) {

            .login-logo img {
                width: 250px;
                height: 110px;
                object-fit: cover;
                object-position: center;
            }


            .login-title {
                font-size: 21px;
            }


            .login-subtitle {
                font-size: 13px;
            }

        }

    </style>


    <div class="login-container">


        {{-- ==============================
             LOGO PT PETRA TEXTIMA
        ============================== --}}

        <div class="login-logo">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo PT. Petra Textima Mandiri"
            >

        </div>


        {{-- ==============================
             JUDUL
        ============================== --}}

        <div class="login-title">

            Sistem Informasi Kinerja Karyawan

        </div>


        <div class="login-subtitle">

            PT. Petra Textima Mandiri

        </div>


        {{-- ==============================
             SESSION STATUS
        ============================== --}}

        <x-auth-session-status
            class="mb-4"
            :status="session('status')"
        />


        {{-- ==============================
             FORM LOGIN
        ============================== --}}

        <form method="POST" action="{{ route('login') }}">

            @csrf


            {{-- ==============================
                 EMAIL
            ============================== --}}

            <div>

                <label
                    for="email"
                    class="login-label"
                >
                    Email
                </label>


                <input
                    id="email"
                    class="login-input"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                    autofocus
                    autocomplete="username"
                >


                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />

            </div>


            {{-- ==============================
                 PASSWORD
            ============================== --}}

            <div style="margin-top: 18px;">

                <label
                    for="password"
                    class="login-label"
                >
                    Password
                </label>


                <div style="position: relative;">


                    <input
                        id="password"
                        class="login-input"
                        style="padding-right: 45px;"
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                        autocomplete="current-password"
                    >


                    {{-- TOMBOL LIHAT PASSWORD --}}

                    <button
                        type="button"
                        id="togglePassword"
                        style="
                            position: absolute;
                            right: 10px;
                            top: 50%;
                            transform: translateY(-50%);
                            border: none;
                            background: transparent;
                            cursor: pointer;
                            font-size: 18px;
                            padding: 5px;
                        "
                    >
                        👁️
                    </button>


                </div>


                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2"
                />


            </div>


            {{-- ==============================
                 JAVASCRIPT PASSWORD
            ============================== --}}

            <script>

                document
                    .getElementById('togglePassword')
                    .addEventListener('click', function () {

                        const password =
                            document.getElementById('password');


                        if (password.type === 'password') {

                            password.type = 'text';

                            this.textContent = '🙈';

                        } else {

                            password.type = 'password';

                            this.textContent = '👁️';

                        }

                    });

            </script>


            {{-- ==============================
                 REMEMBER ME
            ============================== --}}

            <div class="remember-wrapper">


                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                >


                <label for="remember_me">

                    Ingat saya

                </label>


            </div>


            {{-- ==============================
                 TOMBOL LOGIN
            ============================== --}}

            <button
                type="submit"
                class="login-button"
            >

                Masuk ke Sistem

            </button>


            {{-- ==============================
                 LUPA PASSWORD
            ============================== --}}

            @if (Route::has('password.request'))

                <a
                    class="forgot-password"
                    href="{{ route('password.request') }}"
                >

                    Lupa password?

                </a>

            @endif


        </form>


        {{-- ==============================
             FOOTER
        ============================== --}}

        <div class="login-footer">

            Sistem Informasi Kinerja Karyawan

            <br>

            PT. Petra Textima Mandiri

        </div>


    </div>

</x-guest-layout>