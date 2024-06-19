@extends('layouts.app')

@section('title')
    Juries
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Panduan Penilaian</h5>
            <div class="table-responsive">
                <table border="1" class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>PDCA</th>
                        <th>Item Penilaian</th>
                        <th>Sub-item Penilaian (Guide)</th>
                        <th>Nilai Maks</th>
                        <th>Detail Penilaian</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td rowspan="3">P</td>
                            <td>Penetapan Aktivitas</td>
                            <td>
                            <ul>
                                <li>Penetapan Profil Pelaksana</li>
                                <li>Penetapan Jadwal aktivitas perbaikan</li>
                                <li>Identifikasi & stratifikasi masalah</li>
                                <li>Penetapan harapan</li>
                                <li>Analisis harapan</li>
                                <li>Penetapan Sasaran tema (Panca Mutu)</li>
                                <li>Penetapan Ide oleh Pimpinan</li>
                                <li>Tinjauan aspek ekonomi</li>
                            </ul>
                            </td>
                            <td>80</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#criteria1">
                                    Lihat Detail
                                </button>
                                <!-- Modal -->
                                <div class="modal fade modal-lg" id="criteria1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Penilaian Penetapan Aktivitas</h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('img/criteria/criteria1.png') }}" width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Proses Pemecahan Masalah & Perbaikan</td>
                            <td>
                                <ul>
                                    <li>Tinjauan objek masalah</li>
                                    <li>Pencarian kemungkinan penyebab</li>
                                    <li>Stratifikasi penyebab</li>
                                    <li>Pemetaan sebab akibat</li>
                                    <li>Penentuan kemungkinan akar penyebab</li>
                                    <li>Pengumpulan fakta & data akar penyebab</li>
                                    <li>Analisis akar penyebab</li>
                                    <li>Penentuan akar penyebab dominan</li>
                                    <li>Daftar alternatif solusi</li>
                                    <li>Analisis alternatif solusi</li>
                                    <li>Penetapan solusi terbaik</li>
                                    <li>Analisis risiko terhadap solusi terpilih</li>
                                    <li>Pemahaman pengaruh solusi terhadap pihak terkait</li>
                                    <li>Rencana perbaikan (5W2H)</li>
                                    <li>Dokumentasikan rencana peningkatan</li>
                                    <li>Rencana tindakan pencegahan terhadap risiko solusi</li>
                                    <li>Pengesahan rencana peningkatan</li>
                                </ul>
                            </td>
                            <td>80</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#criteria2">
                                    Lihat Detail
                                </button>
                                <!-- Modal -->
                                <div class="modal fade modal-lg" id="criteria2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Penilaian Penetapan Aktivitas</h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('img/criteria/criteria2.png') }}" width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Solusi</td>
                            <td>
                                <ul>
                                    <li>Kreativitas solusi</li>
                                    <li>Efektivitas solusi</li>
                                    <li>Aplikatif</li>
                                    <li>Inspiratif</li>
                                </ul>
                            </td>
                            <td>100</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#criteria3">
                                    Lihat Detail
                                </button>
                                <!-- Modal -->
                                <div class="modal fade modal-lg" id="criteria3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Penilaian Penetapan Aktivitas</h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('img/criteria/criteria3.png') }}" width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td rowspan="2">D</td>
                            <td>Tingkat Kesulitan</td>
                            <td>
                            <ul>
                                <li>Kesiapan kompetensi pelaksana</li>
                                <li>Kesiapan sumber daya yang dibutuhkan</li>
                                <li>Penerapan rencana aktivitas</li>
                                <li>Kemudahan dalam replikasi</li>
                            </ul>
                            </td>
                            <td>120</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#criteria4">
                                    Lihat Detail
                                </button>
                                <!-- Modal -->
                                <div class="modal fade modal-lg" id="criteria4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Penilaian Penetapan Aktivitas</h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('img/criteria/criteria4.png') }}" width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Mutu Proses Pelaksanaan</td>
                            <td>
                            <ul>
                                <li>Pemantauan progres penerapan</li>
                                <li>Pengukuran progres peningkatan</li>
                                <li>Validasi hasil pengukuran peningkatan</li>
                            </ul>
                            </td>
                            <td>80</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#criteria5">
                                    Lihat Detail
                                </button>
                                <!-- Modal -->
                                <div class="modal fade modal-lg" id="criteria5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Penilaian Penetapan Aktivitas</h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('img/criteria/criteria5.png') }}" width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td rowspan="2">C</td>
                            <td>Ketepatan dan Kelengkapan Evaluasi</td>
                            <td>
                            <ul>
                                <li>Perbandingan masalah</li>
                                <li>Sasaran dan pencapaian</li>
                                <li>Analisis Komparasi</li>
                                <li>Evaluasi dan Verifikasi value added</li>
                                <li>Verifikasi kinerja keuangan</li>
                                <li>Tinjauan tindakan pencegahan terhadap dampak peningkatan</li>
                                <li>Tinjauan pengaruh terhadap pihak terkait</li>
                            </ul>
                            </td>
                            <td>80</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#criteria6">
                                    Lihat Detail
                                </button>
                                <!-- Modal -->
                                <div class="modal fade modal-lg" id="criteria6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Penilaian Penetapan Aktivitas</h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('img/criteria/criteria6.png') }}" width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Dampak Hasil</td>
                            <td>
                            <ul>
                                <li>Benefit Financial</li>
                                <li>Benefit Non Financial</li>
                                <li>Dampak hasil pada tim</li>
                                <li>Dampak hasil pada organisasi</li>
                                <li>Dampak hasil pada pihak eksternal terkait</li>
                                <li>Keberlangsungan hasil</li>
                                <li>Rasio hasil dengan upaya</li>
                                <li>Keunggulan inovasi</li>
                            </ul>
                            </td>
                            <td>220</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#criteria7">
                                    Lihat Detail
                                </button>
                                <!-- Modal -->
                                <div class="modal fade modal-lg" id="criteria7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Penilaian Penetapan Aktivitas</h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('img/criteria/criteria7.png') }}" width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>A</td>
                            <td>Standardisasi</td>
                            <td>
                                <ul>
                                    <li>Usulan standar baru</li>
                                    <li>Pengesahan standard baru</li>
                                    <li>Sosialisasi standard baru</li>
                                </ul>
                            </td>
                            <td>80</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#criteria8">
                                    Lihat Detail
                                </button>
                                <!-- Modal -->
                                <div class="modal fade modal-lg" id="criteria8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Penilaian Penetapan Aktivitas</h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('img/criteria/criteria8.png') }}" width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td></td>
                            <td>Mutu Makalah</td>
                            <td>
                                <ul>
                                    <li>Sistimatika & mutu penulisan</li>
                                    <li>Estetika & daya tarik risalah</li>
                                    <li>Kesesuaian dengan aturan</li>
                                </ul>
                            </td>
                            <td>80</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#criteria9">
                                    Lihat Detail
                                </button>
                                <!-- Modal -->
                                <div class="modal fade modal-lg" id="criteria9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Penilaian Penetapan Aktivitas</h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('img/criteria/criteria9.png') }}" width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td></td>
                            <td>Mutu Presentasi</td>
                            <td>
                                <ul>
                                    <li>Kejelasan presentasi</li>
                                    <li>Pengelolaan presentasi</li>
                                    <li>Daya tarik presentasi</li>
                                </ul>
                            </td>
                            <td>80</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#criteria10">
                                    Lihat Detail
                                </button>
                                <!-- Modal -->
                                <div class="modal fade modal-lg" id="criteria10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Penilaian Penetapan Aktivitas</h5>
                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('img/criteria/criteria10.png') }}" width="100%"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" align="center">Total Nilai</td>
                            <td>1000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection
