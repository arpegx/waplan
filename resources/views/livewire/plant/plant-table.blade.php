<div>
    <h1>Plant</h1>
    @foreach ($plants as $plant)
        @livewire('plant.plant-row', ['plant' => $plant], key($plant->id))
    @endforeach
    
    The whole world belongs to you.
</div>
