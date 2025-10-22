@extends('layouts.app')

@section('title', 'History Transaksi - Asrama Quality')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/history-transaksi.css') }}">
@endpush

@section('content')

<div class="container">
            
    <div class="back-link">
        <a href="javascript:history.back()" class="back-button"> {{-- Sesuaikan rute kembali --}}
            <i class="bi bi-arrow-left-circle-fill"></i>
            Kembali ke Dashboard
        </a>
    </div>

    <div class="table-card">
        
        <h2>History Transaksi Anda</h2>
        <p class="table-subtitle">Berikut adalah riwayat pendaftaran dan pembayaran kamar Anda.</p>

        <div class="table-responsive-wrapper">
            
            <table id="historyTable" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Kamar</th>
                        <th>Tgl Bayar</th>
                        <th>Tgl Masuk</th>
                        <th>Tgl Keluar</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D1-101a</td>
                        <td>2025-10-20</td>
                        <td>2025-11-11</td>
                        <td>2025-12-11</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-sukses">sukses</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Belum Ditentukan</td>
                        <td>2025-10-20</td>
                        <td>2025-11-11</td>
                        <td>2025-12-11</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-sukses">sukses</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D2-203</td>
                        <td>2025-10-21</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-pending">pending</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr><tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr><tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr><tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr><tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr><tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr><tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr><tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr><tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr><tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr><tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr><tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr><tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr><tr>
                        <td>4</td>
                        <td>2512020003</td>
                        <td>DINDA TRI ANITA</td>
                        <td>Kamar D3-104</td>
                        <td>2025-09-15</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp 4.000</td>
                        <td><span class="status-badge status-gagal">gagal</span></td>
                    </tr>
                    
                    </tbody>
            </table>
        </div>

    </div>
</div>
@endsection

{{-- Mengirim JS DataTables ke slot 'scripts' di layout --}}
@push('scripts')

<script>
    $(document).ready(function() {
        $('#historyTable').DataTable({
            
        });
    });
</script>
@endpush