@extends('layouts.base')

@section('content1')
     <div class="container-fluid mt-5">

        <div class="row">
            <div>
                <?php
                    use App\Models\_builder;
                    use App\Models\_category;
                    use App\Models\_product;
                    use App\Models\_image;

                    // $_class = $_item;
                    $table = $_class->getTable();
                    $columns = \Schema::getColumnListing($table);

                    $class_name = get_class($_class);
                    $class_name = explode( "\\", $class_name);
                    $class_name = $class_name[count($class_name)-1];

                    $class_name = str_replace('_', '', $class_name);
                    $class_names = $class_name."s";
                ?>

                {{-- <pre> --}}
                    {{-- {{ print_r( $categorys, true ) }} --}}
                    {{-- {{ var_dump($categorys) }} --}}

                    {{-- {{ dd($categorys[0]->cat_id) }} --}}
                {{-- </pre> --}}
            </div>
        </div>

        <div class="row">
            <div class="col-12 margin-tb">
                {{--
                <div class="float-left">
                    <h2>Laravel 8 CRUD:: {{ ucfirst($class_names) }}</h2>
                </div>
                --}}

                {{-- <div class="col-12 m-0 p-0"> --}}

                <div class="float-left">
                    <h2>Laravel 8 CRUD:: {{$_count}} {{ ucfirst($class_names) }}  , Page ( {{$i}} of {{$page_count}} )</h2>
                </div>

                <div class="float-right">
                    <a class="btn btn-success" href="{{ route($class_names.'.create')}}" title="Create a new Client">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>

        @if ( $message = Session::get('success') )
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <table class="table table-bordered table-responsive-lg">
                <tr>
                    {{-- <th>Index</th> --}}
                    <th></th>

                    @foreach ($columns as $column)
                        @switch($column)
                            @case('')

                            @case('id')

                            @case('category_json')
                            @case('collections_json')
                            @case('data_json')
                            @case('price_json')
                            @case('_json')

                            @case('deleted_at')

                            @case('price_other')

                            @case('data1')
                            @case('data2')
                            @case('data3')

                            @case('search_text')
                            @case('caption_text')
                            @case('alt_text')
                            @case('excerpt_text')
                            @case('excerpt')

                            @case('cat')
                            @case('status')


                            @case('categorys')
                            @case('category_id')
                            @case('category_ids')


                            @case('collection')
                            @case('collections')

                            @case('image1_thumb')
                            @case('image2')
                            @case('image2_thumb')
                            @case('image3')
                            @case('image3_thumb')
                                @break

                            @case('builder_id')
                                @if ($class_name === "product" )
                                    <th>Builder</th>
                                @else
                                    <th>{{ ucfirst($column) }}</th>
                                @endif

                                @break

                            @case('categorys_json')
                                <th>Categories</th>

                                @break

                            @default
                                <th>{{ ucfirst($column) }}</th>
                                @break


                        @endswitch
                    @endforeach

                    <th>Actions</th>
                </tr>

                @foreach( $items as $item )
                    <tr>
                        {{-- <td>{{++$i}}</td> --}}
                        {{-- <td>{{$item->builder}}</td> --}}
                        <td>{{$loop->index+1}}</td>


                        @foreach ($columns as $column)
                                @switch($column)
                                    @case('')

                                    @case('id')

                                    @case('category_json')
                                    @case('collections_json')
                                    @case('data_json')
                                    @case('price_json')
                                    @case('_json')

                                    @case('data1')
                                    @case('data2')
                                    @case('data3')

                                    @case('search_text')
                                    @case('caption_text')
                                    @case('alt_text')
                                    @case('excerpt_text')
                                    @case('excerpt')

                                    @case('cat')
                                    @case('status')


                                    @case('categorys')
                                    @case('category_id')
                                    @case('category_ids')

                                    @case('collection')
                                    @case('collections')

                                    @case('deleted_at')

                                    @case('price_other')

                                    @case('image1_thumb')
                                    @case('image2')
                                    @case('image2_thumb')
                                    @case('image3')
                                    @case('image3_thumb')
                                        @break


                                    @case('price_msrp')
                                        <td>
                                            ${{ $item[$column]}}
                                        </td>
                                        @break


                                    @case('price_srp')
                                        <td>
                                            ${{ $item[$column]}}
                                        </td>
                                        @break

                                    @case('created_at')
                                        <td>
                                            {{-- {{ date_format( $item[$column], 'jS M Y') }} --}}
                                            {{ $item[$column] }}
                                        </td>
                                        @break

                                    @case('updated_at')
                                        <td>
                                            {{-- {{ date_format( $item[$column], 'jS M Y') }} --}}
                                            {{ $item[$column] }}
                                        </td>
                                        @break

                                    @case('builder')
                                        <td class="">
                                            <?php
                                                $b_id = $item->builder_id;
                                                $b = _builder::where('builder_id', $b_id)->value('builder');
                                            ?>

                                            <a href="{{ route( 'products.index' ) }}?filter_builder={{$b_id}}">{{$b}}</a>
                                        </td>

                                        @break

                                    @case('logo')
                                        <td>
                                            <img src="{{$item[$column]}}" alt="">
                                            {{-- <span>{{$item[$column]}}</span> --}}
                                        </td>
                                        @break

                                    @case('image1')
                                        <td>
                                            <img src="{{$item[$column]}}" alt="">
                                            {{-- <span>{{$item[$column]}}</span> --}}
                                        </td>
                                        @break

                                    @case('image1_thumb')
                                        <td>
                                            <img src="{{$item[$column]}}" alt="">
                                            {{-- <span>{{$item[$column]}}</span> --}}
                                        </td>
                                        @break

                                    @case('image2')
                                        <td>
                                            <img src="{{$item[$column]}}" alt="">
                                            {{-- <span>{{$item[$column]}}</span> --}}
                                        </td>
                                        @break

                                    @case('image2_thumb')
                                        <td>
                                            <img src="{{$item[$column]}}" alt="">
                                            {{-- <span>{{$item[$column]}}</span> --}}
                                        </td>
                                        @break

                                    @case('image3')
                                        <td>
                                            <img src="{{$item[$column]}}" alt="">
                                            {{-- <span>{{$item[$column]}}</span> --}}
                                        </td>
                                        @break

                                    @case('image3_thumb')
                                        <td>
                                            <img src="{{$item[$column]}}" alt="">
                                            {{-- <span>{{$item[$column]}}</span> --}}
                                        </td>
                                        @break

                                    @case('builder_id')
                                        <td class="col-1">
                                            <?php

                                                if( $class_name === "product" ){
                                                    $builders->where('builder_id', $item[$column] )->first( function( $value, $key ){
                                                        echo $value['builder'];
                                                    });
                                                }
                                                else{
                                                  echo "<span>{$item[$column]}</span>";
                                                }

                                            ?>
                                        </td>

                                        @break


                                    @case('cat_parent')
                                        <td>
                                            <?php
                                                /*
                                                $categorys->where('cat_id', $item[$column] )->first( function( $value, $key ){
                                                    echo $value['cat'];
                                                })
                                                */
                                            ?>
                                        </td>

                                        @break


                                    {{-- @case('categorys')
                                        <td class="col" style="font-size: 12px;">

                                            @switch( gettype( $item[$column] ) )
                                                @case('NULL')
                                                    @break

                                                @case('array')

                                                    @foreach ( $item[$column] as $c)
                                                        {{ $categorys->where('cat_id', $c)->first()->cat }}<br />
                                                    @endforeach

                                                    @break


                                                @case('integer')
                                                    {{ $item[$column] }}
                                                    @break


                                                @default
                                                    @break

                                            @endswitch

                                        </td>
                                        @break --}}


                                    @case('categorys_json')
                                        <td class="col" style="font-size: 12px;">

                                            <?php
                                                $cats = json_decode($item[$column]);

                                                // echo gettype($cats);
                                                // print_r($cats);
                                            ?>

                                            <?php
                                                // $b_id = $item->builder_id;
                                                // $b = _builder::where('builder_id', $b_id)->value('builder');
                                            ?>

                                            {{-- <a href="{{ route( 'products.index' ) }}?filter_builder={{$b_id}}">{{$b}}</a> --}}



                                            @switch( gettype($cats) )
                                                @case('NULL')
                                                    @break

                                                @case('object')
                                                    @foreach ($cats as $c1 => $c2)
                                                        <?php $c = _category::where('cat_id', $c1)->first()->cat ?>

                                                        @if ( $c2 > 0 )
                                                            ><a href="{{ route( 'products.index' ) }}?filter_builder={{$b_id}}&filter_category={{$c1}}">{{$c}}({{$c2}})</a> <br />
                                                        @endif

                                                    @endforeach

                                                    @break
                                                @default

                                            @endswitch











                                            @switch( gettype( $item[$column] ) )
                                                @case('NULL')
                                                    @break

                                                @case('array')

                                                    @foreach ( $item[$column] as $c)
                                                        {{-- {{ $categorys->where('cat_id', $c)->first()->cat }}<br /> --}}
                                                        a => {{ $c }} <br />
                                                    @endforeach

                                                    @break


                                                @case('integer')
                                                    i => {{ $item[$column] }}
                                                    @break


                                                @default
                                                    {{-- d => {{ $item[$column] }} --}}
                                                    @break





                                            @endswitch

                                        </td>
                                        @break

                                    @default
                                        <td>
                                            {{-- <span>{{$column}}</span><br /><br /> --}}
                                            <span>{{$item[$column]}}</span>
                                        </td>
                                        @break

                                @endswitch
                        @endforeach

                        <td class="text-center">
                            <form action="{{ route($class_names.'.destroy', $item->id) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                {{--
                                <a href="{{ route($class_names.'.show', $item->id) }}" title="show">
                                    <i class="fas fa-eye text-success  fa-lg"></i>
                                </a>
                                <br />
                                --}}

                                <a href="{{ route($class_names.'.edit', $item->id) }}">
                                    <i class="fas fa-edit  fa-lg"></i>
                                </a>
                                <br />

                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                    <i class="fas fa-trash fa-lg text-danger"></i>
                                </button>
                                <br />

                            </form>

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>



        {{--
        <div class="row">
            <table class="table table-bordered table-responsive-lg">

                <tr>
                    <th>Index</th>
                    <th>Client ID</th>
                    <th>Logo</th>
                    <th>Company</th>
                    <th>Site ID</th>
                    <th>Site</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Country</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th width="280px">Actions</th>
                </tr>


                @foreach ($clients as $client)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $client->id }}</td>

                        <td> <img src="{{ $client->logo }}" alt=""> </td>

                        <td>{{ $client->company }}</td>

                        <td>{{ $client->site_id }}</td>
                        <td></td>

                        <td>{{ $client->street }}</td>
                        <td>{{ $client->city }}</td>
                        <td>{{ $client->state }}</td>
                        <td>{{ $client->zip }}</td>
                        <td>{{ $client->country }}</td>

                        <td>{{ date_format( $client->created_at, 'jS M Y') }}</td>

                        <td>{{ date_format( $client->updated_at, 'jS M Y') }}</td>

                        <td>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST">

                                <a href="{{ route('clients.show', $client->id) }}" title="show">
                                    <i class="fas fa-eye text-success  fa-lg"></i>
                                </a>

                                <a href="{{ route('clients.edit', $client->id) }}">
                                    <i class="fas fa-edit  fa-lg"></i>

                                </a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                    <i class="fas fa-trash fa-lg text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        --}}


        <div class="row">
            {{ $items->links() }}
        </div>



    </div>

@endsection
