@extends('layouts.app')
@section('title','Add Branch')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Branches') }}
                 
                </div>

                <div class="card-body">
                   @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="/admin/branch/store">
                        @csrf
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input required type="text" class="form-control" name="name" placeholder="Enter a branch name">
                            <center>
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                            </center>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
