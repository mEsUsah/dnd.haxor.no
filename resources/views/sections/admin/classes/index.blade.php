@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a href="{{ route('classes.create') }}" class="btn btn-success">Add Class</a>
            
            <div class="card">
                <div class="card-header">{{ __('Classes') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Class</th>
                            <th>Spells</th>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                                <tr>
                                    <td>{{ $class->id }}</td>
                                    <td><a href="{{ route('classes.edit', ['id' => $class->id]) }}">{{ $class->name }}</a></td>
                                    <td>
                                        <ul>
                                            @foreach ($class->spells as $spell)
                                                <li>{{ $spell->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
