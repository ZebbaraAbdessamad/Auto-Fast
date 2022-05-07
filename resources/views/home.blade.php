@extends('layouts.app')
@section('header')
<!-- Responsive Table css -->
<link href="{{asset('assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
<!-- <script src="http://parsleyjs.org/dist/parsley.js"></script> -->
<!-- <script src="http://parsleyjs.org/dist/parsley.js"></script> -->
@endsection
@section('content')

<!-- message flash-->
@include('layouts.messageFlash')

<!-- add user-->
    <h2 class="title-bar">{{__('All Users')}}</h2>
    <br />
<div class="d-flex justify-content-between mb20">
    <div class="col-left">
        <div class="title-actions">
        @can('user_create')
            <a href="{{route('user.register')}}" class="btn btn-primary" style="margin-left: 10px;"> <i class="ri-user-line align-middle mr-1"></i>{{__('Add User')}}</a>
        @endcan
        </div>
    </div>
       
    <!--  search-->
    <div class="col-left">
        <form action="{{route('home')}}" method="GET" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
        <select class="form-control" name="role">
                        <option value="">{{ __('-- Select --')}}</option>
                        @foreach($roles as $role)
                            <option value="{{$role->name}}" @if(Request()->role == $role->name) selected @endif >{{ucfirst($role->name)}}</option>
                        @endforeach
         </select>
                   
            <input type="text" value="{{Request()->name}}" name="name" placeholder="{{__('Search by name')}}" class="form-control" required style="margin-left: 10px; margin-right: 10px; width:200px;" />
            <button type="submit"  class="btn-info btn btn-icon btn_search" style="display: flex; margin-right:10px;">{{__('Searchs')}}</button>
        </form>

    </div>
</div>
<br/>
                <div class="text-right" style="margin-right: 15px;">

                <p><i>{{__('Found :total items',['total'=>$users->total()])}}</i></p>
                </div>

<div class="panel" style="margin:10px; padding:15px;">
    <div class="panel-body">
        <div class="table-responsive" style=" padding: 20px;">
            <table class="table table-hover">
                <thead style="padding:15px;"> 
                    <tr style="background-color: #f3f3f3">
                        <th >{{__('Name')}}</th>
                        <th>{{__('Last name')}}</th>
                        <th>{{__('E-mail')}}</th>
                        <th>{{__('City')}}</th>
                        <th>{{__('Country')}}</th>
                        <th>{{__('Status')}}</th>
                        <th>{{__('Action')}}</th>

                    </tr>
                </thead>
                <tbody>
                        @if(!empty($users))
                            @foreach($users as $user)
                   @if(!$user->hasRole('Administrateur'))
                            
                                        <tr>

                                            <th><a href="{{route('user.edit',['id'=>$user->id])}}">{{$user->name}}</a></th>
                                            <td>{{$user->last_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->ville}}</td>
                                            <td>@if(isset($user->pays)){{$countries[$user->pays]}} @endif </td>
                                    <!-- <td>{!!$user->biographie!!}</td> -->
                                                                
                                            <td>
                                            
                                                        @if($user->status =='blocked')
                                                                <div class="container">
                                                                    <div class="btn btn-danger ml-auto" style="padding: 2px; width:70px;">  <!-- <i class="mdi mdi-block-helper"></i> -->{{__('blocked')}}</div>
                                                                </div>
                                                        @elseif($user->status =='publish')
                                                                <div class="container">
                                                                    <div class="btn btn-success ml-auto" style=" padding:2px; width:70px;"> <!--  <i class="mdi mdi-check-circle"></i> -->{{__('publish')}}</div>
                                                                </div>
                                                        @endif
                                            
                                            </td>
                                        
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-th"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @can('user_edit')
                                                            <a class="dropdown-item" href="{{route('user.edit',['id'=>$user->id])}}"><i class="fa fa-edit"></i> Edit</a>
                                                        @endcan

                                                    @can('user_password')
                                                        <a class="dropdown-item changeP" data-toggle="modal" data-target="#log" data-id='{{$user->id}}'><i class="fa fa-lock"></i> {{__('Change Password')}}</a>
                                                    @endcan

                                                    @can('user_delete')
                                                        <button   data-toggle="modal" data-target="#log2" data-id='{{$user->id}}'type="submit"  class="dropdown-item deleteP" ><i class="fa fa-trash"></i> delete</button>
                                                    @endcan
                                                </div>
                                                </div>
                                            </td>

                                        </tr>
                        
                    @endif 
                            @endforeach
                       @endif     
                


                </tbody>
            </table>


                {{ $users->links() }}
                <!-- {{$users->appends(request()->query())->links()}} -->
        </div>
    </div>
</div>
<br/>
        <!--panel delete -->

        <div class="modal" id="log2">
            <div class="col-md-5 container my-5 ">
                <div class="card" style=" width:auto; height:auto;  ">
                
                        <div class="modal-content">
                            <div class="modal-body">
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                        <div class="bootbox-body">Do you want to delete?</div>
                            </div>
                            <div class="modal-footer">
                                        <form method="POST"action="{{route('user.delete')}}">

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



<!--panel change password -->
<div class="modal" id="log">
                        <div class="col-md-5 container my-5 ">
                            <div class="card" style=" width:auto; height:auto;  ">
                                <div class="card-body" style="height:auto; padding-left:20px;">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>

                                        <div class="panel-body" style="padding: 10px;">
                                            <form method="post" id="formP1" action="javascript:void(0)">
                                            <div class="success1 mt-1"></div>

                                                @csrf
                                                <input type="hidden" name='id' id="id_hidden" value="">


                                                <div class="form-group">

                                                    <label>New Password</label>
                                                    <input type="password" value="" placeholder="New Password" name="password" class="form-control password">


                                                </div>
                                                <div class="form-group">
                                                    <label>Password Confirmation</label>
                                                    <input type="password" value="" placeholder="Password" name="password_confirmation" class="form-control myInput1">
                                                    <br />
                                                    <!-- An element to toggle between password visibility -->
                                                    <input type="checkbox" class="clk1"> Show Password

                                                </div>
                                                <button type="submit" class="btn btn-primary" id="change"> <i class="fa fa-save"></i> Change Password </button>
                                                <div class="error mt-3"></div>
                                            </form>
                                        </div>
                                 
                                </div>
                            </div>
                        </div>
                    </div>



@endsection
@section('footer')
<!-- Responsive Table js -->
<!-- <script src="{{asset('assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script> -->
<!-- Init js -->
<!-- <script src="{{asset('assets/js/pages/table-responsive.init.js')}}"></script> -->

        <!-- model numeration -->
        <script>
        console.log('{{Lang::locale()}}')
        $('.changeP').on('click',function (params) {
            
            $('#id_hidden').val($(this).data('id'))
        })

        $('.deleteP').on('click',function (params) {
            
            $('#id_hidden_del').val($(this).data('id'))
        })


        </script>
  
                                        <!-- ajax change password -->

     <script>
                        $(document).ready(function(){
                $('#change').click(function(e){
                e.preventDefault();
                $('.error').html('');

                /*Ajax Request Header setup*/
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                // $('#change').html('Sending..');
                
                /* Submit form data using ajax*/
                $.ajax({

                    url: "{{route('user.changeP')}}",
                    method: 'post',
                    data: $('#formP1').serialize(),
                    
                                      
                                      
                    success: function(response){
                            //------------------------

                            console.log(response);
                            var  success = response.success;
                            var password_success = success;


                        //  success.forEach( function(element) {
                        //           password_success =   password_success + `${element}`;
                        //                                        });


                            $('.success1').html(`<div class="alert alert-success" style="margin-right:6px;">
                                                <span>  ${password_success}</span>
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                                                                </div>`);
                            // alert(password_success);

                            // console.log( response.message);
                            
                },
                                      
                                      
                error: function(response){
                        //------------------------
                        console.log(response.responseJSON.errors);
                        var errors = response.responseJSON.errors;
                        var password_errors = '';
                        errors.password.forEach(function(element) {
                                                        password_errors =   password_errors + `<li>${element}</li>`;
                                                            });
                        $('.error').html(`<div class="text-danger">
                                            <ul style="    list-style-type: none; padding-left: 0px;">
                                                ${password_errors}
                                            </ul>
                                            </div>`);
                                            
                        
                        //--------------------------
                },
                
                                    });
                                        
                                    });
                                    });
 </script>
        <!-- end ajax -->


<!-- show password -->
<script>
    $('.clk1').on('click', function(e) {
        if ($(this).closest(".form-group").children('.myInput1').attr('type') === "password") {
            $(this).closest(".form-group").children('.myInput1').attr('type', "text");
        } else {
            $(this).closest(".form-group").children('.myInput1').attr('type', "password");
        }

    })

</script>
@endsection



