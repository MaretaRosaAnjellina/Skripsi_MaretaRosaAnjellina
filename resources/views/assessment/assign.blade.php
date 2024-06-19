@extends('layouts.app')

@section('title')
    GMM List
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('gmm.jury.assignStore', $gmm->id) }}" method="POST">
                    @csrf
                    <div style="display: flex; justify-content: space-between; width: 100%">
                        <div>
                            <h5 class="card-title">GMM</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Manage your gmms here.</h6>
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </div>

                    <div class="mt-2">
                        @include('layouts.includes.messages')
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" width="1%">Nama Tim</th>
                                    <th scope="col" width="15%">Paper</th>
                                    <th scope="col" width="15%">Nama Juri</th>
                                    @foreach ($criterias as $index => $criteria)
                                        <th scope="col" width="15%">
                                            <p>{{ $criteria->title }}</p> ( max score: {{ $maxScore[$index]->max_range }})
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gmmSession as $session)
                                    @foreach ($session->gmmTeams as $team)
                                        @foreach ($session->gmmJuries as $jury)
                                            @if ($juryData->jury->id == $jury->jury_id)
                                                <tr>
                                                    <td>{{ $team->team->name }}</td>
                                                    <td>
                                                        @if (count($team->team->papers) > 0)
                                                            <a href="{{ asset($team->team->papers[0]->file) }}"
                                                                target="_blank">Download</a>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>{{ $jury->jury->name }}</td>
                                                    @foreach ($criterias as $index => $criteria)
                                                        @foreach ($gmmData as $gmm)
                                                            @if ($team->team_id == $gmm->team_id && $jury->jury_id == $gmm->jury_id)
                                                                <td><input type="text"
                                                                        name="criteria_values[{{ $team->team_id }}][{{ $jury->jury_id }}][{{ $criteria->id }}]"
                                                                        value="{{ $gmm->{'criteria_' . $index + 1} }}"
                                                                        style="width: 50px" /></td>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
