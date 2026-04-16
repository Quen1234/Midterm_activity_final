<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nanay Livy's POS - Login</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; }
        .card { border: none; border-radius: 15px; }
        .btn-primary { border-radius: 10px; padding: 10px; font-weight: bold; }
    </style>
</head>
<body class="d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4 fw-bold text-primary">Nanay Livy's POS</h3>
                        
                        <!-- Alert for Errors (Wrong Password, etc.) -->
                        <?php if(session()->getFlashdata('msg')): ?>
                            <div class="alert alert-danger text-center small py-2">
                                <?= session()->getFlashdata('msg') ?>
                            </div>
                        <?php endif; ?>

                        <!-- Alert for Success (Account Created) -->
                        <?php if(session()->getFlashdata('success')): ?>
                            <div class="alert alert-success text-center small py-2">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('/auth/process') ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter username" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>

                        <div class="text-center mt-4">
                            <p class="small text-muted mb-0">Don't have an account?</p>
                            <a href="<?= base_url('/register') ?>" class="text-decoration-none fw-bold">Create an Account</a>
                        </div>
                    </div>
                </div>
                <p class="text-center text-muted mt-3 small">&copy; 2024 Livy's Sari-Sari Store</p>
            </div>
        </div>
    </div>
</body>
</html>