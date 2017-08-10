@extends('layouts.app')
@section('title', 'Create New Post')

@section('content')
    <a href="/posts" class="btn btn-info">Back</a>
    <div class="col-lg-10 col-lg-offset-1">
        <center><h1>Create New Post</h1></center>
        @include('posts.partials.errors')
        {!! Form::open(['route' => 'posts.store', 'files' => true, 'id' => 'form-create']) !!}

        <div class="form-group">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('feature_image', 'Upload Feature Image:') }}
            {{ Form::file('feature_image', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Create', ['class' => 'btn btn-success']) }}
        </div>
        {!! Form::close() !!}

    </div>
@endsection

@section('script')
<script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="{{ asset('js/validate.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'link code',
        menubar: false
    });
</script>
@endsection