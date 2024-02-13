<x-app-layout>
    <div>
        <h1 class="headline">{{__('Plant')}}</h1>
    
        <fieldset>
            <legend>{{__('Show')}}</legend>
    
            {{-- Nickname --}}
            <label hidden for="name">{{__('Nickname')}}</label>
            @error('name') <em> {{$message}}</em> @enderror
            <input readonly class="w-full mb-2" type="text" name="name" id="name" placeholder="{{$plant->name}}">
            
            {{-- Botanical --}}
            <label hidden for="botanical">{{__('Botanical')}}</label>
            @error('botanical') <em> {{$message}}</em> @enderror
            <input readonly class="w-full mb-2" type="text" name="botanical" id="botanical" placeholder="{{$plant->botanical}}">
    
            <div class="flex">
                {{-- Button: Edit --}}
                <div class="grid justify-items-end me-2">
                    <div class="w-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <button type="button" title="edit plant">
                            <a wire:navigate href="{{route("plants.edit", ["plant"  => $plant->id])}}" title="edit plant">{{__('edit')}}</a>
                        </button>
                    </div>
                </div>
    
                {{-- Button: Cancel --}}
                <div class="grid justify-items-end">
                    <div class="w-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <button type="button" title="go to plant table">
                            <a wire:navigate href="{{route('plant.table')}}">{{__('cancel')}}</a>
                        </button>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</x-app-layout>