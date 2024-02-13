<x-app-layout>
    <h1 class="headline">{{__('Plant')}}</h1>

    <form action="{{route('plants.store')}}" method="POST">
        @csrf
        <fieldset>
            <legend>{{__('Create')}}</legend>

            {{-- Nickname --}}
            <label hidden for="name">{{__('Nickname')}}</label>
            @error('name') <em> {{$message}}</em> @enderror
            <input class="w-full mb-2" type="text" name="name" id="name" placeholder="Nickname">
            
            {{-- Botanical --}}
            <label hidden for="botanical">{{__('Botanical')}}</label>
            @error('botanical') <em> {{$message}}</em> @enderror
            <input class="w-full mb-2" type="text" name="botanical" id="botanical" placeholder="{{__('Botanical')}}">

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
                            <a wire:navigate href="{{route('plant.table')}}">{{__('cancel')}}</a>
                        </button>
                    </div>
                </div>
            </div>

        </fieldset>
    </form>

</x-app-layout>