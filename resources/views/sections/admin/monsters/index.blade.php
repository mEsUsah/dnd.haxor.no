@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <h1>Monsters</h1>
            @can('create', App\Models\Monster::class)
                <a href="{{ route('monsters.create') }}" class="btn btn-sm btn-success">Add Monster</a>
            @endcan

            @foreach ($monsters as $monster)
                <div class="dnd-card dnd-card--clear">
                    <div class="dnd-card__header">
                        <div>
                            <h3>{{ $monster->name }}</h3>
                            <p class="subtitle">
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('monsters.edit', ['id' => $monster->id]) }}" class="dnd-button">Edit</a>
                        </div>
                    </div>
                    <hr>
                    <p>{{ $monster->description }}</p>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
