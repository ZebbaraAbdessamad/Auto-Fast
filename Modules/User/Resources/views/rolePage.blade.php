@extends('layouts.app')
@section('header')

@endsection
    @section('content')
     <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <h2 class="title-bar">Role : </h2>
                <div class="title-actions">
                    <!-- <a href="" class="btn btn-warning"><i class="fa fa-check-circle-o"></i> Verify Configs</a> -->
                    <a href="{{route('user.permission_matrix')}}" class="btn btn-info">Permission Matrix</a>
                    <a href="{{route('user.create_Role')}}" class="btn btn-primary">Add new role</a>
                </div>
            </div>

            <!-- message flash-->
            @include('layouts.messageFlash')
            <!-- end-->
            <br/>

        <div class="panel" style="padding:26px;">
            <div class="panel-title"><h4 style="color:#555;">All Roles</h4></div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr style="background-color: #f3f3f3">
                        <!-- <th width="60px"><input type="checkbox" class="check-all"></th> -->
                        <th>N°</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
               </thead>
                    <tbody>
                   @php
                    $a=1;
                   @endphp
                           @if(!empty($roles))
                                    @foreach($roles as $role)
                                   
                                        <input type="hidden" name='id' value="{{$role->id}}">
                                            <tr>
                                            <td>{{$a++}}</td>
                                                <!-- <td><input type="checkbox" name="ids[]" value="{{$role->id}}"></td> -->
                                                <td class="title">
                                                    <a href="{{route('user.role_update',['id'=>$role->id])}}">{{$role->name}}</a>
                                                </td>
                                                <td>{{$role->created_at}}</td>
                                                <td width="200px">
                                                <a href="{{route('user.role_update',['id'=>$role->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit  </a>
                                                <button data-id='{{$role->id}}'  data-toggle="modal" data-target="#log0"  type="submit" class="btn btn-danger btn-sm delete_Role"><i class="fa fa-trash"></i> delete</button>
                                                </td>
                                            </tr> 
                                    
                                    @endforeach
                            @endif     
                    </tbody>
         </table>      
       </div>
  </div>




    <!--panel delete Role -->

    <div class="modal" id="log0">
            <div class="col-md-5 container my-5 ">
                <div class="card" style=" width:auto; height:auto;  ">
                
                        <div class="modal-content">
                            <div class="modal-body">
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                        <div class="bootbox-body">Do you want to delete?</div>
                            </div>
                            <div class="modal-footer">
                                        <form method="POST"action="{{route('user.destroy_role')}}">

                                        @csrf
                                        <input type="hidden" name='id' id="id_Role" value="">
                                        <button type="submit" class="btn btn-primary bootbox-accept"><i class="fa fa-check"></i> Confirm</button>
                                
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                            </div>
                        </div>
                
                </div>
            </div>
        </div>

        <!--panel delete Role -->




    @endsection
         @section('footer')

<!-- bs custom file input plugin -->
<script src="{{asset('assets/libs/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script src="{{asset('assets/js/pages/form-element.init.js')}}"></script>




<script>
        $('.delete_Role').on('click',function (params) {
            
            $('#id_Role').val($(this).data('id'))
        })
</script>
@endsection