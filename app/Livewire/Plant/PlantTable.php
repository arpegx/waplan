<?php

namespace App\Livewire\Plant;

use Livewire\Component;
use App\Models\Plant;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;

#[Title("Plants")]
class PlantTable extends Component
{
    #[On("rerender")]
    public function rerender(){ $this->render(); }
    public function render()
    {
        return view('livewire.plant.plant-table', [
            'plants' => Plant::orderby('watered_at')->paginate(5),
        ]);
    }
}
