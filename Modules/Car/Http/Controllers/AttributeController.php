<?php

namespace Modules\Car\Http\Controllers;

// use Attribute;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Car\Entities\Attribute;
use Modules\Car\Entities\Composant;
use PhpParser\Node\Stmt\Else_;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $attributes= Attribute::query();      
        if (!empty($name = $request->input('searsh'))) {
            $attributes->where('name', 'LIKE', '%' . $name. '%');
            $attributes->orderBy('name', 'asc')->paginate(3);
         // dd($attributes);
        }

        $data=[
            'breadcrumbs'=>[ 
                        [
                            'name'=>__("Cars "),
                            'url'=>"/car",
                            'class' => 'active'                     
                        ],
                        [
                            'name'=>__("Car Attributes"),
                            //'url'=>"/car/edit/$car->id",
                            'class' => 'active'                   
                        ],
                ],    
                'menu'=>'attribute',
                'attributes'=>$attributes->paginate(3),
        ];
        return view('car::attribute.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $attribute=New Attribute();      
        $data=[
            'breadcrumbs'=>[ 
                        [
                            'name'=>__("Cars "),
                            'url'=>"/car",
                            'class' => 'active'                     
                         ],
                         [
                            'name'=>__("Car Attributes "),
                            'url'=>"/car/attribute",
                            'class' => 'active'                     
                         ],
                        [
                            'name'=>__("Add Attributes"),
                            //'url'=>"/attribute/edit $attribute->id",
                            'class' => 'active'
                            
                        ],
                ],    
                'menu'=>'attribute','attribute'=>$attribute,
        ];
        return view('car::attribute.detailsAttr',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
        'name'=>'required',
        ]);

        if($request->input('id')==null){
            $attribute= New Attribute();
        }
        else{
            $attribute=Attribute::find($request->input('id'));
        }
        
          $attribute->name=$request->input('name');
          $attribute->save();

          $data=[
            'attribute'=>$attribute,
          ];



        if($request->input('id')==null){
            session()->flash('Add_attribute','this attribute has been  successfully added');
            return redirect(route('car.attribute',$data));
        }
        else{
            session()->flash('edit_attribute','this attribute has been  successfully updated');
            return redirect(route('attribute.edit',['id'=>$request->input('id')]))->with($data);
        }
        
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('car::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request)
    {  
        $attribute=Attribute::find($request->input('id'));
        // dd($request->input('id'));
        
        $data=[
            'breadcrumbs'=>[ 
                        [
                            'name'=>__("Cars "),
                            'url'=>"/car",
                            'class' => 'active'                     
                         ],
                         [
                            'name'=>__("Car Attributes "),
                            'url'=>"/car/attribute",
                            'class' => 'active'                     
                         ],
                        [
                            'name'=>__("Edit Attributes"),
                            //'url'=>"/attribute/edit $attribute->id",
                            'class' => 'active'
                            
                        ],
                ],    
                'menu'=>'attribute','attribute'=>$attribute,
        ];
        return view('car::attribute.detailsAttr',$data);
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
    public function destroy(Request $request)
    {
        $attribute=Attribute::find($request->input('id'));
     
        $attribute->delete();
         session()->flash('delete_attribute','this attribute has been  successfully deleted');
         return redirect(route('car.attribute')); 
    }

   

    public function terms(Request $request,$id)
    {  
        $terms= Composant::where('attribute_id','=',$id);
        $term=New Composant();
        $attribute=Attribute::find($id);

    
       if (!empty($name = $request->input('searsh'))) {
           $terms->where('name', 'LIKE', '%' . $name. '%');
           $terms->orderBy('name', 'asc')->paginate(5);
       }

        $data=[
            'breadcrumbs'=>[ 
                        [
                        'name'=>__("Cars "),
                        'url'=>"/car",
                        'class' => 'active'
                        
                    ],
                    [
                        'name'=>__("Car Attributes"),
                        'url'=>"/car/attribute",
                        'class' => 'active'
                        
                    ],
                    [
                        'name'=>__("Car terms"),
                        'url'=>"/terms/index/$id",
                        'class' => 'active'
                        
                    ],
                ],    
                'menu'=>'attribute',
                'terms'=>$terms->paginate(5),
                'term'=>$term,
                'attribute'=>$attribute,
        ];
        return view('car::terms.index',$data);
    }

      
    public function edit_terms($id,$idt)
    {      
        $terms= Composant::where('attribute_id','=',$id);
        $term=Composant::find($idt);
        $attribute=Attribute::find($id);
        $data=[
            'breadcrumbs'=>[ 
                        [
                        'name'=>__("Cars "),
                        'url'=>"/car",
                        'class' => 'active'
                        
                    ],
                    [
                        'name'=>__("Car Attributes"),
                        'url'=>"/car/attribute",
                        'class' => 'active'
                        
                    ],
                    [
                        'name'=>__("Car terms"),
                        'url'=>"/terms/index/$id",
                        'class' => 'active'
                        
                    ],
                    [
                        'name'=>__("Edit terms"),
                        'url'=>"/terms/edit/$id/$idt",
                        'class' => 'active'
                        
                    ],
                ],    
                'menu'=>'attribute',
                'terms'=>$terms->paginate(5),
                'term'=>$term,
                'attribute'=>$attribute,
        ];
        return view('car::terms.index',['id'=>$id,'idt'=>$idt])->with($data);
    }

    public function store_terms(Request $request)
    {
      
        $id_attr=$request->input('id_attr');
        $attribute= Attribute::find($id_attr) ;
        // dd($attribute);
           
        
        if($request->input('id')==null){
            $term=New Composant();
            $term->attribute_id=$id_attr;
        }
        else{
            $term=Composant::find($request->input('id'));
        }

        $term->name=$request->input('name');
        if($request->hasFile('image')){
			$file = $request->file('image');
            $file->move(public_path('images/Car/'.$attribute->name), $file->getClientOriginalName());
            $term->image_term= $file->getClientOriginalName();    
        }
            $term->save();

            if($request->input('id') == null){
                session()->flash('Add_term','this term has been  successfully added');
                return redirect(route('terms.index',$id_attr));  
            }

            else{  
                session()->flash('Edit_term','this term has been  successfully edited');       
            return redirect(route('terms.edit',[$id_attr,$request->input('id')]));
            }
    }

    public function destroy_terms(Request $request)
    {
        $term=Composant::find($request->input('id'));
        $id_attr=$request->input('id_attr');

        if ($term != null) {
        $term->delete();
        }
         session()->flash('delete_term','this term has been  successfully deleted');
         return redirect(route('terms.index',$id_attr)); 
    }
}
