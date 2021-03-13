@extends('layouts.app')
@section('title','Schedule')
@section('content')
<?php $no=1;

?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Schedule') }}
                    <div style="float: right;">
                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#myModal">Filter</button>
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Filter</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                   <form method="get" action="/schedule/filter">
                                    <div class="form-group">
                                        <label for="branch">Branch</label>
                                        <select required class="form-control" name="branch" id="branch">
                                            @foreach($branch as $s)
                                            <option value="{{$s->id}}">{{$s->name_branch}}</option>
                                            @endforeach
                                        </select>
                                        <label for="date">Date</label>
                                        <input required id="date" type="date" name="date" class="form-control">
                                        <center>
                                            <br>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </center>

                                    </div>
                                </form>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
              </div>
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
                    <th>Movies</th>
                    <th>Price</th>
                    <th id="aaa" colspan="">Start Time</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($schedule->isEmpty()){ 
                    ?><tr align="center"><td colspan="5">No Data</td></tr> 
                    <?php
                }
                $aa="0";
                $count2 = 0;
                ?>
                @foreach($schedule as $s)
                <?php $start=date('H:i:s',strtotime($s->start));
                $end=date('H:i:s',strtotime($s->end));
                $count2++;
                ?>


                    <?php 
                        $val=$s->movie_name.$s->price; 
                        ?> 
                        <?php
                        if ($val != $aa) {
                            $count= 1;
                             ?></tr><tr align="center">
                                <td>{{$no++}}</td>
                                <td>{{$s->movie_name}}</td>
                                <td >{{$s->price}}</td>
                                <td id="element_<?php echo $count;?>" colspan="100%">{{$start}}</td> <?php
                             $aa= $val; 
                        }else{
                            $count++;
                             ?> 
                            <script type="text/javascript">
                                $('#aaa').attr({"colspan":"<?php echo $count;?>"})
                                $('#element_<?php echo $count;?>').attr({"colspan":"<?php echo $count;?>"})
                                console.log("count2 : <?php echo $count2;?>")
                            </script> 
                            <td>{{$start}}</td> <?php
                        } 
                     ?>
                     @endforeach
                 </tbody>
             </table>
         </div>
     </div>
 </div>
</div>
</div>
@endsection