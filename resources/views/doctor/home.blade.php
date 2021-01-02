@extends('layouts.doctor')

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
                    <h4>Welcome {{ Auth::user()->name }}.</h4>
                    <br>
                    <h5>You are logged in as a <b>Doctor</b> user.</h5>
                    <br>
                    <h5>Choose below:</h5>
                    <br>
                    <p>View all of your <b>own</b> <a href="{{ route('doctor.visits.index') }}">Visits</a> in the system.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
