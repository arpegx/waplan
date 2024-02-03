<?php

namespace App\Livewire\Plant;

use App\Models\Plant;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class PlantRow extends Component
{
    #[Reactive] public Plant $plant;
    #[Reactive] public bool $selected;

    public function render()
    {
        return view('livewire.plant.plant-row', [
            'plant'=> $this->plant,
            'selected' => $this->selected,
        ]);
    }
}
