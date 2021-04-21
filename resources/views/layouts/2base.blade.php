@section('header0')
@show


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


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
            div{
                border: 1px solid #000;
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



    <div class="page container">

        <div class="top row">
            <div class="sidebar col">
                <div class="sidebar-top">
                    <div class="side-bar-image">
                        SIDE BAR IMAGE
                    </div>
                </div>
            </div>

            <div class="header col">
                <div class="header1">
                    @section('header1')
                            This is the master header1
                            <br />

                            <a href="https://v3.vuejs.org/guide/introduction.html">Vue3</a>
                            <br />

                            <a href="https://v5.getbootstrap.com/docs/5.0/getting-started/introduction/">Bootstrap 5</a>
                            <br />
                    @show
                </div>

                <div class="top-menu">
                    @section('menu1')
                        HEADER MENNU
                    @show
                </div>
            </div>
        </div>




        <div class="middle row">
            <div class="sidebar col">
                <div class="sidebar1">
                    @section('sidebar1')
                        SIDEBAR 1
                    @show
                </div>

                <div class="sidebar2">
                    @section('sidebar1')
                        SIDEBAR 2
                    @show
                </div>

                <div class="side-bar-menu">
                    @section('sidebar-menu')
                        SIDE MENU 1
                        {{-- @include('partials.sideMenu1') --}}
                    @show
                </div>
            </div>



            <div class="content col">
                <div class="content1 row">
                    <div class="col">
                        @section('content1')
                            CONTENT 1
                        @show
                    </div>
                </div>

                <div class="content1 row">
                    <div class="col">
                        @section('content2')
                            CONTENT 2
                        @show
                    </div>
                </div>
            </div>
        </div>






        <div class="bottom row">
            <div class="footer col">
                @section('footer1')
                    FOOTER 1
                @show
            </div>
        </div>
    </div>




    @section('scripts2')
    @show

    @section('css2')
    @show

    @section('style2')
    @show

    @section('styles2')
    @show


</body>
</html>

@section('footer0')
@show
