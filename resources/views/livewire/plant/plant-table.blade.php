<div>
    <h1 class="text-2xl text-center font-serif">{{__('Plants')}}</h1>
    @foreach ($plants as $plant)
        @livewire('plant.plant-row', ['plant' => $plant], key($plant->id))
    @endforeach
    <div class="w-fit mx-auto">
        {{$plants->links()}}
    </div>
</div>
