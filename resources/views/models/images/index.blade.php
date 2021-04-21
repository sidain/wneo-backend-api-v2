@extends('layouts.base')

@section('style1')
    <style>
        .bold{ font-weight: bold;}
        .img_img{ width: 300px; }

    </style>
@endsection

@section('content1')
    <div class="container mt-5">
        <div class="row">
            <div>
                <?php
                    use App\Models\_builder;
                    use App\Models\_category;
                    use App\Models\_product;

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

                {{-- {{ app_path() }}<br /> --}}
                {{-- {{ base_path() }}<br /> --}}
                {{-- {{ public_path() }}<br /> --}}
                {{-- {{ resource_path() }}<br /> --}}
                {{-- {{ storage_path() }}<br /> --}}
                {{-- {{ Storage::url('bluefield-bed-with-low-footboard.jpg') }}<br /> --}}
                {{-- {{ asset('storage/products/21806/bluefield-bed-with-low-footboard.jpg') }}<br /> --}}


                {{--
                    http://localhost:8010/storage/products/21781/bluefield-bed-with-low-footboard.jpg
                --}}
            </div>
        </div>

        <div class="row">
            <div class="col-12 margin-tb">
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
            @foreach ($items as $item)
                <div class="col-3 border border-rounded text-center" style="">
                    <div class="row p-2 text-left">
                        {{-- <a href=""><img class="img_img" src="{{$image->url}}" alt=""></a> --}}
                        {{-- {{ asset( $item['image_path'].'/'.$item['image_name'] ) }} --}}
                        {{-- {{ asset( "storage/app/public/products/21806/".$item['image_name'] ) }} --}}
                        {{-- {{ asset($item['image_url']) }} --}}
                        {{-- {{$loop->iteration}}::  --}}

                        ID:: {{ $item->id }}
                        <br />

                        {{-- BUILDER_ID:: {{ $item->image_builder_id }} --}}
                        BUILDER:: {{ _builder::where('id', $item->image_builder_id)->value('builder') }}
                        <br />

                        {{ $item->image_name }}
                    </div>

                    <div class="row">
                        <div class="col">
                            <img class="img_img border" src="{{ asset($item['image_url']) }}" alt="">
                        </div>

                    </div>

                    <div class="row">
                        <pre>
                            {{-- {{ print_r($item, true) }} --}}
                        </pre>
                    </div>
                </div>

            @endforeach
        </div>

        <div class="row">
            {{ $items->links() }}
        </div>

    </div>
{{--
<div class="fluid-container">
    <div class="row gx-5">
        @foreach ($items as $image)
            <div class="col-4 mt-5 mb-5 p-5 border img{{$image->id}}" >
                <span>{{$image}}</span>

                <div class="row">
                    <div class="col">
                        <a href=""><img class="img_img" src="{{$image->url}}" alt=""></a>
                    </div>
                </div>

                <div class="row">
                    <span class="col bold fw-bold">Name::</span>
                    <span class="col">{{$image->name}}</span>
                </div>

                <div class="row">
                    <span class="col bold fw-bold">Path::</span>
                    <span class="col">{{$image->path}}</span>
                </div>

                <div class="row">
                    <span class="col bold fw-bold">URL::</span>
                    <span class="col">{{$image->url}}</span>
                </div>

                <div class="row">
                    <span class="col bold fw-bold">Type::</span>
                    <span class="col">{{$image->type}}</span>
                </div>

                <div class="row">
                    <span class="col bold fw-bold">Created::</span>
                    <span class="col">{{$image->created_at}}</span>
                </div>

                <div class="row">
                    <span class="col bold fw-bold">Update::</span>
                    <span class="col">{{$image->updated_at}}</span>
                </div>

                <div class="row">
                    <span class="col bold fw-bold">Deleted::</span>
                    <span class="col">{{$image->deleted_at}}</span>
                </div>

            </div>
        @endforeach
    </div>
</div>
--}}

@endsection
