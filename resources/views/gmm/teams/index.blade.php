@extends('layouts.app')

@section('title')
Team List
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Teams</h5>
            <h6 class="card-subtitle mb-2 text-muted">Manage your teams here.</h6>

            <div class="mt-2">
                @include('layouts.includes.messages')
            </div>

            <div class="mb-2 text-end">
                <a href="{{ route('gmmTeams.create', ['gmm' => $gmm->id, 'session' => $session->id]) }}" class="btn btn-primary btn-sm float-right">Add team</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col" width="1%" colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gmmTeams as $team)
                    <tr>
                        <th scope="row">{{ $team->id }}</th>
                        <td>{{ $team->team->name }}</td>
                        <td><a href="{{ route('gmmTeams.show', ['gmm' => $gmm->id, 'session' => $session->id, 'gmmTeam' => $team->id]) }}" class="btn btn-warning btn-sm">Show</a></td>
                        <td><a href="{{ route('gmmTeams.edit', ['gmm' => $gmm->id, 'session' => $session->id, 'gmmTeam' => $team->id]) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['gmmTeams.destroy',
                            ['gmm' => $gmm->id, 'session' => $session->id, 'gmmTeam' => $team->id]],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex">
                {!! $gmmTeams->links() !!}
            </div>

        </div>
    </div>
</div>
@endsection