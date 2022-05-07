@extends('layouts.app')

    @section('content')


  
    <form action="{{route('user.store_Role')}}" method="POST">
      @csrf
      <input type="hidden" name='id' value="{{$role->id}}" >
         <div class="container">
                <div class="d-flex justify-content-between mb20">
                    <div class="">
                    @if (isset($titre))
                    <h2 class="title-bar">Edit: {{$role->name}}</h2>
                        @else
                        <h2 class="title-bar"> Add new Role : </h2>
                        @endif
                    
                    </div>
                </div>
                       <br/>
                  <!-- message flash-->
          @include('layouts.messageFlash')
                <!-- message flash-->
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-body"style="padding:20px;">
                                <h3 class="panel-body-title">Role Content </h3>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" value="{{old('role_name',$role->name) ?? ''}}" placeholder="Role Name" name="role_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>&nbsp;</span>
                            <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i>  Save Change</button>
                        </div>
                    </div>
                </div>
 
         </div>
    </form>

 @endsection
 
    @section('footer')

    <!-- bs custom file input plugin -->
    <script src="{{asset('assets/libs/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

    <script src="{{asset('assets/js/pages/form-element.init.js')}}"></script>
    @endsection