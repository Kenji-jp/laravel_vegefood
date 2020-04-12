@extends('layouts.admin_app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          
          <h4 class="card-title">Categories</h4>
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
                        <th>Order</th>
                        <th>Product category</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($categories as $category) 
                        <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                          <td>
                            <button class="btn btn-outline-primary"><a href="{{url('/edit_category/'.$category->id)}}">Update</a></button>
                            <button class="btn btn-outline-danger"><a href="{{url('/delete_category/'.$category->id)}}" id="delete">Delete</a></button>
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
