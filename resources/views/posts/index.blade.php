@extends('layouts.app')
@section('content')
    @include('posts.partials.message')
    @if (Auth::guest())

    @else
        <a href="posts/create" class="btn btn-info">Add New</a>
    @endif
    <div class="col-lg-12">
        <center><h1>Posts List</h1></center>
        <ul class="list-group col-lg-12">
            @foreach($posts as $post)
                <li class="list-group-item">
                    <a href="posts/{{ $post->id }}">{{ $post->title }}</a> by
                    <a href="">{{ $post->user()->first()->getAttribute('username') }}</a>
                    <span class="pull-right">
                        {{ $post->created_at->diffForHumans() }}
                        <a href="posts/{{ $post->id }}/edit"><button type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <form action="posts/{!! $post->id !!}" class="form-group pull-right" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
