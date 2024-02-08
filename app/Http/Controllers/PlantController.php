<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;

class PlantController extends Controller
{
    public function create(){
        return view("plant.create");
    }
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
}
