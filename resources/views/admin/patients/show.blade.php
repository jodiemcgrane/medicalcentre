@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Patient: {{ $patient->name }}
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $patient->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $patient->user->address }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $patient->user->phone }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $patient->user->email }}</td>
                            </tr>

                            <tr>
                                <td>Insurance Company</td>
                                <td>{{ $patient->insuranceCompany->name }}</td>
                            </tr>
                            <tr>
                                <td>Policy No.</td>
                                <td>{{ $patient->policy_number }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{ route('admin.patients.index') }}" class="btn btn-default">Back</a>
                    <a href="{{ route('admin.patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('admin.patients.destroy', $patient->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger" data-toggle="modal" data-target="#deletePatient">Delete</a>
                    </form>
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
