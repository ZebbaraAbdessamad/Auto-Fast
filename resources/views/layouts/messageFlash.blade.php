

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">

            @if(session()->has('edit'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('edit')}}
            </div>
            @endif

            @if(session()->has('EditPrf'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('EditPrf')}}
            </div>
            @endif

            @if(session()->has('dest'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('dest')}}
            </div>
            @endif

            @if(session()->has('register_User'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('register_User')}}
            </div>
            @endif

            @if(session()->has('edit_role'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('edit_role')}}
            </div>
            @endif

            @if(session()->has('create_Role'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('create_Role')}}
            </div>
            @endif

            @if(session()->has('delete_Role'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('delete_Role')}}
            </div>
            @endif

            @if(session()->has('save_permission'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('save_permission')}}
            </div>
            @endif

            @if(session()->has('erro_login'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('erro_login')}}
            </div>
            @endif
            
            @if(session()->has('delete_car'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('delete_car')}}
            </div>
            @endif

            @if(session()->has('edit_car'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('edit_car')}}
            </div>
            @endif

            @if(session()->has('Add_car'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('Add_car')}}
            </div>
            @endif

            @if(session()->has('Add_attribute'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('Add_attribute')}}
            </div>
            @endif

            @if(session()->has('edit_attribute'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('edit_attribute')}}
            </div>
            @endif
           
            @if(session()->has('delete_attribute'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('delete_attribute')}}
            </div>
            @endif

            @if(session()->has('Add_term'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('Add_term')}}
            </div>
            @endif
           
            @if(session()->has('Edit_term'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('Edit_term')}}
            </div>
            @endif
            
            @if(session()->has('delete_term'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('delete_term')}}
            </div>
            @endif
            
        </div>
     </div>
</div