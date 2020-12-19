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
                    Welcome {{ Auth::user()->name }}.
                    You are Logged in as a Doctor user. <a href="{{ route('doctor.visits.index') }}"> Visits </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
