@extends('layouts.base')

@section('styles1')
    <style>
        .prod_img{
            /* width: 64px; */
            height: 64px;
        }
    </style>
@endsection



@section('content1')
     <div class="  m-0 p-5" id='app' name='app'>
     {{-- <div class="container" id='app' name='app'> --}}
     {{-- <div class="" id='app' name='app'> --}}

        <div class="row d-none">
            <div>
                <?php
                    use App\Models\_builder;
                    use App\Models\_category;
                    use App\Models\_product;
                    use App\Models\_image;

                    // $builders;
                    // $categorys;


                    // $_class = $_item;
                    $table = $_class->getTable();
                    $columns = \Schema::getColumnListing($table);

                    $class_name = get_class($_class);
                    $class_name = explode( "\\", $class_name);
                    $class_name = $class_name[count($class_name)-1];

                    $class_name = str_replace('_', '', $class_name);
                    $class_names = $class_name."s";
                ?>

                <pre>
                    {{-- {{ print_r( $categorys, true ) }} --}}
                    {{-- {{ var_dump( $categorys->find(1)  ) }} --}}

                    {{-- {{ dd($categorys) }} --}}
                    {{-- {{ dd($categorys[0]->cat_id) }} --}}
                </pre>
            </div>
        </div>

        <div class="row">
            <div class="col-12 m-0 p-0">
                <h2>
                    {{-- Laravel 8 CRUD:: {{$_count}} {{ ucfirst($class_names) }}  , Page ( {{$i}} of {{$page_count}} ) --}}

                    {{$_count}} {{ ucfirst($class_names) }}  , Page ( {{$i}} of {{$page_count}} )
                </h2>
            </div>
        </div>

        {{--
        @section('header')
            <h2 class="ml-5">
                {{$_count}} {{ ucfirst($class_names) }}  , Page ( {{$i}} of {{$page_count}} )
            </h2>
        @endsection
        --}}

        <div class="row mb-2 ">
            <div class="col-12 p-0 m-0 pr-2">
                <form class="form-inline" method="GET">
                    <div class="row gx-1">
                        {{-- @csrf --}}
                        {{-- @method('GET') --}}


                        {{-- perhaps just search for inputed values in either cat or builder --}}
                        {{--
                        <div class="col input-group">
                            <label class="input-group-text" for="filter_builder">Builder::</label>



                            <select class="form-select" id="filter_builder" name="filter_builder">
                                <option selected>Choose...</option>

                                @foreach ($builders as $b)
                                    <option value="{{$b->builder_id}}">{{$b->builder}}</option>
                                @endforeach
                            </select>
                        </div>
                        --}}

                        <div class="col input-group">
                            <label class="input-group-text" for="filter_builder">Builder::</label>

                            <select v-model="filterBuilder" class="form-select" id="filter_builder" name="filter_builder">
                                <option value="">Choose...</option>

                                @foreach ($builders as $b)
                                    <option value="{{$b->builder_id}}" <?php if( $filter_builder == $b->builder_id ){ echo "selected"; } ?> >{{$b->builder}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col input-group">
                            <label class="input-group-text" for="filter_category">Category::</label>

                            <select v-model="filterCategory" class="form-select" id="filter_category" name="filter_category">
                                <option value="">Choose...</option>

                                @foreach ($categorys as $c)
                                    <option value="{{$c->cat_id}}" <?php if( $filter_category == $c->cat_id ){ echo "selected"; } ?>>{{$c->cat}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{--
                        <div class="col input-group">
                            <label class="input-group-text" for="filter_category">Items Per page::</label>

                            <select class="form-select" id="filter_category" name="filter_category">
                                <option value="">Choose...</option>

                                @foreach ($categorys as $c)
                                    <option value="{{$c->cat_id}}" <?php if( $filter_category == $c->cat_id ){ echo "selected"; } ?>>{{$c->cat}}</option>
                                @endforeach
                            </select>
                        </div>
                        --}}

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>

                        <div class="col-auto mr-5">
                            <button  v-on:click="onReset" type="reset" class="btn btn-primary">Reset</button>
                        </div>

                        <div class="col-auto text-right">
                            <a class="btn btn-success" href="{{ route($class_names.'.create')}}" title="Create a new Client">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </div>

                    </div>

                </form>

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

                            @case('name')
                            @case('status')

                            {{-- @case('category_json') --}}
                            @case('collections_json')
                            @case('data_json')
                            @case('price_json')
                            @case('_json')

                            @case('deleted_at')

                            @case('price_msrp')
                            @case('price_srp')
                            @case('price_other')

                            @case('data1')
                            @case('data2')
                            @case('data3')

                            @case('search_text')
                            @case('caption_text')
                            @case('alt_text')
                            @case('excerpt_text')
                            @case('excerpt')

                            @case('category_id')
                            @case('category_ids')

                            @case('categorys')

                            @case('collection')
                            @case('collections')

                            @case('image1')
                            {{-- @case('image1_id') --}}
                            @case('image1_thumb')

                            @case('image2')
                            @case('image2_id')
                            @case('image2_thumb')

                            @case('image3')
                            @case('image3_id')
                            @case('image3_thumb')
                                @break

                            @case('builder_id')
                                @if ($class_name === "product" )
                                    <th>Builder</th>
                                @else
                                    <th>{{ ucfirst($column) }}</th>
                                @endif

                                @break

                            @case('image1_id')
                                @if ($class_name === "product" )
                                    <th>Image</th>
                                @else
                                    <th>{{ ucfirst($column) }}</th>
                                @endif

                                @break

                            @case('categorys_json')
                                <th>Categorys</th>
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
                        <td>
                            {{-- {{++$i}} --}}
                            {{ $loop->index+1 }}
                        </td>

                        @foreach ($columns as $column)
                                @switch($column)
                                    @case('')

                                    @case('name')
                                    @case('status')

                                    {{-- @case('category_json') --}}
                                    @case('collections_json')
                                    @case('data_json')
                                    @case('price_json')
                                    @case('_json')

                                    @case('price_msrp')
                                    @case('price_srp')

                                    @case('data1')
                                    @case('data2')
                                    @case('data3')

                                    @case('search_text')
                                    @case('caption_text')
                                    @case('alt_text')
                                    @case('excerpt_text')
                                    @case('excerpt')


                                    @case('categorys')
                                    @case('category_id')
                                    @case('category_ids')

                                    @case('collection')
                                    @case('collections')

                                    @case('deleted_at')

                                    @case('price_other')

                                    @case('image1')
                                    {{-- @case('image1_id') --}}
                                    @case('image1_thumb')

                                    @case('image2')
                                    @case('image2_id')
                                    @case('image2_thumb')

                                    @case('image3')
                                    @case('image3_id')
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

                                    @case('image1_id')
                                        <?php
                                            $image = _image::where( 'image_id', $item[$column] )->value('image_url');
                                        ?>

                                        <td>
                                            {{-- '{{ $item->image1_id }}' --}}
                                            <img class="prod_img" src="{{asset($image)}}?{{mt_rand()}}" alt="">

                                            {{-- <img class="prod_img" src="/app{{$item[$column]}}?{{mt_rand()}}" alt=""> --}}

                                            {{-- <img class="prod_img" src="{{ $item[$column] }}?{{ time() }}" alt=""> --}}
                                            {{-- <span>{{$item[$column]}}</span> --}}
                                        </td>
                                        @break


                                    @case('builder_id')
                                        <td class="col-1">
                                            <?php
                                                $b_id = $item->builder_id;
                                                $b = _builder::where('builder_id', $b_id)->value('builder');
                                            ?>

                                            <a href="{{ route( 'products.index' ) }}?filter_builder={{$b_id}}">{{$b}}</a>
                                        </td>

                                        @break




                                    @case('categorys_json')
                                        <td class="col" style="font-size: 12px;">

                                            @switch( gettype( $item[$column] ) )
                                                @case('string')
                                                    <?php $cats = json_decode($item[$column]); ?>

                                                    {{-- {{ $item[$column] }}__ --}}
                                                    {{-- {{ print_r($cats, true) }}__ --}}

                                                    @if ( $cats !== null)

                                                        @foreach ( $cats as $c)

                                                            @foreach ($categorys as $cc)
                                                                @if ( $cc->cat_id == $c )

                                                                    > <a href="{{ route( 'products.index' ) }}?filter_category={{$cc->cat_id}}">{{$cc->cat_name}}</a>

                                                                    <br />
                                                                @endif

                                                            @endforeach

                                                        @endforeach

                                                    @endif



                                                    @break


                                                @default
                                                    {{ gettype( $item[$column] ) }} !
                                                    @break

                                            @endswitch

                                        </td>
                                        @break

                                    @default
                                        <td>
                                            {{-- <span>{{$column}}</span> --}}
                                            <span>{{$item[$column]}}</span>
                                        </td>
                                        @break

                                @endswitch
                        @endforeach



                        <td class="text-center">
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


                            <form action="{{ route($class_names.'.destroy', $item->id) }}" method="POST">
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



        {{--
        <div class="row">
            <table class="table table-bordered table-responsive-lg">

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
            {{-- {{ $items->links() }} --}}
            {{ $items->appends(Request::except('page'))->links() }}
        </div>

    </div>

@endsection


@section('scripts2')
    <script>
        //test
        Vue.createApp({
            data(){
                return{
                    message: 'Testing vue',
                    filterBuilder: '{{$filter_builder}}',
                    filterCategory: '{{$filter_category}}',
                }
            },
            methods:{
                onReset: function(){
                    console.log('reset');

                    filterBuilder = filterCategory = '';
                }
            }
        }).mount('#app');

    </script>
@endsection

