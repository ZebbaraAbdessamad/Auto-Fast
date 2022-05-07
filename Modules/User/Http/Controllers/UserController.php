<?php

namespace Modules\User\Http\Controllers;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use Spatie\Permission\Models\Permission;

use Illuminate\Support\Str;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\App;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */


    public function register()
    {
        $user=new User();

  $data=[ 'breadcrumbs'=>[
            [
                'name'=>__("Add user"),
                'url'=>"/user/register",
                'class' => 'active'
                
            ],
        ],    
          'user'=>$user,'countries' =>  get_country_lists(),
        ];
       // ->with(['user'=>$user]);

        return view('user::registration')->with($data);
        
    }



    public function store(Request $request){ 
        
        $validated = $request->validate([
			       'nom'  => 'required|string|min:5|max:255',
                   'prenom'  => 'required|string|max:255',
                   'tele'  => 'required',
                   'address'  => 'required|string|min:5|max:255',
                   'Date'  => 'required|date|date_format:Y-m-d',
                   'ville'  => 'required|string|min:5|max:255',
                   'pays'  => 'required|string|max:255',
                   'email'=>'required|string|max:6000|email|max:255',
       
			    ]);
        
        if($request->input('id') == null)
        {
            $user= new User();
            $request->validate([
                'email'  => 'unique:users',
             
            ]);
            $user->password= Hash::make(Str::random(40));
            
            session()->flash('register_User','this user has been  successfully added');
        }
        else{
            $user= User::find($request->input('id')); 
            
            // $request->validate([
            //     'email'  => 'required|string|max:6000|email|max:255',
             
            // ]); 
            session()->flash('edit','this user has been  successfully updated');
           
        }
        
        $user->name=$request->input('nom');
        $user->last_name=$request->input('prenom');
        $user->email=$request->input('email');
        $user->phone=$request->input('tele');
        $user->address=$request->input('address');
        $user->DateNs=$request->input('Date');
        $user->ville=$request->input('ville');
        $user->pays=$request->input('pays');
        $user->biographie=$request->input('biogrphie');
        $user->status=$request->input('status');
      
         //dd($request);

        if($request->hasFile('photo')){

			$file = $request->file('photo');

            // dd(public_path('\images'));
            $file->move(public_path('images/User'), $file->getClientOriginalName());
            $user->image= $file->getClientOriginalName();    
 
        }
			    	
         $user->save();


         $user->assignRole('Client');
        if($request->input('id') == null)
        {

            return redirect('home');  
        }
        else{
            
            return redirect(route('user.edit',$request->input('id')));
        }

    }
    
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
   

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
     
        $user=User::find($id);
     
        
        $titre='Edite';
        $data=[ 'breadcrumbs'=>[
            [
                'name'=>__("Edit"),
                'url'=>"/user/edit/$user->id",
                'class' => 'active'
                
            ],
        ],    
'menu'=>'user','user'=>$user,'titre'=>$titre, 'countries' =>  get_country_lists(),
];

        
           
     
        // return view('home')->with($data);
     
        return view('user::registration')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
  



    public function Search(Request $request){
        $category = $request->input('category');
    
        //now get all user and services in one go without looping using eager loading
        //In your foreach() loop, if you have 1000 users you will make 1000 queries
      
     
        if (!empty($category)) {
        $users= User::where('id','!=',Auth::id())
        ->where('name', 'LIKE', '%'.$category.'%') 
        ->orWhere('last_name', 'LIKE', '%'. $category.'%')
        ->orWhere('email', 'LIKE', '%'. $category.'%') 
        ->orWhere('phone', 'LIKE', '%'. $category.'%') 
        ->orWhere('pays', 'LIKE', '%'.$category.'%') 
        ->orWhere('ville', 'LIKE', '%'. $category.'%') 
        ->get();
       
        return view('home',compact('users'));
    }
       

         //dd($users);
           //view('home')->with($data)
      //  redirect()->back()->  $data=['users'=>$users];
        //, compact('users')

     
    }
    



    public function destroy(Request $request){
        // return $request->all();
         $user=User::find($request->input('id'));
       $user->delete();
        session()->flash('dest','this user has been  successfully deleted');
       return redirect('home'); 
   }





   public function changeP(Request $request )
   {

    $id=$request->input('id');
    $request->validate([
        'password'     => 'required|string|min:6|confirmed',
    ]);
    $user=User::find($id);
 

    $user->password= Hash::make($request->input('password'));

    $user->save();

    //response:
       return ['success'=> __('Password changed successfully !')];
    }
 

    


    public function profile(Request $request)
    {
        $user=Auth::user(); 

        $data=[ 'breadcrumbs'=>[
                                [
                                    'name'=>__("Profile"),
                                    // 'url'=>"/user/profile",
                                    'class' => 'active'
                                    
                                ],
                            ],    
                    'user'=>$user,
                'countries' =>  get_country_lists(),
                  
                    ];

        return view('user::profile')->with($data);
    }
    



    public function  Editeprf(Request $request)
    {      
       $user= User::find(Auth::id());

        $request->validate([
            'nom'  => 'required|string|min:5|max:255',
            'prenom'  => 'required|string|max:255',
            'tele'  => 'required',
            'address'  => 'required|string|min:5|max:255',
            'Date'  => 'required|date|date_format:Y-m-d',
            'ville'  => 'required|string|min:5|max:255',
            'pays'  => 'required|string|max:255',
            'email'  => 'required|string|max:6000|email|max:255',
          
         ]);
   
        $user->name=$request->input('nom');
        $user->last_name=$request->input('prenom');
        $user->email=$request->input('email');
        $user->phone=$request->input('tele');
        $user->address=$request->input('address');
        $user->DateNs=$request->input('Date');
        $user->ville=$request->input('ville');
        $user->pays=$request->input('pays');
        $user->save();

        if($request->hasFile('image')){

			$file = $request->file('image');
            $file->move(public_path('images/User'), $file->getClientOriginalName());
            $user->image= $file->getClientOriginalName();    
           $user->save();
        }
        session()->flash('EditPrf','your profile has been  successfully updated');
       // redirect('user.profile');
        return redirect()->back();
    }


        public function  passProf(Request $request )
        {
     
         $id= Auth::id();

         $request->validate([
             'password'     => 'required|string|min:6|confirmed',
         ]);
         $user=User::find($id);
      
     
         $user->password= Hash::make($request->input('password'));
     
         $user->save();
     
         //response:
            return ['success'=> __('Password changed successfully !')];
         }




         public function language($locale)
         {
         
            $languages = ['en','fr'];

                if( in_array($locale, $languages) ){
                   
                    session(['my_locale' => $locale]);
                  if(Auth::check())
                  {
                    $user=User::find(Auth::id());
                    $user->lang=$locale;
                    $user->save();
                  }
                   //dd(app()->getLocale());
                } 
                else {
                    $locale = null;
                }

          
            return redirect()->back();
         }

    
}
