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
        //! fill up
        dd($request->file('avatar')->store('profiles'));

        $request->validate([
            "name"=> "required | unique:plants",
            "watered_at" => "required",
            // "botanical"=> "required",
            // "image"=> "required",
            ]);

        Plant::create([
            "name"=> request("name"),
            "botanical" => request("botanical"),
            // "image" => 'resources/assets/images/calathea_korbmarante.jpeg',
            "watered_at" => request('watered_at'),
        ]);

        return redirect()
            ->route('plant.table');
            // ->with("success","Plant created"); //! no displaying established 
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

        //! fill up
        $plant->update([
            'name'=> request('name') ?? $plant->name,
            'botanical'=> request('botanical') ?? $plant->botanical,
            // 'image'=> 'resources/assets/images/calathea_korbmarante.jpeg',
            ]);

        return redirect()
            ->route('plant.table');
            // ->with('success','Plant successfuly updated'); //! no displaying established 
    }

    /**
     * delete a plant
     * 
     * @param Plant
     * @return RedirectResponse
     */
    public function destroy(Plant $plant): RedirectResponse {
        $plant->delete();
        return redirect()
            ->route('plant.table');
    }
}
