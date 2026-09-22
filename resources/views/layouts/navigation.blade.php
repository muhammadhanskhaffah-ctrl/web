<nav x-data="{ open: false }" class="main-navigation">

    <style>

        /* =========================================================
           GLOBAL
        ========================================================= */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding-left: 250px;
            padding-top: 72px;
            background-color: #f4f7fb;
        }


        /* =========================================================
           SIDEBAR
        ========================================================= */

        .main-navigation {
            position: fixed;
            top: 0;
            left: 0;

            width: 250px;
            height: 100vh;

            background: linear-gradient(
                180deg,
                #0b1f3a 0%,
                #102d52 100%
            );

            z-index: 9999;

            color: white;

            box-shadow:
                4px 0 18px rgba(15, 23, 42, 0.12);

            overflow-y: auto;
            overflow-x: hidden;
        }


        /* =========================================================
           LOGO
        ========================================================= */

        .sidebar-logo {
            height: 145px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 20px 18px;

            border-bottom: 1px solid rgba(255,255,255,0.10);
        }


        .sidebar-logo a {
            display: flex;

            align-items: center;
            justify-content: center;

            width: 100%;
            height: 100%;

            text-decoration: none;
        }


        .sidebar-logo img {
    width: 230px !important;
    max-width: none !important;
    height: auto !important;
    object-fit: contain;
    display: block;
    transform: scale(1.5);
    transform-origin: center;
}


        /* =========================================================
           NAMA PERUSAHAAN
        ========================================================= */

        .company-name {
            text-align: center;

            padding: 0 20px 20px;

            color: #dbeafe;

            font-size: 13px;
            font-weight: 500;

            letter-spacing: 0.2px;
        }


        /* =========================================================
           MENU SIDEBAR
        ========================================================= */

        .sidebar-menu {
            padding: 18px 14px;
        }


        .sidebar-section-title {
            padding: 0 14px 10px;

            color: #93c5fd;

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 1px;
        }


        .sidebar-menu-item {
            display: flex;

            align-items: center;

            gap: 13px;

            width: 100%;

            min-height: 48px;

            padding: 0 14px;

            margin-bottom: 6px;

            border-radius: 9px;

            color: #e5edf8 !important;

            background-color: transparent;

            text-decoration: none;

            font-size: 14px;

            font-weight: 500;

            transition:
                background-color 0.2s ease,
                color 0.2s ease,
                transform 0.2s ease;
        }


        .sidebar-menu-item:hover {
            background-color: rgba(59, 130, 246, 0.20);

            color: #ffffff !important;

            transform: translateX(2px);
        }


        /* =========================================================
           MENU AKTIF
        ========================================================= */

        .sidebar-menu-item.active {
            background: linear-gradient(
                90deg,
                #2563eb,
                #1d4ed8
            );

            color: #ffffff !important;

            box-shadow:
                0 5px 12px rgba(37, 99, 235, 0.28);
        }


        .sidebar-menu-item.active:hover {
            background: linear-gradient(
                90deg,
                #2563eb,
                #1d4ed8
            );

            color: #ffffff !important;
        }


        /* =========================================================
           ICON MENU
        ========================================================= */

        .sidebar-icon {
            width: 20px;
            height: 20px;

            flex-shrink: 0;

            color: #bfdbfe;
        }


        .sidebar-menu-item.active .sidebar-icon {
            color: #ffffff;
        }


        /* =========================================================
           SIDEBAR BAWAH
        ========================================================= */

        .sidebar-footer {
            position: absolute;

            bottom: 0;
            left: 0;

            width: 100%;

            padding: 20px;

            border-top: 1px solid rgba(255,255,255,0.10);
        }


        .sidebar-footer-text {
            color: #94a3b8;

            font-size: 11px;

            line-height: 1.6;

            text-align: center;
        }


        /* =========================================================
           TOPBAR
        ========================================================= */

        .topbar {
            position: fixed;

            top: 0;
            left: 250px;
            right: 0;

            height: 72px;

            background: linear-gradient(
                90deg,
                #0b1f3a 0%,
                #102d52 100%
            );

            border-bottom: 1px solid rgba(255,255,255,0.10);

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 28px;

            z-index: 9998;

            color: #ffffff;
        }


        /* =========================================================
           TOPBAR KIRI
        ========================================================= */

        .topbar-left {
            display: flex;

            align-items: center;

            gap: 18px;

            flex: 1;
        }


        /* =========================================================
           JUDUL TOPBAR
        ========================================================= */

        .topbar-title {
            color: #ffffff;

            font-size: 16px;

            font-weight: 600;

            letter-spacing: 0.2px;
        }


        /* =========================================================
           TOPBAR KANAN
        ========================================================= */

        .topbar-right {
            display: flex;

            align-items: center;

            gap: 18px;
        }


        /* =========================================================
           NOTIFICATION
        ========================================================= */

        .notification-button {
            position: relative;

            width: 40px;
            height: 40px;

            display: flex;

            align-items: center;
            justify-content: center;

            border: none;

            border-radius: 8px;

            background: transparent;

            color: #ffffff;

            cursor: pointer;
        }


        .notification-button:hover {
            background-color: rgba(255,255,255,0.10);
        }


        .notification-button svg {
            width: 21px;
            height: 21px;
        }


        .notification-badge {
            position: absolute;

            top: 3px;
            right: 3px;

            min-width: 17px;
            height: 17px;

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 0 4px;

            background-color: #ef4444;

            color: white;

            border-radius: 999px;

            font-size: 9px;

            font-weight: 700;
        }


        /* =========================================================
           PEMBATAS TOPBAR
        ========================================================= */

        .topbar-divider {
            width: 1px;

            height: 32px;

            background-color: rgba(255,255,255,0.20);
        }


        /* =========================================================
           USER TOPBAR
        ========================================================= */

        .topbar-user {
            display: flex;

            align-items: center;

            gap: 10px;

            position: relative;
        }


        .user-avatar {
            width: 40px;
            height: 40px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );

            color: white;

            flex-shrink: 0;
        }


        .user-avatar svg {
            width: 21px;
            height: 21px;
        }


        .user-information {
            display: flex;

            flex-direction: column;

            line-height: 1.3;
        }


        .user-name {
            color: #ffffff;

            font-size: 13px;

            font-weight: 600;
        }


        .user-company {
            color: #dbeafe;

            font-size: 11px;
        }


        /* =========================================================
           ADMIN DROPDOWN
        ========================================================= */

        .admin-dropdown-button {
            display: flex;

            align-items: center;

            gap: 5px;

            border: none;

            background: transparent;

            color: #ffffff;

            cursor: pointer;
        }


        .admin-dropdown-button:hover {
            color: #dbeafe;
        }


        .admin-dropdown-button svg {
            width: 16px;
            height: 16px;
        }


        .admin-dropdown {
            position: absolute;

            top: 52px;
            right: 0;

            width: 190px;

            background-color: #ffffff;

            border-radius: 10px;

            box-shadow:
                0 10px 30px rgba(15, 23, 42, 0.15);

            border: 1px solid #e5e7eb;

            overflow: hidden;

            z-index: 10000;
        }


        .admin-dropdown a,
        .admin-dropdown button {
            display: block;

            width: 100%;

            padding: 11px 15px;

            text-align: left;

            font-size: 13px;

            color: #334155 !important;

            background-color: #ffffff;

            border: none;

            text-decoration: none;

            cursor: pointer;
        }


        .admin-dropdown a:hover,
        .admin-dropdown button:hover {
            background-color: #f1f5f9;

            color: #0f172a !important;
        }


        /* =========================================================
           MOBILE BUTTON
        ========================================================= */

        .mobile-button {
            display: none;

            width: 42px;
            height: 42px;

            align-items: center;
            justify-content: center;

            border: none;

            border-radius: 8px;

            background-color: transparent;

            color: #ffffff;

            cursor: pointer;
        }


        .mobile-button:hover {
            background-color: rgba(255,255,255,0.10);
        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 900px) {

            body {
                padding-left: 0;
                padding-top: 64px;
            }


            .main-navigation {
                width: 100%;
                height: 64px;

                bottom: auto;

                overflow: visible;
            }


            .sidebar-logo,
            .company-name,
            .sidebar-menu,
            .sidebar-footer {
                display: none;
            }


            .topbar {
                position: fixed;

                top: 0;
                left: 0;
                right: 0;

                height: 64px;

                padding: 0 15px;
            }


            .topbar-left {
                gap: 10px;
            }


            .topbar-right {
                margin-left: auto;
            }


            .user-information {
                display: none;
            }


            .mobile-button {
                display: flex;
            }


            .topbar-title {
                font-size: 14px;
            }
        }


        /* =========================================================
   MOBILE MENU
========================================================= */

.mobile-menu {
    position: fixed;

    top: 64px;
    left: 0;
    right: 0;

    background: #0b1f3a;

    padding: 14px;

    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 9px;

    z-index: 9997;

    border-radius: 0 0 16px 16px;

    box-shadow:
        0 8px 24px rgba(15, 23, 42, 0.25);

    max-height: calc(100vh - 64px);
    overflow-y: auto;
}

/* ITEM MENU HP */

.mobile-menu a {
    display: flex;

    align-items: center;
    justify-content: center;

    min-height: 45px;

    padding: 10px 8px;

    margin: 0;

    border: 1px solid rgba(255, 255, 255, 0.12);

    border-radius: 10px;

    background-color: rgba(255, 255, 255, 0.06);

    color: #e5edf8 !important;

    text-decoration: none;

    font-size: 13px;
    font-weight: 500;

    text-align: center;

    transition:
        background-color 0.2s ease,
        transform 0.2s ease;
}

/* SAAT MENU DISENTUH */

.mobile-menu a:active {
    transform: scale(0.97);
}

/* HOVER MENU */

.mobile-menu a:hover {
    background-color: rgba(59, 130, 246, 0.25);

    color: #ffffff !important;
}

/* MENU AKTIF */

.mobile-menu a.active {
    background: linear-gradient(
        135deg,
        #2563eb,
        #1d4ed8
    );

    border-color: #3b82f6;

    color: #ffffff !important;

    box-shadow:
        0 4px 10px rgba(37, 99, 235, 0.25);
}

/* HP LAYAR SANGAT KECIL */

@media (max-width: 360px) {

    .mobile-menu {
        padding: 10px;
        gap: 7px;
    }

    .mobile-menu a {
        min-height: 42px;

        padding: 8px 5px;

        font-size: 12px;
    }

}


        /* =========================================================
           LAYAR KECIL
        ========================================================= */

        @media (max-width: 500px) {

            .topbar {
                padding: 0 10px;
            }


            .topbar-right {
                gap: 8px;
            }


            .notification-button {
                display: none;
            }


            .topbar-title {
                font-size: 13px;
            }
        }

    </style>


    {{-- =========================================================
         SIDEBAR DESKTOP
    ========================================================= --}}

    <aside class="sidebar">

        {{-- LOGO --}}

        <div class="sidebar-logo">

            <a href="{{ route('dashboard') }}">

                <img
    src="{{ asset('images/logo-baru-2.png') }}"
    alt="Logo PT. Petra Textima Mandiri"
    
>
                >
 
            </a>

        </div>


        {{-- NAMA PERUSAHAAN --}}

        <div class="company-name">
            PT. Petra Textima Mandiri
        </div>


        {{-- MENU --}}

        <div class="sidebar-menu">

            <div class="sidebar-section-title">
                Menu Utama
            </div>


            {{-- DASHBOARD --}}

            <a
                href="{{ route('dashboard') }}"
                class="sidebar-menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h4v-6h4v6h4a1 1 0 001-1V10"
                    />
                </svg>

                <span>Dashboard</span>

            </a>


            {{-- =====================================================
                 KARYAWAN
                 HANYA UNTUK ADMINISTRATOR / HR
            ====================================================== --}}

            @if(Auth::user()->role === 'admin')

                <a
                    href="{{ route('karyawan.index') }}"
                    class="sidebar-menu-item {{ request()->routeIs('karyawan.*') ? 'active' : '' }}"
                >

                    <svg
                        class="sidebar-icon"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                        />
                    </svg>

                    <span>Karyawan</span>

                </a>


                {{-- =================================================
                     GOALS
                     HANYA UNTUK ADMINISTRATOR / HR
                ================================================== --}}

                <a
                    href="{{ route('goals.index') }}"
                    class="sidebar-menu-item {{ request()->routeIs('goals.*') ? 'active' : '' }}"
                >

                    <svg
                        class="sidebar-icon"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <circle
                            cx="12"
                            cy="12"
                            r="8"
                        />

                        <circle
                            cx="12"
                            cy="12"
                            r="4"
                        />

                        <path
                            stroke-linecap="round"
                            d="M12 2v4M22 12h-4"
                        />
                    </svg>

                    <span>Goals</span>

                </a>

            @endif


            {{-- MONITORING --}}

            <a
                href="{{ route('monitorings.index') }}"
                class="sidebar-menu-item {{ request()->routeIs('monitorings.*') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <rect
                        x="5"
                        y="3"
                        width="14"
                        height="18"
                        rx="2"
                    />

                    <path
                        stroke-linecap="round"
                        d="M8 8h8M8 12h8M8 16h5"
                    />
                </svg>

                <span>Monitoring</span>

            </a>


            {{-- EVALUASI --}}

            <a
                href="{{ route('evaluasi.index') }}"
                class="sidebar-menu-item {{ request()->routeIs('evaluasi.*') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <rect
                        x="5"
                        y="3"
                        width="14"
                        height="18"
                        rx="2"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 3h6M9 9l1.5 1.5L13 8M9 14l1.5 1.5L13 13"
                    />
                </svg>

                <span>Evaluasi</span>

            </a>


            {{-- LAPORAN --}}

            <a
                href="{{ route('laporan.index') }}"
                class="sidebar-menu-item {{ request()->routeIs('laporan.*') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 3h9l3 3v15H6z"
                    />

                    <path
                        stroke-linecap="round"
                        d="M14 3v4h4M9 12h6M9 16h6"
                    />
                </svg>

                <span>Laporan</span>

            </a>

        </div>


        {{-- FOOTER SIDEBAR --}}

        <div class="sidebar-footer">

            <div class="sidebar-footer-text">
                Sistem Informasi Kinerja Karyawan
                <br>
                © 2026 PT. Petra Textima Mandiri
            </div>

        </div>

    </aside>


    {{-- =========================================================
         TOPBAR
    ========================================================= --}}

    <div class="topbar">


        {{-- BAGIAN KIRI --}}

        <div class="topbar-left">

            {{-- MOBILE BUTTON --}}

            <button
                @click="open = !open"
                class="mobile-button"
                type="button"
            >

                <svg
                    x-show="!open"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16"
                    />

                </svg>


                <svg
                    x-show="open"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                    />

                </svg>

            </button>


            {{-- JUDUL SISTEM --}}

            <div class="topbar-title">
                Sistem Informasi Kinerja Karyawan
            </div>

        </div>


        {{-- BAGIAN KANAN --}}

        <div class="topbar-right">


            {{-- NOTIFICATION --}}

            <button
                type="button"
                class="notification-button"
                title="Notifikasi"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 17h5l-1.5-2V10a6.5 6.5 0 00-13 0v5L4 17h5m6 0a3 3 0 01-6 0"
                    />

                </svg>


                <span class="notification-badge">
                    3
                </span>

            </button>


            <div class="topbar-divider"></div>


            {{-- USER --}}

            <div
                class="topbar-user"
                x-data="{ adminOpen: false }"
            >

                <div class="user-avatar">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 19a6 6 0 00-12 0M9 11a4 4 0 100-8 4 4 0 000 8z"
                        />

                    </svg>

                </div>


                <div class="user-information">

                    <span class="user-name">
                        {{ Auth::user()->name }}
                    </span>

                    <span class="user-company">
                        PT. Petra Textima Mandiri
                    </span>

                </div>


                <button
                    type="button"
                    @click="adminOpen = !adminOpen"
                    class="admin-dropdown-button"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m6 9 6 6 6-6"
                        />

                    </svg>

                </button>


                {{-- DROPDOWN --}}

                <div
                    x-show="adminOpen"
                    @click.outside="adminOpen = false"
                    x-transition
                    class="admin-dropdown"
                    style="display: none;"
                >

                    <a href="{{ route('profile.edit') }}">
                        Profil
                    </a>


                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >

                        @csrf

                        <button type="submit">
                            Keluar
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         MOBILE MENU
    ========================================================= --}}

    <div
        x-show="open"
        x-transition
        class="mobile-menu"
        style="display: none;"
    >

        <a
            href="{{ route('dashboard') }}"
            class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
        >
            Dashboard
        </a>


        {{-- KARYAWAN DAN GOALS HANYA UNTUK ADMIN --}}

        @if(Auth::user()->role === 'admin')

            <a
                href="{{ route('karyawan.index') }}"
                class="{{ request()->routeIs('karyawan.*') ? 'active' : '' }}"
            >
                Karyawan
            </a>


            <a
                href="{{ route('goals.index') }}"
                class="{{ request()->routeIs('goals.*') ? 'active' : '' }}"
            >
                Goals
            </a>

        @endif


        <a
            href="{{ route('monitorings.index') }}"
            class="{{ request()->routeIs('monitorings.*') ? 'active' : '' }}"
        >
            Monitoring
        </a>


        <a
            href="{{ route('evaluasi.index') }}"
            class="{{ request()->routeIs('evaluasi.*') ? 'active' : '' }}"
        >
            Evaluasi
        </a>


        <a
            href="{{ route('laporan.index') }}"
            class="{{ request()->routeIs('laporan.*') ? 'active' : '' }}"
        >
            Laporan
        </a>

    </div>

</nav>