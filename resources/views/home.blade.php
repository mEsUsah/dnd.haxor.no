@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li><a href="{{ route('characters') }}">{{ __('Characters') }}</a></li>
                        <li><a href="{{ route('races') }}">{{ __('Races') }}</a></li>
                        <li><a href="{{ route('classes.index') }}">{{ __('Classes') }}</a></li>
                        <li><a href="{{ route('schools.index') }}">{{ __('Schools') }}</a></li>
                        <li><a href="{{ route('spells.index') }}">{{ __('Spells') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
