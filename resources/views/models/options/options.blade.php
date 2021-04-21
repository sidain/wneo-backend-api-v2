@extends('layouts.base')

{{-- @section('title', 'Options Page') --}}

@section('sidebar')
    @parent

    <p>
        Options Sidebar, appended to master sidebar
    </p>
@endsection

@section('content')
    <p>This is options body content.</p>
@endsection
