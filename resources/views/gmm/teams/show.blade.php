@extends('layouts.app')

@section('title')
Show Team
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Show team</h5>

            <div class="container mt-4">
                <div>
                    Title: {{ $gmmTeam->team->name }}
                </div>
                <div class="mt-4">
                    <a href="{{ route('gmmTeams.edit', ['gmm' => $gmm->id, 'session'=>$session->id, 'gmmTeam' => $gmmTeam->id]) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('gmmTeams.index', ['gmm'=>$gmm->id, 'session'=>$session->id]) }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection