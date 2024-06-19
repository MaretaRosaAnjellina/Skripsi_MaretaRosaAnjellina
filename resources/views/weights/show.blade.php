@extends('layouts.app')

@section('title')
Show Weight
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Show weight</h5>

            <div class="container mt-4">
                <div>
                    Title: {{ $weight->criteria->title }}
                </div>
                <div>
                    Type: {{ $weight->type }}
                </div>
                <div>
                    Min Range: {{ $weight->min_range }}
                </div>
                <div>
                    Max Range: {{ $weight->max_range }}
                </div>
                <div>
                    Weight: {{ $weight->weight }}
                </div>
                <div class="mt-4">
                    <a href="{{ route('weights.edit', $weight->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('weights.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection