@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="fw-bold mb-1">Transaksi Peminjaman Buku</h3>
                <p class="text-muted small mb-0">Catat peminjaman buku oleh anggota perpustakaan.</p>
            </div>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="anggota_id" class="form-label">Pilih Anggota</label>
                        <select name="anggota_id" id="anggota_id"
                            class="form-select @error('anggota_id') is-invalid @enderror"
                            required>
                            <option value="">-- Pilih Anggota --</option>
                            @foreach ($anggota as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('anggota_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }} - {{ $item->email }}
                                </option>
                            @endforeach
                        </select>
                        @error('anggota_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="buku_id" class="form-label">Pilih Buku</label>
                        <select name="buku_id" id="buku_id"
                            class="form-select @error('buku_id') is-invalid @enderror"
                            required>
                            <option value="">-- Pilih Buku --</option>
                            @foreach ($buku as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('buku_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->judul }} (Stok: {{ $item->stok }})
                                </option>
                            @endforeach
                        </select>
                        @error('buku_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam"
                            class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                            value="{{ old('tanggal_pinjam', date('Y-m-d')) }}"
                            required>
                        @error('tanggal_pinjam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('peminjaman.index') }}"
                            class="btn btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Peminjaman
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
