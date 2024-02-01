<div>
    <h1 class="text-3xl text-center font-serif my-2">{{__('Plants')}}</h1>
    <div class="h-[38rem] overflow-auto">
        @foreach ($plants as $plant)
            @livewire('plant.plant-row', ['plant' => $plant], key($plant->id))
        @endforeach
    </div>
    <div class="w-fit mx-auto h-1 flex items-center justify-center">
        {{$plants->links()}}
    </div>
</div>
