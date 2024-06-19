@extends('layouts.app')

@section('title')
    Edit Paper
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update Paper</h5>

                <div class="container mt-4">
                    <form method="post" action="{{ route('papers.update', ['paper' => $paper->id, 'team' => $team->id]) }}"
                        enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            <input type="file" class="form-control" name="file">
                            @if ($errors->has('file'))
                                <span class="text-danger text-left">{{ $errors->first('file') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Update Paper</button>
                        <a href="{{ route('papers.index', $team->id) }}" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
