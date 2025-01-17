@extends('layouts.app')

@section('title')
    User List
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <h6 class="card-subtitle mb-2 text-muted">Manage your users here.</h6>

                <div class="mt-2">
                    @include('layouts.includes.messages')
                </div>

                <div class="mb-2 text-end">
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">Add user</a>
                </div>

                <table class="table table-striped" id="table-section">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">ID</th>
                            <th scope="col" width="15%">Nama</th>
                            <th scope="col">Surel</th>
                            <th scope="col" width="10%">Username</th>
                            <th scope="col" width="10%">Role Pengguna</th>
                            <th scope="col" width="1%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td scope="row">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    @foreach ($user->roles()->get() as $role)
                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                {{-- <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm">Show</a></td> --}}
                                <td>
                                    <div style="display: flex">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex">
                    {!! $users->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
