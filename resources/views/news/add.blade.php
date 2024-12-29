<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            transform: translateY(-3px);
            transition: 0.3s;
        }
        .header {
            background: linear-gradient(90deg, #4e73df, #1cc88a);
            color: white;
            padding: 20px;
            border-radius: 8px;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Header -->
        <div class="header mb-4">
            <h1><i class="fas fa-plus"></i> Tambah Berita</h1>
        </div>

        <!-- Form to Add News -->
        <div class="card p-4">
            <form action="{{ route('news.add') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Berita</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Isi Berita</label>
                    <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Berita (Opsional)</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Simpan Berita</button>
                <a href="{{ route('news.index') }}" class="btn btn-secondary btn-sm ms-2">Kembali</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
