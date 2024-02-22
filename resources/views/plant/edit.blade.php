<x-app-layout>
<div class="plant">
    <h1 class="headline">{{__('Plant')}}</h1>

    <fieldset>
    <legend>{{__('Edit')}}</legend>
        <form action="{{route('plants.update', ['plant' => $plant->id])}}" method="POST" class="h-full">
            @method('PUT')
            @csrf

            {{-- Image --}}
            <div class="avatar">
                @if ($plant->image)
                <img src="{{ asset($plant->image)}}" 
                    alt="{{__('Image of the Plant')}}" 
                    title="{{__('Image of the Plant')}}" 
                    class="rounded-full h-20 w-20 mx-auto"
                    >
                @else
                <img src="{{ asset('assets/images/calathea_korbmarante.jpeg')}}" 
                    alt="{{__('Image of the Plant')}}" 
                    title="{{__('Image of the Plant')}}" 
                    class="rounded-full h-20 w-20 mx-auto"
                    >    
                @endif
            </div>

            {{-- Nickname --}}
            <label hidden for="name">{{__('Nickname')}}</label>
            @error('name') <em>{{$message}}</em> @enderror
            <input class="w-full mb-2" type="text" name="name" id="name" placeholder="{{$plant->name}}">
            
            {{-- Botanical --}}
            <label hidden for="botanical">{{__('Botanical')}}</label>
            @error('botanical') <em>{{$message}}</em> @enderror
            <input class="w-full mb-2" type="text" name="botanical" id="botanical" placeholder="{{$plant->botanical}}">

            {{-- Watered_at --}}
            <div class="flex">
                <label for="watered_at" class="flex-auto self-center">{{__('Watered at')}}</label>
                @error('watered_at') <em> {{$message}} </em> @enderror
                <input readonly type="date" name="watered_at" id="watered_at" 
                    class="flex-auto" 
                    value="{{date('Y-m-d', strtotime($plant->watered_at))}}"
                    >
            </div>

            <div class="actions">
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

        </form>
    </fieldset>
</div>
</x-app-layout>