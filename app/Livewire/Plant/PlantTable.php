<?php

namespace App\Livewire\Plant;

use Livewire\Component;
use App\Models\Plant;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title("Plants")]
class PlantTable extends Component
{
    use WithPagination;
    
    #[On("rerender")]
    public function rerender(){ $this->render(); }
    public function render()
    {
        return view('livewire.plant.plant-table', [
            'plants' => Plant::orderby('watered_at')->paginate(5),
        ]);
    }
}
