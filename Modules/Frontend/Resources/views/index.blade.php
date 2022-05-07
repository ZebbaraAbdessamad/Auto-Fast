@extends('frontend::layouts.master')

@section('content')

<style>
  /*card inner image*/

.inner {
    overflow: hidden;
}

.inner img {
    transition: all 1.5s ease;
}

.inner:hover img {
    transform: scale(1.5);
}

.items {
    text-align: center;
}

</style>

  <div style="max-width:123%; margin-right:-15%; margin-top:-70px; margin-left:-12%;"  >
    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselEampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
      <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100 " src="{{asset('images/Car/Gallery/banner-search-car.jpg')}}" style="width: 100%; height:500px;"  alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h3 style="color:cornsilk; margin-top:-100px;">Welocome To Auto Fast</h3>
              <p>The goal of this page is to facilitate  the service of client or agent ...</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 " src="{{asset('images/Car/Gallery/banner-single.jpg')}}"style=" width: 100%; height:500px;" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <h3 style="color:cornsilk; margin-top:-100px;">Welocome To Auto Fast</h3>
                <p>The goal of this page is to facilitate  the service of client or agent ...</p>
              </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 " src="{{asset('images/Car/Gallery/home-car-bg-1.png')}}" style="width: 100%; height:500px; "alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h3 style="color:cornsilk; margin-top:-100px;">Welocome To Auto Fast</h3>
              <p>The goal of this page is to facilitate  the service of client or agent ...</p>
            </div>
          </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"  data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
        <span class="sr-only" >Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

<br/>
<!-- card -->
<div class="container  justify-content-center"  >

        <h4 class="text-primary  bg-white"style=" width:70%;padding:5px;border-radius:8px;"> Trending used cars</h4> 
       <span>Book incredible things to do around the world.</span>
       <div class="row justify-content-center" >
              @foreach($cars as $car)
        
              <input type="hidden" name="carid" value="{{($car->id)}}">
                <div class="col-lg-3 col-md-6 col-sm-6 " style="padding: 25px">
                  <div class="card shadow " style=" width: 16rem;">
                      <div class="inner">
                        <img src="{{asset('images/Car/'.$car->image)}}"class="card-img-top" alt="card image cap" height="150px" width="200px">
                      </div>
                      <div class="card-body text-center" style="border: 1px #555 ;">
                          <h3 class="card-title" style="color:darkblue; background-color:rgb(241, 241, 241); padding:10px; border-radius:20px;">{{$car->title}} </h3>
                        <h5>From   <span  style=" color: rgb(44, 226, 19);text-align:center;">{{$car->price}}$</span> /day</h5>
                        <div class="row">
                          <div class="col-6"style="font-size: 12px;">   <span style="color:cadetblue;">Gear  </span>{{$car->gear }}</div>
                          <div class="col-6"style="font-size: 12px;">   <span style="color:cadetblue;">Door  </span>  {{$car->door}}</div>
                          <div class="col-6"style="font-size: 12px;">   <span style="color:cadetblue;">Passenger  </span> {{$car->passenger}}</div>
                          <div class="col-6"style="font-size: 12px;">   <span style="color:cadetblue;">Baggage </span>{{$car->baggage}} </div>          
                        </div>
                        <br/>
                          <a href="{{route('frontend.detail',['id'=>$car->id])}}"  class="btn btn-primary">Details</a>   
                      </div>
                  </div>
                </div>
              @endforeach         
       </div>

       <h4 class="text-primary bg-white" style=" width:70%;padding:5px;border-radius:8px;">Browse by categories</h4> 
       <span> Book incredible things to do around the world.</span>
       <i class="input-icon field-icon icon-baggage"></i>
          <div class="row">
              @foreach($composant as $comp)
                <div class="col-lg-3 col-md-6 col-sm-6"> 
                <p class="card-text"><img src="{{asset('images/Car/car type/'.$comp->image_term)}}"></p>
                <h6 style="margin-left:35%;color:cadetblue;margin-top:-6px;"> {{$comp->name}}</h6>
                </div> 
              @endforeach
             </div>
                 
             
            
                   
             
</div>

      <br/>  <br/>
@endsection

@section('footer')

@endsection