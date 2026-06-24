<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Produk / Layanan</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #1f2937;
            font-size: 12px;
        }
        .product-image {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 10px;
            display: block;
        }
        h1 {
            color: #e85d04;
            margin-bottom: 4px;
        }
        .meta {
            color: #6b7280;
            margin-bottom: 18px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #d1d5db;
            padding: 8px;
            vertical-align: top;
        }
        th {
            background: #f97316;
            color: #fff;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan Produk / Layanan</h1>
    <div class="meta">Dibuat pada: {{ $generatedAt->format('d F Y H:i') }}</div>

    <table>
        <thead>
            <tr>
                <th style="width: 35px;">No</th>
                <th style="width: 110px;">Gambar</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($menus as $menu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($menu->image && file_exists(public_path('storage/' . $menu->image)))
                            <img src="{{ public_path('storage/' . $menu->image) }}" alt="{{ $menu->nama_menu }}" class="product-image">
                        @else
                            <div style="width: 90px; height: 90px; border: 1px solid #d1d5db; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #6b7280; font-size: 10px; text-align: center;">
                                Tidak ada gambar
                            </div>
                        @endif
                    </td>
                    <td>{{ $menu->nama_menu }}</td>
                    <td>{{ $menu->kategori }}</td>
                    <td>Rp{{ number_format($menu->harga, 0, ',', '.') }}</td>
                    <td>{{ $menu->deskripsi }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">Belum ada data produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
