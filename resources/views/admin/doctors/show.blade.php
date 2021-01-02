@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Doctor: {{ $doctor->name }}
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $doctor->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $doctor->user->address }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $doctor->user->phone }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $doctor->user->email }}</td>
                            </tr>
                            <tr>
                                <td>Date Started</td>
                                <td>{{ $doctor->date_started }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-default">Back</a>
                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                    <form style="display:inline-block" method="POST" id="delete-form" action="{{ route('admin.doctors.destroy', $doctor->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger" data-toggle="modal" data-target="#deleteDoctor">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="modal fade" id="deleteDoctor">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you wish to delete {{ $doctor->user->name }}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
