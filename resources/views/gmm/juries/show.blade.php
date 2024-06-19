@extends('layouts.app')

@section('title')
Show Jury
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Show jury</h5>

            <div class="container mt-4">
                <div>
                    Title: {{ $gmmJury->jury->name }}
                </div>
                <div class="mt-4">
                    <a href="{{ route('gmmJuries.edit', ['gmm' => $gmm->id, 'session' => $session->id, 'gmmJury' => $gmmJury->id]) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('gmmJuries.index', ['gmm'=>$gmm->id, 'session'=>$session->id]) }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection