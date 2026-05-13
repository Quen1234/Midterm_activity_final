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
            background: linear-gradient(135deg, #f0f2f5 0%, #e2e8f0 100%);
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            z-index: 1001;
            transition: all var(--transition-speed);
            overflow-y: auto;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .sidebar-brand {
            padding: 2.5rem 1.5rem;
            text-align: left;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .sidebar-brand h3 {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #fff 30%, #4361ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.2rem;
        }

        /* Navigation */
        .sidebar-nav { padding: 1.5rem 1rem; }

        .nav-header {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255, 255, 255, 0.4);
            padding: 1.5rem 1rem 0.75rem;
            font-weight: 700;
        }

        .sidebar-nav .nav-link {
            color: rgba(255, 255, 255, 0.6);
            padding: 0.9rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 14px;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .sidebar-nav .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(5px);
        }

        .sidebar-nav .nav-link.active {
            color: #fff;
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
            box-shadow: 0 10px 20px -5px rgba(67, 97, 238, 0.4);
            font-weight: 600;
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
            height: 80px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .page-content {
            padding: 2.5rem;
            flex: 1;
            animation: fadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Glass Cards */
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
        }

        /* Profile Dropdown */
        .user-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            color: var(--primary-color);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.1);
            transition: all 0.3s ease;
        }

        .user-avatar:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.15);
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
            <h3><i class="fas fa-store me-2"></i>Nanay Livy's</h3>
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

            <div class="nav-header">Exit</div>
            <a href="<?= base_url('logout') ?>" class="nav-link text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>

            <!-- Due Date Reminder Section -->
            <?php if(strpos(current_url(), 'listahan') !== false): ?>
                <div class="nav-header">Due Reminders</div>
                <div class="px-3 py-2">
                    <div class="rounded-4 p-3 border border-white border-opacity-10 shadow-lg" style="background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(10px);">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-3 bg-primary d-flex align-items-center justify-content-center shadow-sm" style="width: 35px; height: 35px; background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);">
                                <i class="bi bi-bell-fill text-white small"></i>
                            </div>
                            <div>
                                <h6 class="text-white fw-bold mb-0" style="font-size: 0.85rem;">Due Notice</h6>
                                <p class="text-white-50 mb-0" style="font-size: 0.65rem;">Send reminders easily</p>
                            </div>
                        </div>
                        
                        <div class="mb-2">
                            <select id="dueCustomerSelect" class="form-select form-select-sm border-0 text-white mb-2 rounded-3 shadow-none py-2 px-3" style="background: rgba(255, 255, 255, 0.15); font-size: 0.8rem; color-scheme: dark;">
                                <option value="" style="background: #1e293b; color: white;">Select Customer</option>
                                <!-- Customers will be populated by JS -->
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="email" id="dueCustomerEmail" class="form-control form-control-sm border-0 text-white rounded-3 shadow-none py-2 px-3 mb-2" placeholder="customer@email.com" style="background: rgba(255, 255, 255, 0.08); font-size: 0.8rem;">
                            <input type="text" id="dueCustomerPhone" class="form-control form-control-sm border-0 text-white rounded-3 shadow-none py-2 px-3" placeholder="09123456789" style="background: rgba(255, 255, 255, 0.08); font-size: 0.8rem;">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="button" id="sendDueNoticeBtn" class="btn btn-primary btn-sm rounded-3 fw-bold py-2 shadow-lg border-0 transition-all" style="background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%); font-size: 0.85rem;">
                                <i class="bi bi-send-fill me-2"></i>Email Notice
                            </button>
                            <button type="button" id="sendDueSmsBtn" class="btn btn-success btn-sm rounded-3 fw-bold py-2 shadow-lg border-0 transition-all" style="background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%); font-size: 0.85rem;">
                                <i class="bi bi-chat-dots-fill me-2"></i>SMS Reminder
                            </button>
                        </div>
                        <div id="emailStatusMsg" class="mt-2 small text-center" style="display:none;"></div>
                    </div>
                </div>
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
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-3 p-2 rounded-4">
                    <li><h6 class="dropdown-header text-uppercase small letter-spacing-1 fw-bold opacity-50 py-3">Account Settings</h6></li>
                    <li><a class="dropdown-item rounded-3 py-2 px-3" href="<?= base_url('profile') ?>"><i class="fas fa-user-circle me-2 text-primary"></i> My Profile</a></li>
                    <li><a class="dropdown-item rounded-3 py-2 px-3" href="<?= base_url('profile') ?>"><i class="fas fa-key me-2 text-primary"></i> Password Security</a></li>
                    <li><hr class="dropdown-divider opacity-50 mx-2"></li>
                    <li><a class="dropdown-item text-danger rounded-3 py-2 px-3" href="<?= base_url('logout') ?>"><i class="fas fa-power-off me-2"></i> Sign Out</a></li>
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