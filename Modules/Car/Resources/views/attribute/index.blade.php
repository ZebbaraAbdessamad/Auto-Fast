@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Car Attributes")}}</h1>
        </div>  
        <br/>
          <!-- message flash-->
          @include('layouts.messageFlash')
            <!-- message flash-->
       <div class="row">
            <div class="col-md-12">
                    <div class="filter-div d-flex justify-content-between ">
                            <div class="col-left">
                               <a  href="{{route('attribute.create')}}"  class="btn btn-primary"> <i class="fa fa-plus-circle"></i> {{ __('Add Attribute')}}</a> 
                            </div>
                            <div class="col-left">
                                <form method="get" action="{{route('car.attribute')}}" class="filter-form filter-form-right d-flex justify-content-end" role="search">
                                    <input type="text" name="searsh" value="{{ Request()->searsh}}" class="form-control" placeholder="{{__("Search by name")}}" style="width: 200px;">
                                    <button class="btn-info btn btn-icon btn_search ml-2" id="search-submit" type="submit">{{__('Search')}}</button>
                                </form>
                            </div> 
                    </div>            
                        
                    <br/>
                    <div class="panel" style="padding: 15px;">
                        <div class="card-header">{{__("All Attributes")}}</div>
                        <div class="panel-body">
                            <form class="bravo-form-item">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th width="60px"> N°</th>
                                        <th>{{__("Name")}}</th>
                                        <th class="">{{__("Actions")}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $a=1;
                                    @endphp
                                    @if(count($attributes) > 0)
                                        @foreach($attributes as $attribute)
                                            <tr>
                                                <td>{{$a++}} </td>
                                                <td class="title">
                                                    <a href="{{route('attribute.edit',['id'=>$attribute->id])}}">{{$attribute->name}}</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('attribute.edit',['id'=>$attribute->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Edit')}}</a>
                                                    <button data-toggle="modal" data-target="#delete_Attr" data-id='{{$attribute->id}}'  type="button"  class="btn btn-sm btn-danger delete_attr"><i class="fa fa-trash"></i> {{__('Delete')}} </button>
                                                    <a href="{{route('terms.index',['id'=>$attribute->id])}}" class="btn btn-sm btn-success"> {{__("Manage Terms")}}</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">{{__("No data")}}</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                {{ $attributes->links() }}
                            </form>
                        </div>
                    </div>
                </div>
        </div>
<br/>
  <!--panel delete -->

  <div class="modal" id="delete_Attr">
            <div class="col-md-5 container my-5 ">
                <div class="card" style=" width:auto; height:auto;  ">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                            <div class="bootbox-body">Do you want to delete?</div>
                                </div>
                                <div class="modal-footer">
                                        <form method="POST"action="{{route('attribute.delete')}}">

                                        @csrf
                                        <input type="hidden" name='id' id="id_Attr" value="">
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
$('.delete_attr').on('click',function (params) {
            
            $('#id_Attr').val($(this).data('id'))
        })
        </script>

@endsection