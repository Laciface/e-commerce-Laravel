@extends('admin')

@section('body')

    <div class="table-responsive">
        @if($errors->any())

            <div class="alert alert-danger">
                <ul>
                    <li>{!! print_r($errors->all()) !!}</li>
                </ul>
            </div>
        @endif
        <h2>Create new product</h2>
        <form action="/admin/insertProduct" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group" >
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Product name" value="" required>
            </div>

            <div class="form-group" >
                <label for="name">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="" required>
            </div>

            <div class="form-group" >
                <label for="name">Image</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Image" value="" required>
            </div>

            <div class="form-group" >
                <label for="name">Type</label>
                <input type="text" class="form-control" id="type" name="type" placeholder="Type" value="" required>
            </div>

            <div class="form-group" >
                <label for="name">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

@endsection
