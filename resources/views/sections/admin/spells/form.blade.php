@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Spell') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ $formAction }}" method="{{ $formMethod }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name"
                                @if ($spell)
                                    value="{{ $spell->name }}"
                                @endif>
                            </div>
                        </div>

                        <div class=" row mb-3">
                            <label for="school_id" class="col-sm-3 col-form-label">School</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="school_id">
                                    <option selected>Select...</option>
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}" 
                                            @if ($spell)
                                                {{ $spell->school_id == $school->id ? 'selected' : '' }}
                                            @endif
                                                >{{ $school->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="level" class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="level">
                                    <option selected>Select...</option>
                                    @foreach (config('variables.spellLevel') as $id => $level)
                                        <option value="{{ $id }}" 
                                        @if ($spell)
                                                {{ $spell->level == $id ? 'selected' : '' }}
                                        @endif
                                            >{{ $level }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3 col-form-label"></div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ritual" name="ritual"
                                    @if ($spell)
                                        {{ $spell->ritual == 1 ? "checked" : ""}}
                                    @endif
                                    >
                                    <label class="form-check-label" for="ritual">Ritual</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="range" class="col-sm-3 col-form-label">Range</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="range" name="range"
                                @if ($spell)
                                    value="{{ $spell->range }}"
                                @endif>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="casting_time" class="col-sm-3 col-form-label">Casting time</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="casting_time" id="casting_time">
                                    <option selected>Select...</option>
                                    @foreach (config('variables.castingTime') as $id => $castingTime)
                                        <option value="{{ $id }}" 
                                            @if ($spell)
                                                {{ $spell->casting_time == $id ? 'selected' : '' }}
                                            @endif>
                                                {{ $castingTime }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="duration" class="col-sm-3 col-form-label">Duration</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="duration" id="duration">
                                    <option selected>Select...</option>
                                    @foreach (config('variables.duration') as $id => $duration)
                                        <option value="{{ $id }}" 
                                        @if ($spell)
                                            {{ $spell->duration == $id ? 'selected' : '' }}
                                        @endif>
                                            {{ $duration }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <hr>

                        <div class="row mb-3">
                            <div class="col-sm-3 col-form-label">Components</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="comp_v" name="comp_v"
                                    @if ($spell)
                                        {{ $spell->comp['comp']['v'] == true ? "checked" : ""}}
                                    @endif
                                    >
                                    <label class="form-check-label" for="comp_v">Verbal (V)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  id="comp_s" name="comp_s"
                                    @if ($spell)
                                        {{ $spell->comp['comp']['s'] == true ? "checked" : ""}}
                                    @endif>
                                    <label class="form-check-label" for="comp_s">Somatic (S)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="comp_m" name="comp_m"
                                    @if ($spell)
                                        {{ $spell->comp['comp']['m'] == true ? "checked" : ""}}
                                    @endif>
                                    <label class="form-check-label" for="comp_m">Material (M)</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="comp_spec" class="col-sm-3 col-form-label">Material components</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="comp_spec" name="comp_spec"
                                @if ($spell)
                                    value="{{ $spell->comp['comp_spec'] }}"
                                @endif>
                            </div>
                        </div>
                        
                        <hr>

                        <div class="mb-3">
                            <label for="desc_en" class="form-label">Description English</label>
                            <textarea class="form-control" id="desc_en" rows="3" name="desc_en">{{ $spell ? $spell->desc_en : "" }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="desc_no" class="form-label">Description Norwegian</label>
                            <textarea class="form-control" id="desc_no" rows="3" name="desc_no">{{ $spell ? $spell->desc_no : "" }}</textarea>
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
