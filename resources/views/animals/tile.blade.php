<a  href="{{ route('animals.show',$animal->id)}}" class="tile">
    <img class="watermark"  src="{{asset('storage/logo.png')}}"/>
    <img class="photo" src="{{asset('storage/'.$animal->photo)}}"/>
    <div class="tile__info">
        <div class="topLeft">
            <h2 style="margin-bottom: 0">{{$animal->species->name}}, {{$animal->gender->name}}</h2>
            <h3>Age: {{$animal->age}}</h3>
        </div>
        <div class="topRight">
            <h2 style="font-weight: bold">{{$animal->status->name}}</h2>
        </div>
        <div class="bottomLeft">
            <p style="font-size:16px;margin: 0">{{$animal->location}}, {{$animal->user->name}}</p>
        </div>
    </div>
</a>
