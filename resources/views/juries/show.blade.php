@extends('layouts.app')

@section('title')
    Show Jury
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Jury Details</h5>
            <div class="mt-3">
                <p><strong>Name:</strong> {{ $jury->name }}</p>
                <p><strong>User ID:</strong> {{ $jury->user_id }}</p>
                <p><strong>NIK:</strong> {{ $jury->nik }}</p>
                <p><strong>Category:</strong> {{ $jury->category }}</p>
            </div>

            <a href="{{ route('juries.edit', $jury->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('juries.destroy', $jury->id) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('juries.index') }}" class="btn btn-default">Back</a>
        </div>
    </div>
</div>
@endsection
