@extends('layouts.app')
@section('title', $item->title)
@section('content')
    <br>
    <div class="col-lg-10 col-lg-offset-1">
        <h1>{{ $item->title }}</h1>
        <p>{{ $item->content }}</p>
    </div>
@endsection
