@extends('layouts.app')

@section('content')

    <div class="container ">
        @if (session('status'))
            <div class="alert alert-warning">
                {{ session('status') }}
            </div>
        @endif
        <table class="table custom-table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Can post</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        @if ($user->can_post)
                            <i style="color: white" class="fas fa-check"></i>
                        @else
                            <i style="color: white" class="fas fa-times"></i>
                        @endif
                    </td>
                    <td>
                        @if ($user->role_id > 1)
                        <form method="POST" action="{{ route('users.togglePostRight') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}" />

                        <input style="background: none;color: white;border:1px solid white"type="submit" value="Toggle rights" />


                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
