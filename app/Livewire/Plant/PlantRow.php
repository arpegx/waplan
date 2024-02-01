<?php

namespace App\Livewire\Plant;

use App\Models\Plant;
use Livewire\Attributes\Locked;
use Livewire\Component;

class PlantRow extends Component
{
    #[Locked]
    public Plant $plant;
    
    public function render()
    {
        return view('livewire.plant.plant-row');
    }
}
