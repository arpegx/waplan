<div>
    <h1>Plant</h1>
    @foreach ($plants as $plant)
        <p wire:key="{{$plant->id}}">{{$plant->name}}</p>
    @endforeach
    
    The whole world belongs to you.
</div>
