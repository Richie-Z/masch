@extends('layouts.app')
@section('title','Home')
@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                   Hello, {{Auth::user()->name }}
                   <br>
                   You are a {{Auth::user()->role}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
