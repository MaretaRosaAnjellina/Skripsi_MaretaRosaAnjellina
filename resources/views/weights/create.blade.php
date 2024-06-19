@extends('layouts.app')

@section('title')
Create Weight
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new weight</h1>
        <div class="lead">
            Add new weight and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('weights.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="criteria_id" class="form-label">Criteria</label>
                    <select class="form-control" name="criteria_id" required>
                        <option value="" disabled selected>Select Criteria</option>
                        @foreach($criterias as $criteria)
                            <option value="{{ $criteria->id }}" {{ old('criteria_id') == $criteria->id ? 'selected' : '' }}>
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
                    <input value="{{ old('type') }}" 
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
                    <input value="{{ old('min_range') }}" 
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
                    <input value="{{ old('max_range') }}" 
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
                    <input value="{{ old('weight') }}" 
                        type="number" 
                        class="form-control" 
                        name="weight" 
                        placeholder="Weight" required>
                    @error('weight')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save weight</button>
                <a href="{{ route('weights.index') }}" class="btn btn-default">Back</a>
            </form>

        </div>

    </div>
@endsection