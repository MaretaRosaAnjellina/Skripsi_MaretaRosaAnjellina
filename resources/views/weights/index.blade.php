@extends('layouts.app')

@section('title')
    Weight List
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Weights</h5>
                <h6 class="card-subtitle mb-2 text-muted">Manage your weights here.</h6>

                <div class="mt-2">
                    @include('layouts.includes.messages')
                </div>

                <div class="mb-2 text-end">
                    @notrole('director')
                        <a href="{{ route('weights.create') }}" class="btn btn-primary btn-sm float-right">Add weight</a>
                    @endnotrole
                </div>

                <table class="table table-striped" id="table-section">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">ID</th>
                            <th scope="col" width="15%">Nama</th>
                            <th scope="col" width="15%">Tipe</th>
                            <th scope="col" width="15%">Range</th>
                            <th scope="col" width="15%">Bobot</th>
                            <th scope="col" width="1%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($weights as $weight)
                            <tr>
                                <td scope="row">{{ $weight->id }}</td>
                                <td>{{ $weight->criteria->title }}</td>
                                <td>{{ $weight->type }}</td>
                                <td>{{ $weight->min_range }} - {{ $weight->max_range }}</td>
                                <td>{{ $weight->weight }}</td>
                                {{-- <td><a href="{{ route('weights.show', $weight->id) }}"
                                        class="btn btn-warning btn-sm">Show</a></td> --}}

                                @notrole('director')
                                    <td>
                                        <div style="display: flex">
                                            <a href="{{ route('weights.edit', $weight->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['weights.destroy', $weight->id], 'style' => 'display:inline']) !!}
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
