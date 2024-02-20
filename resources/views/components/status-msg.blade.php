@session('status')
<div id="session_status" class="bg-blue-300 text-center mt-3 rounded-b">
    <div>{{$value}}</div>
</div>
@endsession
</div>
@session('failures')
<div id="session_failures" @class(["bg-red-300 text-center rounded-b", "mt-3" => ! session()->has('status')])>
    <div>{{$value}}</div>
</div>
@endsession