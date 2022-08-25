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
                                @if ($monster)
                                    value="{{ $monster->name }}"
                                @endif
                                >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type" class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="type">
                                    <option selected>Select...</option>
                                    @foreach (config('variables.cratureType') as $id => $type)
                                        <option value="{{ $id }}" 
                                        @if ($monster)
                                                {{ $monster->type == $id ? 'selected' : '' }}
                                        @endif
                                            >{{ $type }}</option>
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
                                        @if ($monster)
                                                {{ $monster->alignment == $id ? 'selected' : '' }}
                                        @endif
                                            >{{ $alignment }}</option>
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
                                        @if ($monster)
                                                {{ $monster->size_id == $id ? 'selected' : '' }}
                                        @endif
                                            >{{ $size }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="speed" class="col-sm-3 col-form-label">Speed</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="speed" name="speed"
                                @if ($monster)
                                    value="{{ $monster->speed }}"
                                @endif
                                >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ac" class="col-sm-3 col-form-label">AC</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="ac" name="ac"
                                @if ($monster)
                                    value="{{ $monster->ac }}"
                                @endif
                                >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="armor" class="col-sm-3 col-form-label">Armor</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="armor" name="armor"
                                @if ($monster)
                                    value="{{ $monster->armor }}"
                                @endif
                                >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="hp" class="col-sm-3 col-form-label">HP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Pattern: 1d8+2"
                                @if ($monster)
                                    value="{{ $monster->hp }}"
                                @endif
                                >
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="str" class="col-sm-3 col-form-label">Strength</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="str" name="str" 
                                @if ($monster)
                                    value="{{ $monster->str }}"
                                @endif
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="dex" class="col-sm-3 col-form-label">Dexterity</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="dex" name="dex" 
                                @if ($monster)
                                    value="{{ $monster->dex }}"
                                @endif
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="con" class="col-sm-3 col-form-label">Constitution</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="con" name="con" 
                                @if ($monster)
                                    value="{{ $monster->con }}"
                                @endif
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="int" class="col-sm-3 col-form-label">Intelligence</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="int" name="int" 
                                @if ($monster)
                                    value="{{ $monster->int }}"
                                @endif
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="wis" class="col-sm-3 col-form-label">Wizdom</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="wis" name="wis" 
                                @if ($monster)
                                    value="{{ $monster->wis }}"
                                @endif
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cha" class="col-sm-3 col-form-label">Charisma</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="cha" name="cha" 
                                @if ($monster)
                                    value="{{ $monster->cha }}"
                                @endif
                                >
                            </div>
                        </div>

                        <hr>
                        
                        <div class="row mb-3">
                            <label for="saves" class="col-sm-3 col-form-label">Saving Throws</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="saves" name="saves"
                                @if ($monster)
                                    value="{{ $monster->saves }}"
                                @endif
                                >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="skills" class="col-sm-3 col-form-label">Skills</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="skills" name="skills"
                                @if ($monster)
                                    value="{{ $monster->skills }}"
                                @endif
                                >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="languages" class="col-sm-3 col-form-label">Language</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="languages" name="languages"
                                @if ($monster)
                                    value="{{ $monster->languages }}"
                                @endif
                                >
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description">{{ $monster ? $monster->description : "" }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="traits" class="form-label">Traits</label>
                            <textarea class="form-control" id="traits" rows="3" name="traits">{{ $monster ? $monster->traits : "" }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="actions" class="form-label">Actions</label>
                            <textarea class="form-control" id="actions" rows="3" name="actions">{{ $monster ? $monster->actions : "" }}</textarea>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="challenge" class="col-sm-3 col-form-label">Challenge</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="challenge">
                                    <option selected>Select...</option>
                                    @foreach (config('variables.challenge') as $id => $challenge)
                                        <option value="{{ $id }}" 
                                        @if ($monster)
                                                {{ $monster->challenge == $id ? 'selected' : '' }}
                                        @endif
                                            >{{ $id }} - ({{ $challenge }} XP)</option>
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
