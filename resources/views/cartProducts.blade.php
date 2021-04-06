@foreach($cartItems->items as $item)

    <td class="active">{{$item['data']['id']}}</td>
    <td class="active"><img src="{{Storage::disk('local')->url('images/' . $item['data']['image'])}}" alt="" width="100" height="100"/></td>
    <td class="active">{{$item['data']['name']}}</td>
    <td class="active">{{$item['data']['description']}}</td>
    <td class="active">{{$item['data']['type']}}</td>
    <td class="active">{{$item['data']['price']}}</td>
@endforeach
