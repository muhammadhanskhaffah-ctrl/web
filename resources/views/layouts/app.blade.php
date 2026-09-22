
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
        >

        <meta
            name="csrf-token"
            content="{{ csrf_token() }}"
        >

        {{-- =====================================================
             INFORMASI APLIKASI
        ====================================================== --}}

        <title>
            Petra Textima | Sistem Kinerja Karyawan
        </title>

        <meta
            name="application-name"
            content="Sistem Kinerja Karyawan"
        >

        <meta
            name="description"
            content="Sistem Informasi Kinerja Karyawan PT. Petra Textima Mandiri"
        >

        <meta
            name="theme-color"
            content="#123968"
        >

        {{-- =====================================================
             FAVICON
        ====================================================== --}}

        <link
            rel="icon"
            type="image/png"
            href="{{ asset('images/logo-baru-2.png') }}"
        >

        <link
            rel="apple-touch-icon"
            href="{{ asset('images/logo-baru-2.png') }}"
        >

        {{-- =====================================================
             FONT
        ====================================================== --}}

        <link rel="preconnect" href="https://fonts.bunny.net">

        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        >

        {{-- =====================================================
             SCRIPTS DAN CSS
        ====================================================== --}}

        @vite([
            'resources/css/app.css',
            'resources/js/app.js'
        ])

    </head>


    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100">

            {{-- =================================================
                 NAVIGASI
            ================================================== --}}

            @include('layouts.navigation')


            {{-- =================================================
                 PAGE HEADING
            ================================================== --}}

            @isset($header)

                <header class="bg-white shadow">

                    <div
                        class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"
                    >

                        {{ $header }}

                    </div>

                </header>

            @endisset


            {{-- =================================================
                 PAGE CONTENT
            ================================================== --}}

            <main>

                {{ $slot }}

            </main>

        </div>

    </body>

</html>