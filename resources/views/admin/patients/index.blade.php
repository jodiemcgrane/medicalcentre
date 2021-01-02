@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <p id="alert-message" class="alert collapse"></p>

            <div class="card">
                <div class="card-header">
                    Patients
                    <a href="{{ route('admin.patients.create') }}" class="btn btn-primary float-right">Add</a>
                </div>

                <div class="card-body">
                    @if (count($patients) === 0)
                    <p>There are no patients in the system.</p>
                    @else
                    <table id="table-patients" class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Insurance Company</th>
                            <th>Policy No.</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                            <tr data-id="{{ $patient->id }}">
                                <td>{{ $patient->user->name }}</td>
                                <td>{{ $patient->user->address }}</td>
                                <td>{{ $patient->user->phone }}</td>
                                <td>{{ $patient->user->email }}</td>
                                <td>{{ $patient->insuranceCompany->name }}</td>
                                <td>{{ $patient->policy_number }}</td>
                                <td>
                                    <a href="{{ route('admin.patients.show', $patient->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('admin.patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                                    <form style="display:inline-block" method="POST" action="{{ route('admin.patients.destroy', $patient->id) }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger" data-toggle="modal" data-target="#deletePatient">Delete</a>
                                    </form>
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

    <div class="clearfix"></div>
    <div class="modal fade" id="deletePatient">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you wish to delete {{ $patient->user->name }}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
