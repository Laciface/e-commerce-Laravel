@extends('admin')

@section('body')

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Type</th>
                <th>Edit Image</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td><img src="<?php echo Storage::url($product['image'])?>" alt=""></td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['description'] }}</td>
                <td>{{ $product['type'] }}</td>
                <td>{{ $product['price'] }}</td>
                <td><a class="btn btn-primary"{{--href="{{ route('admin.products.editProductImageForm', ['id' => $product['id']]) }}"--}}>Edit image</a></td>
                <td><a class="btn btn-secondary"{{--href="{{ route('admin.products.editProductForm', ['id' => $product['id']]) }}"--}}>Edit</a></td>
                <td><a class="btn btn-danger"{{--href="{{ route('admin.products.deleteProduct', ['id' => $product['id']]) }}"--}}>Remove</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
