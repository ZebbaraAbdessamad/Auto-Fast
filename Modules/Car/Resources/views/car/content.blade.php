
@section('header')
<!-- include summernote css/js    textarea -->
<link href="{{asset('/textarea/summernote.min.css')}}" rel="stylesheet">
<script src="{{asset('/textarea/summernote.min.js')}}"></script>
@endsection


<div class="panel" style="padding: 20px;">
    <div class="card-header"><strong>{{__("Car Content")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
        <br/>
            <label class="control-label">{{__("Title")}} :</label>
            <input type="text" value="{{old('title',$car->title ?? '')}}" placeholder="{{__("Name of the car")}}" name="title" class="form-control @if($errors->get('title')) has-error @else has-success @endif">
            @if($errors->get('title'))
                <div class="text-danger" >
                    <ul style="list-style-type: none;">
                        @foreach($errors->get('title') as $message)
                        <li>{{$message}}</li>
                        @endforeach
                </ul>	
                </div>
            @endif

        </div>
        <div class="form-group">
            <label class="control-label" >{{__("Content")}} :</label>
            <div class="border border-light">
                <textarea id="froala-editor" class="summernote" name="content" cols="30" rows="10"> {{old('content',$car->content ?? '')}}</textarea>
                @if($errors->get('content'))
                <div class="text-danger" >
                    <ul style="list-style-type: none;">
                    @foreach($errors->get('content') as $message)
                        <li>{{$message}}</li>
                        @endforeach  
                   </ul>	
                </div>
                @endif
            </div>
        </div>
       
            <div class="form-group">
                <label  class="control-label">{{__("Youtube Video")}} :</label>
                <input type="text" name="video" class="form-control" value="{{old('video',$car->vedio ?? '')}}" placeholder="{{__("Youtube link video")}}">
            </div>
      
        <!-- <div class="form-group-item">
        
            <div class="text-right">
                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" __name__="faqs[__number__][title]" class="form-control" placeholder="{{__('Eg: Can I bring my pet?')}}">
                        </div>
                        <div class="col-md-6">
                            <textarea __name__="faqs[__number__][content]" class="form-control" placeholder=""></textarea>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        
            <div class="form-group">
                <label>Gallery</label>
                <br/>
            <input type="file" id="files" name="files[]" multiple  class="inputfile2"/>
             <label for="files"  style="margin-bottom: -7px;"><strong> <i class="fa fa-plus-circle" style="font-size:15px;"></i> {{__('Select images')}}</strong></label> 
                
            </div>
                    
            @if($errors->get('files'))
            <div class="text-danger" >
                <ul style="list-style-type: none;">
                    @foreach($errors->get('files') as $message)
                    <li>{{$message}}</li>
                    @endforeach
            </ul>	
            </div>
            @endif

            <div class="form-group-item" >
                <div class="row">
                   @if(!empty($car->id))
                        @foreach($images as $image)
                            <div class=" col-md-3">       
                            <img src="{{asset('images/Car/Gallery/'.$image->image_name)}}" class=" img-thumbnail img-responsive" style="width: 200px; height:120px;">
                            <a style="margin-top: -68px; margin-left:7px; padding:5px;" href="{{route('car.destroy_image',['id'=>$image->id])}}" class="btn btn-danger sm-btn" > <i class="fa fa-trash"></i></a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
         
         
    </div>
</div>


    <div class="panel" style="margin-top: 20px; margin-bottom:20px; padding:20px;">
        <div class="card-header "><strong>{{__("Extra Info")}}</strong></div>
        <br/>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__("Passenger")}}</label>
                        <input type="number" value="{{old('passenger',$car->passenger ?? '')}}" placeholder="{{__("Example: 3")}}" name="passenger" class="form-control @if($errors->get('passenger')) has-error @else has-success @endif">
                        @if($errors->get('passenger'))
                        <div class="text-danger" >
                            <ul style="list-style-type: none;">
                            @foreach($errors->get('passenger') as $message)
                            <li>{{$message}}</li>
                            @endforeach
                        </ul>	
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__("Gear Shift")}}</label>
                        <input type="text" value="{{old('gear',$car->gear ?? '')}}" placeholder="{{__("Example: Auto")}}" name="gear" class="form-control @if($errors->get('gear')) has-error @else has-success @endif">
                        @if($errors->get('gear'))
                        <div class="text-danger" >
                            <ul style="list-style-type: none;">
                            @foreach($errors->get('gear') as $message)
                            <li>{{$message}}</li>
                            @endforeach 
                        </ul>	
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__("Baggage")}}</label>
                        <input type="number" value="{{old('baggage',$car->baggage ?? '')}}" placeholder="{{__("Example: 5")}}" name="baggage" class="form-control @if($errors->get('baggage')) has-error @else has-success @endif">
                        @if($errors->get('baggage'))
                        <div class="text-danger" >
                            <ul style="list-style-type: none;">
                            @foreach($errors->get('baggage') as $message)
                            <li>{{$message}}</li>
                            @endforeach 
                        </ul>	
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__("Door")}}</label>
                        <input type="number" value="{{old('door',$car->door ?? '')}}" placeholder="{{__("Example: 4")}}" name="door" class="form-control @if($errors->get('door')) has-error @else has-success @endif">
                        @if($errors->get('door'))
                        <div class="text-danger" >
                            <ul style="list-style-type: none;">
                            @foreach($errors->get('door') as $message)
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
 @section('footer')
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