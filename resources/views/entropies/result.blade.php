@extends('layouts.app')

@section('title')
Entropy List
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card my-2">
        <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Entropy</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Perhitungan Entropy</h6>
                    </div>
                    <a href={{ route('topsis.resultView', $gmm->id) }} class="btn btn-primary">Hitung Topsis</a>
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
                            {{-- Start Perhitungan GMM --}}
                            @foreach ($gmmData as $teamIndex => $team)
                                    <tr>
                                        <td>{{ $team->team->name }}</td>
                                        @foreach ($criterias as $index => $criteria)
                                            <td>{{ round($team->{'criteria_'.$index + 1}) }}</td>
                                        @endforeach
                                    </tr>
                            @endforeach
                            {{-- End Perhitungan GMM --}}
                        </tbody>    
                    </table>
                </div>
        </div>
    </div>

    <div class="card my-2">
        <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Entropy</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Matriks Keputusan (x)</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" width="1%">Alternative</th>
                                @foreach ($criterias as $criteriaIndex => $criteria)
                                    <th scope="col">C{{ $criteriaIndex + 1 }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Start Perhitungan Enteropy Matriks Keputusan (X) --}}
                            @php
                                $maxWeightArr = [];
                                $maxWeightValue = 0;
                            @endphp
                            @foreach ($gmmData as $teamIndex => $team)
                                @php
                                    $maxWeightVal = [];
                                @endphp
                                    <tr>
                                        <td>A{{ $teamIndex + 1 }}</td>
                                        @foreach ($criterias as $index => $criteria)
                                            @php
                                                $maxWeightVal[$index] = 0;
                                            @endphp
                                        @endforeach
                                        @foreach ($criterias as $index => $criteria)
                                            @php
                                                $value = round($team->{'criteria_'.$index + 1});
                                            @endphp
                                            <td>
                                                @foreach ($weights as $weight)
                                                    @if($criteria->id == $weight->criteria_id)
                                                        @if($value >= $weight->min_range && $value <= $weight->max_range )
                                                            {{ $weight->weight }}
                                                            @php
                                                                $maxWeightVal[$index] = max($maxWeightVal[$index], $weight->weight);
                                                            @endphp
                                                        @endif
                                                    @endif    
                                                @endforeach
                                            </td>
                                        @endforeach
                                    </tr>
                                    @php
                                        $maxWeightArr[] = $maxWeightVal;
                                    @endphp
                            @endforeach
                            <tr>
                                <td>Max Weight</td>
                                @foreach ($criterias as $index => $criteria)
                                    @php
                                        $totalMatrixPerCriteria = collect($maxWeightArr)->pluck($index)->max();
                                    @endphp
                                    <td>{{ number_format($totalMatrixPerCriteria, 0) }}</td>
                                @endforeach
                                @php
                                    $maxWeightValue = max(max($maxWeightArr));
                                @endphp
                            </tr>
                            {{-- End Perhitungan Enteropy Matriks Keputusan (X) --}}
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    <div class="card my-2">
        <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Entropy</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Normalisasi Matrix (kij)</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" width="1%">Alternative</th>
                                @foreach ($criterias as $criteriaIndex => $criteria)
                                    <th scope="col">C{{ $criteriaIndex + 1 }}</th>
                                @endforeach
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Start Perhitungan Enteropy Normalisasi Matrix (kij) --}}
                            @php
                                $totalNormalisasiPerAlternative = [];
                            @endphp
                            @foreach ($gmmData as $teamIndex => $team)
                                @php
                                    $totalNormalisasiAlternative = 0; 
                                @endphp
                                    <tr>
                                        <td>A{{ $teamIndex + 1 }}</td>
                                        @foreach ($criterias as $index => $criteria)
                                            @php
                                                $value = round($team->{'criteria_'.$index + 1})
                                            @endphp
                                            <td>
                                                @foreach ($weights as $weight)
                                                    @if($criteria->id == $weight->criteria_id)
                                                        @if($value >= $weight->min_range && $value <= $weight->max_range )
                                                            {{ $weight->weight - $maxWeightValue }}
                                                            @php
                                                                $totalNormalisasiAlternative += ($weight->weight - $maxWeightValue);
                                                            @endphp
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>
                                        @endforeach
                                        <td>{{ $totalNormalisasiAlternative }}</td>
                                        @php
                                            array_push($totalNormalisasiPerAlternative, $totalNormalisasiAlternative);
                                        @endphp
                                    </tr>
                            @endforeach
                            <tr>
                                <td colspan="{{ count($criterias) + 1 }}">Total</td>
                                <td> {{ array_sum($totalNormalisasiPerAlternative) }} </td>
                                @php
                                    $totalNormalisasiAlternative = array_sum($totalNormalisasiPerAlternative);
                                @endphp
                            </tr>
                            {{-- End Perhitungan Enteropy Normalisasi Matrix (kij) --}}
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    <div class="card my-2">
        <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Entropy</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Perhitungan Nilai Matriks (aij)</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" width="1%">Alternative</th>
                                @foreach ($criterias as $criteriaIndex => $criteria)
                                    <th scope="col">C{{ $criteriaIndex + 1 }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Start Perhitungan Enteropy Nilai Matriks (aij) --}}
                            @foreach ($gmmData as $teamIndex => $team)
                                    <tr>
                                        <td>A{{ $teamIndex + 1 }}</td>
                                        @foreach ($criterias as $index => $criteria)
                                            @php
                                                $value = round($team->{'criteria_'.$index + 1})
                                            @endphp
                                            <td>
                                                @foreach ($weights as $weight)
                                                    @if($criteria->id == $weight->criteria_id)
                                                        @if($value >= $weight->min_range && $value <= $weight->max_range )
                                                            {{ number_format(($weight->weight - $maxWeightValue) / $totalNormalisasiAlternative, 4) }}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>
                                        @endforeach
                                    </tr>
                            @endforeach
                            {{-- End Perhitungan Enteropy Nilai Matriks (aij) --}}
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    <div class="card my-2">
        <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Entropy</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Perhitungan Nilai Enteropy (Ej)</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" width="1%">Alternative</th>
                                @foreach ($criterias as $criteriaIndex => $criteria)
                                    <th scope="col">C{{ $criteriaIndex + 1 }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Start Perhitungan Enteropy Nilai Enteropy (Ej) --}}
                            @php
                                $totadlEntropyArr = [];
                            @endphp
                            @foreach ($gmmData as $teamIndex => $team)
                                @php
                                    $totalEntropyVal = [];
                                @endphp
                                <tr>
                                    <td>A{{ $teamIndex + 1 }}</td>
                                    @foreach ($criterias as $index => $criteria)
                                        @php
                                            $totalEntropyVal[$index] = 0;
                                        @endphp
                                    @endforeach
                                    @foreach ($criterias as $index => $criteria)
                                        @php
                                            $value = round($team->{'criteria_'.$index + 1});
                                            $nilaiMatrix = 0; // Inisialisasi nilai matrix untuk menghindari Notice: Undefined variable
                                        @endphp
                                        <td>
                                            @foreach ($weights as $weight)
                                                @if($criteria->id == $weight->criteria_id)
                                                    @if($value >= $weight->min_range && $value <= $weight->max_range )
                                                        @php
                                                            $nilaiMatrix = ($weight->weight - $maxWeightValue) / $totalNormalisasiAlternative;
                                                        @endphp
                                                        @if($nilaiMatrix != 0)
                                                            {{ number_format(($nilaiMatrix * log($nilaiMatrix)), 4) }}
                                                        @else
                                                            0
                                                        @endif

                                                        @if($nilaiMatrix != 0)
                                                            @php
                                                                $totalEntropyVal[$index] = $totalEntropyVal[$index] + ($nilaiMatrix * log($nilaiMatrix));
                                                            @endphp
                                                        @else
                                                            @php
                                                                $totalEntropyVal[$index] = $totalEntropyVal[$index] + 0;
                                                            @endphp
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                    @endforeach
                                </tr>
                                @php
                                    $totalEntropyArr[] = $totalEntropyVal
                                @endphp
                            @endforeach
                            <tr>
                                <td>Total</td>
                                @foreach ($criterias as $index => $criteria)
                                    @php
                                        // Menghitung total entropy per kriteria untuk semua alternatif
                                        $totalEntropyPerCriteria = collect($totalEntropyArr)->pluck($index)->sum();
                                    @endphp
                                    <td>{{ number_format($totalEntropyPerCriteria, 4) }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Entropy</td>
                                @foreach ($criterias as $index => $criteria)
                                    @php
                                        // Menghitung total entropy per kriteria untuk semua alternatif
                                        $totalEntropyPerCriteria = collect($totalEntropyArr)->pluck($index)->sum();
                                    @endphp
                                    <td>{{ number_format((-1 / log(20)) * number_format($totalEntropyPerCriteria, 4), 4) }}</td>
                                @endforeach
                            </tr>
                            {{-- End Perhitungan Enteropy Nilai Enteropy (Ej) --}}
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    <div class="card my-2">
        <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Entropy</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Perhitungan Dispresi Kriteria (Dj)</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                @foreach ($criterias as $criteriaIndex => $criteria)
                                    <th scope="col">C{{ $criteriaIndex + 1 }}</th>
                                @endforeach
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Start Perhitungan Enteropy Dispresi Kriteria (Dj) --}}
                            @php
                                $totalEntropyArr = [];
                            @endphp
                            @foreach ($gmmData as $teamIndex => $team)
                                @php
                                    $totalEntropyVal = [];
                                @endphp
                                <tr>
                                    @foreach ($criterias as $index => $criteria)
                                        @php
                                            $totalEntropyVal[$index] = 0;
                                        @endphp
                                    @endforeach
                                    @foreach ($criterias as $index => $criteria)
                                        @php
                                            $value = round($team->{'criteria_'.$index + 1});
                                            $nilaiMatrix = 0; // Inisialisasi nilai matrix untuk menghindari Notice: Undefined variable
                                        @endphp
                                            @foreach ($weights as $weight)
                                                @if($criteria->id == $weight->criteria_id)
                                                    @if($value >= $weight->min_range && $value <= $weight->max_range )
                                                        @php
                                                            $nilaiMatrix = ($weight->weight - $maxWeightValue) / $totalNormalisasiAlternative;
                                                        @endphp
                                                        @if($nilaiMatrix != 0)
                                                            @php
                                                                $totalEntropyVal[$index] = $totalEntropyVal[$index] + ($nilaiMatrix * log($nilaiMatrix));
                                                            @endphp
                                                        @else
                                                            @php
                                                                $totalEntropyVal[$index] = $totalEntropyVal[$index] + 0;
                                                            @endphp
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach
                                    @endforeach
                                </tr>
                                @php
                                    $totalEntropyArr[] = $totalEntropyVal
                                @endphp
                            @endforeach
                            <tr>
                                @php
                                    $dispresiCriterias = [];
                                    $totalDispresiCriteria = 0;
                                @endphp
                                @foreach ($criterias as $index => $criteria)
                                    @php
                                        // Menghitung total entropy per kriteria untuk semua alternatif
                                        $totalEntropyPerCriteria = collect($totalEntropyArr)->pluck($index)->sum();
                                        $dispresiCriteria = 1 - (-1 / log(20)) * $totalEntropyPerCriteria;
                                        array_push($dispresiCriterias, $dispresiCriteria)
                                    @endphp
                                    <td>{{ number_format($dispresiCriteria, 3) }}</td>
                                @endforeach
                                @php
                                    $totalDispresiCriteria = array_sum($dispresiCriterias);
                                @endphp
                                <td>{{ $totalDispresiCriteria }}</td>
                            </tr>
                            {{-- End Perhitungan Enteropy Dispresi Kriteria (Dj) --}}
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    <div class="card my-2">
        <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Entropy</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Normalisasi Nilai Dispersi (Wj)</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Jenis</th>
                                <th>Nilai Bobot (W)</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Start Perhitungan Enteropy Normalisasi Nilai Dispersi (Wj) --}}
                            @php
                                $dataNormalisasiDispersi = [];
                            @endphp
                            @foreach ($criterias as $index => $criteria)
                                @php
                                    $totalEntropyVal[$index] = 0;
                                    $normalisasiDispersi = ($dispresiCriterias[$index] / $totalDispresiCriteria);

                                    array_push($dataNormalisasiDispersi, $normalisasiDispersi);

                                    $criteriaEntropy = \App\Models\CriteriaEntropy::firstOrNew(['criteria_id' => $criteria->id]);
        
                                    // Update nilai kolom weight dengan normalisasiDispersi
                                    $criteriaEntropy->weight = number_format($normalisasiDispersi, 18);
                                    $criteriaEntropy->assessment_id = $gmm->id;
                                    
                                    // Simpan perubahan ke database
                                    $criteriaEntropy->save();
                                @endphp
                                <tr>
                                    <td>C{{ $index + 1 }}</td>
                                    <td>{{ $criteria->status }}</td>
                                    <td>{{ number_format($normalisasiDispersi, 3)}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">Total</td>
                                <td>{{ array_sum($dataNormalisasiDispersi) }}</td>
                            </tr>
                            {{-- End Perhitungan Enteropy Normalisasi Nilai Dispersi (Wj) --}}
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection