@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @include('start.login')
            </div>
            <div class="col-md-6">
                @include('start.register')
            </div>
        </div>
    </div>
@endsection