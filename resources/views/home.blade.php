@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard. You are logged in as <strong>{{ $role }}</strong>!</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ('teamleader' == $role)
                            @include('dash.teamleader')
                        @else
                            @include('dash.agent')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
