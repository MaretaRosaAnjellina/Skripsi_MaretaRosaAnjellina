@extends('layouts.app')

@section('title')
Edit Team
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update team</h5>

            <div class="container mt-4">
                <form method="post" action="{{ route('gmmTeams.update', ['gmm' => $gmm->id, 'session'=>$session->id, 'gmmTeam' => $gmmTeam->id]) }}">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="team_id" class="form-label">Team</label>
                        <select class="form-control" name="team_id" required>
                            <option value="" disabled>Select Team</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}" {{ $gmmTeam->team_id == $team->id ? 'selected' : '' }}>
                                    {{ $team->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('team_id')
                            <span class="text-danger text-left">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update team</button>
                    <a href="{{ route('gmmTeams.index', ['gmm'=>$gmm->id, 'session'=>$session->id]) }}" class="btn btn-default">Cancel</a>
                </form>

            </div>
        </div>
    </div>

</div>
@endsection