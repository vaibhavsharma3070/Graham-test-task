@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <div class="card">
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @livewire('category')
            </div>
        </div>
    </div>
@endsection