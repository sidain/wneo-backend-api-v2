<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        {{-- BOOTSTRAP --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">




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
</head>

<body>
    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col bg-primary">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque fugiat sed et exercitationem error a autem excepturi soluta laborum dolore blanditiis, atque non aspernatur incidunt tempore quia facere odio expedita?

            </div>

            <div class="col bg-secondary">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis dolore exercitationem necessitatibus magni dolores, ex, fugit aliquam voluptas et cumque ducimus expedita ea eum odit tempora temporibus vero, esse velit?

            </div>
        </div>
    </div>

</body>
</html>

