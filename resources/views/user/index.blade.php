@extends('layouts.app')
@section('title', 'List Users')
@section('content')
    @if (Auth::guest())

    @elseif(Auth::user()->hasRole('admin'))
        <a href="user/create" class="btn btn-info">Add New</a>
    @else

    @endif
    <center><h1>List User</h1></center>
    <table class="list-user">
        <tbody>
        <tr style=" border: 1px solid #333" class="panel-heading">
            <td style="width: 5%">ID</td>
            <td style="width: 25%">Username</td>
            <td style="width: 45%">Email</td>
            <td style="width: 15%">Role</td>
            @if (Auth::guest())

            @elseif(Auth::user()->hasRole('admin'))
                <td style="width: 10%">Action</td>
            @else

            @endif
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles()->name }}</td>
                @if (Auth::guest())

                @elseif(Auth::user()->hasRole('admin') || Auth::user()->hasRole('edit'))
                    <td>
                        <a href="user/{{ $user->id }}/edit">
                            <button type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                        </a>
                        {!! Form::open(['method' => 'DELETE', 'id' => 'formDeleteUser', 'class' => 'form-group pull-right', 'action' => ['UserController@destroy', $user->id]]) !!}
                        {!! Form::button( '<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'delete text-danger deleteUser','id' => 'btnDeleteUser', 'data-id' => $user->id ] ) !!}
                        {!! Form::close() !!}
                    </td>
                @else

                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script>
        $('.deleteUser').on('click', function (e) {
            var confirm_delete = confirm("Xac nhan xoa user");
            if (confirm_delete == true) {
                var inputData = $('#formDeleteUser').serialize();
                var row = $(this).parents('tr');
                var dataId = $(this).attr('data-id');

                $.ajax({
                    url: '{{ url('user') }}' + '/' + dataId,
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