@extends('layouts.base')

@section('content1')
    <?php
        use App\Models\_builder;
        use App\Models\_category;
        use App\Models\_product;

        // $_class = new App\Models\_client;
        $table = $_class->getTable();
        $columns = \Schema::getColumnListing($table);

        $class_name = get_class($_class);
        $class_name = explode( "\\", $class_name);
        $class_name = $class_name[count($class_name)-1];

        $class_name = str_replace('_', '', $class_name);
        $class_names = $class_name."s";

        // use App\Models\_builder;
        // $b = new _builder;
        // $b = $builders;


        // echo "<pre>";
        // var_dump($b); die();
        // echo "</pre>";
    ?>


    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>View {{ucfirst($class_name)}}</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route($class_names.'.index') }}" title="Go back">
                        <i class="fas fa-backward "></i>
                    </a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <form action="{{ route($class_names.'.update', $_item->id) }}" method="POST" >
                @csrf

                @method('PUT')

                <div class="row">
                    @foreach ($columns as $column)
                        @switch($column)
                            @case('id')

                            @case('created_at')
                            @case('updated_at')
                            @case('deleted_at')

                            @case('data1')
                            @case('data2')
                            @case('data3')

                            @case('_json')
                            @case('data_json')
                            @case('price_json')
                            @case('collections_json')
                            @case('category_json')

                            @case('collection')
                            @case('collections')

                            @case('category_id')
                            @case('category_ids')

                            @case('price_msrp')
                            @case('price_srp')
                            @case('price_other')

                            @case('image1_thumb')
                            @case('image2')
                            @case('image2_thumb')
                            @case('image3')
                            @case('image3_thumb')

                            @case('alt_text')
                            @case('caption_text')
                            @case('search_text')
                            @case('excerpt_text')

                            @case('excerpt')
                                @break

                            @case('builder_id')
                                <div class="row mb-3">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Builder:</strong>
                                            <div class="input-group">
                                                <label for="" class="input-group-text" for="{{$column}}">Builder</label>




                                                <select class="formx-selectx" name="{{$column}}" id="{{$column}}" disabled>

                                                    @foreach ($builders as $b)
                                                        @if ( $b['builder_id'] == $_item['builder_id'] )
                                                            <option value="{{$b['builder_id']}}"  <?php if( $b['builder_id'] == $_item['builder_id'] ){ echo "selected"; }  ?> >
                                                                {{$b['builder']}}
                                                            </option>
                                                        @endif
                                                    @endforeach

                                                </select>



                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @break

                            @case('categorys')
                                <div class="row mb-3">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Categorys:</strong>

                                            <div class="border p-2 pl-4">


                                                <?php

                                                    // dd($_item['categorys']);
                                                    // dd( gettype($_item['categorys'])  );

                                                    if ( gettype( $_item['categorys'] ) === 'array' ) {
                                                        $cats = _category::whereIn('cat_id', $_item['categorys'] )->get();
                                                    }
                                                    else{
                                                        $cats = [];
                                                    }
                                                ?>


                                                @foreach ($cats as $c)
                                                    @if( $loop->first )
                                                        <div class="row">
                                                    @endif

                                                            <div class="form-check form-check-inline col-3">
                                                                <input class="form-check-input" name="categorys[]" type="checkbox" id="{{$c->cat_id}}"
                                                                    value="{{$c->cat_id}}" checked disabled>

                                                                <label class="form-check-label" for="{{$c->cat_id}}">
                                                                    {{$c->cat}}
                                                                </label>
                                                            </div>

                                                    @if( ($loop->index +1 ) % 3 === 0 )
                                                        </div>

                                                        <div class="row">
                                                    @endif

                                                    @if( $loop->last )
                                                        </div>
                                                    @endif

                                                @endforeach

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @break




                            @case('image1')
                                 <div class="row mb-3">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ucfirst($column)}}:</strong>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>

                                                <div class="form-file">

                                                    {{-- <input type="file" class="form-file-input" id="inputGroupFile01" --}}
                                                    <input type="file" class="form-file-input" id="{{$column}}"
                                                        aria-describedby="inputGroupFileAddon01" disabled>

                                                    <label class="form-file-label" for="{{$column}}">
                                                        <span class="form-file-text">Choose file...</span>
                                                        <span class="form-file-button">Browse</span>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @break






                            @default
                                <div class="row mb-3">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ucfirst($column)}}:</strong>

                                        <input type="text" name="{{$column}}" class="form-control" placeholder="{{ucfirst($column)}}" value="{{$_item[$column]}}" disabled>

                                        </div>
                                    </div>
                                </div>

                        @endswitch
                    @endforeach

                    {{--
                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    --}}

                </div>

            </form>

        </div>

    </div>

    <div>
        <?php
            // dd($_item['attributes'] );
            // dd( $_item );


        ?>
    </div>

@endsection
