<div @class(["flex items-center m-1 w-95 border", "shadow-md -translate-y-1 bg-blue-50" => $selected])>
    <div class="mx-1">
        <a wire:navigate href="{{route('plants.show', ['plant' => $plant->id])}}" title="{{__('Redirect to Show')}}">
            @if ($plant->image)
                <img src="{{ asset($plant->image)}}" alt="{{__('Image of the Plant')}}" title="{{__('Image of the Plant')}}" class="rounded h-10 w-10">
            @else
                <img src="{{ asset('assets/images/calathea_korbmarante.jpeg')}}" alt="{{__('Image of the Plant')}}" title="{{__('Image of the Plant')}}" class="rounded h-10 w-10">    
            @endif
        </a>
    </div>
    {{-- wire:click -> for desktop --}}
    <div @if($selected) wire:touchstart.prevent="$parent.remove({{$plant->id}})" 
         @else wire:touchstart.prevent="$parent.add({{$plant->id}})" @endif
         class="grow">
        <p class="leading-4">{{$plant->name}}</p>
        <p class="text-xs leading-4"><i>{{$plant->botanical}}</i></p>
    </div>
    <div>        
        <p class="text-right leading-4 me-1">{{date('d.m.Y', strtotime($plant->watered_at))}}</p>
    </div>
</div>