@extends('layouts.app')

@section('title')
Show Session
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Show session</h5>

            <div class="container mt-4">
                <div>
                    Name: {{ $gmmSession->name }}
                </div>
                <div class="mt-4">
                    <a href="{{ route('gmmSessions.edit', ['gmm' => $gmm->id, 'gmmSession' => $gmmSession->id]) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('gmmSessions.index', $gmmSession->id) }}" class="btn btn-default">Back</a>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection