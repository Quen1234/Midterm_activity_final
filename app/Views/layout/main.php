<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nanay Livy's POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .sidebar { height: 100vh; background-color: #343a40; color: white; padding-top: 20px; }
        .sidebar a { color: #adb5bd; text-decoration: none; padding: 10px 20px; display: block; }
        .sidebar a:hover { color: white; background-color: #495057; }
        .main-content { height: 100vh; overflow-y: auto; background-color: #f8f9fa; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Includes Sidebar -->
            <?= $this->include('theme/sidebar') ?>
            
            <!-- Main Content -->
            <div class="col-md-10 main-content p-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4">
                    <span class="navbar-brand mb-0 h1">Store Management System</span>
                    <div class="ms-auto">
                        <span class="me-3">Welcome, <?= session()->get('username') ?></span>
                        <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-danger">Logout</a>
                    </div>
                </nav>
                <div class="p-4">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>