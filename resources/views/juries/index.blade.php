@extends('layouts.app')

@section('title')
    Juries
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Juries List</h5>

                <div class="mb-2 text-end">
                    @notrole('director')
                        <a href="{{ route('juries.create') }}" class="btn btn-success mb-3">Create Jury</a>
                    @endnotrole
                </div>


                <table class="table table-striped" id="table-section">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>ID Pengguna</th>
                            <th>NIK</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($juries as $jury)
                            <tr>
                                <td>{{ $jury->id }}</td>
                                <td>{{ $jury->name }}</td>
                                <td>{{ $jury->user_id }}</td>
                                <td>{{ $jury->nik }}</td>
                                <td>{{ $jury->category }}</td>
                                <td>
                                    {{-- <a href="{{ route('juries.show', $jury->id) }}" class="btn btn-info btn-sm">View</a> --}}
                                    @notrole('director')
                                        <a href="{{ route('juries.edit', $jury->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <form action="{{ route('juries.destroy', $jury->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    @endnotrole
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
