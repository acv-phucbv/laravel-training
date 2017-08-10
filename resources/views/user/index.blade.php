@extends('layouts.app')
@section('title', 'List Users')
@section('content')
    {{--@if ($user->roles())--}}

    {{--@else--}}
        {{--<a href="user/create" class="btn btn-info">Add New</a>--}}
    {{--@endif--}}
    <center><h1>List User</h1></center>
    <table class="list-user">
        <tbody>
        <tr style=" border: 1 solid #333" class="panel-heading">
            <td style="width: 5%">ID</td>
            <td style="width: 25%">Username</td>
            <td style="width: 45%">Email</td>
            <td style="width: 15%">Role</td>
            <td style="width: 10%">Action</td>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles()->first()->getAttribute('name') }}</td>
                <td>
                    <button><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a></button>
                    <button><a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection