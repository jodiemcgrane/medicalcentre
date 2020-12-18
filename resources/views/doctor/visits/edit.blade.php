@extends('layouts.doctor')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset">
            <div class="card">
                <div class="card-header">
                    Edit Visit
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
                    <form method="POST" action="{{ route('doctor.visits.update', $visit->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <label for="patient">Patient</label>
                            <select name="patient_id">
                                @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}" {{ (old('patient_id', $patient->user->name) == $visit->patient->user->name) ? "selected" : "" }}>{{ $patient->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="doctor">Doctor</label>
                            <select name="doctor_id">
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ (old('doctor_id', $doctor->user->name) == $visit->doctor->user->name) ? "selected" : "" }}>{{ $doctor->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $visit->date) }}" />
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" id="time" name="time" value="{{ old('time', $visit->time) }}" />
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration', $visit->duration) }}" />
                        </div>
                        <div class="form-group">
                            <label for="cost">Cost</label>
                            <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost', $visit->cost) }}" />
                        </div>

                        <div class="float-right">
                            <a href="{{ route('doctor.visits.index') }}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
