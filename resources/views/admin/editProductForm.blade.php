@extends('admin')

@section('body')

    <div class="table-responsive">
        <form action="/admin/updateProduct/{{$product->id}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group" >
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Product name" value="{{$product->name}}" required>
            </div>

            <div class="form-group" >
                <label for="name">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="{{$product->description}}" required>
            </div>

            <div class="form-group" >
                <label for="name">Type</label>
                <input type="text" class="form-control" id="type" name="type" placeholder="Type" value="{{$product->type}}" required>
            </div>

            <div class="form-group" >
                <label for="name">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{$product->price}}" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

@endsection
