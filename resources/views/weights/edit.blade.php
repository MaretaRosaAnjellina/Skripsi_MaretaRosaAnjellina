@extends('layouts.app')

@section('title')
Edit Weight
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update weight</h5>

            <div class="container mt-4">
                <form method="post" action="{{ route('weights.update', $weight->id) }}">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="criteria_id" class="form-label">Criteria</label>
                        <select class="form-control" name="criteria_id" required>
                            <option value="" disabled>Select Criteria</option>
                            @foreach($criterias as $criteria)
                                <option value="{{ $criteria->id }}" {{ $weight->criteria_id == $criteria->id ? 'selected' : '' }}>
                                    {{ $criteria->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('criteria_id')
                            <span class="text-danger text-left">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input value="{{ $weight->type }}" 
                            type="text" 
                            class="form-control" 
                            name="type" 
                            placeholder="Type" required>
                        @error('type')
                            <span class="text-danger text-left">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="min_range" class="form-label">Min Range</label>
                        <input value="{{ $weight->min_range }}" 
                            type="number" 
                            class="form-control" 
                            name="min_range" 
                            placeholder="Min Range" required>
                        @error('min_range')
                            <span class="text-danger text-left">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="max_range" class="form-label">Max Range</label>
                        <input value="{{ $weight->max_range }}" 
                            type="number" 
                            class="form-control" 
                            name="max_range" 
                            placeholder="Max Range" required>
                        @error('max_range')
                            <span class="text-danger text-left">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight</label>
                        <input value="{{ $weight->weight }}" 
                            type="number" 
                            class="form-control" 
                            name="weight" 
                            placeholder="Weight" required>
                        @error('weight')
                            <span class="text-danger text-left">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update weight</button>
                    <a href="{{ route('weights.index') }}" class="btn btn-default">Cancel</a>
                </form>

            </div>
        </div>
    </div>

</div>
@endsection