@extends('layouts.app')
@section('title', 'Create New Post')
@section('content')
    <a href="/posts" class="btn btn-info">Back</a>
    <div class="col-lg-8 col-lg-offset-2">
        <center><h1>Create New Post</h1></center>
        <form class="form-horizontal" action="{{ route('posts.store') }}" method="post">
            {{ csrf_field() }}
            <fieldset>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Title">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <textarea class="form-control" rows="5" name="content" id="content" placeholder="Content"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12 col-lg-offset-4">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </div>
            </fieldset>
        </form>
        @include('posts.partials.errors')
    </div>
@endsection