@extends('layouts.app')

@section('title')
    GMM List
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card my-2">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Topsis</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Matriks Keputusan (X)</h6>
                    </div>
                    <a href={{ route('gmm.calculate', $gmm->id) }} class="btn btn-primary">Lihat Hasil</a>
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
                            {{-- Start Perhitungan Topsis Matriks Keputusan (X) --}}
                            @php
                                $totalMatrixArr = [];
                            @endphp
                            @foreach ($gmmData as $teamIndex => $team)
                                @php
                                    $totalMatrixVal = [];
                                @endphp
                                <tr>
                                    <td>A{{ $teamIndex + 1 }}</td>
                                    @foreach ($criterias as $index => $criteria)
                                        @php
                                            $totalMatrixVal[$index] = 0;
                                        @endphp
                                    @endforeach
                                    @foreach ($criterias as $index => $criteria)
                                        @php
                                            $value = round($team->{'criteria_' . $index + 1});
                                        @endphp
                                        <td>
                                            @foreach ($weights as $weight)
                                                @if ($criteria->id == $weight->criteria_id)
                                                    @if ($value >= $weight->min_range && $value <= $weight->max_range)
                                                        {{ $weight->weight }}
                                                        @php
                                                            $totalMatrixVal[$index] = pow($weight->weight, 2);
                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                    @endforeach
                                </tr>
                                @php
                                    $totalMatrixArr[] = $totalMatrixVal;
                                @endphp
                            @endforeach
                            <tr>
                                <td>Hasil</td>

                                @foreach ($criterias as $index => $criteria)
                                    @php
                                        $totalMatrixPerCriteria = sqrt(collect($totalMatrixArr)->pluck($index)->sum());
                                    @endphp
                                    <td>{{ number_format($totalMatrixPerCriteria, 8) }}</td>
                                @endforeach
                            </tr>
                            {{-- End Perhitungan Topsis Matriks Keputusan (X) --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Topsis</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Perhitungan Matriks Ternormalisasi (R)</h6>
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
                            {{-- Start Perhitungan Topsis Matriks Ternormalisasi (R) --}}
                            @foreach ($gmmData as $teamIndex => $team)
                                <tr>
                                    <td>A{{ $teamIndex + 1 }}</td>
                                    @foreach ($criterias as $index => $criteria)
                                        @php
                                            $value = round($team->{'criteria_' . $index + 1});
                                        @endphp
                                        <td>
                                            @foreach ($weights as $weight)
                                                @if ($criteria->id == $weight->criteria_id)
                                                    @if ($value >= $weight->min_range && $value <= $weight->max_range)
                                                        @php
                                                            $totalMatrixPerCriteria = sqrt(
                                                                collect($totalMatrixArr)->pluck($index)->sum(),
                                                            );
                                                        @endphp
                                                        {{ number_format($weight->weight / $totalMatrixPerCriteria, 4) }}
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            {{-- End Perhitungan Topsis Matriks Ternormalisasi (R) --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Topsis</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Bobot preferensi (Wj)</h6>
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
                            {{-- Start Perhitungan Topsis Bobot preferensi (Wj) --}}
                            @foreach ($enteropies as $index => $enteropy)
                                <tr>
                                    <td>C{{ $index + 1 }}</td>
                                    <td>{{ $enteropy->criteria->status }}</td>
                                    <td>{{ number_format($enteropy->weight, 3) }}</td>
                                </tr>
                            @endforeach
                            {{-- End Perhitungan Topsis Bobot preferensi (Wj) --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Topsis</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Perhitungan Matriks Ternormalisasi Terbobot (Y)</h6>
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
                            {{-- Start Perhitungan Topsis Matriks Ternormalisasi Terbobot (Y) --}}
                            @php
                                $totalMatrixNormalisasiArr = [];
                            @endphp
                            @foreach ($gmmData as $teamIndex => $team)
                                @php
                                    $totalMatrixNormalisasiVal = [];
                                @endphp
                                <tr>
                                    <td>A{{ $teamIndex + 1 }}</td>
                                    @foreach ($criterias as $index => $criteria)
                                        @php
                                            $value = round($team->{'criteria_' . $index + 1});
                                        @endphp
                                        <td>
                                            @foreach ($weights as $weight)
                                                @if ($criteria->id == $weight->criteria_id)
                                                    @if ($value >= $weight->min_range && $value <= $weight->max_range)
                                                        @foreach ($enteropies as $index => $enteropy)
                                                            @if ($criteria->id == $enteropy->criteria_id)
                                                                @php
                                                                    $totalMatrixPerCriteria = number_format(
                                                                        $weight->weight /
                                                                            number_format(
                                                                                sqrt(
                                                                                    collect($totalMatrixArr)
                                                                                        ->pluck($index)
                                                                                        ->sum(),
                                                                                ),
                                                                                16,
                                                                            ),
                                                                        16,
                                                                    );
                                                                    $totalMatrixNormalisasiVal[$index] = number_format(
                                                                        $totalMatrixPerCriteria * $enteropy->weight,
                                                                        16,
                                                                    );
                                                                @endphp
                                                                {{ $totalMatrixNormalisasiVal[$index] }}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                    @endforeach
                                </tr>
                                @php
                                    $totalMatrixNormalisasiArr[] = $totalMatrixNormalisasiVal;
                                @endphp
                            @endforeach
                            {{-- End Perhitungan Topsis Matriks Ternormalisasi Terbobot (Y) --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Topsis</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Solusi Ideal Positif (A+) dan Negatif (A-)</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Solusi ideal positif</th>
                                <th>Solusi ideal negatif</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Start Perhitungan Topsis Solusi Ideal Positif (A+) dan Negatif (A-) --}}
                            @php
                                // Inisialisasi array untuk menyimpan nilai maksimum dan minimum dari masing-masing indeks
                                $maxValues = [];
                                $minValues = [];

                                // Loop melalui setiap indeks pada array
                                for ($i = 0; $i < count($totalMatrixNormalisasiArr[0]); $i++) {
                                    // Inisialisasi nilai maksimum dan minimum untuk indeks saat ini
                                    $maxValue = $totalMatrixNormalisasiArr[0][$i];
                                    $minValue = $totalMatrixNormalisasiArr[0][$i];

                                    // Loop melalui semua array untuk mencari nilai maksimum dan minimum
                                    foreach ($totalMatrixNormalisasiArr as $row) {
                                        $maxValue = max($maxValue, $row[$i]);
                                        $minValue = min($minValue, $row[$i]);
                                    }

                                    // Simpan nilai maksimum dan minimum dalam array
                                    $maxValues[] = $maxValue;
                                    $minValues[] = $minValue;
                                }
                                // dd($minValues)
                            @endphp
                            @php
                                $idealPositiveArr = [];
                                $idealNegativeArr = [];

                                foreach ($enteropies as $index => $enteropy) {
                                    if ($enteropy->criteria->status == 'benefit') {
                                        $idealPositiveArr[$index] = $maxValues[$index];
                                        $idealNegativeArr[$index] = $minValues[$index];
                                    } else {
                                        $idealPositiveArr[$index] = $minValues[$index];
                                        $idealNegativeArr[$index] = $maxValues[$index];
                                    }
                                }
                            @endphp

                            @foreach ($enteropies as $index => $enteropy)
                                <tr>
                                    <td>C{{ $index + 1 }}</td>
                                    <td>{{ $idealPositiveArr[$index] }}</td>
                                    <td>{{ $idealNegativeArr[$index] }}</td>
                                </tr>
                            @endforeach
                            {{-- End Perhitungan Topsis Solusi Ideal Positif (A+) dan Negatif (A-) --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Topsis</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Jarak Ideal Positif (S+) dan Negatif (S-)</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                <th>Jarak ideal positif</th>
                                <th>Jarak ideal negatif</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Start Perhitungan Topsis Jarak Ideal Positif (S+) dan Negatif (S-) --}}
                            @php
                                $lengthIdealPositives = [];
                                $lengthIdealNegatives = [];

                                foreach ($gmmData as $teamIndex => $team) {
                                    $subValuePositive = 0.0;
                                    $subValueNegative = 0.0;

                                    foreach ($maxValues as $key => $solutionIdeal) {
                                        $subValuePositive += pow(
                                            $totalMatrixNormalisasiArr[$teamIndex][$key] - $idealPositiveArr[$key],
                                            2,
                                        );
                                        $subValueNegative += pow(
                                            $totalMatrixNormalisasiArr[$teamIndex][$key] - $idealNegativeArr[$key],
                                            2,
                                        );
                                    }
                                    $lengthIdealPositives[] = sqrt($subValuePositive);
                                    $lengthIdealNegatives[] = sqrt($subValueNegative);
                                }
                            @endphp
                            @foreach ($gmmData as $teamIndex => $team)
                                <tr>
                                    <td>A{{ $teamIndex + 1 }}</td>
                                    <td>{{ number_format($lengthIdealPositives[$teamIndex], 8) }}</td>
                                    <td>{{ number_format($lengthIdealNegatives[$teamIndex], 8) }}</td>
                                </tr>
                            @endforeach
                            {{-- End Perhitungan Topsis Jarak Ideal Positif (S+) dan Negatif (S-) --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card my-2">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Topsis</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Nilai Preferensi Setiap Alternatif (V)</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                <th>Nilai (V)</th>
                                <th>Rangking</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Start Perhitungan Topsis Nilai Preferensi Setiap Alternatif (V) --}}
                            @php
                                $preferenceAlt = [];
                                foreach ($gmmData as $teamIndex => $team) {
                                    $preferenceAlt[] =
                                        $lengthIdealNegatives[$teamIndex] /
                                        ($lengthIdealPositives[$teamIndex] + $lengthIdealNegatives[$teamIndex]);
                                }
                                arsort($preferenceAlt);
                                $ranking = 1;
                            @endphp
                            @foreach ($preferenceAlt as $teamIndex => $preferenceValue)
                                <tr>
                                    <td>A{{ $teamIndex + 1 }}</td>
                                    <td>{{ $preferenceValue }}</td>
                                    <td>{{ $ranking }}</td> <!-- Peringkat -->
                                </tr>
                                @php
                                    $ranking++; // Tambahkan peringkat setiap kali melakukan iterasi
                                @endphp
                            @endforeach
                            {{-- End Perhitungan Topsis Nilai Preferensi Setiap Alternatif (V) --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
