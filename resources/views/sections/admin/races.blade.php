@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Race') }}</div>
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
                    <form action="/race" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="row mb-3">
                            <label for="speed" class="col-sm-3 col-form-label">Speed</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="speed" name="speed">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="size" class="col-sm-3 col-form-label">Size</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="size_id">
                                    <option selected>Select...</option>
                                        <option value="1">Tiny</option>
                                        <option value="2">Small</option>
                                        <option value="3">Medium</option>
                                        <option value="4">Large</option>
                                        <option value="5">Huge</option>
                                        <option value="6">Gargantuan</option>
                                </select>
                            </div>
                        </div>
                        
                        <hr>

                        <h2>Ability modifiers</h2>
                        <div class="row mb-3">
                            <label for="str_bonus" class="col-sm-3 col-form-label">Strength</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="str_bonus" name="str_bonus" value="0">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="dex_bonus" class="col-sm-3 col-form-label">Dexterity</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="dex_bonus" name="dex_bonus" value="0">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="con_bonus" class="col-sm-3 col-form-label">Constitution</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="con_bonus" name="con_bonus" value="0">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="int_bonus" class="col-sm-3 col-form-label">Intelligence</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="int_bonus" name="int_bonus" value="0">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="wis_bonus" class="col-sm-3 col-form-label">Wizdom</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="wis_bonus" name="wis_bonus" value="0">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cha_bonus" class="col-sm-3 col-form-label">Charisma</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="cha_bonus" name="cha_bonus" value="0">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Add</button>
                          </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Races') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Race</th>
                            <th>Speed</th>
                            <th>Str</th>
                            <th>Dex</th>
                            <th>Con</th>
                            <th>Int</th>
                            <th>Wiz</th>
                            <th>Cha</th>
                        </thead>
                        <tbody>
                            @foreach ($races as $race)
                                <tr>
                                    <td>{{ $race->id }}</td>
                                    <td>{{ $race->name }}</td>
                                    <td>{{ $race->speed }}</td>
                                    <td>{{ $race->str_bonus }}</td>
                                    <td>{{ $race->dex_bonus }}</td>
                                    <td>{{ $race->con_bonus }}</td>
                                    <td>{{ $race->int_bonus }}</td>
                                    <td>{{ $race->wis_bonus }}</td>
                                    <td>{{ $race->cha_bonus }}</td>
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
