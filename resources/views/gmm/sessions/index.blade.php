@extends('layouts.app')

@section('title')
Session List
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Sessions</h5>
            <h6 class="card-subtitle mb-2 text-muted">Manage your sessions here.</h6>

            <div class="mt-2">
                @include('layouts.includes.messages')
            </div>

            <div class="mb-2 text-end">
                <a href="{{ route('gmmSessions.create', $gmm->id) }}" class="btn btn-primary btn-sm float-right">Add session</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col" width="1%" colspan="5"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gmmSessions as $session)
                    <tr>
                        <th scope="row">{{ $session->id }}</th>
                        <td>{{ $session->name }}</td>
                        <td><a href="{{ route('gmmJuries.index', ['gmm' => $gmm->id, 'session'=>$session->id]) }}" class="btn btn-info btn-sm">Jury</a></td>
                        <td><a href="{{ route('gmmTeams.index', ['gmm' => $gmm->id, 'session'=>$session->id]) }}" class="btn btn-info btn-sm">Team</a></td>

                        <td><a href="{{ route('gmmSessions.show', ['gmm' => $gmm->id, 'gmmSession'=>$session->id]) }}" class="btn btn-warning btn-sm">Show</a></td>
                        <td><a href="{{ route('gmmSessions.edit', ['gmm' => $gmm->id, 'gmmSession'=>$session->id]) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['gmmSessions.destroy',
                            ['gmm' => $gmm->id, 'gmmSession'=>$session->id]],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex">
                {!! $gmmSessions->links() !!}
            </div>

        </div>
    </div>
</div>
@endsection