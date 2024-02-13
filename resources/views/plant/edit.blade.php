<x-app-layout>
    <h1 class="headline">{{__('Plant')}}</h1>

    <form action="{{route('plants.update', ['plant' => $plant->id])}}" method="POST">
        @method('PUT')
        @csrf
        <fieldset>
            <legend>{{__('Edit')}}</legend>

            {{-- Nickname --}}
            <label hidden for="name">{{__('Nickname')}}</label>
            @error('name') <em>{{$message}}</em> @enderror
            <input class="w-full mb-2" type="text" name="name" id="name" placeholder="{{$plant->name}}">
            
            {{-- Botanical --}}
            <label hidden for="botanical">{{__('Botanical')}}</label>
            @error('botanical') <em>{{$message}}</em> @enderror
            <input class="w-full mb-2" type="text" name="botanical" id="botanical" placeholder="{{$plant->botanical}}">

            <div class="flex">
                {{-- Button: Save --}}
                <div class="grid justify-items-end me-2">
                    <div class="w-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <button type="submit" title="save plant">{{__('save')}}</button>
                    </div>
                </div>
    
                {{-- Button: Cancel --}}
                <div class="grid justify-items-end">
                    <div class="w-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <button type="button" title="save plant">
                            <a wire:navigate href="{{route('plants.show', ['plant' => $plant->id])}}">{{__('cancel')}}</a>
                        </button>
                    </div>
                </div>
            </div>

        </fieldset>
    </form>

</x-app-layout>