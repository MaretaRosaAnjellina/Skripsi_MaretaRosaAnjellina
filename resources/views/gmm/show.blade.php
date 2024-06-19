@extends('layouts.app')

@section('title')
Show GMM
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Show gmm</h5>

            <div class="container mt-4">
                <div>
                    Title: {{ $gmm->title }}
                </div>
                <div>
                    Description: {{ $gmm->description }}
                </div>
                <div>
                    Status: {{ $gmm->status }}
                </div>
                <div class="mt-4">
                    <a href="{{ route('gmm.edit', $gmm->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('gmm.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection