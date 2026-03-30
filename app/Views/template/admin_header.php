<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Admin Panel' ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #eef2f7, #dbe6f6);
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .card {
            border-radius: 15px;
        }

        .btn {
            border-radius: 8px;
        }

        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        .table th {
            background: #0d6efd;
            color: white;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand fw-bold">⚙️ Admin Artikel</span>

        <div>
            <a href="/artikel" class="btn btn-light btn-sm">
                <i class="bi bi-globe"></i> Website
            </a>
        </div>
    </div>
</nav>

<div class="container mt-4"></div>