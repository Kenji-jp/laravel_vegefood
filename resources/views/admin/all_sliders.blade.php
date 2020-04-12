@extends('layouts.admin_app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sliders</h4>
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
                        <th>Description One</th>
                        <th>Description Two</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach ($sliders as $slider)
                      <tr>
                        <td>{{$slider->id}}</td>
                        <td><img src="/storage/cover_images/{{$slider->slider_image}}" alt=""></td>
                        <td>{{$slider->description_1}}</td>
                        <td>{{$slider->description_2}}</td>
                        @if($slider->status == 1)
                          <td>
                            <label class="badge badge-success">Activated</label>
                          </td>
                        @else
                          <td>
                            <label class="badge badge-danger">Unactivated</label>
                          </td>
                        @endif

                        <td>
                          <button class="btn btn-outline-primary"><a href="{{ url('/edit_slider/'.$slider->id)}}">Update</a></button>
                          <button class="btn btn-outline-danger"><a href="{{ url('/delete_slider/'.$slider->id)}}" id="delete">Delete</a></button>
                          @if($slider->status == 1)
                            <button class="btn btn-outline-warning"><a href="{{url('/unactivate_slider/'.$slider->id)}}">Unactivate</a></button>
                          @else
                              <button class="btn btn-outline-success"><a href="{{url('/activate_slider/'.$slider->id)}}">activate</a></button>
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
