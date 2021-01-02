@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <p id="alert-message" class="alert collapse"></p>

            <div class="card">
                <div class="card-header">
                    Visits
                    <a href="{{ route('admin.visits.create') }}" class="btn btn-primary float-right">Add</a>
                </div>

                <div class="card-body">
                    @if (count($visits) === 0)
                    <p>There are no visits in the system.</p>
                    @else
                    <table id="table-visits" class="table table-hover">
                        <thead>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Duration</th>
                            <th>Cost</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($visits as $visit)
                            <tr data-id="{{ $visit->id }}">
                                <td>{{ $visit->patient->user->name }}</td>
                                <td>{{ $visit->doctor->user->name }}</td>
                                <td>{{ $visit->date }}</td>
                                <td>{{ $visit->time }}</td>
                                <td>{{ $visit->duration }}</td>
                                <td>{{ $visit->cost }}</td>
                                <td>
                                    <a href="{{ route('admin.visits.show', $visit->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                                    <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger" data-toggle="modal" data-target="#deleteVisit">Delete</a>
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
    <div class="modal fade" id="deleteVisit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Visit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you wish to delete {{ $visit->patient->user->name }}'s visit with {{ $visit->doctor->user->name }}?</p>
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
