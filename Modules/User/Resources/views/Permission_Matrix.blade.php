@extends('layouts.app')
@section('content')
    <form action="{{route('user.save_permission')}}" method="post">
        @csrf
        <div class="container">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{ __('Permission Matrix')}}</h1>
                </div>
            </div>
         @include('layouts.messageFlash')
            <div class="row">
                <div class="col-md-12">
                    <div class="panel" style="padding: 2px;">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr style="background-color: #f3f3f3">
                                        <td><strong>{{ __(' ')}}</strong></td>
                                        <td><strong>{{ __('Permissions')}}</strong></td>
                                        <td><strong>{{ __('Description')}}</strong></td>
                                        @foreach($roles as $role)
                                            <td><strong>{{ucfirst($role->name)}}</strong></td>
                                        @endforeach
                                       
                                    </tr>
                                    </thead>
                                    <!-- <tr> <td></td></tr> -->
                                    <tbody>
                                    @foreach($permissions_group as $gName=>$permissions)
                                        <tr class="table-secondary">
                                            <td>
                                                <strong>{{ucfirst($gName)}}</strong>
                                            </td>
                                            @foreach($roles as $role)
                                                <td></td>
                                            @endforeach
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @if(!empty($permissions))
                                        @php
                                        $a=1;
                                        @endphp
                                            @foreach($permissions as $permission)
                                                <tr>
                                                <td  width="80px">{{$a++}}</td>
                                                    <td  width="100px">{{$permission->name}}</td>
                                                    <td width="300px"><input type="text" style="background-color: #FFEBCD;" value="{{$permission->description}}" placeholder="description" name="Description[{{$permission->id}}]" class="form-control"></td>
                                                    @foreach($roles as $role)
                                                    
                                                        <td  width="100px">
                                                            <input type="checkbox" @if(in_array($permission->id,$selectedIds[$role->id])) checked @endif name="matrix[{{$role->id}}][]" value="{{$permission->id}}">
                                                        </td>
                                                    @endforeach
                                                    
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>&nbsp;</span>
                        <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i> {{ __('Save Change')}}</button>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
    </form>
@endsection
