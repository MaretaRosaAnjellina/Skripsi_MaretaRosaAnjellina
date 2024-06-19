@extends('layouts.app')

@section('title')
Create Criteria
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new criteria</h1>
        <div class="lead">
            Add new criteria and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input value="{{ old('title') }}" 
                        type="text" 
                        class="form-control" 
                        name="title" 
                        placeholder="Title" required>

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea 
                        class="form-control" 
                        name="description" 
                        placeholder="Description" required>{{ old('description') }}</textarea>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status" required>
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="COST" {{ old('status') == 'COST' ? 'selected' : '' }}>COST</option>
                        <option value="BENEFIT" {{ old('status') == 'BENEFIT' ? 'selected' : '' }}>BENEFIT</option>
                    </select>

                    @if ($errors->has('status'))
                        <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save criteria</button>
                <a href="{{ route('criterias.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection