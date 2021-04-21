@extends('layouts.base')

@section('content1')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                <livewire:wneo-welcome />
                {{-- @livewire('wneo-welcome') --}}
            </div>
        </div>
    </div>
@endsection
