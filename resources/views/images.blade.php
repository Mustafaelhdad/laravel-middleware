@foreach ($images as $image)
    <strong>id: </strong>{{$image->id}} <strong>path: </strong><img src="{{asset('imgs/'.$image->path)}}" width="40px" height="40px"><br>
@endforeach
