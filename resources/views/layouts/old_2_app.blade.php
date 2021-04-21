<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>



        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">




        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        @section('css0')
            <style>
                .fixed{
                    width: 300px;
                }

                .left{

                }

                .sidebar-top{
                    width: 100%;
                    /* height: 0; */
                    /* padding-bottom: 100%; */

                    position: relative;

                    display: flex;

                    align-items: center;
                    justify-content: center;
                    text-align: center;
                }

                .sidebar-top-image{
                    width: 200px;
                    height: 200px;

                    position: relative;

                    background-image: url('{{ asset('storage/wneo_logo.png') }}');
                    background-size: contain;
                    /* background-size: cover; */
                    background-position: center;
                    background-repeat:no-repeat;

                    border-radius: 20px;
                }

                .footer{
                    /* position: fixed; */
                    /* left: 0; */
                    /* bottom: 0; */
                    /* width: 100%; */
                    background-color: #9c27b0;
                    color: white;
                    text-align: center;
                }

            </style>
        @show





        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        @section('scripts0')
            {{-- VUE --}}
            <!-- production version, optimized for size and speed -->
            {{-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}

            <!-- development version, includes helpful console warnings -->
            {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}
            <script src="https://unpkg.com/vue@next"></script>



            {{-- BOOTSTRAP --}}
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>



            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">


            <!-- Font Awesome JS -->
            <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/solid.js"
                crossorigin="anonymous">
            </script>
            <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/fontawesome.js" crossorigin="anonymous">
            </script>

            <script>
            </script>
        @show


    </head>
    <body class="font-sans antialiased">
        @section('scripts1')
        @show

        @section('css1')
        @show


        @section('style1')
        @show

        @section('styles1')
        @show

















        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <nav>
                @include('partials.sideMenu2')
            </nav>









            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>



        </div>



        @stack('modals')

        @livewireScripts









        @section('scripts2')
            <script></script>
        @show

        @section('css2')
            <style></style>
        @show

        @section('style2')
        @show

        @section('styles2')
        @show
    </body>
</html>

@section('footer0')
@show
