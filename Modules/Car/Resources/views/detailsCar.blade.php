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



/*button2*/
.inputfile2 {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
   
}
.inputfile2 + label {
    font-size: 1.25em;
    font-weight: 70;
    color: white;
    background-color: #158FCE;
    display: inline-block;
    border-radius: 5px;
    padding: 6px;
    justify-content: center;
   margin-left: 10px;
}

.inputfile2:focus + label,
.inputfile2 + label:hover {
    background-color:#37B3F3;
}
.inputfile2 + label {
	cursor: pointer; /* "hand" cursor */
    text-align: center;
}
.inputfile2:focus + label {
	outline: 1px dotted #000;
	outline: -webkit-focus-ring-color auto 5px;
    text-align: center;
}
.inputfile2 + label * {
	pointer-events: none;
    text-align: center;
}
</style>
@endsection

@section('content')
    <form action="{{route('car.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name='id' value="{{$car->id}}" id="idCar">
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar"> {{$car->id ? __('Edit: ').$car->title : __('Add new car')}} </h1>
                        @if($car->slug)
                        <p class="item-url-demo">{{__("Permalink")}} : {{ url('car' ) }} <a href="#" class="open-edit-input" data-name="slug">{{$car->slug}}</a> </p>
                        @endif
                </div>
                    <div class="">
                            <!-- <a class="btn btn-primary btn-sm" href="" target="_blank">{{__("View Car")}}</a> -->
                    </div>
            </div>
            
           @include('layouts.messageFlash')

            <div class="lang-content-box">
                <div class="row">
                    <div class="col-md-9">
                    @include('car::car.content')
                    @include('car::car.pricing')

                     
                    </div>
                    <div class="col-md-3">
                        <div class="panel" style="padding:10px;">
                            <div class="card-header"><strong>{{__('Satuts')}}</strong></div>
                            <br/>
                            <div class="panel-body" style="padding-left:10px;" >
                                  
                                    <input @if($car->status=='publish') checked @endif type="radio" name="status" value="publish"> 
                                    <label style="width:100px; font-size:15px;"  >{{__("Publish")}}   </label>
                                <br/>
                                <input @if($car->status=='blocked') checked @endif type="radio" name="status" value="blocked"> 
                                    <label  style="width:100px; font-size:15px;" >{{__("blocked")}} </label>
                                   
                                   
                                   
                            
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{__('Save Changes')}}</button>
                                </div>
                            </div>
                        </div>
                    
                          
                            <div class="panel" style="margin-top:15px;padding:10px;">
                                <div class="card-header"><strong>{{__("Availability")}}</strong></div>
                                <br/>
                                <div class="panel-body" style="padding:10px;">
                                            <div class="form-group">
                                                <label class="control-label" style="color:blue;"> <i class="mdi mdi-arrow-right-bold"></i> {{__('Car Featured')}} :</label>
                                                <br>
                                                <label>
                                                    <input  @if($car->is_featured) checked @endif value="1" type="checkbox" name="is_featured" > {{__("Enable featured")}}
                                                </label>
                                            </div>

                                                <div class="form-group">
                                                    <label style="color:blue;"> <i class="mdi mdi-arrow-right-bold"></i>{{__('Is Instant Booking?')}}</label>
                                                    <br>
                                                    <label>
                                                        <input   @if($car->is_instant) checked @endif value="1" type="checkbox" name="is_instant" > {{__("Enable instant booking")}}
                                                    </label>
                                                </div>

                                    <div class="form-group">
                                        <label  class="control-label" style="color:blue;"> <i class="mdi mdi-arrow-right-bold"></i> {{__('Default State')}} :</label>
                                        <br>
                                        <select name="default_state" class="custom-select">
                                            <option value="">{{__('-- Please select --')}}</option>
                                            <option value="1" @if(old('default_state',$car->default_state ?? 0) == 1) selected @endif>{{__("Always available")}}</option>
                                            <option value="0" @if(old('default_state',$car->default_state ?? 0) == 0) selected @endif>{{__("Only available on specific dates")}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @include('car::car.attributes')
                                     <div class="panel" style="padding: 10px;margin-top: 4px; height:260px;">
                                        <div class="card-header">
                                            <strong  >{{__('Feature Image')}}</strong>
                                        </div>
                                        <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="text-center">
                                                        <img src="@if($car->image){{asset('images/Car/'.$car->image)}} @else{{asset('images/default.png')}} @endif" style="max-width:100%;height:150px; width:200px; max-height: 100%; margin-bottom:3px; margin-top:1px;"></img>                                                                                 
                                                    <input type="file" name="image" id="file" class="inputfile"/>
                                                    <label for="file" style="margin-bottom: -7px;"><strong>Choose file</strong></label>             
                                                </div>
                                            </div>
                                     </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br/>
@endsection

