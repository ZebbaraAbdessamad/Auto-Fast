<?php
namespace Modules\User\Http\Controllers;
use App\User;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;



class RoleController extends Controller
{

    public function role_Page()
    {
        $data=[ 
            'breadcrumbs'=>[
                                [
                                    'name'=>__("Role"),
                                    // 'url'=>"/user/role_Page",
                                    'class' => 'active'
                                    
                                ],
                            ],
                            'menu'=>'role', 'roles'=> Role::paginate(20),
 
        ];

        return view('user::rolePage')->with($data);
        
    }
    


    public function create_Role()
    {
        $role=New Role();
        $data=[ 
            'breadcrumbs'=>[       [
                                        'name'=>__("Role"),
                                        'url'=>"/user/role_Page",
                                        'class' => 'active'
                                    ],
                                [
                                    'name'=>__("Add Role"),
                                    // 'url'=>"/user/create_Role",
                                    'class' => 'active'
                                    
                                ],
                            ],
                            'menu'=>'role',    'role'=>$role,
        ];

        return view('user::roleModification', $data);
    }

  


    public function role_update($id)
    {
        $role=Role::find($id);
        $titre='Edite';
  $data=[ 'breadcrumbs'=>[

                [
                    'name'=>__("Role"),
                     'url'=>"/user/role_Page",
                    'class' => 'active'
                ],

                [
                    'name'=>__("Edite Role"),
                    // 'url'=>"/user/register",
                    'class' => 'active'
                    
                ],
                        ],    
           'menu'=>'role', 'role'=>$role,'titre'=>$titre,
        ];

        return view('user::roleModification')->with($data);
        
    }



    public function store_Role(Request $request){
      
        if($request->input('id') != null){
            $id=$request->input('id');
            $row = Role::find($id);
            $row->name=$request->input('role_name');
            $row->save();
            session()->flash('edit_role','Role updated');
            return back();
            }
        else{

            $row = new Role();
            $row->name=$request->input('role_name');
            $row->save();
            return redirect(route('user.role_update',['id' => $row->id]))->with('create_Role', __('Role created') );

        }
 
        
       
    }



    public function destroy_role(Request $request){
      
         $role=Role::find($request->input('id'));
       $role->delete();
       return redirect(route('user.role_Page'))->with('delete_Role', __('Role Deleted !!') ); 
   }


   public function permission_matrix()
    {
        $permissions = Permission::all();
        $permissions_group = [
            'other' => []
        ];
      
        if (!empty($permissions)) {
            foreach ($permissions as $permission) {
                $sCheck = strpos($permission->name, '_');
                if ($sCheck == false) {
                    $permissions_group['other'][] = $permission; 
                    continue;
                }
             
                
                $grName = substr($permission->name, 0, $sCheck);
                if (!isset($permissions_group[$grName]))
                    $permissions_group[$grName] = [];
                
                $permissions_group[$grName][] = $permission;
              
            }
        }
        if (empty($permissions_group['other'])) {
            unset($permissions_group['other']);
           
        }
     
        $roles = Role::all();
        $selectedIds = [];
        if (!empty($roles)) {
            foreach ($roles as $role) {
                $selectedIds[$role->id] = [];
                $selected = $role->permissions;
                // dd($selected);
                if (!empty($selected)) {
                    foreach ($selected as $permission) {
                       
                        $selectedIds[$role->id][] = $permission->id;
                    }
                }
            }
        }

        $data = [
            'breadcrumbs'=>[

                [
                    'name'=>__("Role"),
                     'url'=>"/user/role_Page",
                    'class' => 'active'
                ],

                [
                    'name'=>__("Permission Matrix"),
                    // 'url'=>"/user/register",
                    'class' => 'active'
                    
                ],
                        ],    
            'permissions'       => $permissions,
            'roles'             => $roles,
            'permissions_group' => $permissions_group,
            'selectedIds'       => $selectedIds,
            'role'              => $role,
            'menu'              => 'role'
        ];
        return view('user::Permission_Matrix', $data);
    }



    public function save_permission(Request $request)
    {
        $matrix = $request->input('matrix');
        $matrix = is_array($matrix) ? $matrix : [];
        // dd($matrix);
        if (!empty($matrix)) {
            foreach ($matrix as $role_id => $permissionIds) {
                $role = Role::find($role_id);
                if (!empty($role)) {
                    $permissions = Permission::find($permissionIds);
                    $role->syncPermissions($permissions);
                }
            }
        }

        $descriptions= $request->input('Description');
       // dd($descriptions);
        foreach ($descriptions as $id => $description) {
            $permission= Permission::find($id);
            $permission->description = $description;
            $permission->save();
        }
        
        return redirect()->back()->with('save_permission', __('Permission Matrix updated'));
    }

}
