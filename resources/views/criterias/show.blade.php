@extends('layouts.app')

@section('title')
Show Criteria
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Show criteria</h5>

            <div class="container mt-4">
                <div>
                    Title: {{ $criteria->title }}
                </div>
                <div>
                    Description: {{ $criteria->description }}
                </div>
                <div>
                    Status: {{ $criteria->status }}
                </div>
                <div class="mt-4">
                    <a href="{{ route('criterias.edit', $criteria->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('criterias.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection