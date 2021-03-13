@extends('layouts.app')
@section('title','Movie')
@section('content')
<?php $no=1;?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Movie') }}
                 <div style="float: right;">
                        <a href="/admin/movie/add" class="btn btn-outline-dark btn-sm">+</a>
                </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th width="25%">Name Movies</th>
                                <th width="20%">Minute Lenght</th>
                                <th>Poster</th>
                                <th width="15%">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movie as $m)
                            <tr>
                                <td align="center">{{$no++}}</td>
                                <td>{{$m->name}}</td>
                                <td>{{$m->minute_lenght}} minute</td>
                                <td align="center"><img width="150px" src="{{url('/image/'.$m->picture_url)}}"></td>
                                <td align="center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a href="/admin/movie/edit/{{$m->id}}" class="btn btn-warning btn-sm">
                                        Edit
                                      </a> 
                                      <a href="/admin/movie/delete/{{$m->id}}" onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger btn-sm">
                                        Delete
                                      </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
