{{-- Memberitahu Blade untuk menggunakan layout 'app.blade.php' --}}
@extends('layouts.app')

{{-- Mengatur judul halaman (akan mengisi @yield('title') di head) --}}
@section('title', 'Profil - Asrama Quality')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
@endpush

{{-- Memulai bagian konten (akan mengisi @yield('content') di layout) --}}
@section('content')
    <div class="container">
        
        <div class="back-link">
            <a href="{{ route('dashboard') }}"> 
                <i class="bi bi-arrow-left-circle-fill"></i>
                Kembali ke Dashboard
            </a>
        </div>

        {{-- <form method="POST" action="/profil/update" class="profile-card"> --}}
        <form method="get" action="{{ route('pemesanan-kamar') }}" class="profile-card">

            @csrf
            {{-- @method('PUT')  --}}
            @method('get') 

            <h2>Profil Mahasiswa</h2>
            <p class="form-subtitle">Data dengan tanda <span>*</span> wajib diisi untuk mendaftar asrama.</p>
            
            <div class="form-grid">
                
                <h3>Data Akademik</h3>

                <div class="input-group">
                    <label for="npm">NPM</label>
                    <input type="text" id="npm" value="" readonly>
                </div>

                <div class="input-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" value="" readonly>
                </div>

                <div class="input-group">
                    <label for="tgllahir">Tanggal Lahir</label>
                    <input type="text" id="tgllahir" value="" readonly>
                </div>

                <div class="input-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" id="jenis_kelamin" value="" readonly>
                </div>

                <div class="input-group">
                    <label for="agama">Agama</label>
                    <input type="text" id="agama" value="" readonly>
                </div>

                <div class="input-group">
                    <label for="tgl_masuk">Tanggal Masuk</label>
                    <input type="text" id="tgl_masuk" value="" readonly>
                </div>

                <div class="input-group">
                    <label for="universitas">Universitas</label>
                    <input type="text" id="universitas" value="" readonly>
                </div>

                <div class="input-group">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" id="fakultas" value="" readonly>
                </div>

                <div class="input-group">
                    <label for="prodi">Program Studi</label>
                    <input type="text" id="prodi" value="" readonly>
                </div>

                <div class="input-group">
                    <label for="semester">Semester</label>
                    <input type="text" id="semester" value="" readonly>
                </div>

                <div class="input-group">
                    <label for="stambuk">Stambuk</label>
                    <input type="text" id="stambuk" value="" readonly>
                </div>
                
                <h3>Data Kontak & Keluarga222</h3>

                <div class="input-group">
                    <label for="nik">NIK (KTP) <span>*</span></label>
                    <input type="text" id="nik" name="nik" value="" placeholder="Masukkan 16 digit NIK" required>
                </div>

                <div class="input-group">
                    <label for="hp">No. HP Mahasiswa <span>*</span></label>
                    <input type="text" id="hp" name="hp" value="" placeholder="Contoh: 0812..." required>
                </div>

                <div class="input-group" style="grid-column: 1 / -1;"> <label for="alamat">Alamat Asal (Sesuai KTP) <span>*</span></label>
                    <textarea id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" required></textarea>
                </div>

                <div class="input-group">
                    <label for="nama_ayah">Nama Ayah</label>
                    <input type="text" id="nama_ayah" value="" readonly>
                </div>

                <div class="input-group">
                    <label for="nama_ibu">Nama Ibu</label>
                    <input type="text" id="nama_ibu" value="" readonly>
                </div>

                <div class="input-group" style="grid-column: 1 / -1;"> <label for="nomor_ortu">No. HP Orang Tua (Ayah/Ibu/Wali) <span>*</span></label>
                    <input type="text" id="nomor_ortu" name="nomor_ortu" value="" placeholder="Masukkan No. HP aktif Orang Tua" required>
                </div>
                
                <h3>Kontak Darurat</h3>

                <div class="input-group">
                    <label for="nama_darurat">Nama Kontak Darurat <span>*</span></label>
                    <input type="text" id="nama_darurat" name="nama_darurat" value="" placeholder="Masukkan nama kontak darurat" required>
                </div>

                <div class="input-group">
                    <label for="hp_darurat">No. HP Kontak Darurat <span>*</span></label>
                    <input type="text" id="hp_darurat" name="hp_darurat" value="" placeholder="Contoh: 0812..." required>
                </div>

                <div class="button-container">
                    <button type="submit" class="submit-button">
                        <i class="bi bi-save-fill"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', async () => {
    // ambil NPM dari session Laravel
    const npm = `{{ Session::get('mahasiswa')->LOGINUSERNAME }}`; 
    const apiUrl = `https://portaluniversitasquality.ac.id:6923/Project2/public/api/asrama/mahasiswa/${npm}`;

    try {
        const response = await fetch(apiUrl);
        const result = await response.json();

        if (result.status === 'success') {
            const data = result.data;

            // isi field otomatis
            document.getElementById('npm').value = data.NPM || '';
            document.getElementById('nama').value = data.NAMA || '';
            document.getElementById('tgllahir').value = formatTanggal(data.TGLLAHIR);
            document.getElementById('jenis_kelamin').value = data.JENISKELAMIN === 'PR' ? 'Perempuan' : 'Laki-laki';
            document.getElementById('agama').value = data.AGAMA || '';
            document.getElementById('tgl_masuk').value = formatTanggal(data.TGLMASUK);
            document.getElementById('universitas').value = data.UNIVERSITAS || '';
            document.getElementById('fakultas').value = data.fakultas || '';
            document.getElementById('prodi').value = data.PRODI || '';
            document.getElementById('stambuk').value = data.STAMBUK || '';
            document.getElementById('semester').value = hitungSemester(data.TGLMASUK);
            document.getElementById('nik').value = data.nik || '';
            document.getElementById('hp').value = data.HP || '';
            document.getElementById('alamat').value = data.ALAMAT || '';
            document.getElementById('nama_ayah').value = data.NAMAAYAH || '';
            document.getElementById('nama_ibu').value = data.NAMAIBU || '';
            document.getElementById('nomor_ortu').value = data.nomor_ortu || '';
        } else {
            console.error('Data tidak ditemukan');
        }

    } catch (error) {
        console.error('Gagal memuat data:', error);
    }
});

// fungsi bantu ubah tanggal ke format YYYY-MM-DD atau Indo
function formatTanggal(dateString) {
    if (!dateString) return '';
    const date = new Date(dateString);
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear();
    return `${day}-${month}-${year}`; // format: DD-MM-YYYY
}

// fungsi bantu hitung semester berdasarkan tanggal masuk
function hitungSemester(tglMasuk) {
    if (!tglMasuk) return '';
    const masuk = new Date(tglMasuk);
    const sekarang = new Date();
    const diffBulan = (sekarang.getFullYear() - masuk.getFullYear()) * 12 + (sekarang.getMonth() - masuk.getMonth());
    const semester = Math.floor(diffBulan / 6) + 1;
    return semester > 0 ? semester : 1;
}
// 
</script>
@endpush