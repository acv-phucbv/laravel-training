@extends('layouts.app')
@section('content')
    @include('posts.partials.message')
    @if (Auth::guest())

    @elseif(Auth::user()->hasRole('admin') || Auth::user()->hasRole('edit'))
        <a href="user/create" class="btn btn-info">Add New</a>
    @else

    @endif
    <div class="msg"></div>
    <div class="col-lg-12">
        <center><h1>Posts List</h1></center>

        {!! Form::open(['method'=>'GET','url'=>'posts','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
         <div class="input-group custom-search-form">
             {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search...']) }}
            <span class="input-group-btn">
                {{ Form::button( '<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-default-sm'] ) }}
            </span>
        </div>
        {!! Form::close() !!}

        <div class="pull-right">
            <a href="posts/export" class="btn btn-info">Export CSV</a>
        </div>

        <table class="table table-striped table-hover ">
            <tbody>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Author</th>
                <th>Time</th>
                @if (Auth::guest())

                @elseif(Auth::user()->hasRole('admin') || Auth::user()->hasRole('edit'))
                    <th>Action</th>
                @else

                @endif
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><a href="posts/{{ $post->id }}">{{ $post->title }}</a></td>
                    <td><img src="{{ asset('images/' . $post->image) }}" heigh=100 width="100"/></td>
                    <td><a href="">{{ $post->user()->first()->getAttribute('username') }}</a></td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    @if (Auth::guest())

                    @elseif(Auth::user()->hasRole('admin') || Auth::user()->hasRole('edit'))
                        <td>
                            <a href="posts/{{ $post->id }}/edit">
                                <button type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                            </a>
                            {!! Form::open(['method' => 'DELETE', 'id' => 'formDeletePost', 'class' => 'form-group pull-right', 'action' => ['PostController@destroy', $post->id]]) !!}
                            {!! Form::button( '<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'delete text-danger deletePost','id' => 'btnDeletePost', 'data-id' => $post->id ] ) !!}
                            {!! Form::close() !!}
                        </td>
                    @else

                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>
        $('.deletePost').on('click', function (e) {
            var confirm_delete = confirm("Xac nhan xoa bai viet");
            if (confirm_delete == true) {
                var inputData = $('#formDeletePost').serialize();
                var row = $(this).parents('tr');
                var dataId = $(this).attr('data-id');

                $.ajax({
                    url: '{{ url('posts') }}' + '/' + dataId,
                    type: 'POST',
                    data: inputData,
                    success: function (msg) {
                        if (msg.status === 'success') {
                            row.remove();
                            $(".msg").html('<h1 class="alert alert-success">' + msg.msg + '</h1>')
                            setInterval(function () {
                                window.location.reload();
                            }, 5900);
                        }
                    },
                    error: function (data) {
                        if (data.status === 422) {
                            $(".msg").html('<h1 class="alert alert-danger">' + msg.msg + '</h1>')
                        }
                    }
                });
                return false;
            }
            else
                return false;
        });
    </script>

@endsection