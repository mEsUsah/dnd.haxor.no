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

                    <form action="/spell" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>

                        <div class=" row mb-3">
                            <label for="school_id" class="col-sm-3 col-form-label">School</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="school_id">
                                    <option selected>Select...</option>
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="level" class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="level">
                                    <option selected>Select...</option>
                                        <option value="0">0 - Cantrip</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="range" class="col-sm-3 col-form-label">Range</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="range" name="range">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="casting_time" class="col-sm-3 col-form-label">Casting time</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="casting_time" id="casting_time">
                                    <option selected>Select...</option>
                                    <option value="1">1 Reaction</option>
                                    <option value="2">1 Bonus Action</option>
                                    <option value="3">1 Action</option>
                                    <option value="4">1 Minute</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="duration" class="col-sm-3 col-form-label">Duration</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="duration" id="duration">
                                    <option selected>Select...</option>
                                    <option value="0">Instantaneous</option>
                                    <option value="1">1 round</option>
                                    <option value="2">1 minute</option>
                                    <option value="3">1 minute - Consentrate</option>
                                    <option value="4">10 minutes</option>
                                    <option value="5">10 minutes - Consentrate</option>
                                    <option value="6">1 hour</option>
                                    <option value="7">1 hour - Consentrate</option>
                                    <option value="8">8 hours</option>
                                    <option value="9">8 hours - Consentrate</option>
                                    <option value="9">Until despelled</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="form" class="col-sm-3 col-form-label">Area of effect</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="form" id="form">
                                    <option selected>Select...</option>
                                    <option value="0">Touch</option>
                                    <option value="1">Cone</option>
                                    <option value="2">Cube</option>
                                    <option value="3">Line</option>
                                    <option value="4">Sphere</option>

                                </select>
                            </div>
                        </div>
                        
                        <hr>

                        <div class="row mb-3">
                            <div class="col-sm-3 col-form-label">Components</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="comp_v" name="comp_v">
                                    <label class="form-check-label" for="comp_v">Verbal (V)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="comp_s" name="comp_s">
                                    <label class="form-check-label" for="comp_s">Somatic (S)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="comp_m" name="comp_m">
                                    <label class="form-check-label" for="comp_m">Material (M)</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="comp_spec" class="col-sm-3 col-form-label">Material components</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="comp_spec" name="comp_spec">
                            </div>
                        </div>
                        
                        <hr>

                        <div class="mb-3">
                            <label for="desc_en" class="form-label">Description English</label>
                            <textarea class="form-control" id="desc_en" rows="3" name="desc_en"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="desc_no" class="form-label">Description Norwegian</label>
                            <textarea class="form-control" id="desc_no" rows="3" name="desc_no"></textarea>
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Add</button>
                          </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Spells') }}</div>
                <div class="card-body">
                    @foreach ($spells as $spell)
                    <h3>{{ $spell->name }}</h3>
                    <p>{{ $spell->desc_en }}</p>
                    <p><em><strong>Norsk: </strong>{{ $spell->desc_no }}</em></p>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection