<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Artikel' ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0f172a;
            color: #f1f5f9;
        }

        .navbar {
            background: #020617;
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
            transition: 0.3s;
            background: #1e293b;
            color: white;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .img-artikel {
            height: 220px;
            object-fit: cover;
        }

        .btn-dark {
            background: #e50914;
            border: none;
        }

        .btn-dark:hover {
            background: #b20710;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/artikel"> LightNovel</a>
    </div>
</nav>

<div class="container mt-4">