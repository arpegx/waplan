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

                    openButton.addEventListener("click",  () => { modal.showModal() })
                    closeButton.addEventListener("click", () => { modal.close() })
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