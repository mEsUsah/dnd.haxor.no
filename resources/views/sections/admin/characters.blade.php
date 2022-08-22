@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Character') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/character" methos="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                          </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User</label>
                            <select class="form-select" aria-label="Default select example" name="user_id">
                                <option selected>Select...</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="race_id" class="form-label">Race</label>
                            <select class="form-select" aria-label="Default select example" name="race_id">
                                <option selected>Select...</option>
                                @foreach ($races as $race)
                                    <option value="{{ $race->id }}">{{ $race->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Characters') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>User</th>
                            <th>Character</th>
                            <th>Race</th>
                            <th>Class/lvl</th>
                        </thead>
                        <tbody>
                            @foreach ($characters as $character)
                                <tr>
                                    <td>{{ $character->user->name }}</td>
                                    <td>{{ $character->name }}</td>
                                    <td>{{ $character->race->name }}</td>
                                    <td>{{ $character->class_id }} / {{ $character->class_lvl }}</td>
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
