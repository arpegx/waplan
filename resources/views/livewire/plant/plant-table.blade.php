<div>
    <h1 class="text-3xl text-center font-serif my-2">{{__('Plants')}}</h1>
    <div class="h-[36rem] overflow-auto">
        @foreach ($plants as $plant)
            @livewire('plant.plant-row', ['plant' => $plant, 'selected' => in_array($plant, $selected)], key($plant->id))
        @endforeach
    </div>
    <div class="w-full grid justify-end">
        <div>
            <form wire:submit="water()">
                @csrf
                <button class="w-10 h-10">
                    <img src="data:image/png;base64,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">
                </button>
            </form>
        </div>
    </div>
</div>
