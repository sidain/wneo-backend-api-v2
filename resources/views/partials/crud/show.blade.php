@extends('layouts.base')


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

    <div class="container mt-5">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Showing {{ucfirst($class_name)}}</h2>
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


                <div class="row">
                    @foreach ($columns as $column)
                        @switch($column)
                            @case('')
                                @break
                            {{--
                            @case('id')
                                @break
                            @case('_json')
                                @break
                            @case('created_at')
                                @break
                            @case('updated_at')
                                @break
                            @case('logo')
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ucfirst($column)}}:</strong>
                                        <input type="text" name="{{$column}}" class="form-control" placeholder="{{ucfirst($column)}}" value="{{$_item[$column]}}">
                                        <button>Upload</button>
                                    </div>
                                </div>

                                @break
                             --}}

                            @default
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ucfirst($column)}}:</strong>
                                    <input type="text" name="{{$column}}" class="form-control" placeholder="{{ucfirst($column)}}" value="{{$_item[$column]}}">
                                    </div>
                                </div>

                        @endswitch
                    @endforeach
                </div>

        </div>


    </div>

@endsection
