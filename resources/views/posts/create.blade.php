@extends('layouts.app')
@section('title', 'Create New Post')
@section('sheet')
    <script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
    {{--<script src="/js/tinymce.min.js"></script>--}}
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menubar: false
        });
    </script>
@endsection
@section('content')
    <a href="/posts" class="btn btn-info">Back</a>
    <div class="col-lg-10 col-lg-offset-1">
        <center><h1>Create New Post</h1></center>
        {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}

            {{ csrf_field() }}

            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}

            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}

            {{ Form::label('feature_image', 'Upload Feature Image:') }}
            {{ Form::file('feature_image', null, ['class' => 'form-control']) }}

            {{ Form::submit('Create', ['class' => 'btn btn-success', 'style' => 'margin-top: 20px']) }}

        {!! Form::close() !!}

        {{--<form class="form-horizontal" action="{{ route('posts.store') }}" method="post">--}}
            {{--{{ csrf_field() }}--}}
            {{--<fieldset>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-lg-12">--}}
                        {{--<input class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Title">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-lg-12">--}}
                        {{--<textarea class="form-control" rows="5" name="content" id="content" placeholder="Content"></textarea>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-lg-12 col-lg-offset-4">--}}
                        {{--<button type="submit" class="btn btn-success">Create</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</fieldset>--}}
        {{--</form>--}}
        @include('posts.partials.errors')
    </div>
@endsection
@section('script')

@endsection