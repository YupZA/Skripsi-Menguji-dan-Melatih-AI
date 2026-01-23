@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PENGENALAN GOOGLE TEACHABLE LEARNING MACHINE</h1>
        <div>
            <h2>2. Membuat Model Deteksi Suara</h2>
            <p>
                Proyek suara digunakan untuk melatih AI agar dapat mengenali berbagai jenis suara, seperti tepuk tangan,
                siulan, atau suara hewan. Langkah-langkahnya hampir sama dengan proyek gambar, dengan beberapa penyesuaian
                berikut:
            </p>
            <ol type="a">
                <li>
                    Memulai Proyek Baru
                    <ul>
                        <li>Buka situs https://teachablemachine.withgoogle.com.</li>
                        <li>Klik “Get Started”, lalu pilih “Audio Project”.</li>
                    </ul>
                </li>
                <li>Mengatur Kelas
                    <ul>
                        <li>Ganti nama Class 1 dan Class 2 menjadi suara yang akan dikenali,
                            <br>misalnya:
                            <ol>
                                <li>Class 1 → Tepuk Tangan</li>
                                <li>Class 2 → Siulan</li>
                            </ol>
                        </li>
                        <li>Tambahkan kelas baru jika ingin mengenali lebih banyak suara.</li>
                    </ul>
                </li>
                <li>
                    Mengumpulkan Data Suara
                    <br>Ada dua cara untuk menambahkan data suara:
                    <ol>
                        <li>Rekam Langsung Menggunakan Mikrofon
                            <ul>
                                <li>Klik tombol “Record” untuk merekam suara langsung dari mikrofon laptop atau komputer.
                                </li>
                                <li>Pastikan lingkungan sekitar tidak terlalu bising agar hasil rekaman bersih.</li>
                            </ul>
                        </li>
                        <li>
                            Unggah File Audio
                            <br>Klik “Upload” untuk menambahkan file suara dari komputer (format WAV atau MP3).
                        </li>
                        Catatan Penting:
                        <ul>
                            <li>Rekam beberapa kali agar AI mendapatkan variasi suara.</li>
                            <li>Gunakan suara dari beberapa orang atau situasi berbeda untuk hasil yang lebih akurat.</li>
                        </ul>
                        <li>
                            Melatih dan Menguji Model
                            <ul>
                                <li>Klik “Train Model” dan tunggu prosesnya selesai.</li>
                                <li>Gunakan fitur “Preview” untuk menguji hasilnya dengan merekam suara baru.</li>
                                <li>Lihat hasil dalam bentuk persentase keyakinan AI terhadap kelas yang dikenali.</li>
                            </ul>
                        </li>
                    </ol>
                </li>
            </ol>
        </div>
    </div>

    <section class="ai-interactive">
    <h2>Aktivitas 3.2</h2>
    <p>Klik jawaban yang tepat.</p>

    @php
    $questions = [
        ['text' => 'Audio Project digunakan untuk melatih AI mengenali suara.', 'answer' => 'benar'],
        ['text' => 'Untuk suara, kita memilih Image Project.', 'answer' => 'salah'],
        ['text' => 'Kelas dapat dinamai Tepuk Tangan dan Siulan.', 'answer' => 'benar'],
        ['text' => 'Lingkungan bising membuat hasil AI lebih akurat.', 'answer' => 'salah'],
        ['text' => 'Variasi suara membantu AI mengenali pola.', 'answer' => 'benar'],
    ];
    @endphp

    @foreach ($questions as $i => $q)
        <div class="ai-question" data-answer="{{ $q['answer'] }}">
            <p><strong>{{ $i + 1 }}.</strong> {{ $q['text'] }}</p>

            <div class="ai-options">
                <button onclick="checkBS(this, 'benar')">Benar</button>
                <button onclick="checkBS(this, 'salah')">Salah</button>
            </div>

            <div class="ai-feedback"></div>
        </div>
    @endforeach
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/interaktif/materi-3/materi-b.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/interaktif/materi-3/materi-b.js') }}"></script>
@endpush