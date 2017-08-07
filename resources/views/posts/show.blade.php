@extends('layouts.app')
@section('title', $item->title)
@section('content')
    <br>
    <div class="col-lg-10 col-lg-offset-1">
        <h1>{{ $item->title }}</h1>
        <img src="{{ asset('images/' . $item->image) }}" heigh=400 width="800" />
        <p>{!! $item->content !!}</p>
    </div>
@endsection
