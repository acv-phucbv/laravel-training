@extends('layouts.app')
@section('title', 'List Users')
@section('content')
    @if (Auth::guest())

    @elseif(Auth::user()->isAdmin())
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

            @elseif(Auth::user()->isAdmin())
                <td style="width: 10%">Action</td>
            @else

            @endif
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles()->first()->getAttribute('name') }}</td>
                @if (Auth::guest())

                @elseif(Auth::user()->isAdmin())
                    <td>
                        <button><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a></button>
                        <button><a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                    </td>
                @else

                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection