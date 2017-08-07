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

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', $item->title, ['class' => 'form-control']) }}

            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', $item->content, ['class' => 'form-control']) }}

            {{ Form::label('feature_image', 'Change Feature Image:') }}
            <br>
            <img src="{{ asset('images/' . $item->image) }}" height="100" width="200" />
            {{ Form::file('feature_image', null, ['class' => 'form-control']) }}
            <br>

            {{--{{ Form::label('feature_image', 'Upload Feature Image') }}--}}
            {{--{{ Form::file('feature_image', $item->image, ['class' => 'form-control']) }}--}}

            {{ Form::submit('Edit', ['class' => 'btn btn-success', 'style' => 'margin-top: 20px']) }}

        {{ Form::close() }}
        {{--<form class="form-horizontal" action="/posts/@yield('editId')" method="post">--}}
            {{--{{ csrf_field() }}--}}
            {{--@section('editMethod')--}}
            {{--@show--}}
            {{--<fieldset>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-lg-12">--}}
                        {{--<input class="form-control" name="title" id="title" value="@yield('editTitle')" placeholder="Title">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-lg-12">--}}
                        {{--<textarea class="form-control" name="content" rows="5" id="textArea" placeholder="content">@yield('editBody')</textarea>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-lg-12 col-lg-offset-4">--}}
                        {{--<button type="submit" class="btn btn-success">Submit</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</fieldset>--}}
        {{--</form>--}}
        @include('posts.partials.errors')
    </div>
@endsection