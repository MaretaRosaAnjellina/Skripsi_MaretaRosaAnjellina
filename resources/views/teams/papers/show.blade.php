@extends('layouts.app')

@section('title')
Show Paper
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Show Paper</h5>

            <div class="container mt-4">
                <div>
                    <strong>Title:</strong> {{ $paper->title }}
                </div>
                <div class="mt-2">
                    <strong>Team:</strong> {{ $paper->team->name }}
                </div>
                <div class="mt-2">
                    <strong>File:</strong> <a href="{{ asset('storage/' . $paper->file_path) }}" target="_blank">View File</a>
                </div>
                <div class="mt-4">
                    <a href="{{ route('papers.edit', $paper->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('papers.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
