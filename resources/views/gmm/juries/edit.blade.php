@extends('layouts.app')

@section('title')
Edit Jury
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update jury</h5>

            <div class="container mt-4">
                <form method="post" action="{{ route('gmmJuries.update', ['gmm' => $gmm->id, 'session' => $session->id, 'gmmJury' => $gmmJury->id]) }}">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="jury_id" class="form-label">Jury</label>
                        <select class="form-control" name="jury_id" required>
                            <option value="" disabled>Select Jury</option>
                            @foreach($juries as $jury)
                                <option value="{{ $jury->id }}" {{ $gmmJury->jury_id == $jury->id ? 'selected' : '' }}>
                                    {{ $jury->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('jury_id')
                            <span class="text-danger text-left">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update jury</button>
                    <a href="{{ route('gmmJuries.index', ['gmm'=>$gmm->id, 'session'=>$session->id]) }}" class="btn btn-default">Cancel</a>
                </form>

            </div>
        </div>
    </div>

</div>
@endsection