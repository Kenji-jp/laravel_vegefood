@extends('layouts.admin_app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger">
                                {{ session('error_message') }}
                            </div>
                        @endif
                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ session('flash_message') }}
                            </div>
                        @endif
                    <h4 class="card-title">Add Products</h4>

                    {!! Form::open([ 'action' => 'Admin\ProductController@save_product','method'  => 'POST','class'   => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                        <fieldset>
                            <div class="form-group">
                                <label for="cname">Product Name</label>
                                <input id="cname" class="form-control" name="product_name" minlength="2" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="cname">Product Price</label>
                                <input id="cname" class="form-control" name="product_price" minlength="2" type="text" required>
                            </div>
                            <div class="form-group">
                                <label  for="cname">Category</label>
                                <select id="sortingField"class="form-control" name="product_category">
                                    <option>Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cname">Image</label>
                                {{Form::file('product_image', ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                <label for="cname">Status</label>
                                <input id="cname" class="form-control" name="status" type="checkbox" value="1">
                            </div>
                            
                            {{ Form::submit('Add Product', ['class' => 'btn btn-primary']) }}                    
                        </fieldset>
                        {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection