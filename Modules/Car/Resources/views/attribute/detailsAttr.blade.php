@extends('layouts.app')

@section('content')
   
<div class="col-md-8 offset-md-2">

     <div class="d-flex justify-content-between mb20">
      <h2 class="title-bar">{{$attribute->id ? __('Edit: ').$attribute->name : __("Add New Attributes")}}</h2>
    </div> 
    <br/>
        <!-- message flash-->
        @include('layouts.messageFlash')
            <!-- message flash-->
    <div class="panel" style="padding:15px;">
        <div class="card-header" style="margin-bottom:15px;">{{ __('Add Attribute')}}</div>
            <div class="panel-body" style="padding:15px;">
                <form action="{{route('attribute.store')}}" method="post">
                        @csrf
                    <input type="hidden" name="id" value="{{$attribute->id}}">
                    <div class="form-group">
                        <label>{{__("Name")}}</label>
                        <input type="text"  value="{{old('name',$attribute->name ?? '')}}" placeholder="{{__("Attribute name")}}"  name="name"  required  class="form-control">                                       
                    </div>                           
                    <div class="">
                        <button class="btn btn-primary" type="submit">  <i class="fa fa-save"></i>  {{__("Save change")}}</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

</div>
@endsection                      