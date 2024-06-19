@extends('layouts.app')

@section('title')
    Edit GMM
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update perhitungan</h5>

                <div class="container mt-4">
                    <form method="post" action="{{ route('gmm.update', $gmm->id) }}">
                        @method('patch')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input value="{{ $gmm->name }}" type="text" class="form-control" name="name"
                                placeholder="Name" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Tahun</label>
                            <input value="{{ $gmm->year }}" type="number" class="form-control" name="year"
                                placeholder="Tahun perhitungan" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Update gmm</button>
                        <a href="{{ route('gmm.index') }}" class="btn btn-default">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
