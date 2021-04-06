@extends('admin')

@section('body')

    <table>
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
                <td><a href="{{ route('admin.products.editImageForm', ['id' => $product['id']]) }}">Edit image</a></td>
                <td><a href="{{ route('admin.products.editForm', ['id' => $product['id']]) }}">Edit</a></td>
                <td><a href="{{ route('admin.products.delete', ['id' => $product['id']]) }}">Remove</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
