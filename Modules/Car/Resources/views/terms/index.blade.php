@extends('layouts.app')
@section ('style')
<style>
.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
   
}
.inputfile + label {
    font-size: 1.25em;
    font-weight: 70;
    color: white;
    background-color: #D8D3D2;
    display: inline-block;
    border-radius: 5px;
    padding: 6px;
    justify-content: center;
   margin-left: 10px;
  
  
  
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color:#D5AEA6;
}
.inputfile + label {
	cursor: pointer; /* "hand" cursor */
    text-align: center;
}
.inputfile:focus + label {
	outline: 1px dotted #000;
	outline: -webkit-focus-ring-color auto 5px;
    text-align: center;
}
.inputfile + label * {
	pointer-events: none;
    text-align: center;
}
</style>
@endsection
@section('content')
<div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">Attribute : {{$attribute->name}}</h1>
        </div>
              
        <div class="row">
        
                    <!-- message flash-->
                @include('layouts.messageFlash')
                    <!-- message flash-->

                <div class="col-md-4 mb40">
                    <div class="panel" style="padding:15px; margin-top:60px;">
                        <div class="card-header" style="margin-bottom:15px;">{{$term->id ? __('Edit :  ').$term->name : __("Add terms")}}</div>
                        <div class="panel-body">
                            <form action="{{route('terms.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <input type="hidden" name="id" value="{{$term->id}}">
                                    <input type="hidden" name="id_attr" value="{{$attribute->id}}">
                                    <div class="form-group">
                                        <label>{{__("Name")}}</label>
                                        <input type="text"  value="{{old('name',$term->name ?? '')}}" placeholder="{{__("term name")}}"  name="name"  required  class="form-control">                                       
                                    </div>   
                                    
                                    <label><strong>{{__('Image')}}</strong> </label>
                                    <div class="form-group">
                                        <div class="text-center">
                                            <img src="@if($term->image_term){{asset('images/Car/'.$attribute->name.'/'.$term->image_term)}} @else{{asset('images/default.png')}} @endif" style="max-width:100%;height:150px; width:200px; max-height: 100%; margin-bottom:3px; margin-top:1px;"></img>            
                                            <br/>                                                                     
                                            <input type="file" name="image" id="file" class="inputfile"/>
                                            <label for="file" style="margin-bottom: -7px; margin-top: 10px;"><strong>Choose file</strong></label>             
                                        </div>
                                    </div>                               
                                    <div class="" style="margin-top: 18px;">
                                        <button class="btn btn-primary" type="submit">  <i class="fa fa-save"></i>  {{__("Save change")}}</button>
                                    </div>
                            </form>
                        </div>
                     </div>
                </div>
            <div class="col-md-8">
                    <div class="col-left mt-1">
                        <form method="get" action="{{route('terms.index',['id'=>$attribute->id])}}" class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            <input type="text" name="searsh" value="{{ Request()->searsh}}" class="form-control" placeholder="{{__("Search by name")}}" style="width: 200px;">
                            <button class="btn-info btn btn-icon btn_search ml-2" id="search-submit" type="submit">{{__('Search')}}</button>
                        </form>
                    </div>
                    <br/>
                <div class="panel" style="padding:15px;">
                    <div class="card-header">{{__("All Terms")}}</div>
                    <div class="panel-body">
                        <form class="bravo-form-item">
                            <table class="table table-hover">
                                 <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>{{__("Name")}}</th>
                                        <th class="">{{__("Actions")}}</th>
                                    </tr>
                                   </thead>
                                    <tbody>
                                        @php
                                        $a=1;
                                        @endphp
                                        @if(count($terms) > 0)
                                            @foreach($terms as $term)
                                                <tr>
                                                <td>{{$a++}} </td>
                                                    <td class="title">
                                                        <a href="{{route('terms.edit',['id'=>$term->attribute_id ,'idt'=>$term->id])}}">{{$term->name}}</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('terms.edit',['id'=>$term->attribute_id ,'idt'=>$term->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Edit')}}
                                                        </a>
                                                        <button data-toggle="modal" data-target="#delete_term" data-id='{{$term->id}}'  type="button"  class="btn btn-sm btn-danger delete_Terms"><i class="fa fa-trash"></i> {{__('Delete')}} </button>

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
                            {{ $terms->links() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br/>
        <!--panel delete -->
            <div class="modal" id="delete_term">
                <div class="col-md-5 container my-5 ">
                    <div class="card" style=" width:auto; height:auto;  ">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <div class="bootbox-body">Do you want to delete?</div>
                            </div>
                            <div class="modal-footer">
                                <form method="POST"action="{{route('terms.delete')}}">
                                    @csrf
                                    <input type="hidden" name="id_attr" value="{{$attribute->id}}">
                                    <input type="hidden" name='id' id="id_term" value="">
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
$('.delete_Terms').on('click',function (params) {
            
            $('#id_term').val($(this).data('id'))
        })
        </script>

@endsection