@extends('layouts.app')

@section('title')
GMM List
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">GMM</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Ini adalah hasil perhitungan GMM</h6>
                    </div>
                    <a href={{ route('entropy.resultView', $gmm->id) }} class="btn btn-primary">Hitung Entropies</a>
                </div>
                <div class="mt-2">
                    @include('layouts.includes.messages')
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nama Tim</th>
                                @foreach ($criterias as $criteria)
                                    <th scope="col">{{ $criteria->title }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gmmData as $teamIndex => $team)
                                    <tr>
                                        <td>{{ $team->team->name }}</td>
                                        @foreach ($criterias as $index => $criteria)
                                            <td>{{ number_format($team->{'criteria_'.$index + 1}, 4) }}</td>
                                        @endforeach
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection