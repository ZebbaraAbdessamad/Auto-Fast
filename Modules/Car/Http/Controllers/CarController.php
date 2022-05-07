<?php

namespace Modules\Car\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Car\Entities\Car;
use Modules\Car\Entities\Composant;
use Illuminate\Support\Str;
use Modules\Car\Entities\CarComposant;
use Modules\Car\Entities\Attribute;
use Modules\Car\Entities\CarImage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        // dd(Car::paginate(3));
            $cars = Car::query() ;
             $cars->orderBy('id', 'desc');
            if (!empty($name = $request->input('name'))) {
                $cars->where('title', 'LIKE', '%' . $name. '%');
                $cars->orderBy('title', 'asc')->paginate(3);
            }
        
        $data=[
            'breadcrumbs'=>[
                [
                    'name'=>__("Cars "),
                    'url'=>"/car",
                    'class' => 'active'
                    
                ],
                [
                    'name'=>__("All "),
                    //'url'=>"/user/register",
                    'class' => 'active'
                    
                ],
            ],    
           'cars'=>$cars->paginate(3),'menu'=>'car1',
        ];

        return view('car::index',$data);
    }



    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {   
      // $attributes=Composant::all()->where('name_attrb','=', 'car_component');
            // dd($terms);

        $attributes=Attribute::all();
        $images=CarImage::all();
         $terms=Composant::all();
         $car= new car();
         $car_attr = [];
        
        if(!$car->composants->isEmpty())
        {
            foreach($car->composants as $comp)
            {
                $car_attr[] = $comp->id;
            }   
        }
  
        $data=[
            'breadcrumbs'=>[
                [
                    'name'=>__("Cars "),
                    'url'=>"/car",
                    'class' => 'active'
                    
                ],
                [
                    'name'=>__("All "),
                    //'url'=>"/user/register",
                    'class' => 'active'
                    
                ],
            ],  
            'menu'=>'car2','car'=>$car,'attributes'=>$attributes,'car_attr'=>$car_attr,'terms'=>$terms,'images'=>$images,
        ];
        return view('car::detailsCar')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
   
      //  dd($request->input('terms'));
      $request->validate([
            'title'  => 'required|string|min:5|max:255',
            'content'  => 'required',
            'passenger'  => 'required',
            'gear'  => 'required',
            'baggage'  => 'required',
            'door'  => 'required',
            'default_state'=>'required',
            'files[]'=>'image|mimes:jpeg,png,jpg,gif'
        
         ]); 

         if($request->input('id') == null)
         {
            $car = new Car() ;
             
             session()->flash('Add_car','this car has been  successfully added');
         }
         else{
             $car= Car::find($request->input('id')); 
             
             session()->flash('edit_car','this car has been  successfully updated');
            
         }
         $car->slug= Str::slug($request->title, '-');
         $car->title=$request->input('title');
         $car->content=$request->input('content');
         $car->default_state=$request->input('default_state');
         $car->is_featured=$request->input('is_featured');
         $car->is_instant=$request->input('is_instant');
         $car->vedio=$request->input('video');
         $car->passenger=$request->input('passenger');
         $car->gear=$request->input('gear');
         $car->baggage=$request->input('baggage');
         $car->door=$request->input('door');
         $car->status=$request->input('status');    

         $car->number=$request->input('number');   
         $car->price=$request->input('price');   
         $car->sale_price=$request->input('sale_price');   
       
       //  dd('hhhhh');
     //  ? $request->input('image') : NULL

         if($request->hasFile('image')){

			$file = $request->file('image');
            // dd(public_path('\images'));
            $file->move(public_path('images/Car'), $file->getClientOriginalName());
            $car->image= $file->getClientOriginalName();    
        }
            $car->save();


            $composants=CarComposant::where('car_id',$request->input('id'));
            $composants->delete();

         
         
         if($request->hasFile('files')){
			$files = $request->file('files');
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move(public_path('images/Car/Gallery'), $name);
                $images_arry[] = $name;
            }   
            
            foreach($images_arry as $image_arry){
                $image= New CarImage();
                $image->image_name=$image_arry;  
                $image->car_id=$car->id;
                $image->save();
            }
   
        }
            
                if(!empty($request->input('terms'))){

                        $attributes=$request->input('terms');
                    foreach ($attributes as $id => $name) {
                    
                            $composant = new CarComposant();
                            $composant->composant_id=$id;
                            $composant->car_id=$car->id;
                            $composant->save();
                    }
                }

                if($request->input('id') == null){
                    return redirect(route('car.index'));  
                }

                else{         
                return redirect(route('car.edit',$request->input('id')));
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
    public function edit($id)
    {  
         $images=CarImage::all()->where('car_id','=',$id);
        $car=Car::find($id);
        $attributes=Attribute::all();
 
       // $car_attr =$car->composants;

        $car_attr = [];

        if(!$car->composants->isEmpty())
        {
            foreach($car->composants as $comp)
            {
                $car_attr[] = $comp->composant_id;
            }
            
        }
      //  dd($car->composants);
   
              $data=[        
                        'breadcrumbs'=>[  
                                            [
                                                'name'=>__("Cars "),
                                                'url'=>"/car",
                                                'class' => 'active'
                                                
                                            ],
                                            [
                                                'name'=>__("Edit"),
                                                //'url'=>"/car/edit/$car->id",
                                                'class' => 'active'
                                                
                                            ],
                                        ],    
                     'menu'=>'car1','car'=>$car, 'attributes'=>$attributes,'car_attr'=>$car_attr,'images'=>$images,
                   ];
        
            return view('car::detailsCar')->with($data);
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
        $car=car::find($request->input('id'));
        $car->delete();
         session()->flash('delete_car','this car has been  successfully deleted');
        return redirect(route('car.index')); 
    }

  
    

    public function destroy_image(Request $request,$id)
    {   
        $car_image=CarImage::find($id);
       // $id= Car::find('id','=',$car_image->car_id)
       // dd($car_image);
        $car_image->delete();
        session()->flash('delete_image_car','this image has been  successfully deleted');
        return redirect(route('car.edit',$car_image->car_id));

    }
    
}
