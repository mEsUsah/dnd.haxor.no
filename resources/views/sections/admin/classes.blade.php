@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @dump($checkeds)
            <div class="card">
                <div class="card-header">{{ __('Add Class') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ $postUrl }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                            @if ($class)
                                value="{{ $class->name }}"
                            @endif
                            >
                        </div>
                        
                        <hr>
                        
                        @foreach ($spells as $level => $magic)
                            <h3>{{ $level }}</h3>
                            @foreach ($magic as $spell)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $spell->id }}" id="flexCheckDefault" name="spells[]" 
                                    @if ($checkeds)
                                        {{ in_array($spell->id, $checkeds) ? "checked" : ""}}
                                    @endif
                                    >
                                    <label class="form-check-label" for="flexCheckDefault">
                                    {{ $spell->name }}
                                    </label>
                                </div>
                            @endforeach
                            <hr>
                        @endforeach

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                        
                    </form>
                </div>
            </div>

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
                                    <td><a href="/class/{{$class->id}}/edit">{{ $class->name }}</a></td>
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
