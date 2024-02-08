<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;

class PlantController extends Controller
{
    /**
     * display the view to create a plant
     */
    public function create(){
        return view("plant.create");
    }
    
    /**
     * save new created plant
     */
    public function store(Request $request){
        $request->validate([
            "name"=> "required | unique:plants",
            // "botanical"=> "required",
            // "image"=> "required",
            ]);

        Plant::create([
            "name"=> request("name"),
            "botanical" => fake('es_ES')->name(),
            "image" => 'resources/assets/images/calathea_korbmarante.jpeg',
            "watered_at" => fake()->datetime(),
        ]);

        return redirect()
            ->route('plant.table')
            ->with("success","Plant created");
    }

    /**
     * display view to edit a plant
     */
    public function edit(Plant $plant){
        return view("plant.edit", compact('plant'));
    }

    /**
     * save updated changes to a plant
     */
    public function update(Request $request, Plant $plant){
        $request->validate([
            'name'=> 'unique:plants',
            ]);

        $plant->update([
            'name'=> request('name') ?? $plant->name,
            'botanical'=> request('botanical') ?? $plant->botanical,
            // 'image'=> 'resources/assets/images/calathea_korbmarante.jpeg',
            ]);

        return redirect()
            ->route('plant.table')
            ->with('success','Plant successfuly updated');
    }
}
