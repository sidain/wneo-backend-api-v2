@extends('layouts.base')
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
        // dd(get_defined_vars()['__data']);

        // $_class = new App\Models\_client;

        $_class = $_item;
        $table = $_class->getTable();
        $columns = \Schema::getColumnListing($table);

        $class_name = get_class($_class);
        $class_name = explode( "\\", $class_name);
        $class_name = $class_name[count($class_name)-1];

        $class_name = str_replace('_', '', $class_name);
        $class_names = $class_name."s";
    ?>

    <div class="container mt-5 mb-5">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Edit {{ucfirst($class_name)}}</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route($class_names.'.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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
            <form action="{{ route($class_names.'.update', $_item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                @method('PUT')

                <div class="row">
                    @foreach ($columns as $column)
                        @switch($column)
                            @case('id')
                            @case('_json')
                            @case('created_at')
                            @case('updated_at')
                            @case('deleted_at')
                                @break

                            @case('cat_parent')
                                <div class="row mb-3 mt-3">
                                    <div class="col-xs-12 col-sm-12 col-md-12">

                                        <div class="form-group">
                                            <strong>Category parent:</strong>

                                            <div class="input-group">
                                                <label for="" class="input-group-text" for="{{$column}}">Category parent</label>

                                                <select class="formx-selectx" name="{{$column}}" id="{{$column}}">
                                                    <option value=""></option>

                                                    @foreach ($categorys as $c)
                                                        <option value="{{$c->cat_id}}"  <?php if( $c->cat_id == $_item->cat_parent ){ echo "selected"; }  ?> >
                                                            {{ $c->cat }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                @break



                            @case('logo')
                                {{--
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ucfirst($column)}}:</strong>
                                        <input type="text" name="{{$column}}" class="form-control" placeholder="{{ucfirst($column)}}" value="{{$_item[$column]}}">
                                        <button>Upload</button>
                                    </div>
                                </div>
                                --}}

                                <div class="row mb-3">
                                    <div class="col">
                                        <strong>{{ucfirst($column)}}:</strong>

                                        <div class="drop-zone">
                                            <span class="drop-zone-promt">Drop file here or click to upload</span>
                                            {{-- <div class="drop-zone-thumb" data-label="my-file.txt"></div> --}}
                                            <input type="file" name="{{$column}}" id="{{$column}}" class="drop-zone-input">
                                        </div>
                                    </div>
                                </div>



















                                @break


                            @default
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ucfirst($column)}}:</strong>
                                        <input type="text" name="{{$column}}" class="form-control" placeholder="{{ucfirst($column)}}" value="{{$_item[$column]}}">
                                    </div>
                                </div>

                        @endswitch
                    @endforeach

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>

            </form>

        </div>

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
                if ( strlen( $_item['logo'] ) > 0  ) {
                    echo("console.log('test');\n");
                    echo("updateThumbnail( dropZoneElement, null, '{$_item['logo']}' );\n");
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

            if( dropZoneElement.querySelector('.drop-zone-promt')  ){
                dropZoneElement.querySelector('.drop-zone-promt').remove();
            }

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
