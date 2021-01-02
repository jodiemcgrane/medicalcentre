@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Visit: {{ $visit->date }}
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Patient</td>
                                <td>{{ $visit->patient->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Doctor</td>
                                <td>{{ $visit->doctor->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>{{ $visit->date }}</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>{{ $visit->time }}</td>
                            </tr>
                            <tr>
                                <td>Duration</td>
                                <td>{{ $visit->duration }}</td>
                            </tr>
                            <tr>
                                <td>Cost</td>
                                <td>{{ $visit->cost }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{ route('admin.visits.index') }}" class="btn btn-default">Back</a>
                    <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger" data-toggle="modal" data-target="#deleteVisit">Delete</a>
                    </form>
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
