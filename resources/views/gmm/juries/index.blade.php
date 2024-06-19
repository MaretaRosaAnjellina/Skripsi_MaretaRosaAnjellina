@extends('layouts.app')

@section('title')
Jury List
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Juri pada sesi ini</h5>
            <h6 class="card-subtitle mb-2 text-muted">Manage your juries here.</h6>

            <div class="mt-2">
                @include('layouts.includes.messages')
            </div>

            <div class="mb-2 text-end">
                <a href="{{ route('gmmJuries.create', ['gmm'=>$gmm->id, 'session'=>$session->id]) }}" class="btn btn-primary btn-sm float-right">Add jury</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col" width="1%" colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gmmJuries as $jury)
                    <tr>
                        <th scope="row">{{ $jury->id }}</th>
                        <td>{{ $jury->jury->name }}</td>
                        <td><a href="{{ route('gmmJuries.show', ['gmm' => $gmm->id, 'session' => $session->id, 'gmmJury' => $jury->id]) }}" class="btn btn-warning btn-sm">Show</a></td>
                        <td><a href="{{ route('gmmJuries.edit', ['gmm' => $gmm->id, 'session' => $session->id, 'gmmJury' => $jury->id]) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['gmmJuries.destroy',
                            ['gmm' => $gmm->id, 'session' => $session->id, 'gmmJury' => $jury->id]],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex">
                {!! $gmmJuries->links() !!}
            </div>

        </div>
    </div>
</div>
@endsection