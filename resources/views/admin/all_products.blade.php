@extends('layouts.admin_app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Products</h4>  
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ session('flash_message') }}
                    </div>
                @endif   
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th>Product price</th>
                                    <th>Product category</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><img src="/storage/cover_images/{{$product->product_image}}" alt=""></td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_category}}</td>
                                @if($product->status == 1)
                                    <td><label class="badge badge-success">Activated</label></td>
                                @else
                                    <td><label class="badge badge-danger">Unactivated</label></td>
                                @endif
                                
                                <td>
                                    <button class="btn btn-outline-primary"><a href="{{ url('/edit_product/'.$product->id)}}">Update</a></button>
                                    <button class="btn btn-outline-danger"><a href="{{ url('/delete_product/'.$product->id)}}" id="delete">Delete</a></button>
                                @if($product->status == 1)
                                    <button class="btn btn-outline-warning"><a href="{{url('/unactivate_product/'.$product->id)}}">Unactivate</a></button>
                                @else
                                    <button class="btn btn-outline-success"><a href="{{url('/activate_product/'.$product->id)}}">activate</a></button>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>                    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
