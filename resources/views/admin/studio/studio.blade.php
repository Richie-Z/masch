@extends('layouts.app')
@section('title','Studio')
@section('content')
<?php $no=1;?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Studio') }}
                 <div style="float: right;">
                        <a href="/admin/studio/add" class="btn btn-outline-dark btn-sm">+</a>
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
                            <tr align="center">
                                <th width="5%">No.</th>
                                <th>Name Studio</th>
                                <th>Name Branch</th>
                                <th>Basic Price</th>
                                <th>Aditional Friday Price</th>
                                <th>Aditional Saturay Price</th>
                                <th>Aditional Sunday Price</th>
                                <th width="15%">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studio as $s)
                            <tr align="center">
                                <td>{{$no++}}</td>
                                <td>{{$s->name}}</td>
                                <td>{{$s->name_branch}}</td>
                                <td>{{$s->basic_price}}</td>
                                <td>{{$s->aditional_friday_price}}</td>
                                <td>{{$s->aditional_saturday_price  }}</td>
                                <td>{{$s->aditional_sunday_price}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a href="/admin/studio/edit/{{$s->id}}" class="btn btn-warning btn-sm">
                                        Edit
                                      </a>
                                      <a href="/admin/studio/delete/{{$s->id}}" onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger btn-sm">
                                        Hapus
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
