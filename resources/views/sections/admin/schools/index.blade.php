@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('schools.create') }}" class="btn btn-success">Add School</a>

            @foreach ($schools as $school)
            <div class="dnd-card dnd-card--clear">
                <h3>{{ $school->name }}</h3>
                <hr>
                <p>{{ $school->desc_en }}</p>
                <p><em><strong>Norsk: </strong>{{ $school->desc_no }}</em></p>
                <a href="{{ route('schools.edit', ['id' => $school->id]) }}" class="btn btn-danger">Edit</a>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
