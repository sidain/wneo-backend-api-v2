@section('header0')

@show

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
            .left-side{
                width: 200px;
            }
            .sidebar1{
                width: 200px;
            }

            .sidebar-top{
                /* position: relative; */
                width: 100%;
                /* height: 0; */
                /* padding-bottom: 100%; */

                /* max-width: 100px; */
                /* height: 100px; */

                /* padding: 20px; */
                display: flex;

                align-items: center;
                justify-content: center;
                text-align: center;

                /* cursor: pointer; */
                /* color: lightgray; */
                /* border: 4px dashed #000; */
                /* border-radius: 10px; */
            }


            /* this needs changed on live */
            .sidebar-image{
                background-image: url('{{ asset('storage/wneo_logo.png') }}');

                width: 100%;
                /* height: 100%; */

                /* width: 100px; */
                height: 100px;

                /* border-radius: 10px; */
                /* overflow: hidden; */
                /* background-color: #cccccc; */
                /* background-size: cover; */
                background-size: contain;
                background-position: center;
                background-repeat:no-repeat;
                position: relative;
            }


            .footer{
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
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
        <script>

        </script>

    @show

    @section('css1')
        <style>

        </style>

    @show


    @section('style1')
    @show

    @section('styles1')
    @show



    {{-- <div class="vueapp app border row "> --}}

    {{--
    <div class="row border">
        <div class="col-auto left m-0 p-0">
            <div class="sidebar1 border">
                <div class="sidebar-top border">
                    <div class="sidebar-image">
                        Top Graphic Item
                    </div>

                </div>
            </div>
        </div>

        <div class="col right">
            <div class="top border">
                @section('header1')
                    <div class="header header1 border">
                        This is the master header1
                        <br />

                        <a href="https://v3.vuejs.org/guide/introduction.html">Vue3</a>
                        <br />

                        <a href="https://v5.getbootstrap.com/docs/5.0/getting-started/introduction/">Bootstrap 5</a>
                        <br />
                    </div>
                @show

                @section('menu1 border')
                    <div class="menu1">
                        This is the master menu
                    </div>
                @show
            </div>

        </div>
    </div>
    --}}

    <div class="row top-of-page ">

        {{-- <div class="col-auto left-side border-right border-dark" > --}}
        <div class="left-side border-right">
            <div class="row" >
                <div class="col header-image-container ">
                    <div class="header-image">
                        This is the Header Image
                    </div>
                </div>
            </div>
        </div>



        <div class="col right-side">
            <div class="row">
                <div class="col header">

                    <div class="">
                        This is the master header
                        <br />

                        <a href="https://v3.vuejs.org/guide/introduction.html">Vue3</a>
                        <br />

                        <a href="https://v5.getbootstrap.com/docs/5.0/getting-started/introduction/">Bootstrap 5</a>
                        <br />

                </div>
            </div>
        </div>

    </div>










    <div class="row border">

        <div class="left-side">
            @section('sidebar1')
                <div class="sidebar1 border" >

                    @section('sidebar-menu')
                        @include('partials.sideMenu1')
                    @show

                </div>
            @show
        </div>

        <div class="col right-side">

            {{-- <div class="mid container border"> --}}
                {{-- <div class="container"> --}}
                <div class="row">
                    @section('content1')
                        <div class="col content content1 border">
                            This is the master content1
                        </div>
                    @show
                </div>
                {{-- </div> --}}

                <div class="row">
                    @section('content2')
                        <div class="col content content2 border">
                            This is the master content2
                        </div>
                    @show
                </div>
            {{-- </div> --}}






        </div>
    </div>
    {{-- </div> --}}




    @section('scripts2')
        <script>

        </script>

    @show


    @section('css2')
        <style>

        </style>

    @show

    @section('style2')
    @show

    @section('styles2')
    @show
</body>
</html>

@section('footer0')

@show
