@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset">
            <div class="card">
                <div class="card-header">
                    Add new Visit
                </div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('admin.visits.store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="text" class="form-control" id="date" name="date" value="{{ old('date') }}" />
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="text" class="form-control" id="time" name="time" value="{{ old('time') }}" />
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" />
                        </div>
                        <div class="form-group">
                            <label for="cost">Cost</label>
                            <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost') }}" />
                        </div>
                        <div class="form-group">
                            <label for="doctor">Doctor</label>
                            <input type="text" class="form-control" id="doctor" name="doctor" value="{{ old('doctor') }}" />
                        </div>

                        <div class="float-right">
                            <a href="{{ route('admin.visits.index') }}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
