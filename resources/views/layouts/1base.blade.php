<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


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

    <style>
        div{
                border: 1px solid #000;
            }
        .fixed{
            width: 200px;
        }
    </style>
</head>
<body>

    <div class="container">


        <div class="row top">
            <div class="fixed left-side side-menu-top">
                <div class="side-menu-image"></div>
            </div>

            <div class="col right-side header">
                This is the master header1
                <br />

                <a href="https://v3.vuejs.org/guide/introduction.html">Vue3</a>
                <br />

                <a href="https://v5.getbootstrap.com/docs/5.0/getting-started/introduction/">Bootstrap 5</a>
                <br />

            </div>
        </div>


        <div class="row top">
            <div class="fixed left-side side-menu-top">
                <div class="side-menu-image"></div>
            </div>

            <div class="col right-side header">
                This is the master header1
                <br />

                <a href="https://v3.vuejs.org/guide/introduction.html">Vue3</a>
                <br />

                <a href="https://v5.getbootstrap.com/docs/5.0/getting-started/introduction/">Bootstrap 5</a>
                <br />

            </div>
        </div>


    </div>

</body>
</html>
