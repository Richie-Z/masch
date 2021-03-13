@extends('layouts.app')
@section('title','Edit Movie')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Movies') }}
                 
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
                    <form method="post" action="/admin/movie/update/{{$movie->id}}" enctype="multipart/form-data"> 
                        @csrf
                        <div class="form-group">
                            <label for="Name">Name Movie</label>
                            <input required type="text" class="form-control" name="name" value="{{$movie->name}}">
                            <label for="Minute">Minute Lenght</label>
                            <input required type="number" class="form-control" name="minute" value="{{$movie->minute_lenght}}">
                            <label for="img">Poster</label><br>
                            <input type="file" name="file" value="{{url('image/'.$movie->picture_url)}}">
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
