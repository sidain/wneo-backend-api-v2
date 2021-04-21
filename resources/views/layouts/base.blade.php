<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- @section('title') --}}
        {{-- <title>Document</title> --}}
        {{-- <title>App Name - @yield('title')</title> --}}
    {{-- @show --}}
    <title>{{ config('app.name', 'Laravel') }}</title>











    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">




















    @section('scripts0')
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>


        {{-- VUE --}}
        <!-- production version, optimized for size and speed -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}

        <!-- development version, includes helpful console warnings -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}
        <script src="https://unpkg.com/vue@next"></script>



        {{-- BOOTSTRAP --}}
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/solid.js"
             crossorigin="anonymous">
        </script>
        <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/fontawesome.js" crossorigin="anonymous">
        </script>
    @show












    @section('styles0')
        <style>
            /* .fixed{ */
                /* width: 300px; */
            /* } */

            /* .left{ */

            /* } */

            /* .sidebar-top{ */
                /* width: 100%; */
                /* height: 0; */
                /* padding-bottom: 100%; */

                /* position: relative; */

                /* display: flex; */

                /* align-items: center; */
                /* justify-content: center; */
                /* text-align: center; */
            /* } */



            /* .footer{ */
                /* position: fixed; */
                /* left: 0; */
                /* bottom: 0; */
                /* width: 100%; */
                /* background-color: #9c27b0; */
                /* color: white; */
                /* text-align: center; */
            /* } */

        </style>
    @show
</head>
<body class="bg-white">


    @section('scripts1')
    @show

    @section('styles1')
    @show


    <div class="container-fluid" style="padding: 0px 12px;">
        <div class="row ">
            <div class="sidemenu-outter col-auto bg-primary bg-gradient p-0">
                @include('partials.sideMenu3')
            </div>


            <div class="main col p-0 bg-light">
                <div class="main-top">
                    <div class="header">
                        @section('header1')

                            <x-jet-banner />
                            @livewire('navigation-menu')

                            {{-- <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"> --}}
                            {{-- <div class="mx-auto"> --}}
                            {{-- </div> --}}

                            {{--
                            <div>
                                @section('header')
                                    MAIN HEADER
                                @show
                            </div>
                            --}}

                        @show
                    </div>

                </div>


                <div class="main-mid">
                    @section('content1')
                    @show
                </div>

            </div>


        </div>


        <div class="row">
            <div class="footer  col text-center bg-white bg-gradient text-dark">
                @section('footer1')
                    THIS IS THE MASTER FOOTER1
                @show
            </div>
        </div>


    </div>





    @section('scripts2')
    @show

    @section('styles2')
    @show
</body>
</html>

@section('footer0')
@show
