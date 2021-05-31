@extends('admin')

@section('body')

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Price</th>
                <th>Edit Image</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td><img src="{{ Storage::url('images/' . $product['image'])}}" alt="" width="100" height="100"></td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['description'] }}</td>
                <td>{{ $product['type'] }}</td>
                <td>{{ $product['price'] }}</td>
                <td><a class="btn btn-primary" href="{{ route('adminEditProductImageForm', ['id' => $product['id']]) }}">Edit image</a></td>
                <td><a class="btn btn-secondary" href="{{ route('adminEditProductForm', ['id' => $product['id']]) }}">Edit</a></td>
                <td><a class="btn btn-danger" href="{{ route('deleteProduct', ['id' => $product['id']]) }}">Remove</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div class="d-flex justify-content-center">
    {!! $products->links() !!}
</div>

@endsection
