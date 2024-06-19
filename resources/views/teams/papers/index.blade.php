@extends('layouts.app')

@section('title')
    Paper List
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Makalah</h5>
                <h6 class="card-subtitle mb-2 text-muted">Management makalah tim disini.</h6>

                <div class="mt-2">
                    @include('layouts.includes.messages')
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('papers.create', $team->id) }}" class="btn btn-primary btn-sm">Add Paper</a>
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">ID</th>
                            <th scope="col" width="20%">Team</th>
                            <th scope="col" width="10%">File</th>
                            <th scope="col" width="10%" colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($papers as $paper)
                            <tr>
                                <th scope="row">{{ $paper->id }}</th>
                                <td>{{ $paper->team->name }}</td> <!-- Assuming the relationship exists in Paper model -->
                                <td><a href="{{ asset($paper->file) }}" target="_blank">Download</a></td>
                                <td><a href="{{ route('papers.edit', ['paper' => $paper->id, 'team' => $team->id]) }}"
                                        class="btn btn-info btn-sm">Edit</a></td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['papers.destroy', ['paper' => $paper->id, 'team' => $team->id]],
                                        'style' => 'display:inline',
                                    ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex">
                    {!! $papers->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
