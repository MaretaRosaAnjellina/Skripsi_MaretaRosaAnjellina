@extends('layouts.app')

@section('title')
Create Team
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new team</h1>
        <div class="lead">
            Add new team and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('gmmTeams.store', ['gmm'=>$gmm->id, 'session'=>$session->id]) }}">
                @csrf
                <div class="mb-3">
                    <label for="team_id" class="form-label">Team</label>
                    <select class="form-control" name="team_id" required>
                        <option value="" disabled selected>Select Team</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}" {{ old('team_id') == $team->id ? 'selected' : '' }}>
                                {{ $team->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('team_id')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save team</button>
                <a href="{{ route('gmmTeams.index',  ['gmm'=>$gmm->id, 'session'=>$session->id]) }}" class="btn btn-default">Back</a>
            </form>

        </div>

    </div>
@endsection