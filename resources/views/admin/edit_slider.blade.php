@extends('layouts.admin_app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Update slider</h4>
                        {!! Form::open(['action' => 'Admin\SliderController@update_slider', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                            <fieldset>
                                <div class="form-group">
                                    <label for="cname"> Description One</label>
                                    <input id="cname" class="form-control" name="description_1" minlength="2" type="text" value="{{$select_slider->description_1}}" required>
                                    <input id="cname" class="form-control" name="slider_id" minlength="2" type="hidden" value="{{$select_slider->id}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="cname"> Description Two</label>
                                    <input id="cname" class="form-control" name="description_2" minlength="2" type="text" value="{{$select_slider->description_2}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="cname">Slider image</label>
                                    {{Form::file('product_image', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    <label for="cname">Status</label>
                                    <input id="cname"  name="product_status"  type="checkbox" value="1" required>
                                </div>
                                {{Form::submit('Update slider', ['class' => 'btn btn-primary'])}} 
                            </fieldset>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection