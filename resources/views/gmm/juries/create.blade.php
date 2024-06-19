@extends('layouts.app')

@section('title')
Create Jury
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new jury</h1>
        <div class="lead">
            Add new jury and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('gmmJuries.store',['gmm'=>$gmm->id, 'session'=>$session->id]) }}">
                @csrf
                <div class="mb-3">
                    <label for="jury_id" class="form-label">Jury</label>
                    <select class="form-control" name="jury_id" required>
                        <option value="" disabled selected>Select Jury</option>
                        @foreach($juries as $jury)
                            <option value="{{ $jury->id }}" {{ old('jury_id') == $jury->id ? 'selected' : '' }}>
                                {{ $jury->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('jury_id')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save jury</button>
                <a href="{{ route('gmmJuries.index', ['gmm'=>$gmm->id, 'session'=>$session->id]) }}" class="btn btn-default">Back</a>
            </form>

        </div>

    </div>
@endsection