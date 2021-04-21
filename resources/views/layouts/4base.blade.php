@section('header0')

@show

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- @section('title') --}}
        {{-- <title>Document</title> --}}
        {{-- <title>App Name - @yield('title')</title> --}}
    {{-- @show --}}
    <title>App Name - @yield('title')</title>

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

    @section('style0')
    @show

    @section('styles0')
    @show

</head>
<body>
    @section('scripts1')
    @show

    @section('css1')
    @show


    @section('style1')
    @show

    @section('styles1')
    @show


    {{-- <div class="container-fluid m-0"> --}}
    {{-- <div class=""> --}}
    <div>


        {{-- <div class="vueapp app border row "> --}}
        <div class="row">

            <div class="left fixed bg-primary m-0 p-0">
                @section('sidebar1')
                    <div class="sidebar1"  style="min-height: 800px;">
                        <div class="sidebar-top border bg-light pt-5 pb-5">

                            {{-- Top Graphic Item --}}
                            <div class="sidebar-top-image bg-white border border-primary"></div>

                        </div>


                        <div class="sidebar-menu-div d-flex justify-content-center pt-3 pb-3" >
                            <div class="side-menu bg-light p-2 border-0 rounded">
                                @section('sidebar-menu')
                                    @include('partials.sideMenu1')
                                @show
                            </div>
                        </div>

                    </div>
                @show
            </div>

            <div class="right col m-0 p-0">

                <div class="row top">
                    <div class="header row m-0 p-0">
                        @section('header1')
                            <div class="header header1 row">
                                <div class="col text-center">
                                    THIS IS THE MASTER HEADER1
                                </div>
                            </div>
                        @show
                    </div>

                    {{-- <div class="header-menu  border-top border-bottom m-0 p-0 p-1  justify-content-center"> --}}
                    {{-- <div class="header-menu row border-top border-bottom row justify-content-center"> --}}
                    <div class="header-menu row border-top border-bottom m-0 p-0  pb-3">

                        @section('menu1')
                            <div class="menu1 row m-0 p-0">

                                {{-- <div class="row justify-content-center"> --}}
                                <div class="row m-0 p-0">
                                    <div class="col text-center">
                                        THIS IS THE MASTER HEADER MENU
                                    </div>
                                </div>

                                {{-- <div class="col text-right float-right justify-content-right"> --}}
                                {{-- <div class="row justify-content-between"> --}}
                                <div class="row m-0 p-0">

                                    {{-- <div class="col text-left float-left justify-content-left"> --}}
                                    {{-- <div class="col align-self-start"> --}}
                                    <div class="col text-left pl-4">
                                        <a target="_blank" href="https://v3.vuejs.org/guide/introduction.html">Vue3</a>
                                        <br />

                                        <a target="_blank" href="https://v5.getbootstrap.com/docs/5.0/getting-started/introduction/">Bootstrap 5</a>
                                    </div>


                                    {{-- <div class="col align-self-end text-right justify-content-right"> --}}
                                    <div class="col text-right pr-5">
                                        <a href="">Log in</a>
                                        <br />
                                        <a href="">Log Out</a>
                                    </div>

                                </div>

                            </div>
                        @show
                    </div>
                </div>



                {{-- <div class="mid container border"> --}}
                {{-- <div class="container"> --}}
                <div class="row content1 pl-5 pr-5"></div>
                    @section('content1')
                        <div class="content content1 text-center">
                            THIS IS THE MASTER CONTENT1 12-8-2020
                        </div>
                    @show
                </div>

                {{--
                <div class="row content1"></div>
                    @section('content2')
                        <div class="content content1 border">
                            This is the master content2
                        </div>
                    @show
                </div>
                --}}

            </div>

        </div>



        <div class="row bottom m-0 p-0">
            <div class="col m-0 p-0">
                @section('footer1')
                    <div class=" footer footer1 text-center m-0 p-0">
                        THIS IS THE MASTER FOOTER1
                    </div>
                @show
            </div>
        </div>

    </div>




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
