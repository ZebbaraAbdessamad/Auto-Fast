<?php

namespace Modules\User\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\DB;

class HomeController extends \App\Http\controllers\HomeController
{
    
    public function index(Request $request)
    {
        //users = DB::table('users')->get();
       // $users = User::where('id','!=',Auth::id())->get();
         // return view('home', ['users' =>User::where('id','!=',Auth::id())->paginate(4) ],['menu'=>'user','users'=>$users]);
    
    
         // $role= Role::find(2);

      //$permission=Permission::create(['name' => 'car_manage_attributes']);
     // $role->givePermissionTo('car_create');
    //  Auth::user()->assignRole('Client');
        if(!Auth::user()->hasPermissionTo('user_view'))
           abort(403);
          

         
        if($request->input('name'))
        {
            
            $users= User::where('id','!=',Auth::id())->where(function ($q) {
                $name = request()->input('name');
                $q->where('name', 'LIKE', '%'.$name.'%') 
                ->orWhere('last_name', 'LIKE', '%'. $name.'%')
                ->orWhere('email', 'LIKE', '%'. $name.'%') 
                ->orWhere('phone', 'LIKE', '%'. $name.'%') 
                ->orWhere('pays', 'LIKE', '%'.$name.'%') 
                ->orWhere('ville', 'LIKE', '%'. $name.'%'); 
            })->paginate(3);
        }
        else{
      
            $users=User::where('id','!=',Auth::id())->paginate(3);
            }

            if($request->input('role')){
                foreach($users as $key => $user)
                {
                    if(!$user->hasRole($request->input('role')))
                        $users->forget($key);
                }
             
            }        
         
            $roles = Role::all();
        $data=['menu'=>'user','users'=>$users , 'roles'=>$roles, 'countries' =>  get_country_lists(),];
        return view('home')->with($data);
    }
}






