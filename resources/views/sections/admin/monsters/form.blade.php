@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-header">{{ __('Add Monster') }}</div>
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
                                <input type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name" name="name"
                                    value="{{ old('name', optional($monster ?? null)->name) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type" class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9">
                                <select class="form-select @error('name') is-invalid @enderror" 
                                    aria-label="Default select example" 
                                    name="type">
                                        <option selected>Select...</option>
                                        @foreach (config('variables.cratureType') as $id => $type)
                                            <option value="{{ $id }}" 
                                                {{ old('type', optional($monster ?? null)->type) == $id ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alignment" class="col-sm-3 col-form-label">Alignment</label>
                            <div class="col-sm-9">
                                <select class="form-select @error('alignment') is-invalid @enderror" 
                                    aria-label="Default select example" 
                                    name="alignment">
                                        <option selected>Select...</option>
                                        @foreach ($alignments as $alignment)
                                            <option value="{{ $alignment->id }}" 
                                                {{ old('alignment', optional($monster ?? null)->alignment_id) == $alignment->id ? 'selected' : '' }}>
                                                {{ $alignment->name }}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="size_id" class="col-sm-3 col-form-label">Size</label>
                            <div class="col-sm-9">
                                <select class="form-select size_id @error('size_id') is-invalid @enderror" 
                                    aria-label="Default select example" 
                                    name="size_id">
                                        <option selected>Select...</option>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}" 
                                                {{ old('size_id', optional($monster ?? null)->size_id) == $size->id ? 'selected' : '' }}>
                                                {{ $size->name }}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="speed" class="col-sm-3 col-form-label">Speed</label>
                            <div class="col-sm-9">
                                <input type="number" 
                                    class="form-control @error('speed') is-invalid @enderror" 
                                    id="speed" name="speed"
                                    value="{{ old('speed', optional($monster ?? null)->speed) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ac" class="col-sm-3 col-form-label">AC</label>
                            <div class="col-sm-9">
                                <input type="number" 
                                    class="form-control @error('ac') is-invalid @enderror" 
                                    id="ac" name="ac"
                                    value="{{ old('ac', optional($monster ?? null)->ac) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="armor" class="col-sm-3 col-form-label">Armor</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                    class="form-control @error('armor') is-invalid @enderror" 
                                    id="armor" name="armor"
                                    value="{{ old('armor', optional($monster ?? null)->armor) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="hp" class="col-sm-3 col-form-label">HP</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                    class="form-control @error('hp') is-invalid @enderror" 
                                    id="hp" name="hp" placeholder="Pattern: 1d8+2"
                                    value="{{ old('hp', optional($monster ?? null)->hp) }}">
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="str" class="col-sm-3 col-form-label">Strength</label>
                            <div class="col-sm-9">
                                <input type="number" 
                                    class="form-control @error('str') is-invalid @enderror" 
                                    id="str" name="str" 
                                    value="{{ old('str', optional($monster ?? null)->str) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="dex" class="col-sm-3 col-form-label">Dexterity</label>
                            <div class="col-sm-9">
                                <input type="number" 
                                    class="form-control @error('dex') is-invalid @enderror" 
                                    id="dex" name="dex" 
                                    value="{{ old('dex', optional($monster ?? null)->dex) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="con" class="col-sm-3 col-form-label">Constitution</label>
                            <div class="col-sm-9">
                                <input type="number" 
                                    class="form-control @error('con') is-invalid @enderror" 
                                    id="con" name="con" 
                                    value="{{ old('con', optional($monster ?? null)->con) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="int" class="col-sm-3 col-form-label">Intelligence</label>
                            <div class="col-sm-9">
                                <input type="number" 
                                    class="form-control @error('int') is-invalid @enderror" 
                                    id="int" name="int" 
                                    value="{{ old('int', optional($monster ?? null)->int) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="wis" class="col-sm-3 col-form-label">Wizdom</label>
                            <div class="col-sm-9">
                                <input type="number" 
                                    class="form-control @error('wis') is-invalid @enderror" 
                                    id="wis" name="wis" 
                                    value="{{ old('wis', optional($monster ?? null)->wis) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cha" class="col-sm-3 col-form-label">Charisma</label>
                            <div class="col-sm-9">
                                <input type="number" 
                                    class="form-control @error('cha') is-invalid @enderror" 
                                    id="cha" name="cha" 
                                    value="{{ old('cha', optional($monster ?? null)->cha) }}">
                            </div>
                        </div>

                        <hr>
                        
                        <div class="row mb-3">
                            <label for="saves" class="col-sm-3 col-form-label">Saving Throws</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                    class="form-control @error('saves') is-invalid @enderror" 
                                    id="saves" name="saves"
                                    value="{{ old('saves', optional($monster ?? null)->saves) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="skills" class="col-sm-3 col-form-label">Skills</label>
                            <div class="col-sm-9">
                                <input type="text"
                                    class="form-control @error('skills') is-invalid @enderror" 
                                    id="skills" name="skills"
                                    value="{{ old('skills', optional($monster ?? null)->skills) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="languages" class="col-sm-3 col-form-label">Language</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                    class="form-control @error('languages') is-invalid @enderror" 
                                    id="languages" name="languages"
                                    value="{{ old('languages', optional($monster ?? null)->languages) }}">
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                id="description" rows="3" name="description">{{ old('description', optional($monster ?? null)->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="traits" class="form-label">Traits</label>
                            <textarea class="form-control @error('traits') is-invalid @enderror" 
                                id="traits" rows="3" name="traits">{{ old('traits', optional($monster ?? null)->traits) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="actions" class="form-label">Actions</label>
                            <textarea class="form-control @error('actions') is-invalid @enderror" 
                            id="actions" rows="3" name="actions">{{ old('actions', optional($monster ?? null)->actions) }}</textarea>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="challenge" class="col-sm-3 col-form-label">Challenge</label>
                            <div class="col-sm-9">
                                <select class="form-select @error('challenge') is-invalid @enderror" 
                                    aria-label="Default select example" name="challenge">
                                        <option value="0" selected>Select...</option>
                                        @foreach ($challenges as $challenge)
                                            <option value="{{ $challenge->id }}" 
                                                {{ old('challenge', optional($monster ?? null)->challenge_id) == $challenge->id ? 'selected' : '' }}>
                                                {{ $challenge->name }} - ({{ $challenge->xp }} XP)
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                    @if (Route::currentRouteName() == 'monsters.edit')
                        <form action="{{ route('monsters.destroy', ['id' => $monster->id]) }}" method="POST">
                            @csrf
                            <button class="btn btn-dark">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
