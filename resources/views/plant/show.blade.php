<x-app-layout>
<div class="plant">
    <h1 class="headline">{{__('Plant')}}</h1>

    <fieldset>
        <legend>{{__('Show')}}</legend>

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
        <div class="nickname">
            <label hidden for="name">{{__('Nickname')}}</label>
            @error('name') <em> {{$message}}</em> @enderror
            <input readonly class="w-full mb-2" type="text" name="name" id="name" placeholder="{{$plant->name}}">
        </div>
        
        {{-- Botanical --}}
        <div class="botanical">
            <label hidden for="botanical">{{__('Botanical')}}</label>
            @error('botanical') <em> {{$message}}</em> @enderror
            <input readonly class="w-full mb-2" type="text" name="botanical" id="botanical" placeholder="{{$plant->botanical}}">
        </div>

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
            {{-- Button: Edit --}}
            <div class="grid justify-items-end me-2">
                <div class="w-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <button type="button" title="edit plant">
                        <a wire:navigate href="{{route("plants.edit", ["plant"  => $plant->id])}}" title="edit plant">{{__('edit')}}</a>
                    </button>
                </div>
            </div>


            {{-- Delete --}}
            <div class="w-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 me-2 px-4 rounded">
                <button data-open-modal type="button" title="delete">{{__('delete')}}</button>
            </div>

            <dialog data-modal>
                <form action="{{route("plants.destroy", ["plant" => $plant->id])}}" method="POST" class="p-5">
                    @csrf @method('DELETE')
                    <p>{{__('Do you really like')}}</p>
                    <p>{{__('to delete the plant')}} ?</p>
                    <em>{{$plant->name}}</em>
                    <div class="flex">
                        <div class="w-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 me-2 px-4 rounded">
                            <button type="submit" title="delete" >{{__('delete')}}</button>
                        </div>
                        <div class="w-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 me-2 px-4 rounded">
                            <button data-close-modal type="button">{{__('cancel')}}</button>
                        </div>
                    </div>
                </form>
            </dialog>
            <script>
                const openButton = document.querySelector("[data-open-modal]")
                const closeButton = document.querySelector("[data-close-modal]")
                const modal = document.querySelector("[data-modal]")
                
                openButton.addEventListener("touchstart",  () => { modal.showModal() })
                closeButton.addEventListener("touchstart", () => { modal.close(); })
            </script>

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