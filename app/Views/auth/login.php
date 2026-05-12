<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nanay Livy's POS - Login</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Load Inter Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-wrapper {
            width: 100%;
            max-width: 1000px;
            padding: 20px;
        }

        .login-card {
            background: white;
            border: none;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: row;
        }

        .login-image-side {
            width: 50%;
            background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            color: white;
            text-align: center;
        }

        .side-content {
            z-index: 2;
            animation: fadeIn 1s ease-out;
        }

        .side-logo {
            font-size: 4rem;
            margin-bottom: 1rem;
            display: block;
        }

        .side-title {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .side-subtitle {
            font-size: 1rem;
            opacity: 0.8;
            font-weight: 500;
            max-width: 300px;
            margin: 0 auto;
        }

        /* Abstract Background shapes */
        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 50%;
            z-index: 1;
        }
        .shape-1 { width: 300px; height: 300px; top: -100px; left: -100px; }
        .shape-2 { width: 200px; height: 200px; bottom: -50px; right: -50px; }
        .shape-3 { width: 100px; height: 100px; top: 20%; right: 10%; }

        .login-image-side img {
            display: none; /* Hide the broken image */
        }

        .login-form-side {
            width: 50%;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-brand {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
            color: #64748b;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            border-radius: 14px;
            padding: 12px 18px;
            border: 2px solid #f1f5f9;
            background: #f8fafc;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: white;
            border-color: #4361ee;
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
        }

        .btn-login {
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
            border: none;
            border-radius: 14px;
            padding: 14px;
            font-weight: 700;
            color: white;
            box-shadow: 0 10px 15px -3px rgba(67, 97, 238, 0.3);
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 20px -3px rgba(67, 97, 238, 0.4);
            opacity: 0.95;
        }

        .register-link {
            text-decoration: none;
            font-weight: 700;
            color: #4361ee;
            transition: all 0.3s ease;
        }

        .register-link:hover {
            color: #3a0ca3;
            text-decoration: underline;
        }

        @media (max-width: 991px) {
            .login-card {
                flex-direction: column;
            }
            .login-image-side, .login-form-side {
                width: 100%;
            }
            .login-image-side {
                height: 300px;
                padding: 20px;
            }
            .login-form-side {
                padding: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-image-side">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
                
                <div class="side-content">
                    <span class="side-logo">🏪</span>
                    <h2 class="side-title">Nanay Livy's Sari-Sari Store</h2>
                    <p class="side-subtitle">Malapit, Mura, at Maaasahan! Managing your store with style and ease.</p>
                </div>
            </div>
            <div class="login-form-side">
                <h1 class="login-brand">Nanay Livy's POS</h1>
                <p class="text-center text-muted mb-5">Access your store management system</p>
                
                <!-- Alert for Errors -->
                <?php if(session()->getFlashdata('msg')): ?>
                    <div class="alert alert-danger border-0 rounded-4 text-center small py-3 mb-4">
                        <i class="bi bi-exclamation-circle me-2"></i><?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif; ?>

                <!-- Alert for Success -->
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success border-0 rounded-4 text-center small py-3 mb-4">
                        <i class="bi bi-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('/auth/process') ?>" method="post">
                    <div class="mb-4">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control shadow-none" placeholder="Enter your username" required autofocus>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control shadow-none" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-login w-100">Login to Dashboard</button>
                </form>

                <div class="text-center mt-5">
                    <p class="small text-muted mb-0">Don't have an account?</p>
                    <a href="<?= base_url('/register') ?>" class="register-link">Create an Account</a>
                </div>
                
                <p class="text-center text-muted mt-4 small opacity-50">&copy; 2026 Nanay Livy's Store</p>
            </div>
        </div>
    </div>
</body>
</html>