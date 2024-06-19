@extends('layouts.app')

@section('title')
    Team List
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Teams</h5>
                <h6 class="card-subtitle mb-2 text-muted">Manage your teams here.</h6>

                <div class="mt-2">
                    @include('layouts.includes.messages')
                </div>

                @notrole('director')
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <form action="{{ route('teams.import') }}" method="POST" enctype="multipart/form-data"
                                class="d-flex">
                                @csrf
                                <div class="form-group me-2">
                                    <label for="file" class="me-2">File Excel:</label>
                                    <input type="file" name="file" class="form-control-file">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Import</button>
                            </form>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="{{ route('teams.create') }}" class="btn btn-primary btn-sm">Add team</a>
                        </div>
                    </div>
                @endnotrole

                @role('director')
                    <div class="row mb-2">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="{{ route('teams.create') }}" class="btn btn-primary btn-sm">Export Team</a>
                        </div>
                    </div>
                    @endnotrole

                    <table class="table table-striped" id="table-section">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Tim</th>
                                <th scope="col">Judul Inovasi</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Nama Ketua</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr>
                                    <td scope="row">{{ $team->id }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->title_innovation }}</td>
                                    <td>{{ $team->category_innovation }}</td>
                                    <td>{{ $team->name_leader }}</td>
                                    {{-- <td><a href="{{ route('teams.show', $team->id) }}" class="btn btn-warning btn-sm">Show</a></td> --}}
                                    <td>
                                        <div style="display: flex">
                                            @notrole('director')
                                                <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-info btn-sm">Edit</a>
                                            @endnotrole
                                            <a href="{{ route('papers.index', $team->id) }}"
                                                class="btn btn-success btn-sm">Paper</a>
                                            @notrole('director')
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['teams.destroy', $team->id], 'style' => 'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            @endnotrole
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
