@extends('layouts.app')

@section('title')
    Perhitungan
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Perhitungan</h5>
                <h6 class="card-subtitle mb-2 text-muted">Manage perhitungan disini.</h6>

                <div class="mt-2">
                    @include('layouts.includes.messages')
                </div>

                {{-- <div class="mb-2 text-end">
                <a href="{{ route('gmm.create') }}" class="btn btn-primary btn-sm float-right">Add gmm</a>
            </div> --}}

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">ID</th>
                            <th scope="col" width="15%">Nama</th>
                            <th scope="col" width="15%">Tahun</th>
                            <th scope="col" width="1%" colspan="6"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gmms as $gmm)
                            <tr>
                                <th scope="row">{{ $gmm->id }}</th>
                                <td>{{ $gmm->name }}</td>
                                <td>{{ $gmm->year }}</td>
                                @role('director')
                                    <td><a href="{{ route('gmm.calculate', $gmm->id) }}"
                                            class="btn btn-success btn-sm">Hitung</a></td>
                                @endrole
                                @notrole('director')
                                    <td><a href="{{ route('gmm.resultView', $gmm->id) }}"
                                            class="btn btn-success btn-sm">Hitung</a></td>
                                @endnotrole
                                {{-- <td><a href="{{ route('gmmSessions.index', $gmm->id) }}" class="btn btn-success btn-sm">Sesi</a></td>
                        <td><a href="{{ route('gmm.show', $gmm->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                        <td><a href="{{ route('gmm.edit', $gmm->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['gmm.destroy',
                            $gmm->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex">
                    {!! $gmms->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
