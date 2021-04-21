@extends('layouts.base')

@section('content1')
    <?php

        $results = DB::table('_products')
                    ->leftJoin('_builders', '_products.builder_id', '=', '_builders.id')
                    ->select('*')
                    // ->limit(10)
                    ->get();


        /*
        $results = DB::table('_products')
                    // ->leftJoin('_builders', '_products.builder_id', '=', '_builders.id')
                    ->join('_builders', '_products.builder_id', '=', '_builders.id')
                    ->get();
        */

        /*
        echo "<pre>";
        echo( print_r( $results[0], true ) );
        echo "</pre>";
        */

        $col_array = array_keys(json_decode(json_encode($results[0]), true));
        $col_count = count($col_array) ;
    ?>

    <div class="container m-0 p-0 mt-5 mb-5 ml-5" >
        <div class="row">
            <div class="col">
                <h1>Container</h1>
            </div>
        </div>

        <div class="row">
                {{-- php test\output --}}

                {{--
                <pre>
                    {{ print_r($col_array, true) }}
                </pre>
                --}}

                <img src="{{ asset('storage/wneo_logo.png') }}" alt="">
        </div>



        <div class="row mb-5 p-3 border ">
            @foreach ($col_array as $key => $value)
                <div class="col-3">{{$value}}</div>
            @endforeach
        </div>

        <div class="row p-0 m-0 "  style="width: {{200*$col_count}}px;">
            <div class="row border font-weight-bold" style="">
                <div class="col-auto mr-1"></div>

                @foreach ( $results[0] as $key => $value)
                    <div class="col">{{ ucfirst($key) }}</div>
                @endforeach
            </div>



            @foreach ($results as $item)
                <div class="row border">
                    <div class="col-auto border-right text-center">{{ $loop->index+1 }}</div>

                    @foreach ( $item as $key => $value)
                        <div class="col {{$key.$item->id}} text-break" style="width: 200px;">
                            {{$value}}
                        </div>
                    @endforeach

                </div>

            @endforeach










        </div>

    </div>






























@endsection
