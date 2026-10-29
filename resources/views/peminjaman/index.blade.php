@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Daftar Peminjaman</h2>
        <p class="text-muted mb-0">Kelola transaksi peminjaman dan pengembalian buku.</p>
    </div>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Peminjaman
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-3" style="width: 50px;">No</th>
                        <th>Nama Anggota</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th class="text-center">Status</th>
                        <th class="text-end pe-3" style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody> 
            @forelse ($peminjaman as $index => $item)
                <tr>
                    <td class="ps-3">
                        {{ $peminjaman->firstItem() + $index }}
                    </td>

                    <td>
                        {{ $item->anggota->nama ?? 'Anggota tidak ditemukan' }}
                    </td>

                    <td>
                        {{ $item->buku->judul ?? 'Buku tidak ditemukan' }}
                    </td>

                    <td>
                        {{ $item->tanggal_pinjam }}
                    </td>

                    <td>
                        {{ $item->tanggal_kembali ?? '-' }}
                    </td>

                    <td class="text-center">
                        @if ($item->status === 'Dipinjam')
                            <span class="badge bg-warning text-dark">
                                Dipinjam
                            </span>
                        @else
                            <span class="badge bg-success">
                                Dikembalikan
                            </span>
                        @endif
                    </td>

                    <td class="text-end pe-3">
                        @if ($item->status === 'Dipinjam')
                            <form
                                action="{{ route('peminjaman.kembali', $item->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin mengembalikan buku ini?')"
                            >
                                @csrf
                                @method('PUT')

                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="bi bi-arrow-return-left me-1"></i>
                                    Kembalikan
                                </button>
                            </form>
                        @else
                            <span class="text-muted small">Selesai</span>
                        @endif

                        <form
                            action="{{ route('peminjaman.destroy', $item->id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <i class="bi bi-journal-x fs-2 text-muted d-block mb-2"></i>
                        <span class="text-muted">
                            Belum ada data peminjaman buku.
                        </span>
                    </td>
                </tr>
            @endforelse

                </tbody>
            </table>
        </div>
    </div>
    @if($peminjaman->hasPages())
        <div class="card-footer bg-white py-3">
            {{ $peminjaman->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
