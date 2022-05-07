@extends('frontend::layouts.master')

@section('content')

<br/><br/><br/>


<!-- <div style="background-image:url({{asset('images/news-1.jpg')}});margin-top:-10px;margin-left:-9px;margin-right:-300px;">
   <div style="margin-left:24%;margin-right:24%;">
   <img class="img-thumbnail img-responsive"  src="{{asset('images/Car/'.$car->image)}}" style="width:100%; height:400px;  ">
    </div>
</div> -->

<div class="responsive">
<div class="container  justify-content-center" >
    <div class="panel" style="margin-top: -60px; margin-bottom:20px; padding:20px; width:100%;">
      <h3 class="card-header"> {{$car->title}}</h3>
      <br>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <img class="img-thumbnail img-responsive"  src="{{asset('images/Car/'.$car->image)}}" style="width: 100%; height:220px;margin-bottom:10px; ">
        </div> 
      <div class="col-lg-8 col-md-8 col-sm-8">
          <div class="row">
              <div class="col-lg-2 col-md-2 col-sm-2">
                <h5 >car video </h5>  <a href="{{$car->vedio}}"> <div class="btn btn-danger" style="font-size: 20px;padding:3px;width:40px;"><i class="ri-video-fill"></i></div></a>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2">
                <h5>Extra Info</h5>
                  <br/>
                
                  <span style="color:cadetblue;">gear </span>   {{$car->gear}}
                    <hr/>
                    <span style="color:cadetblue;">passenger </span>   {{$car->passenger}}
                    <hr/>
                    <span style="color:cadetblue;"> door </span>   {{$car->door}}
                    <hr/>
                </div> 
                <div class="col-lg-8">
                  <h5>Car Features</h5> 
                    <div class="row">               
                        @foreach( $Composants as $term)
                    
                          @if ($term->attribute_id == 1)
                            <div class="col-lg-4  col-md-6 col-sm-6">
                            {{$term->name}}<br/>
                            <img src="{{asset('images/Car/car component/'.$term->image_term)}}" style="width:35px;height:50px;  margin-bottom:6px; margin-top:1px;"></img>   
                          </div>
                          @endif
                        @endforeach
                    </div>
                    <hr/>
                </div> 
          </div>
      </div>
      @foreach( $guellary as $guel)
          <div class="col-lg-3 col-md-6 col-sm-6">
            <img class=" img-thumbnail img-responsive"  src="{{asset('images/Car/Gallery/'.$guel->image_name)}}" style="max-width: 100%; height:160px; ">
          </div>
        @endforeach
      </div>
    </div>


    <div class="panel" style=" margin-bottom:20px; padding:20px;">
    Description
    </div>
</div>
</div>
@endsection

@section('footer')

@endsection