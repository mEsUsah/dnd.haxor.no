@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Class') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/class" methos="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
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
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                                <tr>
                                    <td>{{ $class->id }}</td>
                                    <td>{{ $class->name }}</td>
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
