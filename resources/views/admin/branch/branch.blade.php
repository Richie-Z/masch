@extends('layouts.app')
@section('title','Branch')
@section('content')
<?php $no=1;?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Branches') }}
                 <div style="float: right;">
                        <a href="/admin/branch/add" class="btn btn-outline-dark btn-sm">+</a>
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
                                <th>Name Branch</th>
                                <th width="15%">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($branch as $b)
                            <tr>
                                <td align="center">{{$no++}}</td>
                                <td>{{$b->name_branch}}</td>
                                <td align="center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a href="/admin/branch/edit/{{$b->id}}" class="btn btn-warning btn-sm">
                                        Edit
                                      </a>
                                      <a href="/admin/branch/delete/{{$b->id}}" onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger btn-sm">
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
