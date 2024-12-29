<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .news-card {
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .news-card:hover {
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            transform: translateY(-3px);
            transition: 0.3s;
        }
        .pagination {
            margin: 0;
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
        .header .btn {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Header -->
        <div class="header d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-newspaper"></i> Daftar Berita</h1>
            <div>
                @auth
                    <span class="me-2">Halo, {{ Auth::user()->name }}</span>
                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</a>
                @else
                    <a href="{{ route('auth.login') }}" class="btn btn-primary btn-sm"><i class="fas fa-sign-in-alt"></i> Login</a>
                @endauth
            </div>
        </div>

        <!-- Menu Navigation -->
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-fire"></i> Popular News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-book"></i> Tentang Kami</a>
            </li>
            @if(Auth::check() && Auth::user()->role === 'owner')
            <li class="nav-item">
                <a class="nav-link" href="{{('news/add')}}"><i class="fas fa-plus"></i> Tambah Berita</a>
            </li>
            @endif
        </ul>

        <!-- List of News -->
        <div class="row">
            @foreach ($news as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card news-card">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $item->title }}</h5>
                            <p class="text-muted small">Ditulis oleh <strong>{{ $item->user->name }}</strong> pada {{ $item->created_at->format('d M Y') }}</p>
                            <p class="card-text">{{ Str::limit($item->content, 100) }}</p>
                            <p class="small text-secondary"><strong>Komentar:</strong> ({{ $item->comments->count() }})</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $news->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
