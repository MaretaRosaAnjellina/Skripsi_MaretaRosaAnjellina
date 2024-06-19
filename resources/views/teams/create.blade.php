@extends('layouts.app')

@section('title')
Create Team
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new team</h1>
        <div class="lead">
            Add new team and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('teams.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="title_innovation" class="form-label">Title Innovation</label>
                    <input value="{{ old('title_innovation') }}" 
                        type="text" 
                        class="form-control" 
                        name="title_innovation" 
                        placeholder="Title Innovation">

                    @if ($errors->has('title_innovation'))
                        <span class="text-danger text-left">{{ $errors->first('title_innovation') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="category_innovation" class="form-label">Category Innovation</label>
                    <input value="{{ old('category_innovation') }}" 
                        type="text" 
                        class="form-control" 
                        name="category_innovation" 
                        placeholder="Category Innovation">

                    @if ($errors->has('category_innovation'))
                        <span class="text-danger text-left">{{ $errors->first('category_innovation') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="name_leader" class="form-label">Leader Name</label>
                    <input value="{{ old('name_leader') }}" 
                        type="text" 
                        class="form-control" 
                        name="name_leader" 
                        placeholder="Leader Name">

                    @if ($errors->has('name_leader'))
                        <span class="text-danger text-left">{{ $errors->first('name_leader') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="nik_leader" class="form-label">Leader NIK</label>
                    <input value="{{ old('nik_leader') }}" 
                        type="text" 
                        class="form-control" 
                        name="nik_leader" 
                        placeholder="Leader NIK">

                    @if ($errors->has('nik_leader'))
                        <span class="text-danger text-left">{{ $errors->first('nik_leader') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="work_unit" class="form-label">Work Unit</label>
                    <input value="{{ old('work_unit') }}" 
                        type="text" 
                        class="form-control" 
                        name="work_unit" 
                        placeholder="Work Unit">

                    @if ($errors->has('work_unit'))
                        <span class="text-danger text-left">{{ $errors->first('work_unit') }}</span>
                    @endif
                </div>

                <!-- Repeat the member inputs 1 to 5 as necessary -->
                @for ($i = 1; $i <= 5; $i++)
                    <div class="mb-3">
                        <label for="{{ 'name_member_' . $i }}" class="form-label">Member {{ $i }} Name</label>
                        <input value="{{ old('name_member_' . $i) }}" 
                            type="text" 
                            class="form-control" 
                            name="{{ 'name_member_' . $i }}" 
                            placeholder="Member {{ $i }} Name">

                        @if ($errors->has('name_member_' . $i))
                            <span class="text-danger text-left">{{ $errors->first('name_member_' . $i) }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="{{ 'nik_member_' . $i }}" class="form-label">Member {{ $i }} NIK</label>
                        <input value="{{ old('nik_member_' . $i) }}" 
                            type="text" 
                            class="form-control" 
                            name="{{ 'nik_member_' . $i }}" 
                            placeholder="Member {{ $i }} NIK">

                        @if ($errors->has('nik_member_' . $i))
                            <span class="text-danger text-left">{{ $errors->first('nik_member_' . $i) }}</span>
                        @endif
                    </div>
                @endfor

                <button type="submit" class="btn btn-primary">Save team</button>
                <a href="{{ route('teams.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>
    </div>
@endsection
