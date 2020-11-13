@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <p id="alert-message" class="alert collapse"></p>

            <div class="card">
                <div class="card-header">
                    Doctors
                </div>

                <div class="card-body">
                    @if (count($doctors) === 0)
                    <p>There are no doctors in the system.</p>
                    @else
                    <table id="table-doctors" class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Date Started</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                            <tr data-id="{{ $doctor->id }}">
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->address }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->email }}</td>
                                <td>{{ $doctor->date_started }}</td>
                                <td>
                                    <a href="{{ route('doctor.doctors.show', $doctor->id) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
