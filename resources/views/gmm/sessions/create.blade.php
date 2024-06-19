@extends('layouts.app')

@section('title')
Create Session
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new session</h1>
        <div class="lead">
            Add new session and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('gmmSessions.store', $gmm->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save session</button>
                <a href="{{ route('gmmSessions.index', $gmm->id) }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection