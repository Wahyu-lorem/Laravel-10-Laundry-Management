@extends('admin.layouts.app')
@section('title', 'Daftar Transaksi')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ url()->previous() }}" class="text-dark">
            <i class="fa-solid fa-arrow-left fa-lg"></i>
        </a>
        <h1 class="text-center">Daftar Transaksi</h1>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.transaksis.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
        <div class="d-flex justify-content-between mb-3">
            <form method="GET" action="{{ route('admin.transaksis.index') }}" class="d-flex align-items-center">
                <select name="status" class="form-control me-2" onchange="this.form.submit()">
                    <option value="">Semua Status</option>
                    <option value="0" {{ $status === '0' ? 'selected' : '' }}>Baru</option>
                    <option value="1" {{ $status === '1' ? 'selected' : '' }}>Diterima</option>
                    <option value="2" {{ $status === '2' ? 'selected' : '' }}>Laundry</option>
                    <option value="3" {{ $status === '3' ? 'selected' : '' }}>Selesai</option>
                    <option value="4" {{ $status === '4' ? 'selected' : '' }}>Diambil</option>
                </select>
            </form>
            <form method="GET" action="{{ route('admin.transaksis.index') }}" class="d-flex align-items-center">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama Pelanggan" value="{{ $search ?? '' }}">
            </form>
        </div>

        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Invoice</th>
                    <th>Pelanggan</th>
                    <th>Paket</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Kilogram</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Update Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $row)
                <tr>
                    <td class="text-center">{{ $row->invoice }}</td>
                    <td>{{ $row->user->name }}<br>{{ $row->user->telepon }}</td>
                    <td>
                        {{ $row->paket }}
                        <br>
                        <small class="text-muted">{{ $row->hari }} hari</small>
                    </td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                    <td class="text-center">{{ number_format($row->kilogram, 0, ',', '.') }} kg</td>
                    <td class="text-center">
                        @if ($row->kupon)
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Harga DP: Rp {{ number_format($row->dp, 0, ',', '.') }} | Sisa: Rp {{ number_format($row->sisa_pembayaran, 0, ',', '.') }}">
                                Rp {{ number_format($row->harga_sebelum_diskon, 0, ',', '.') }} →
                                <strong>Rp {{ number_format($row->harga, 0, ',', '.') }}</strong>
                            </span>
                            <br>
                            <small class="text-muted">Kupon: {{ $row->kupon->kode }} (Diskon {{ $row->kupon->diskon }}%)</small>
                        @else
                            @if ($row->sisa == 0)
                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Lunas">
                                    Rp {{ number_format($row->harga, 0, ',', '.') }}
                                </span>
                            @else
                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="DP: Rp {{ number_format($row->dp, 0, ',', '.') }}  |
                                     Sisa: Rp {{ number_format($row->sisa, 0, ',', '.') }}">
                                    Rp {{ number_format($row->harga, 0, ',', '.') }}
                                </span>
                            @endif
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($row->status == 0)
                            <form method="POST" action="{{ route('admin.transaksi.updateStatus', ['id' => $row->id, 'status' => 1]) }}?page={{ $transaksis->currentPage() }}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <span class="badge bg-primary"><span style="display: inline-block; width: 50px;">Baru</span></span>
                                </button>
                            </form>
                        @endif
                        @if ($row->status == 1)
                            <form method="POST" action="{{ route('admin.transaksi.updateStatus', ['id' => $row->id, 'status' => 2]) }}?page={{ $transaksis->currentPage() }}">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <span class="badge bg-warning"><span style="display: inline-block; width: 50px;">Diterima</span></span>
                                </button>
                            </form>
                        @endif
                        @if ($row->status == 2)
                            <form method="POST" action="{{ route('admin.transaksi.updateStatus', ['id' => $row->id, 'status' => 3]) }}?page={{ $transaksis->currentPage() }}">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">
                                    <span class="badge bg-success"><span style="display: inline-block; width: 50px;">Dalam Proses</span></span>
                                </button>
                            </form>
                        @endif
                        @if ($row->status == 3)
                            <form method="POST" action="{{ route('admin.transaksi.updateStatus', ['id' => $row->id, 'status' => 4]) }}?page={{ $transaksis->currentPage() }}">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">
                                    <span class="badge bg-secondary"><span style="display: inline-block; width: 50px;">Selesai</span></span>
                                </button>
                            </form>
                        @endif
                        @if ($row->status == 4)
                            <button type="submit" class="btn btn-secondary btn-sm">
                                <span class="badge bg-secondary"><span style="display: inline-block; width: 50px;">Diambil</span></span>
                            </button>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="ms-4">
                            <a href="#" class="text-dark" role="button" id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end min-w-auto border rounded-0" aria-labelledby="actionDropdown">
                                @if ($row->status == 3)
                                    <li>
                                        <a href="{{ route('admin.transaksi.print', $row->id) }}?page={{ $transaksis->currentPage() }}&status={{ request('status') }}&search={{ request('search') }}" target="blank" class="dropdown-item bg-primary-soft-hover">
                                            <i class="fa-solid fa-print me-2"></i>Cetak Struk
                                        </a>
                                    </li>
                                @endif
                                <form method="POST" action="{{ route('admin.transaksis.destroy', $row->id) }}?page={{ $transaksis->currentPage() }}&status={{ request('status') }}&search={{ request('search') }}">
                                    @csrf @method('DELETE')
                                    <li>
                                        <button type="submit" class="dropdown-item bg-danger-soft-hover">
                                            <i class="fa-solid fa-trash me-2"></i>Hapus
                                        </button>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $transaksis->appends(['status' => request('status'), 'search' => request('search')])->links() }}
        </div>
    </div>
</div>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

@endsection
