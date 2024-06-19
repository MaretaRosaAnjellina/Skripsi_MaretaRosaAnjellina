@extends('layouts.app')

@section('title')
Edit Session
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update session</h5>

            <div class="container mt-4">
                <form method="post" action="{{ route('gmmSessions.update', ['gmm' => $gmm->id, 'gmmSession' => $gmmSession->id]) }}">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ $gmmSession->name }}" type="text" class="form-control" name="name" placeholder="Name"
                            required>

                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update session</button>
                    <a href="{{ route('gmmSessions.index', $gmm->id) }}" class="btn btn-default">Cancel</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection