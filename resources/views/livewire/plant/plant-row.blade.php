<div>
    {{-- <img src="{{url($plant->image)}}" alt="{{__('Image of the Plant')}}"> --}}
    <img src="{{ Vite::asset($plant->image) }}" class="rounded h-10 w-10">
    <p>{{$plant->name}}</p>
    <p>{{$plant->watered_at}}</p>
</div>
