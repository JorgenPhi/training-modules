@extends('layouts.app')

@section('content')
    <h5>Users:</h5>
    @if(count($users) >= 1)

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Admin?</th>
                <th>Needs Activation?</th>
                <th>Registration Date</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ htmlspecialchars($user->name) }}</td>
                <td>{{ htmlspecialchars($user->email) }}</td>
                <td>{{ $user->admin ? 'Yes' : '' }}</td>
                <td>{{ $user->active ? '' : 'X' }}</td>
                <td>{{ $user->created_at }}</td>
                <td><a href="{{ url('/admin/users/'.$user->id.'/edit') }}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>There are no users... ?</p>
    @endif
    <a href="{{ url('/admin/users/create') }}" class="waves-effect waves-light btn">Create User</a>
@endsection
