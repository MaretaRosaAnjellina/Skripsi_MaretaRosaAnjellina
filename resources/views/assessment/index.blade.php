@extends('layouts.app')

@section('title')
    GMM List
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">GMM</h5>
                <h6 class="card-subtitle mb-2 text-muted">Manage your gmms here.</h6>

                <div class="mt-2">
                    @include('layouts.includes.messages')
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
                                <td><a href="{{ route('gmm.jury.assignView', $gmm->id) }}"
                                        class="btn btn-success btn-sm">Penilaian</a></td>
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
