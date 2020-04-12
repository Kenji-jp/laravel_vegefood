@extends('layouts.admin_app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body"> 
                    <h4 class="card-title">Add category</h4>
                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ session('flash_message') }}
                            </div>
                        @endif
                        {!! Form::open([ 'action'  => 'CategoryController@save_category','method'  => 'POST','class'   => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                            <fieldset>
                                <div class="form-group">
                                    <label for="cname">Category name</label>
                                    <input id="cname" class="form-control" name="category_name" minlength="2" type="text" required>
                                </div>
                                {{ Form::submit('Add Category', ['class' => 'btn btn-primary']) }}
                            </fieldset>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection