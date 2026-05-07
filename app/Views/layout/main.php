<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <title><?= $title ?? 'Dashboard' ?> | Nanay Livy's POS</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --success-color: #06ffa5;
            --danger-color: #f72585;
            --warning-color: #ffb703;
            --dark-bg: #1a1a2e;
            --sidebar-bg: #0f0f1a;
            --card-bg: #ffffff;
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            background: linear-gradient(180deg, var(--sidebar-bg) 0%, #1a1a2e 100%);
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            z-index: 1001;
            transition: all var(--transition-speed);
            overflow-y: auto;
        }
        
        .sidebar-brand {
            padding: 2rem 1rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .sidebar-brand h3 {
            font-size: 1.4rem;
            font-weight: 700;
            background: linear-gradient(135deg, #fff 30%, #4361ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Navigation */
        .sidebar-nav { padding: 1rem 0.75rem; }

        .nav-header {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #6c757d;
            padding: 1.5rem 1rem 0.5rem;
            font-weight: 700;
        }

        .sidebar-nav .nav-link {
            color: #adb5bd;
            padding: 0.8rem 1rem;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 8px;
            transition: all 0.2s;
            font-size: 0.95rem;
            margin-bottom: 4px;
        }

        .sidebar-nav .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.05);
            transform: translateX(4px);
        }

        .sidebar-nav .nav-link.active {
            color: #fff;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }

        /* Main Content Area */
        .main-wrapper {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all var(--transition-speed);
        }

        .top-navbar {
            height: 70px;
            background: #fff;
            border-bottom: 1px solid #eef0f3;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .page-content {
            padding: 1.5rem;
            flex: 1; /* Pushes footer to bottom */
            animation: fadeIn 0.4s ease-out;
        }

        /* Profile Dropdown */
        .user-avatar {
            width: 40px;
            height: 40px;
            background: #eef2ff;
            color: var(--primary-color);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Footer */
        footer {
            padding: 1rem 1.5rem;
            background: #fff;
            border-top: 1px solid #eef0f3;
            font-size: 0.85rem;
            color: #6c757d;
        }

        /* Mobile Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            top: 0;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive Breakpoints */
        @media (max-width: 992px) {
            .sidebar { left: -260px; }
            .sidebar.show { left: 0; }
            .main-wrapper { margin-left: 0; }
            .sidebar-overlay.show { display: block; }
        }
    </style>
    <?= $this->renderSection('styles') ?>
</head>
<body>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <h3><i class="fas fa-rocket me-2"></i>Nanay Livy's</h3>
            <small class="text-uppercase tracking-wider">Store Management</small>
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-header">Main Menu</div>
            <a href="<?= base_url('dashboard') ?>" class="nav-link <?= current_url() == base_url('dashboard') ? 'active' : '' ?>">
                <i class="fas fa-th-large"></i> Dashboard
            </a>
            <a href="<?= base_url('pos') ?>" class="nav-link <?= strpos(current_url(), 'pos') !== false ? 'active' : '' ?>">
                <i class="fas fa-cash-register"></i> Point of Sale
            </a>
           
            <a href="<?= base_url('inventory') ?>" class="nav-link <?= strpos(current_url(), 'inventory') !== false ? 'active' : '' ?>">
                <i class="fas fa-receipt"></i> Inventory
            </a>
            
            <div class="nav-header">Inventory</div>
            <a href="<?= base_url('listahan') ?>" class="nav-link <?= strpos(current_url(), 'listahan') !== false ? 'active' : '' ?>">
                <i class="fas fa-box"></i> Listahan
            </a>
            <a href="<?= base_url('categories') ?>" class="nav-link <?= strpos(current_url(), 'categories') !== false ? 'active' : '' ?>">
                <i class="fas fa-tag"></i> Categories
            </a>
            <a href="<?= base_url('stock') ?>" class="nav-link <?= strpos(current_url(), 'stock') !== false ? 'active' : '' ?>">
                <i class="fas fa-warehouse"></i> Stocks
            </a>
            
            <?php if(session()->get('role') == 'admin'): ?>
            <div class="nav-header">Administration</div>
            <a href="<?= base_url('users') ?>" class="nav-link <?= strpos(current_url(), 'users') !== false ? 'active' : '' ?>">
                <i class="fas fa-user-shield"></i> User Control
            </a>
            <a href="<?= base_url('reports') ?>" class="nav-link <?= strpos(current_url(), 'reports') !== false ? 'active' : '' ?>">
                <i class="fas fa-chart-pie"></i> Analytics
            </a>
            <a href="<?= base_url('audit') ?>" class="nav-link <?= strpos(current_url(), 'audit') !== false ? 'active' : '' ?>">
                <i class="fas fa-fingerprint"></i> Activity Logs
            </a>
            <?php endif; ?>
        </nav>
    </aside>

    <main class="main-wrapper">
        <header class="top-navbar">
            <div class="d-flex align-items-center">
                <button class="btn btn-light d-lg-none me-3" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="mb-0 fw-bold text-dark d-none d-sm-block"><?= $title ?? 'Dashboard' ?></h5>
            </div>

            <div class="dropdown">
                <div class="d-flex align-items-center gap-3" style="cursor: pointer;" data-bs-toggle="dropdown">
                    <div class="text-end d-none d-md-block">
                        <div class="fw-bold lh-1"><?= session()->get('full_name') ?? 'User' ?></div>
                        <small class="text-muted"><?= ucfirst(session()->get('role') ?? 'Staff') ?></small>
                    </div>
                    <div class="user-avatar">
                        <?= strtoupper(substr(session()->get('username') ?? 'U', 0, 1)) ?>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm mt-3">
                    <li><h6 class="dropdown-header">Manage Account</h6></li>
                    <li><a class="dropdown-item" href="<?= base_url('profile') ?>"><i class="fas fa-user-cog me-2"></i> Profile Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt me-2"></i> Sign Out</a></li>
                </ul>
            </div>
        </header>

        <div class="page-content">
            <?php $types = ['success' => 'check-circle', 'error' => 'exclamation-triangle', 'message' => 'info-circle']; 
            foreach($types as $key => $icon): if(session()->getFlashdata($key)): ?>
                <div class="alert alert-<?= $key == 'error' ? 'danger' : $key ?> alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <i class="fas fa-<?= $icon ?> me-2"></i> <?= session()->getFlashdata($key) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; endforeach; ?>

            <?= $this->renderSection('content') ?>
        </div>

        <footer>
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    &copy; <?= date('Y') ?> <strong>Nanay Livy's POS</strong>. All rights reserved.
                </div>
                <div class="col-md-6 text-center text-md-end d-none d-md-block">
                    v1.2.0 | System Stable <span class="text-success">●</span>
                </div>
            </div>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            const $sidebar = $('#sidebar');
            const $overlay = $('#sidebarOverlay');

            // Toggle Sidebar
            $('#menuToggle, #sidebarOverlay').on('click', function() {
                $sidebar.toggleClass('show');
                $overlay.toggleClass('show');
            });

            // Auto-dismiss alerts
            setTimeout(() => {
                $('.alert').fadeOut(500, function() { $(this).remove(); });
            }, 4500);

            // Active Link logic (fallback)
            const currentPath = window.location.href;
            $('.sidebar-nav .nav-link').each(function() {
                if (currentPath.includes($(this).attr('href'))) {
                    $(this).addClass('active');
                }
            });
        });
    </script>
    
    <?= $this->renderSection('scripts') ?>
</body>
</html>