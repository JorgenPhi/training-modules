@extends('layouts.app')

@section('content')
    <h5>Questions:</h5>
    @if(count($questions) > 0)

    <table>
        <thead>
            <tr>
                <th>Question</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>
                <td>{{ htmlspecialchars($question->text) }}</td>
                <td><a href="{{ url('/admin/users/'.$question->id.'/edit') }}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="row">
            <p>There are no questions... ?</p>
        </div>
    @endif
    <a href="{{ url('/admin/users/create') }}" class="waves-effect waves-light btn">Create User</a>
@endsection
