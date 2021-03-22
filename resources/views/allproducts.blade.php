@foreach($products as $product)
    <p>{{$product->name}}</p>
    <p>{{$product->price}}</p>
@endforeach
