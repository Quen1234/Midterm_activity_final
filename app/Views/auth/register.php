<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nanay Livy's POS - Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center mb-4">Create Account</h4>
                        
                        <!-- Error Messages -->
                        <?php if(session()->getFlashdata('error')):?>
                            <div class="alert alert-danger small"><?= session()->getFlashdata('error') ?></div>
                        <?php endif;?>

                        <form action="<?= base_url('/auth/registerProcess') ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Choose a username" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Create password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="confirmpassword" class="form-control" placeholder="Repeat password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Account Role</label>
                                <select name="role" class="form-select">
                                    <option value="user">Staff/User</option>
                                    <option value="admin">Owner/Admin</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mb-3">Register</button>
                            <div class="text-center">
                                <a href="<?= base_url('/') ?>" class="text-decoration-none small">Already have an account? Login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>