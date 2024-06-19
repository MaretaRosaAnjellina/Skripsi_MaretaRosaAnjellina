@extends('layouts.app')

@section('title')
Edit Criteria
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update criteria</h5>

            <div class="container mt-4">
                <form method="post" action="{{ route('criterias.update', $criteria->id) }}">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input value="{{ $criteria->title }}" type="text" class="form-control" name="title" placeholder="Title"
                            required>

                        @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="description" placeholder="Description"
                            required>{{ $criteria->description }}</textarea>

                        @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" name="status" required>
                            <option value="" disabled>Pilih Status</option>
                            <option value="COST" {{ $criteria->status == 'COST' ? 'selected' : '' }}>COST</option>
                            <option value="BENEFIT" {{ $criteria->status == 'BENEFIT' ? 'selected' : '' }}>BENEFIT</option>
                        </select>

                        @if ($errors->has('status'))
                        <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update criteria</button>
                    <a href="{{ route('criterias.index') }}" class="btn btn-default">Cancel</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection