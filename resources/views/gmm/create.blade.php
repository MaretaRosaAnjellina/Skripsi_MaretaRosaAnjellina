@extends('layouts.app')

@section('title')
    Create GMM
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Tambahkan Penilaian Baru</h1>
        <div class="lead">
            Tambahkan penilaian baru
        </div>

        <div class="container mt-4">
            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Name"
                        required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tahun</label>
                    <input value="{{ old('year') }}" type="number" class="form-control" name="year"
                        placeholder="Tahun perhitungan" required>

                    @if ($errors->has('year'))
                        <span class="text-danger text-left">{{ $errors->first('year') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save gmm</button>
                <a href="{{ route('gmm.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
