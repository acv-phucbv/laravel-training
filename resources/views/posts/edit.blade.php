@extends('layouts.app')
@section('editTitle', $item->title)
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
        <center><h1>Edit Post</h1></center>
        {!! Form::open(['url' => 'posts/'.$item->id, 'files' => true]) !!}
            {{ method_field('PUT') }}

            <div class="form-group">
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', $item->title, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('body', 'Body:') }}
                {{ Form::textarea('body', $item->content, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('feature_image', 'Change Feature Image:') }}
                <br>
                @if (isset($item->image))
                    <img src="{{ asset('images/' . $item->image) }}" height="100" width="200" />
                @endif
                {{ Form::file('feature_image', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Edit', ['class' => 'btn btn-success', 'style' => 'margin-top: 20px']) }}
            </div>

        {{ Form::close() }}
        @include('posts.partials.errors')
    </div>
@endsection