@extends('layouts.app')

@section('title')
    GMM List
@endsection

@section('content')
    <div class="bg-light rounded">
        <div>
            @php
                $maxWeightArr = [];
                $maxWeightValue = 0;
            @endphp
            @foreach ($gmmData as $teamIndex => $team)
                @php
                    $maxWeightVal = [];
                @endphp
                @foreach ($criterias as $index => $criteria)
                    @php
                        $maxWeightVal[$index] = 0;
                    @endphp
                @endforeach
                @foreach ($criterias as $index => $criteria)
                    @php
                        $value = round($team->{'criteria_' . $index + 1});
                    @endphp
                    @foreach ($weights as $weight)
                        @if ($criteria->id == $weight->criteria_id)
                            @if ($value >= $weight->min_range && $value <= $weight->max_range)
                                @php
                                    $maxWeightVal[$index] = max($maxWeightVal[$index], $weight->weight);
                                @endphp
                            @endif
                        @endif
                    @endforeach
                @endforeach
                @php
                    $maxWeightArr[] = $maxWeightVal;
                @endphp
            @endforeach
            @foreach ($criterias as $index => $criteria)
                @php
                    $totalMatrixPerCriteria = collect($maxWeightArr)->pluck($index)->max();
                @endphp
            @endforeach
            @php
                $maxWeightValue = max(max($maxWeightArr));
            @endphp
        </div>

        <div>
            {{-- Start Perhitungan Enteropy Normalisasi Matrix (kij) --}}
            @php
                $totalNormalisasiPerAlternative = [];
            @endphp
            @foreach ($gmmData as $teamIndex => $team)
                @php
                    $totalNormalisasiAlternative = 0;
                @endphp
                @foreach ($criterias as $index => $criteria)
                    @php
                        $value = round($team->{'criteria_' . $index + 1});
                    @endphp
                    @foreach ($weights as $weight)
                        @if ($criteria->id == $weight->criteria_id)
                            @if ($value >= $weight->min_range && $value <= $weight->max_range)
                                @php
                                    $totalNormalisasiAlternative += $weight->weight - $maxWeightValue;
                                @endphp
                            @endif
                        @endif
                    @endforeach
                @endforeach
                @php
                    array_push($totalNormalisasiPerAlternative, $totalNormalisasiAlternative);
                @endphp
            @endforeach
            @php
                $totalNormalisasiAlternative = array_sum($totalNormalisasiPerAlternative);
            @endphp
            </tr>
            {{-- End Perhitungan Enteropy Normalisasi Matrix (kij) --}}
        </div>

        <div>
            {{-- Start Perhitungan Enteropy Nilai Matriks (aij) --}}
            @foreach ($gmmData as $teamIndex => $team)
                @foreach ($criterias as $index => $criteria)
                    @php
                        $value = round($team->{'criteria_' . $index + 1});
                    @endphp
                    @foreach ($weights as $weight)
                        @if ($criteria->id == $weight->criteria_id)
                            @if ($value >= $weight->min_range && $value <= $weight->max_range)
                                {{-- {{ number_format(($weight->weight - $maxWeightValue) / $totalNormalisasiAlternative, 4) }} --}}
                            @endif
                        @endif
                    @endforeach
                @endforeach
            @endforeach
            {{-- End Perhitungan Enteropy Nilai Matriks (aij) --}}
        </div>

        <div>
            {{-- Start Perhitungan Enteropy Nilai Enteropy (Ej) --}}
            @php
                $totadlEntropyArr = [];
            @endphp
            @foreach ($gmmData as $teamIndex => $team)
                @php
                    $totalEntropyVal = [];
                @endphp
                @foreach ($criterias as $index => $criteria)
                    @php
                        $totalEntropyVal[$index] = 0;
                    @endphp
                @endforeach
                @foreach ($criterias as $index => $criteria)
                    @php
                        $value = round($team->{'criteria_' . $index + 1});
                        $nilaiMatrix = 0; // Inisialisasi nilai matrix untuk menghindari Notice: Undefined variable
                    @endphp
                    @foreach ($weights as $weight)
                        @if ($criteria->id == $weight->criteria_id)
                            @if ($value >= $weight->min_range && $value <= $weight->max_range)
                                @php
                                    $nilaiMatrix = ($weight->weight - $maxWeightValue) / $totalNormalisasiAlternative;
                                @endphp

                                @if ($nilaiMatrix != 0)
                                    @php
                                        $totalEntropyVal[$index] =
                                            $totalEntropyVal[$index] + $nilaiMatrix * log($nilaiMatrix);
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
                @php
                    $totalEntropyArr[] = $totalEntropyVal;
                @endphp
            @endforeach
            @foreach ($criterias as $index => $criteria)
                @php
                    // Menghitung total entropy per kriteria untuk semua alternatif
                    $totalEntropyPerCriteria = collect($totalEntropyArr)->pluck($index)->sum();
                @endphp
            @endforeach
            @foreach ($criterias as $index => $criteria)
                @php
                    // Menghitung total entropy per kriteria untuk semua alternatif
                    $totalEntropyPerCriteria = collect($totalEntropyArr)->pluck($index)->sum();
                @endphp
            @endforeach
            {{-- End Perhitungan Enteropy Nilai Enteropy (Ej) --}}
        </div>

        <div>
            {{-- Start Perhitungan Enteropy Dispresi Kriteria (Dj) --}}
            @php
                $totalEntropyArr = [];
            @endphp
            @foreach ($gmmData as $teamIndex => $team)
                @php
                    $totalEntropyVal = [];
                @endphp
                @foreach ($criterias as $index => $criteria)
                    @php
                        $totalEntropyVal[$index] = 0;
                    @endphp
                @endforeach
                @foreach ($criterias as $index => $criteria)
                    @php
                        $value = round($team->{'criteria_' . $index + 1});
                        $nilaiMatrix = 0; // Inisialisasi nilai matrix untuk menghindari Notice: Undefined variable
                    @endphp
                    @foreach ($weights as $weight)
                        @if ($criteria->id == $weight->criteria_id)
                            @if ($value >= $weight->min_range && $value <= $weight->max_range)
                                @php
                                    $nilaiMatrix = ($weight->weight - $maxWeightValue) / $totalNormalisasiAlternative;
                                @endphp
                                @if ($nilaiMatrix != 0)
                                    @php
                                        $totalEntropyVal[$index] =
                                            $totalEntropyVal[$index] + $nilaiMatrix * log($nilaiMatrix);
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
                @php
                    $totalEntropyArr[] = $totalEntropyVal;
                @endphp
            @endforeach
            @php
                $dispresiCriterias = [];
                $totalDispresiCriteria = 0;
            @endphp
            @foreach ($criterias as $index => $criteria)
                @php
                    // Menghitung total entropy per kriteria untuk semua alternatif
                    $totalEntropyPerCriteria = collect($totalEntropyArr)->pluck($index)->sum();
                    $dispresiCriteria = 1 - (-1 / log(20)) * $totalEntropyPerCriteria;
                    array_push($dispresiCriterias, $dispresiCriteria);
                @endphp
            @endforeach
            @php
                $totalDispresiCriteria = array_sum($dispresiCriterias);
            @endphp
            {{-- End Perhitungan Enteropy Dispresi Kriteria (Dj) --}}
        </div>

        <div>
            {{-- Start Perhitungan Enteropy Normalisasi Nilai Dispersi (Wj) --}}
            @php
                $dataNormalisasiDispersi = [];
            @endphp
            @foreach ($criterias as $index => $criteria)
                @php
                    $totalEntropyVal[$index] = 0;
                    $normalisasiDispersi = $dispresiCriterias[$index] / $totalDispresiCriteria;

                    array_push($dataNormalisasiDispersi, $normalisasiDispersi);

                    $criteriaEntropy = \App\Models\CriteriaEntropy::firstOrNew(['criteria_id' => $criteria->id]);

                    // Update nilai kolom weight dengan normalisasiDispersi
                    $criteriaEntropy->weight = number_format($normalisasiDispersi, 18);
                    $criteriaEntropy->assessment_id = $gmm->id;

                    // Simpan perubahan ke database
                    $criteriaEntropy->save();
                @endphp
            @endforeach
            {{-- End Perhitungan Enteropy Normalisasi Nilai Dispersi (Wj) --}}
        </div>

        <div>
            {{-- Start Perhitungan Topsis Matriks Keputusan (X) --}}
            @php
                $totalMatrixArr = [];
            @endphp
            @foreach ($gmmData as $teamIndex => $team)
                @php
                    $totalMatrixVal = [];
                @endphp
                @foreach ($criterias as $index => $criteria)
                    @php
                        $totalMatrixVal[$index] = 0;
                    @endphp
                @endforeach
                @foreach ($criterias as $index => $criteria)
                    @php
                        $value = round($team->{'criteria_' . $index + 1});
                    @endphp
                    @foreach ($weights as $weight)
                        @if ($criteria->id == $weight->criteria_id)
                            @if ($value >= $weight->min_range && $value <= $weight->max_range)
                                @php
                                    $totalMatrixVal[$index] = pow($weight->weight, 2);
                                @endphp
                            @endif
                        @endif
                    @endforeach
                @endforeach
                @php
                    $totalMatrixArr[] = $totalMatrixVal;
                @endphp
            @endforeach
            @foreach ($criterias as $index => $criteria)
                @php
                    $totalMatrixPerCriteria = sqrt(collect($totalMatrixArr)->pluck($index)->sum());
                @endphp
            @endforeach
            {{-- End Perhitungan Topsis Matriks Keputusan (X) --}}
        </div>

        <div>
            {{-- Start Perhitungan Topsis Matriks Ternormalisasi (R) --}}
            @foreach ($gmmData as $teamIndex => $team)
                @foreach ($criterias as $index => $criteria)
                    @php
                        $value = round($team->{'criteria_' . $index + 1});
                    @endphp
                    @foreach ($weights as $weight)
                        @if ($criteria->id == $weight->criteria_id)
                            @if ($value >= $weight->min_range && $value <= $weight->max_range)
                                @php
                                    $totalMatrixPerCriteria = sqrt(collect($totalMatrixArr)->pluck($index)->sum());
                                @endphp
                            @endif
                        @endif
                    @endforeach
                @endforeach
            @endforeach
            {{-- End Perhitungan Topsis Matriks Ternormalisasi (R) --}}
        </div>

        <div>
            {{-- Start Perhitungan Topsis Bobot preferensi (Wj) --}}
            @foreach ($enteropies as $index => $enteropy)
                {{-- <tr>
                                    <td>C{{ $index + 1 }}</td>
                                    <td>{{ $enteropy->criteria->status }}</td>
                                    <td>{{ number_format($enteropy->weight, 3) }}</td>
                                </tr> --}}
            @endforeach
            {{-- End Perhitungan Topsis Bobot preferensi (Wj) --}}
        </div>

        <div>
            {{-- Start Perhitungan Topsis Matriks Ternormalisasi Terbobot (Y) --}}
            @php
                $totalMatrixNormalisasiArr = [];
            @endphp
            @foreach ($gmmData as $teamIndex => $team)
                @php
                    $totalMatrixNormalisasiVal = [];
                @endphp
                @foreach ($criterias as $index => $criteria)
                    @php
                        $value = round($team->{'criteria_' . $index + 1});
                    @endphp
                    @foreach ($weights as $weight)
                        @if ($criteria->id == $weight->criteria_id)
                            @if ($value >= $weight->min_range && $value <= $weight->max_range)
                                @foreach ($enteropies as $index => $enteropy)
                                    @if ($criteria->id == $enteropy->criteria_id)
                                        @php
                                            $totalMatrixPerCriteria = number_format(
                                                $weight->weight /
                                                    number_format(
                                                        sqrt(collect($totalMatrixArr)->pluck($index)->sum()),
                                                        16,
                                                    ),
                                                16,
                                            );
                                            $totalMatrixNormalisasiVal[$index] = number_format(
                                                $totalMatrixPerCriteria * $enteropy->weight,
                                                16,
                                            );
                                        @endphp
                                    @endif
                                @endforeach
                            @endif
                        @endif
                    @endforeach
                @endforeach
                @php
                    $totalMatrixNormalisasiArr[] = $totalMatrixNormalisasiVal;
                @endphp
            @endforeach
            {{-- End Perhitungan Topsis Matriks Ternormalisasi Terbobot (Y) --}}
        </div>

        <div>
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
            {{-- End Perhitungan Topsis Solusi Ideal Positif (A+) dan Negatif (A-) --}}
        </div>

        <div>
            {{-- Start Perhitungan Topsis Jarak Ideal Positif (S+) dan Negatif (S-) --}}
            @php
                $lengthIdealPositives = [];
                $lengthIdealNegatives = [];

                foreach ($gmmData as $teamIndex => $team) {
                    $subValuePositive = 0.0;
                    $subValueNegative = 0.0;

                    foreach ($maxValues as $key => $solutionIdeal) {
                        $subValuePositive += pow($totalMatrixNormalisasiArr[$teamIndex][$key] - $maxValues[$key], 2);
                        $subValueNegative += pow($totalMatrixNormalisasiArr[$teamIndex][$key] - $minValues[$key], 2);
                    }
                    $lengthIdealPositives[] = sqrt($subValuePositive);
                    $lengthIdealNegatives[] = sqrt($subValueNegative);
                }
            @endphp
            {{-- End Perhitungan Topsis Jarak Ideal Positif (S+) dan Negatif (S-) --}}
        </div>

        <div class="card my-2">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between; width: 100%">
                    <div>
                        <h5 class="card-title">Perhitungan Topsis</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Nilai Preferensi Setiap Alternatif (V)</h6>
                    </div>
                    <button id="exportCsvButton" class="btn btn-primary">Export CSV</button>
                    <form id="csvForm" method="POST" action="{{ route('gmm.exportCsv', $gmm->id) }}"
                        style="display: none;">
                        @csrf
                        <input type="hidden" name="csvData" id="csvData">
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="topsisTable">
                        <thead>
                            <tr>
                                <th>Nama Tim</th>
                                <th>Rangking</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Start Perhitungan Topsis Nilai Preferensi Setiap Alternatif (V) --}}
                            @php
                                $preferenceAlt = [];
                                foreach ($gmmData as $teamIndex => $team) {
                                    $preferenceAlt[] = [
                                        'preference' =>
                                            $lengthIdealNegatives[$teamIndex] /
                                            ($lengthIdealPositives[$teamIndex] + $lengthIdealNegatives[$teamIndex]),
                                        'team_name' => $team->team->name, // Ganti 'name' dengan atribut nama tim yang sesuai di model Anda.
                                    ];
                                }
                                usort($preferenceAlt, function ($a, $b) {
                                    return $b['preference'] <=> $a['preference'];
                                });
                                $ranking = 1;
                            @endphp
                            @foreach ($preferenceAlt as $teamIndex => $preferenceValue)
                                <tr>
                                    <td>{{ $preferenceValue['team_name'] }}</td>
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

@push('after-scripts')
    <script>
        document.getElementById('exportCsvButton').addEventListener('click', function() {
            var table = document.getElementById('topsisTable');
            var csvData = [];

            for (var i = 0, row; row = table.rows[i]; i++) {
                var rowData = [];
                for (var j = 0, col; col = row.cells[j]; j++) {
                    rowData.push(col.innerText);
                }
                csvData.push(rowData.join(","));
            }

            document.getElementById('csvData').value = csvData.join("\n");
            document.getElementById('csvForm').submit();
        });
    </script>
@endpush
