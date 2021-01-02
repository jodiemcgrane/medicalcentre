@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <p id="alert-message" class="alert collapse"></p>

            <div class="card">
                <div class="card-header">
                    Doctors
                    <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary float-right">Add</a>
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
                                <td>{{ $doctor->user->name }}</td>
                                <td>{{ $doctor->user->address }}</td>
                                <td>{{ $doctor->user->phone }}</td>
                                <td>{{ $doctor->user->email }}</td>

                                <td>{{ $doctor->date_started }}</td>
                                <td>
                                    <a href="{{ route('admin.doctors.show', $doctor->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                                    <form style="display:inline-block" method="POST" action="{{ route('admin.doctors.destroy', $doctor->id) }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger" data-toggle="modal" data-target="#deleteDoctor">Delete</a>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
