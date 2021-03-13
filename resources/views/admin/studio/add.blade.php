@extends('layouts.app')
@section('title','Add Studio')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Studio') }}
                 
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
                    <form method="post" action="/admin/studio/store">
                        @csrf
                        <div class="form-group">
                            <label for="Name">Name Studio</label>
                            <input required type="text" class="form-control" name="name" placeholder="Enter a studio name">
                            <label for="branch">Branch</label>
                            <select class="form-control" name="branch" id="branch">
                                @foreach($studio as $s)
                                    <option value="{{$s->id}}">{{$s->name_branch}}</option>
                                @endforeach
                            </select>
                            <label for="Name">Basic Price</label>
                            <input required type="number" class="form-control" name="basic" placeholder="Enter a Basic Price. ex 20000,00">
                            <label for="Name">Aditional Friday Price</label>
                            <input required type="number" class="form-control" name="friday" placeholder="Enter a Aditional Friday Price. ex 20000,00">
                            <label for="Name">Aditional Saturay Price</label>
                            <input required type="number" class="form-control" name="saturday" placeholder="Enter a Aditional Saturay Price. ex 20000,00">
                            <label for="Name">Aditional Sunday Price</label>
                            <input required type="number" class="form-control" name="sunday" placeholder="Enter a Aditional Sunday Price. ex 20000,00">
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
