@extends('layouts.app')
@section('header')
<!-- include summernote css/js    textarea -->
<link href="{{asset('/textarea/summernote.min.css')}}" rel="stylesheet">
<script src="{{asset('/textarea/summernote.min.js')}}"></script>

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
    background-color: thistle;
    display: inline-block;
    border-radius: 5px;
    padding: 6px;
    margin-left: 60px;
  
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: burlywood;
}
.inputfile + label {
	cursor: pointer; /* "hand" cursor */
}
.inputfile:focus + label {
	outline: 1px dotted #000;
	outline: -webkit-focus-ring-color auto 5px;
}
.inputfile + label * {
	pointer-events: none;
    text-align: center;
}
</style>

    @endsection
    @section('content')

 



            <!-- Start right Content here -->
            <!-- ============================================================== -->

 <form action="{{route('user.Editeprf')}}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data"> 
    @csrf 

    <div class="container">
               <!-- ========= Titre ========= -->
    <h3 class="title-bar">     {{__('Eidte')}} : {{$user->name}} {{$user->last_name}} </h3>

    <!-- message flash-->
    @include('layouts.messageFlash')
    <!-- message flash-->
         
        <div class="d-flex justify-content-between mb20">  
        </div>
                  <br/>
  
            <div class="row">
                <div class="col-md-9">
                    <div class="panel" style="padding: 25px;">
                        
                        <div class="panel-body">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Name')}}</label>
                                        <input type="text" name="nom"  value="{{old('nom',$user->name) ?? '' }}" placeholder="{{__('your name')}}" class="form-control @if($errors->get('nom')) has-error @endif">

                                            @if($errors->get('nom'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('nom') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                </ul>	
                                                </div>
                                            @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Last name')}}</label>
                                        <input type="text" required  placeholder="{{__('your last name')}}" name="prenom" value="{{old('prenom',$user->last_name) ?? '' }}" class="form-control @if($errors->get('prenom')) has-error @endif"  >
                                    
                                        @if($errors->get('prenom'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('prenom') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                </ul>	
                                                </div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('E-mail')}}</label>
                                        <input type="email" required  name="email" value="{{old('email',$user->email) ?? ''}}" placeholder="{{__('your email')}}" class="form-control @if($errors->get('email')) has-error @endif">
                                    
                                        @if($errors->get('email'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('email') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                </ul>	
                                                </div>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Phone number')}}</label>
                                        <input type="number" required name="tele" value="{{old('tele',$user->phone) ?? ''}}" placeholder="phone number" class="form-control @if($errors->get('tele')) has-error @endif">
                                
                                        @if($errors->get('tele'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('tele') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                </ul>	
                                                </div>
                                        @endif
                                    </div>
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Address')}}</label>
                                        <input type="text" placeholder="your address" name="address" value="{{old('address',$user->address) ?? ''}}" class="form-control @if($errors->get('address')) has-error @endif" required   >
                                
                                        @if($errors->get('address'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('address') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                </ul>	
                                                </div>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Date of Birth')}}</label>
                                      
                                        <input type="date"  placeholder="Date" name="Date" value="@if(isset($user->DateNs)){{old('Date',date('Y-m-d',strtotime($user->DateNs)))}}@else{{old('Date')}}@endif" class="form-control has-datepicker input-group date @if($errors->get('Date')) has-error @endif" id='datetimepicker1'>
                                
                                        @if($errors->get('Date'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('Date') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                </ul>	
                                                </div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('City')}}</label>
                                        <input type="text"  placeholder="your city" name="ville" value="{{old('ville',$user->ville) ?? ''}}" class="form-control @if($errors->get('ville')) has-error @endif">
                                
                                        @if($errors->get('ville'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('ville') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                </ul>	
                                                </div>
                                            @endif
                                    </div>
                                </div>      
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Country')}}</label>
                                       <select required class="custom-select" name="pays"  class="form-control @if($errors->get('pays')) has-error @endif">
                                          @foreach ($countries as $key => $country)
                                         <option  @if(old('pays', $user->pays)==$key) selected @endif  value="{{$key}}">{{ $country}}</option>
                                           @endforeach
                                       </select>
                                
                                        @if($errors->get('pays'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('pays') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                </ul>	
                                                </div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                           
                            
                        </div>
                    </div>
            </div>
                                    <div class="col-md-3">  
                                            <div class="panel" style="padding: 10px;margin-top: 4px;">
                                                    <div class="panel-title">
                                                        <strong style="color:#999;">{{__('Image')}}</strong>
                                                    </div>               
                                                    <div class="panel-body" >
                                                        <div class="form-group">
                                                            <div class="text-center">
                                                                <img src="@if($user->image){{asset('images/User/'.$user->image)}} @else{{asset('images/imght.jpg')}}@endif" style="max-width:100%;height:200px; width:250px; max-height: 100%; margin-bottom:5px; margin-top:3px;"></img>                                          
                                                            </div>
                                                            <input type="file" name="image" id="file" class="inputfile"/>
                                                            <label for="file" style="margin-bottom: -7px;"><strong>Choose file</strong></label>          
                                                        </div>
                                                    </div>
                                            </div>
                                                <br/>
                                            <div class="d-flex justify-content-between">
                                                <span></span>
                                                <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i> Save Change</button>
                                            </div>
                                    </div> 
    </div>
                                                                                    <hr> 
                                                                                    <br/>                             
        </div>

    </form>

                    
         @endsection
         @section('footer')

<!-- bs custom file input plugin -->
<script src="{{asset('assets/libs/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script src="{{asset('assets/js/pages/form-element.init.js')}}"></script>

<!-- script textarea -->
        <script>
        $('.summernote').summernote({
            height:150,
            codemirror:{
                theme:'eclipse'
            }
        });
        </script>



@endsection

