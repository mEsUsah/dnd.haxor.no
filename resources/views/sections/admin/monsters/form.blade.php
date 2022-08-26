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
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', optional($monster)->name) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type" class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="type">
                                    <option selected>Select...</option>
                                    @foreach (config('variables.cratureType') as $id => $type)
                                    <option value="{{ $id }}" 
                                        {{ old('type', optional($monster)->type) == $id ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alignment" class="col-sm-3 col-form-label">Alignment</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="alignment">
                                    <option selected>Select...</option>
                                    @foreach (config('variables.alignment') as $id => $alignment)
                                    <option value="{{ $id }}" 
                                        {{ old('alignment', optional($monster)->alignment) == $id ? 'selected' : '' }}>
                                        {{ $alignment }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="size_id" class="col-sm-3 col-form-label">Size</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="size_id">
                                    <option selected>Select...</option>
                                    @foreach (config('variables.cratureSize') as $id => $size)
                                        <option value="{{ $id }}" 
                                            {{ old('size_id', optional($monster)->size_id) == $id ? 'selected' : '' }}>
                                            {{ $size }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="speed" class="col-sm-3 col-form-label">Speed</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="speed" name="speed"
                                value="{{ old('speed', optional($monster)->speed) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ac" class="col-sm-3 col-form-label">AC</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="ac" name="ac"
                                    value="{{ old('ac', optional($monster)->ac) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="armor" class="col-sm-3 col-form-label">Armor</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="armor" name="armor"
                                    value="{{ old('armor', optional($monster)->armor) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="hp" class="col-sm-3 col-form-label">HP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Pattern: 1d8+2"
                                    value="{{ old('hp', optional($monster)->hp) }}">
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="str" class="col-sm-3 col-form-label">Strength</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="str" name="str" 
                                value="{{ old('str', optional($monster)->str) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="dex" class="col-sm-3 col-form-label">Dexterity</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="dex" name="dex" 
                                    value="{{ old('dex', optional($monster)->dex) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="con" class="col-sm-3 col-form-label">Constitution</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="con" name="con" 
                                    value="{{ old('con', optional($monster)->con) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="int" class="col-sm-3 col-form-label">Intelligence</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="int" name="int" 
                                    value="{{ old('int', optional($monster)->int) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="wis" class="col-sm-3 col-form-label">Wizdom</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="wis" name="wis" 
                                    value="{{ old('wis', optional($monster)->wis) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cha" class="col-sm-3 col-form-label">Charisma</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="cha" name="cha" 
                                    value="{{ old('cha', optional($monster)->cha) }}">
                            </div>
                        </div>

                        <hr>
                        
                        <div class="row mb-3">
                            <label for="saves" class="col-sm-3 col-form-label">Saving Throws</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="saves" name="saves"
                                    value="{{ old('saves', optional($monster)->saves) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="skills" class="col-sm-3 col-form-label">Skills</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="skills" name="skills"
                                    value="{{ old('skills', optional($monster)->skills) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="languages" class="col-sm-3 col-form-label">Language</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="languages" name="languages"
                                    value="{{ old('languages', optional($monster)->languages) }}">
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', optional($monster)->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="traits" class="form-label">Traits</label>
                            <textarea class="form-control" id="traits" rows="3" name="traits">{{ old('traits', optional($monster)->traits) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="actions" class="form-label">Actions</label>
                            <textarea class="form-control" id="actions" rows="3" name="actions">{{ old('actions', optional($monster)->actions) }}</textarea>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="challenge" class="col-sm-3 col-form-label">Challenge</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="challenge">
                                    <option selected>Select...</option>
                                    @foreach (config('variables.challenge') as $id => $challenge)
                                    <option value="{{ $id }}" 
                                        {{ old('challenge', optional($monster)->challenge) == $id ? 'selected' : '' }}>
                                        {{ $id }} - ({{ $challenge }} XP)
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
