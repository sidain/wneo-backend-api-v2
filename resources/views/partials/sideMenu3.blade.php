{{-- <div class="sidemenu-inner mx-auto sticky-top" style="width: 250px;"> --}}
<div class="sidemenu-inner mx-auto sticky-top" style="width: 100%; min-height: 800px;">
    <style>
        .sidemenu-top-image{
            width: 200px;
            height: 200px;

            position: relative;

            background-image: url('{{ asset('storage/wneo_logo.png') }}');
            background-size: contain;
            /* background-size: cover; */
            background-position: center;
            background-repeat:no-repeat;

            border-radius: 20px;

            border-width:3px;
        }
    </style>

    <div class="sidemenu-top bg-light bg-gradient p-4">
        {{-- Top Graphic Item --}}
        <div class="sidemenu-top-image border-primary"></div>
    </div>

    <div class="bg-info">
        {{ Auth::user()->name }}<br />
        {{ Auth::user()->role }}<br />
        {{-- {{ print_r( Auth::user(), true ) }} --}}

    </div>

    <div class="sidemenu-main p-4" style="">
        <ul class="nav flex-column bg-light rounded">
            <li class="nav-item">
                <a href="{{ url('/home') }}" class="nav-link">Home page</a>
            </li>

            <li class="nav-item">
                <a href="{{route('builders.index')}}" class="nav-link">Builders</a>
            </li>

            <li class="nav-item">
                <a href="{{route('categorys.index')}}" class="nav-link">Categories</a>
            </li>

            <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link">Products</a>
            </li>

            <li class="nav-item">
                <a href="{{route('images.index')}}" class="nav-link">Images</a>
            </li>

            <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">Users</a>
            </li>
        </ul>
    </div>

</div>
