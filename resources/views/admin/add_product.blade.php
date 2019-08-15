@extends('layouts.admin')
@section('title','Add Product')
@section('header','Add Product')
@section('content')

<div class="col-md-6">
    <form action="{{ route('admin.add.product') }}" method="POST" enctype="multipart/form-data" role="form">
        @csrf
        {{--form body --}}
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Title</label>
                <input value="{{old('title')}}" type="text" max="255" class="form-control" placeholder="Enter Product Title" name="title" autofocus
                    required>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Description</label>
                <textarea name="desc" rows="10" class="form-control" required>{{old('desc')}}</textarea>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Category</label>
                <select required name="category_id" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input value="{{old('quantity')}}" type="number" class="form-control" placeholder="Enter Product Title" name="quantity" min="1"
                    required>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input value="{{old('price')}}" type="number" class="form-control" placeholder="Enter Product Title" name="price" min="1"
                    required>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Images</label>
                <input type="file" class="form-control" name="images[]" multiple>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Display Image</label>
                <input type="file" class="form-control" name="display_image" required>
            </div>
        </div>
        <!-- /.form-body -->
        <div style="margin-left: 10px">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>

@endsection