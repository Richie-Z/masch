@extends('layouts.app')
@section('title','Schedule')
@section('content')
<?php $no=1;?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Schedule') }}
                    <div style="float: right;">
                        <a href="/admin/schedule/add" class="btn btn-outline-dark btn-sm">+</a>
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
                                <th>Name Movies</th>
                                <th>Name Studio</th>
                                <th>Price</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th width="15%">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedule as $s)
                            <?php $start=date('H:i:s',strtotime($s->start));
                            $end=date('H:i:s',strtotime($s->end));?>
                            <tr align="center">
                                <td>{{$no++}}</td>
                                <td>{{$s->movie_name}}</td>
                                <td>{{$s->studio_name}}</td>
                                <td>{{$s->price}}</td>
                                <td>{{$start}}</td>
                                <td>{{$end}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a href="/admin/schedule/edit/{{$s->id}}" class="btn btn-warning btn-sm">
                                        Edit
                                      </a>
                                      <a href="/admin/schedule/delete/{{$s->id}}" onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger btn-sm">
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
