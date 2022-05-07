<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Car\Entities\Car;
use Modules\Car\Entities\Composant;
use Modules\Car\Entities\CarComposant;
use Modules\Car\Entities\Attribute;
use Modules\Car\Entities\CarImage;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {   $composant=Composant::all()->where('attribute_id','=',2);
           $cars = Car::all()->take(4);
       
        
        // $terms =CarComposant::where('car_id','=',Car::id());
        //  $terms= Composant::
        // $term=New Composant();
        // $attribute=Attribute::find($id);
        //where('car_id','=',$request->input('idcar'))  
        //dd($composant);

        // $Composant=Composant::where('id','=',$term->composant_id)->firstOrFail();
        $data=['cars'=>$cars,'composant'=>$composant ];

        return view('frontend::index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('frontend::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('frontend::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('frontend::edit');
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
    public function destroy($id)
    {
        //
    }

     // details
    public function detail($id)
    {  $car=Car::find($id);
        $guellary=CarImage::all()->where('car_id','=',$id);
        $CarComposant=CarComposant::all()->where('car_id','=',$id);
    
      if(!$car->composants->isEmpty())
      {
          foreach($car->composants as $comp)
          {
            $Composants[]=Composant::find($comp->composant_id);
          }
          
      }
        
   $data=[
        'guellary'=>$guellary,'car'=>$car,'CarComposant'=>$CarComposant,'Composants'=>$Composants,
        ];
 // dd($Composants);

        return view('frontend::details')->with($data);
    }

}
