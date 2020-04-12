@extends('layouts.admin_app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Update product</h4>
                        {!! Form::open(['action' => 'Admin\ProductController@update_product', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                            <fieldset>
                            <div class="form-group">
                                <label for="cname">Product name</label>
                            <input id="cname" class="form-control" name="product_name" minlength="2" type="text" value="{{$select_product->product_name}}" required>

                            <input id="cname" class="form-control" name="product_id" minlength="2" type="hidden" value="{{$select_product->id}}" required>
                            </div>
                            <div class="form-group">
                                <label for="cname">Product price</label>
                                <input id="cname" class="form-control" name="product_price" minlength="2" type="number" value="{{$select_product->product_price}}" required>
                            </div>

                            <div class="form-group">
                                <label for="cname">Product Category</label>
                                <select id="sortingField" class="form-control" name="product_category">
                                    <option>{{$select_product->product_category}}</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cname">Image</label>
                                {{Form::file('product_image', ['class' => 'form-control'])}}
                            </div>

                            <div class="form-group">
                                <label for="cname">Status</label>
                                <input id="cname"  name="product_status"  type="checkbox" value="1" required>
                            </div>

                            
                            {{Form::submit('Update product', ['class' => 'btn btn-primary'])}} 
                            
                            </fieldset>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection