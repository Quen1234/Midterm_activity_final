<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid fade-in-up">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-decoration-none text-muted">Dashboard</a></li>
            <li class="breadcrumb-item active fw-bold text-primary">Activity Logs</li>
        </ol>
    </nav>

    <!-- System Status Widgets -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="stats-card p-4 h-100" style="background: white;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-2 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                        <i class="bi bi-cpu text-primary fs-4"></i>
                    </div>
                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1 small">Active</span>
                </div>
                <h6 class="text-muted small fw-bold text-uppercase mb-1">CPU Usage</h6>
                <h3 class="text-dark fw-bold mb-0"><?= $system['cpu_load'] ?></h3>
                <div class="progress mt-3 bg-light" style="height: 6px; border-radius: 10px;">
                    <div class="progress-bar bg-primary shadow-sm" style="width: <?= $system['cpu_load'] ?>; border-radius: 10px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card p-4 h-100" style="background: white;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="rounded-circle bg-info bg-opacity-10 p-2 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                        <i class="bi bi-memory text-info fs-4"></i>
                    </div>
                </div>
                <h6 class="text-muted small fw-bold text-uppercase mb-1">Memory Usage</h6>
                <h3 class="text-dark fw-bold mb-0"><?= $system['memory_usage'] ?></h3>
                <div class="progress mt-3 bg-light" style="height: 6px; border-radius: 10px;">
                    <div class="progress-bar bg-info shadow-sm" style="width: <?= $system['memory_usage'] ?>; border-radius: 10px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card p-4 h-100" style="background: white;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="rounded-circle bg-warning bg-opacity-10 p-2 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                        <i class="bi bi-database-check text-warning fs-4"></i>
                    </div>
                </div>
                <h6 class="text-muted small fw-bold text-uppercase mb-1">DB Engine</h6>
                <h3 class="text-dark fw-bold mb-0"><?= $system['db_driver'] ?></h3>
                <p class="text-muted small mt-2 mb-0">PHP v<?= $system['php_version'] ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card p-4 h-100" style="background: white;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="rounded-circle bg-danger bg-opacity-10 p-2 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                        <i class="bi bi-clock-history text-danger fs-4"></i>
                    </div>
                </div>
                <h6 class="text-muted small fw-bold text-uppercase mb-1">System Uptime</h6>
                <h3 class="text-dark fw-bold mb-0" style="font-size: 1.1rem;"><?= $system['uptime'] ?></h3>
                <p class="text-muted small mt-2 mb-0">Live monitoring active</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="main-card glass-card">
                <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-clock-history me-2 text-primary"></i>Audit Trail</h5>
                        <small class="text-muted">Tracking all user actions and system changes</small>
                    </div>
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">
                        Last 100 entries
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Action</th>
                                <th>Details</th>
                                <th>IP Address</th>
                                <th>Date & Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($logs)): foreach($logs as $log): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-init" style="width: 32px; height: 32px; font-size: 0.8rem; border-radius: 10px;">
                                                <?= strtoupper(substr($log['username'], 0, 1)) ?>
                                            </div>
                                            <span class="fw-bold"><?= esc($log['username']) ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php 
                                            $actionClass = 'bg-secondary';
                                            if(strpos(strtolower($log['action']), 'login') !== false) $actionClass = 'bg-success';
                                            if(strpos(strtolower($log['action']), 'delete') !== false) $actionClass = 'bg-danger';
                                            if(strpos(strtolower($log['action']), 'settle') !== false) $actionClass = 'bg-info';
                                        ?>
                                        <span class="badge <?= $actionClass ?> bg-opacity-10 text-<?= str_replace('bg-', '', $actionClass) ?> rounded-pill px-3 py-2" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                            <?= esc($log['action']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <small class="text-muted fw-medium"><?= esc($log['details']) ?></small>
                                    </td>
                                    <td>
                                        <code class="small text-primary bg-primary bg-opacity-10 px-2 py-1 rounded"><?= esc($log['ip_address']) ?></code>
                                    </td>
                                    <td class="text-muted small">
                                        <i class="bi bi-calendar3 me-1"></i> <?= date('M d, Y', strtotime($log['created_at'])) ?><br>
                                        <i class="bi bi-clock me-1"></i> <?= date('h:i A', strtotime($log['created_at'])) ?>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="empty-state">
                                            <i class="bi bi-journal-x"></i>
                                            <h6 class="text-muted fw-bold">No logs found</h6>
                                            <p class="small text-muted">User activities will appear here once tracked.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
