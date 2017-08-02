@extends('layouts.app')
@section('title', $user->username)
@section('content')
    <br>
    <div class="col-lg-10 col-lg-offset-1">
        <table class="table-user">
            <tbody>
                <tr>
                    <td>Username</td>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Fullname</td>
                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
