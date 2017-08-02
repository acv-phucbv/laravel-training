@extends('layouts.app')
@section('title', 'List Users')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <center><h1>List User</h1></center>
                    <table class="list-user">
                        <tbody>
                        <tr style=" border: 1 solid #333" class="panel-heading">
                            <td style="width: 30%">Username</td>
                            <td style="width: 50%">Email</td>
                            <td style="width: 20%">Action</td>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection