@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add School') }}</div>
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
                    <form action="/school" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name">
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
                <div class="card-header">{{ __('Schools') }}</div>
                <div class="card-body">
                    @foreach ($schools as $school)
                    <h3>{{ $school->name }}</h3>
                    <h4>Description (English)</h4>
                    <p>{{ $school->desc_en }}</p>
                    <h4>Description (Norsk)</h4>
                    <p>{{ $school->desc_no }}</p>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
