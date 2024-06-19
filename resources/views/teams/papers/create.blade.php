@extends('layouts.app')

@section('title')
    Create Paper
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new Paper</h1>
        <div class="lead">
            Fill the form below to add a new paper.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('papers.store', $team->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                    <input type="file" class="form-control" name="file" required>
                    @if ($errors->has('file'))
                        <span class="text-danger text-left">{{ $errors->first('file') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save Paper</button>
                <a href="{{ route('papers.index', $team->id) }}" class="btn btn-default">Back</a>
            </form>
        </div>
    </div>
@endsection
