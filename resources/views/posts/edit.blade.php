@section('editTitle', $item->title)
@section('editId', $item->id)
@section('editBody', $item->content)
@section('editMethod')
    {{ method_field('PUT') }}
@endsection
@extends('layouts.app')
@section('title', 'Create New Item')
@section('content')
    <br>
    <a href="/posts" class="btn btn-info">Back</a>
    <div class="col-lg-4 col-lg-offset-4">
        <center><h1>Edit Post</h1></center>
        <form class="form-horizontal" action="/posts/@yield('editId')" method="post">
            {{ csrf_field() }}
            @section('editMethod')
            @show
            <fieldset>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input class="form-control" name="title" id="title" value="@yield('editTitle')" placeholder="Title">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <textarea class="form-control" name="content" rows="5" id="textArea" placeholder="content">@yield('editBody')</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12 col-lg-offset-4">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>
        @include('posts.partials.errors')
    </div>
@endsection