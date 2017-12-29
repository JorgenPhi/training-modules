@extends('layouts.app')

@section('content')
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
                    <td><a href="{{ url('/admin/modules/'.$module->id.'/quiz/'.$question->id.'/edit') }}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="row">
            <p>There are no questions... ?</p>
        </div>
    @endif
    <a href="{{ url('/admin/modules/'.$module->id.'/quiz/create') }}" class="waves-effect waves-light btn">Add Question</a>
@endsection
