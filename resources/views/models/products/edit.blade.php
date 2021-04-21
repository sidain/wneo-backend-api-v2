@extends('layouts.base')

@section('scripts1')
@endsection

@section('styles1')
    <style>
        .img_img{ width: 300px;}

        .drop-zone{
            max-width: 400px;
            height: 400px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            cursor: pointer;
            color: lightgray;
            border: 4px dashed #000;
            border-radius: 10px;
        }

        .drop-zone-over{
            border-style: solid;
        }


        .drop-zone-thumb{
            width: 100%;
            height: 100%;
            border-radius: 10px;
            overflow: hidden;
            /* background-color: #cccccc; */
            /* background-size: cover; */
            background-size: contain;
            background-position: center;
            background-repeat:no-repeat;
            position: relative;
        }

        /*
        .drop-zone-thumb::after{
            content: attr(data-label);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 5px;color: #ffffff;
            background: rgba(0, 0, 0, 0.75);
            font-size: 14px;
            text-align: center;
        }
        */

        .drop-zone-input{
            display: none;
        }
    </style>
@endsection

@section('content1')
    <?php
        use App\Models\_builder;
        use App\Models\_category;
        use App\Models\_product;
        use App\Models\_image;

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


    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Edit {{ucfirst($class_name)}}</h2>
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

        <div class="row border rounded p-5">
            <form id="product-edit-page" class="" action="{{ route($class_names.'.update', $_item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                @method('PUT')

                <input type="hidden" name="id" value="{{ $_item->id}}">

                <div class="row">

                    @foreach ($columns as $column)
                        @switch($column)
                            @case('name')

                            @case('id')
                            @case('product_id')
                            @case('product_name')
                            @case('part_number')

                            @case('status')

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
                            @case('categorys')
                            @case('categorys_json')

                            @case('collection')
                            @case('collections')

                            @case('category_id')
                            @case('category_ids')

                            @case('price_msrp')
                            @case('price_srp')
                            @case('price_other')

                            @case('image1_id')
                            @case('image1_thumb')
                            @case('image2')
                            @case('image2_thumb')
                            @case('image3')
                            @case('image3_thumb')

                            @case('alt_text')
                            @case('caption_text')
                            @case('search_text')
                            @case('excerpt_text')

                            @case('description')
                            @case('excerpt')
                            @case('builder_id')
                                @break

                            @case('categorys')
                                @break

                            @case('image1')
                                @break

                            @default

                                <div class="row mb-3">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ucfirst($column)}}:</strong>

                                            <input type="text" name="{{$column}}" class="form-control" placeholder="{{ucfirst($column)}}" value="{{$_item[$column]}}">

                                        </div>
                                    </div>
                                </div>

                        @endswitch
                    @endforeach

                    <div class="row mb-3">
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12"> --}}
                        <div class="col">
                            <div class="drop-zone">
                                <span class="drop-zone-promt">Drop file here or click to upload</span>

                                {{-- <div class="drop-zone-thumb" data-label="my-file.txt"></div> --}}

                                <input type="file" name="image_file" id="image_file" class="drop-zone-input">
                            </div>

                            <div>
                                <button>Browse</button>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row mb-3">
                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">
                                        <strong>Builder:</strong>
                                        <div class="input-group">
                                            <label for="" class="input-group-text" for="builder_id">Builder</label>

                                            <select class="formx-selectx" name="builder_id" id="builder_id">
                                                @foreach ($builders as $b)
                                                    <option value="{{$b['builder_id']}}"  <?php if( $b['builder_id'] == $_item['builder_id'] ){ echo "selected"; }  ?> >
                                                        {{$b['builder']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="product_name" class="form-control" placeholder="Name" value="{{$_item->product_name }}">


                                    </div>
                                </div>
                            </div>



                            <div class="row mb-3">
                                {{-- <div class="col-xs-12 col-sm-12 col-md-12"> --}}
                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>Part Number:</strong>

                                        <input type="text" name="part_number" class="form-control" placeholder="Part Number" value="{{$_item['part_number']}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>Product ID:</strong>

                                        <input type="text" name="product_id" class="form-control" placeholder="Product ID" value="{{$_item['product_id']}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Description:</strong>

                                        {{-- <input type="text" name="{{$column}}" class="form-control" placeholder="Part Number" value="{{$_item['description']}}"> --}}

                                        <textarea name="description" id="description" class="form-control rounded" rows="10" placeholder="Description">
                                            {{$_item['description']}}
                                        </textarea>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Categorys:</strong>

                                <div class="border p-2 pl-4">
                                    <?php
                                        $cats_json = json_decode($_item['categorys_json']);

                                        if ( gettype( $cats_json ) !== 'NULL' ) {

                                            $cats = _category::whereIn('cat_id', $cats_json )->get();

                                            $cats_other = _category::whereNotIn('cat_id', $cats_json )->get();
                                        }
                                        else{
                                            $cats = [];
                                            $cats_other = _category::orderBy('cat')->get();
                                        }
                                    ?>

                                    @foreach ($cats as $c)
                                        @if( $loop->first )
                                            <div class="row">
                                        @endif

                                                <div class="form-check form-check-inline col-3">
                                                    <input class="form-check-input" name="categorys_json[]" type="checkbox" id="{{$c->cat_id}}"
                                                        value="{{$c->cat_id}}" checked>

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





                                    @foreach ($cats_other as $cc)
                                        @if( $loop->first )
                                            <div class="row">
                                        @endif

                                                <div class="form-check form-check-inline col-3">
                                                    <input class="form-check-input" name="categorys_json[]" type="checkbox" id="{{$cc->cat_id}}"
                                                        value="{{$cc->cat_id}}" >

                                                    <label class="form-check-label" for="{{$cc->cat_id}}">
                                                        {{$cc->cat}}
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


                                    {{--
                                    <div class="input-group">
                                        <label for="" class="input-group-text" for="{{$column}}">Categorys</label>
                                        <select class="formx-selectx" name="{{$column}}" id="{{$column}}">
                                            @foreach ($builders as $builder)
                                                <option value="{{$builder['id']}}">
                                                    {{$builder['name']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    --}}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

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

@section('scripts2')
    <script>
        document.querySelectorAll('.drop-zone-input').forEach( inputElement => {
            const dropZoneElement = inputElement.closest('.drop-zone');

            dropZoneElement.addEventListener( 'click', e =>{
                inputElement.click();
            });

            inputElement.addEventListener( 'change', e =>{
                if ( inputElement.files.length > 0 ) {
                    updateThumbnail(dropZoneElement, inputElement.files[0] );
                }
            });


            dropZoneElement.addEventListener( "dragover", e => {
                e.preventDefault();
                dropZoneElement.classList.add('drop-zone-over');
            });

            ['dragleave', 'dragend' ].forEach( type => {

                dropZoneElement.addEventListener(type, e =>{
                    dropZoneElement.classList.remove('drop-zone-over');
                });
            });

            dropZoneElement.addEventListener( "drop", e => {
                e.preventDefault();

                if ( e.dataTransfer.files.length > 0  ) {
                    inputElement.files = e.dataTransfer.files;

                    updateThumbnail( dropZoneElement, e.dataTransfer.files[0] );
                }

                dropZoneElement.classList.remove('drop-zone-over');
            });

            <?php
                if ( strlen( $_item->image1_id ) > 0  ) {
                    $image = _image::where( 'image_id', $_item->image1_id )->value('image_url');
                    $image= asset( $image );


                    echo("console.log('test', \"{$image}\" );\n");
                    echo("updateThumbnail( dropZoneElement, null, '{$image}' );\n");
                    // echo("updateThumbnail( dropZoneElement, null, '/app{$_item['image1']}' );\n");
                }
            ?>
        });





        /**
        *Updates the thumbnail on a drop zone
        *
        * @param (HTMLElement) dropZoneElement
        * @param (File) file
        */
        function updateThumbnail( dropZoneElement, file, serverFile=null){
            let thumbnailElement = document.querySelector('.drop-zone-thumb');

            // if prompt present, remove it
            if( dropZoneElement.querySelector('.drop-zone-promt')  ){
                dropZoneElement.querySelector('.drop-zone-promt').remove();
            }


            // create thumb DIV if not present
            if (  !thumbnailElement ) {
                thumbnailElement = document.createElement('div');
                thumbnailElement.classList.add('drop-zone-thumb');
                dropZoneElement.appendChild(thumbnailElement);
            }



            //show thumbnail for image files
            if ( serverFile !== null) {
                thumbnailElement.style.backgroundImage = `url("${serverFile}")`;
            }else if( file.type.startsWith("image/") ) {
                const reader = new FileReader();

                thumbnailElement.dataset.label = file.name;

                reader.readAsDataURL(file);
                reader.onload = () => {
                    thumbnailElement.style.backgroundImage = `url("${reader.result}")`;
                }
            }else{
                thumbnailElement.style.backgroundImage = null;
            }
        }
    </script>
@endsection
