@extends('layouts.app')

@section('title')
    Criteria List
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Criterias</h5>
                <h6 class="card-subtitle mb-2 text-muted">Manage your criterias here.</h6>

                <div class="mt-2">
                    @include('layouts.includes.messages')
                </div>

                <div class="mb-2 text-end">
                    @notrole('director')
                        <a href="{{ route('criterias.create') }}" class="btn btn-primary btn-sm float-right">Add criteria</a>
                    @endnotrole
                </div>

                <table class="table table-striped" id="table-section">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">ID</th>
                            <th scope="col" width="15%">Judul</th>
                            <th scope="col" width="15%">Deskripsi</th>
                            <th scope="col" width="15%">Status</th>
                            <th scope="col" width="1%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($criterias as $criteria)
                            <tr>
                                <td scope="row">{{ $criteria->id }}</td>
                                <td>{{ $criteria->title }}</td>
                                <td>{{ $criteria->description }}</td>
                                <td>{{ $criteria->status }}</td>
                                {{-- <td><a href="{{ route('criterias.show', $criteria->id) }}"
                                        class="btn btn-warning btn-sm">Show</a></td> --}}
                                @notrole('director')
                                    <td>
                                        <div style="display: flex">
                                            <a href="{{ route('criterias.edit', $criteria->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['criterias.destroy', $criteria->id],
                                                'style' => 'display:inline',
                                            ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                @endnotrole

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
