<?php

namespace App\Livewire\Plant;

use Livewire\Component;
use App\Models\Plant;
use Livewire\Attributes\Title;

#[Title("Plants")]
class PlantTable extends Component
{
    public function render()
    {
        return view('livewire.plant.plant-table', [
            'plants' => Plant::all(),
        ]);
    }
}
