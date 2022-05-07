@extends('layouts.app')

@section('content')

    <!-- message flash-->
    @include('layouts.messageFlash')

    <div class="container-fluid">
        <h2 class="title-bar">{{__('All Cars')}}</h2>
        <br/>
                <div class="filter-div d-flex justify-content-between ">
                        <div class="col-left">
                            <a href="{{route('car.create')}}" class="btn btn-primary">Add new car</a>
                        </div>
                    <!--  search-->
                    <div class="col-left">
                        <form action="{{route('car.index')}}" method="GET" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                            <input type="text" name="name" placeholder="{{__('Search by name')}}" class="form-control" required style="margin-right: 10px; width:200px;" />
                            <button type="submit"  class="btn-info btn btn-icon btn_search" style="display: flex; margin-right:10px;">{{__('Searchs')}}</button>
                        </form>
                    </div>
                </div>
                
                   <br/>
                <div class="text-right" style="margin-right:5px;">

                <p><i>{{__('Found :total items',['total'=>$cars->total()])}}</i></p>
                </div>

                <div class="panel" style="padding: 10px;">
                    <div class="panel-body">
                            <form action="" class="bravo-form-item">
                                <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr style="background-color: #f3f3f3">
                                                <th width="60px">{{__('N°')}}</th>
                                                <th  width="100px"> Name</th>
                                                <th width="100px"> Status</th>
                                                <th width="100px"> Date</th>
                                                <th width="100px"> Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                            $a=1;
                                            @endphp
                                                @if(!empty($cars))
                                                    @foreach($cars as $car)
                                          
                                                        <tr class="{{$car->status}}">
                                                           <td>{{$a++}}</td>
                                                            <td class="title"> <a href="{{route('car.edit',['id'=>$car->id])}}">{{$car->title}}</a>  </td>
                                                            <td>
                                                                @if($car->status=='publish')
                                                                <span class="badge badge-success" style="font-size: 15px; width:70px;">{{__('publish')}}</span>
                                                                @elseif($car->status=='blocked')
                                                                <span class="badge badge-secondary" style="font-size: 15px; width:70px;">{{__('blocked')}}</span>
                                                                @endif
                                                            </td>
                                                            <td>{{$car->created_at}}</td>
                                                            <td> <a href="{{route('car.edit',['id'=>$car->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit  </a>
                                                            <button data-id='{{$car->id}}'  data-toggle="modal" data-target="#logX"  type="button" class="btn btn-danger btn-sm delete_car"><i class="fa fa-trash"></i> delete</button>
                                                            </td>
                                                        </tr>
                                                                                
                                                        @endforeach
                                            @endif                                            
                                            </tbody>
                                    </table>
                                            {{ $cars->links() }}
                                </div>
                            </form>
                        
                    </div>
                </div>
       </div>

<br/>
  <!--panel delete -->

  <div class="modal" id="logX">
            <div class="col-md-5 container my-5 ">
                <div class="card" style=" width:auto; height:auto;  ">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                            <div class="bootbox-body">Do you want to delete?</div>
                                </div>
                                <div class="modal-footer">
                                        <form method="POST"action="{{route('car.delete')}}">

                                        @csrf
                                        <input type="hidden" name='id' id="id_hidden_del" value="">
                                        <button type="submit" class="btn btn-primary bootbox-accept"><i class="fa fa-check"></i> Confirm</button>
                                
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                 </div>
                            </div>
                    </div>
                </div>
            </div>

        <!--panel delete -->

@endsection

@section('footer')
<!-- script textarea -->
        <script>

$('.delete_car').on('click',function (params) {
            
            $('#id_hidden_del').val($(this).data('id'))
        })

        </script>

@endsection