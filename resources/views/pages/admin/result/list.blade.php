@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Module</th>
                <th>Pass?</th>
                <th>Percentage</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
                <?php $user = $result->user; $module = $result->module; ?>
                @if(count($module->questions) > 0))
                    <tr>
                        <td>{{ htmlspecialchars($user->email) }}</td>
                        <td>{{ htmlspecialchars($module->title) }}</td>
                        <td>{{ $result->pass ? 'Yes' : '' }}</td>
                        <td>{{ round($result->correctquestions / count($module->questions) * 100) }}</td>
                        <td>{{ $result->created_at }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
