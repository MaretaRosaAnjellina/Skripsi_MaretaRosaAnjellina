@extends('layouts.app')

@section('title')
Show Team
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Team Details</h5>
            <div class="mt-3">
                <p><strong>Name:</strong> {{ $team->name }}</p>
                <p><strong>Title Innovation:</strong> {{ $team->title_innovation }}</p>
                <p><strong>Category Innovation:</strong> {{ $team->category_innovation }}</p>
                <p><strong>Leader Name:</strong> {{ $team->name_leader }}</p>
                <p><strong>Leader NIK:</strong> {{ $team->nik_leader }}</p>
                <p><strong>Work Unit:</strong> {{ $team->work_unit }}</p>
                
                @for ($i = 1; $i <= 5; $i++)
                    @if (!is_null($team->{'name_member_' . $i}))
                        <p><strong>Member {{ $i }} Name:</strong> {{ $team->{'name_member_' . $i} }}</p>
                        <p><strong>Member {{ $i }} NIK:</strong> {{ $team->{'nik_member_' . $i} }}</p>
                    @endif
                @endfor
            </div>

            <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('teams.destroy', $team->id) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('teams.index') }}" class="btn btn-default">Back</a>
        </div>
    </div>
</div>
@endsection
