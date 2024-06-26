<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PlantController extends Controller
{
    /**
     * display the view to create a plant
     * 
     * @return View
     */
    public function create(): View {
        return view("plant.create");
    }
    
    /**
     * save new created plant
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse {

        $request->validate([
            "name"=> "required | unique:plants",
            "watered_at" => "required",
            "avatar" => 'image | mimes:jpg,png',
            ]);
            
        if($request->file("avatar")){
            $filename = request("name").".".$request->file("avatar")->extension();
            $request->file("avatar")->storeAs('public/images/plant', $filename);
        }

        $plant = Plant::create([
            "name"=> request("name"),
            "botanical" => request("botanical"),
            "image" => $request->file("avatar") !== null ? "./storage/images/plant/".$filename : null,
            "watered_at" => request('watered_at'),
        ]);

        session()->flash('status', 'Plant successfully stored.');
        
        return to_route('plant.table');
    }
    
    /**
     * show plant
     * 
     * @param Plant $plant
     * @return View 
     */
    public function show(Plant $plant): View {
        return view("plant.show", compact("plant"));
    }

    /**
     * display view to edit a plant
     * 
     * @param Plant $plant 
     * @return View
     */
    public function edit(Plant $plant): View {
        return view("plant.edit", compact('plant'));
    }

    /**
     * save updated changes to a plant
     * 
     * @param Request $request
     * @param Plant $plant
     * @return RedirectResponse
     */
    public function update(Request $request, Plant $plant): RedirectResponse {
        $request->validate([
            'name'=> 'unique:plants',
            ]);

        $plant->update([
            'name'=> request('name') ?? $plant->name,
            'botanical'=> request('botanical') ?? $plant->botanical,
            ]);

        session()->flash('status', 'Plant successfully updated');

        return to_route('plant.table');
    }

    /**
     * delete a plant
     * 
     * @param Plant
     * @return RedirectResponse
     */
    public function destroy(Plant $plant): RedirectResponse {
        $plant->delete();

        session()->flash('status', 'Plant successfully deleted');

        return to_route('plant.table');
    }
}
