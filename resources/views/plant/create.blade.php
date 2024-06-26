<x-app-layout>
<div class="plant">
    <h1 class="headline">{{__('Plant')}}</h1>

    <fieldset>
    <legend>{{__('Create')}}</legend>
        <form action="{{route('plants.store')}}" method="POST" enctype="multipart/form-data" class="h-full">
            @csrf

            {{-- Image --}}
            <label for="avatar">{{__('Image')}}</label>
            @error('avatar') <em> {{$message}}</em> @enderror
            <input name="avatar" id="avatar" accept="image/png, image/jpeg"
                class="mb-2 w-full" 
                type="file" 
                >

            {{-- Nickname --}}
            <label hidden for="name">{{__('Nickname')}}</label>
            @error('name') <em> {{$message}}</em> @enderror
            <input required class="w-full mb-2" type="text" name="name" id="name" placeholder="Nickname" value="{{old('name')}}">
            
            {{-- Botanical --}}
            <label hidden for="botanical">{{__('Botanical')}}</label>
            @error('botanical') <em> {{$message}}</em> @enderror
            <input class="w-full mb-2" type="text" name="botanical" id="botanical" placeholder="{{__('Botanical')}}" value="{{old('botanical')}}">

            {{-- Watered_at --}}
            <div class="flex mb-2">
                <label for="watered_at" class="flex-auto self-center">{{__('Watered at')}}</label>
                @error('watered_at') <em> {{$message}} </em> @enderror
                <input required type="date" name="watered_at" id="watered_at" 
                    class="flex-auto mb-2"
                    value="{{old('watered_at')}}">
            </div>

            <div class="actions mt-7">
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

        </form>
    </fieldset>
</div>

</x-app-layout>