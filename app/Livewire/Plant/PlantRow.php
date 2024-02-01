<?php

namespace App\Livewire\Plant;

use App\Models\Plant;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class PlantRow extends Component
{
    // #[Locked]
    #[Reactive]
    public Plant $plant;
    
    public function render()
    {
        return view('livewire.plant.plant-row', [
            'plant'=> $this->plant,
        ]);
    }
}
