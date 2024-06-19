@extends('layouts.app')

@section('title')
    Penilaian
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Penilaian</h5>
                <h6 class="card-subtitle mb-2 text-muted">Manage your penilaian here.</h6>

                <div class="mt-2">
                    @include('layouts.includes.messages')
                </div>

                <div class="mb-2 text-end">
                    @notrole('director')
                        <a href="{{ route('gmm.create') }}" class="btn btn-primary btn-sm float-right">Tambah penilaian</a>
                    @endnotrole
                </div>

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
                                @php
                                    $canAssess =
                                        $gmm->assessment_sessions->isNotEmpty() &&
                                        $gmm->assessment_juries->isNotEmpty() &&
                                        $gmm->assessment_teams->isNotEmpty();
                                @endphp

                                @if ($canAssess)
                                    <td>
                                        <a href="{{ route('gmm.assignView', $gmm->id) }}"
                                            class="btn btn-success btn-sm">Penilaian</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('gmm.calculate', $gmm->id) }}"
                                            class="btn btn-success btn-sm">Hitung</a>
                                    </td>
                                @else
                                    <td colspan="2">
                                        <button class="btn btn-secondary btn-sm" disabled>Penilaian</button>
                                        <button class="btn btn-secondary btn-sm" disabled>Hitung</button>
                                    </td>
                                @endif

                                <td><a href="{{ route('gmmSessions.index', $gmm->id) }}"
                                        class="btn btn-success btn-sm">Sesi</a></td>
                                <td><a href="{{ route('gmm.show', $gmm->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                                @notrole('director')
                                    <td><a href="{{ route('gmm.edit', $gmm->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['gmm.destroy', $gmm->id], 'style' => 'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                @endnotrole

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
