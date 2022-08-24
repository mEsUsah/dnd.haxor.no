@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('spells.create') }}" class="btn btn-success">Add Spell</a>
            <section>
                @foreach ($spells as $spell)
                    <div class="dnd-card dnd-card--clear">
                        <div class="dnd-card__header">
                            <div>
                                <h3>{{ $spell->name }}</h3>
                                <p class="subtitle">{{ $spell->school->name }} {{ $spell->level == 0 ? "Cantrip" : ", Level " . $spell->level }}</p>
                            </div>
                            <div>
                                <a href="{{ route('spells.edit', ['id' => $spell->id]) }}" class="btn btn-danger">Edit</a>
                            </div>
                        </div>
                        <div class="dnd-spell__details">
                            <div class="dnd-spell__detail">
                                <label>Casting time:</label>
                                <span>{{ config("variables.castingTime.{$spell->casting_time}") }}</span>
                            </div>
                            <div class="dnd-spell__detail">
                                <label>Range:</label>
                                <span>{{ $spell->range > 0 ? $spell->range : "touch." }} {{ $spell->range > 0 ? "feet." : "" }}</span>
                            </div>
                            <div class="dnd-spell__detail">
                                <label>Components:</label>
                                <span>
                                    @foreach ($spell->comp['comp'] as $key => $value)
                                        @if ($value == true)
                                            <span>{{ strtoupper($key) }}{{ $loop->remaining > 0 ? "," : "" }} </span>
                                        @endif
                                    @endforeach
                                    
                                    @if ($spell->comp['comp_spec'])
                                        <span>({{ $spell->comp['comp_spec'] }})</span>
                                    @endif
                                </span>
                            </div>
                            <div class="dnd-spell__detail">
                                <label>Duration:</label>
                                <span>{{ config("variables.duration.{$spell->duration}") }}</span>
                            </div>
                        </div>

                        <p>{{ $spell->desc_en }}</p>
                        <p><em><strong>Norsk: </strong>{{ $spell->desc_no }}</em></p>
                    </div>
                @endforeach
            </section>
        </div>
    </div>
</div>
@endsection
