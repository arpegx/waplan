<div class="flex items-center m-1 w-95 border hover:bg-slate-100" >
    <div class="mx-1">
        <img src="{{ asset('assets/images/calathea_korbmarante.jpeg') }}" alt="{{__('Image of the Plant')}}" title="{{__('Image of the Plant')}}" class="rounded h-10 w-10">
    </div>
    {{-- wire:click -> for desktop --}}
    <div @if($selected) wire:touchstart.prevent="$parent.remove({{$plant->id}})" 
         @else wire:touchstart.prevent="$parent.add({{$plant->id}})" @endif
         @class(['grow focus:bg-white', 'bg-red-50' => $selected])
         >
        <p class="leading-4">{{$plant->name}}</p>
        <p class="text-xs leading-4"><i>{{$plant->botanical}}</i></p>
        <p class="text-right leading-4 me-1">{{date('d.m.Y', strtotime($plant->watered_at))}}</p>
        @error('plant') <em>{{$message}}</em>  @enderror
    </div>
</div>