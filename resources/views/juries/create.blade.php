@extends('layouts.app')

@section('title')
    Create Jury
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Jury</h5>

            <form method="post" action="{{ route('juries.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="user_id" class="form-label">User ID</label>
                    <select class="form-control" name="user_id" required>
                        <option value="">Pilih akun</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('user_id'))
                        <span class="text-danger text-left">{{ $errors->first('user_id') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input value="{{ old('nik') }}" type="text" class="form-control" name="nik" placeholder="NIK" required>

                    @if ($errors->has('nik'))
                        <span class="text-danger text-left">{{ $errors->first('nik') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input value="{{ old('category') }}" type="text" class="form-control" name="category" placeholder="Category" required>

                    @if ($errors->has('category'))
                        <span class="text-danger text-left">{{ $errors->first('category') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save jury</button>
                <a href="{{ route('juries.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
