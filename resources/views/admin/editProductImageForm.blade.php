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

    <h3>Currrent Image</h3>
    <div><img src="{{asset ('storage')}}/images/{{$product['image']}}" width="100" height="100" style="max-height: 220px" alt=""></div>

        <form action="/admin/updateProductImage/{{$product->id}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

        <div class="form-group" >
            <label for="description">Update Image</label> <br>
            <input type="file" class="" id="image" name="image" placeholder="Image" value="{{$product->image}}" required>
        </div>
            <br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
@endsection
