@extends('layouts.app')
@section('title', 'Create New Post')

@section('content')
    <a href="/user" class="btn btn-info">Back</a>
    <div class="col-lg-10 col-lg-offset-1 panel panel-default">
        <center><h1>Create New User</h1></center>
        @include('posts.partials.errors')
        {!! Form::open(['route' => 'user.store', 'files' => true, 'id' => 'form-create', 'class' => 'form-horizontal']) !!}
        <div class="panel-body">
            <div class="form-group">
                {{ Form::label('username', 'Username:', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    {{ Form::text('username', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email:', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Password:', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    {{ Form::password('password', ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('role_id', 'Role:', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    {{ Form::select('role_id', $roles, null, ['class' => 'form-control', 'placeholder' => 'Roles']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('firstname', 'First Name', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    {{ Form::text('firstname', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('lastname', 'Last Name:', ['class' => 'col-md-4 control-label']) }}
                <div class="col-md-6">
                    {{ Form::text('lastname', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
@endsection

@section('script')
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <script src="{{ asset('js/create_user_validate.js') }}"></script>
@endsection