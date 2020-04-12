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
                    <h4 class="card-title">Add Slider</h4>
                    {!! Form::open([ 'action' => 'SliderController@save_slider','method'  => 'POST','class'   => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                        <fieldset>
                            <div class="form-group">
                                <label for="cname">Description One</label>
                                <input id="cname" class="form-control" name="description1" minlength="2" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="cname">Description Two</label>
                                <input id="cname" class="form-control" name="description2" minlength="2" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="cname">Image</label>
                                {{ Form::file('slider_image', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label for="cname">Status</label>
                                <input id="cname" class="form-control" name="status" type="checkbox" value="1" required>
                            </div>
                            {{ Form::submit('Add Category', ['class' => 'btn btn-primary']) }}                    
                        </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection