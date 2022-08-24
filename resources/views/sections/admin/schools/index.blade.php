@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('schools.create') }}" class="btn btn-sm btn-success">Add School</a>

            @foreach ($schools as $school)
            <div class="dnd-card dnd-card--clear">
                <div class="dnd-card__header">
                    <h3>{{ $school->name }}</h3>
                    <a href="{{ route('schools.edit', ['id' => $school->id]) }}" class="dnd-button">Edit</a>
                </div>
                <hr>
                <p>{{ $school->desc_en }}</p>
                <p><em><strong>Norsk: </strong>{{ $school->desc_no }}</em></p>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
