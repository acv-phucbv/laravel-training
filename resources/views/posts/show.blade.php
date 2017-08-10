@extends('layouts.app')
@section('title', $posts->title)
@section('content')
    <br>
    <!-- Content Post -->
    <div class="col-lg-10 col-lg-offset-1">
        <h1>{{ $posts->title }}</h1>
        <img src="{{ asset('images/' . $posts->image) }}" heigh=400 width="800" />
        <p>{!! $posts->content !!}</p>
        <hr>
    </div>
    <!-- /Content Post -->

    <!-- Form Comment -->
    <div id="comment-form" class="col-lg-10 col-lg-offset-1">
        <br>
        <h3>Comment</h3>
        @include('posts.partials.errors')
        {!! Form::open(['route' => ['comment.store', $posts->id], 'id' => 'form-comment']) !!}
        <div class="row">
            <div class="form-group col-lg-6">
                {{ Form::label('name','Name') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group col-lg-6">
                {{ Form::label('email','Email') }}
                {{ Form::text('email', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('comment', 'Comment') }}
            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
        </div>
    </div>
    <!-- /Form Comment -->

    <!-- List Comment -->
    <div class="col-lg-10 col-lg-offset-1">
        <ul class="list-group">
            @foreach($posts->comment as $comment)
                <li class="list-group-item">
                    <article>
                        <b>{{ $comment->name }}</b>: {{ $comment->comment }} <i>at {{ $comment->created_at }}</i>
                    </article>
                </li>
            @endforeach
        </ul>
        @include('posts.partials.message')
    </div>
    <!-- /List Comment -->
@endsection

@section('script')
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <script>
        $(function() {
            $('#form-comment').validate({
                rules : {
                    name : {
                        required : true,
                        minlength : 4
                    },
                    email : {
                        required : true,
                        email : true
                    },
                    comment : {
                        required : true,
                    }
                },
                messages : {
                    name : {
                        required : "Vui lòng điền tên của bạn",
                        minlength : "Tên phải ít nhất 4 ký tự"
                    },
                    email : {
                        required : "Vui lòng điền email của bạn",
                        email : "Email không đúng định dạng"
                    },
                    comment : {
                        required : "Bình luận không được để trống",
                    }
                },
                submitHandler : function (form) {
                    form.submit();
                }

            });
        })
    </script>
@endsection
