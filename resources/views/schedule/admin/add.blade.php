@extends('layouts.app')
@section('title','Add Schedule')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Schedule') }}
                 
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
                    <form method="post" action="/admin/schedule/store">
                        @csrf
                        <div class="form-group">
                            <label for="movie">Movie</label>
                            <select class="form-control" name="movie" id="movie">
                                @foreach($movie as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                            <label for="studio">Studio</label>
                            <select class="form-control" name="studio" id="studio">
                                @foreach($studio as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                            <label for="start">Start Time</label>
                            <input required id="start" type="datetime-local" name="start" class="form-control">
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
