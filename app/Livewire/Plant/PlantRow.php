<?php

namespace App\Livewire\Plant;

use App\Models\Plant;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class PlantRow extends Component
{
    #[Reactive]
    public Plant $plant;
    
    /**
     * water the plant
     * 
     * @param Plant $plant
     * @return void
     */
    public function water(Plant $plant): void {
        // validation
        $this->validate([ 'plant' => 'required', ]);
        
        // watering
        $plant->water();
        
        // rerender parent
        $this->dispatch('rerender');
    }

    public function render()
    {
        return view('livewire.plant.plant-row', [
            'plant'=> $this->plant,
        ]);
    }
}
