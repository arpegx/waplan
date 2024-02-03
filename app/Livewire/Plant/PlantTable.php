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

    public $selected = array();

    public function add(Plant $plant): void { $this->selected[] = $plant; }
    public function remove(Plant $plant): void { $this->selected = array_diff($this->selected, [$plant]); }
    public function water(): void { foreach($this->selected as $plant) { $plant->water(); } }
    
    #[On("rerender")]
    public function render()
    {
        return view('livewire.plant.plant-table', [
            'plants' => Plant::orderby('watered_at')->get(),
        ]);
    }
}
