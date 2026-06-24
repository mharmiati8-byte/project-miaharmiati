<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Artikel</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #1f2937;
            font-size: 12px;
        }
        .article-image {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 10px;
            display: block;
        }
        .image-placeholder {
            width: 90px;
            height: 90px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 10px;
            text-align: center;
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
        td {
            word-break: break-word;
        }
        th {
            background: #f97316;
            color: #fff;
            text-align: left;
        }
        .summary {
            line-height: 1.6;
        }
        .content {
            line-height: 1.7;
            white-space: normal;
        }
    </style>
</head>
<body>
    <h1>Laporan Artikel</h1>
    <div class="meta">Dibuat pada: {{ $generatedAt->format('d F Y H:i') }}</div>

    <table>
        <thead>
            <tr>
                <th style="width: 35px;">No</th>
                <th style="width: 110px;">Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Ringkasan</th>
                <th>Isi Artikel</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artikels as $artikel)
                @php
                    $articleImagePath = $artikel->image ? public_path('storage/' . ltrim($artikel->image, '/')) : null;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($articleImagePath && file_exists($articleImagePath))
                            <img src="{{ $articleImagePath }}" alt="{{ $artikel->judul }}" class="article-image">
                        @else
                            <div class="image-placeholder">Tidak ada gambar</div>
                        @endif
                    </td>
                    <td>{{ $artikel->judul }}</td>
                    <td>{{ $artikel->kategori }}</td>
                    <td class="summary">{{ $artikel->ringkasan }}</td>
                    <td class="content">{!! nl2br(e($artikel->konten ?: '-')) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
