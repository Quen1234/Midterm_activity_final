<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid fade-in-up">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-decoration-none text-muted">Dashboard</a></li>
            <li class="breadcrumb-item active fw-bold text-primary">My Profile</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="main-card glass-card p-0">
                <div class="p-5 text-center bg-primary bg-opacity-10 border-bottom border-white border-opacity-20 rounded-top-4">
                    <div class="avatar-init mx-auto mb-4 shadow-lg" style="width: 120px; height: 120px; font-size: 3rem; border-radius: 40px; background: linear-gradient(135deg, #4361ee, #3a0ca3); color: white;">
                        <?= strtoupper(substr(session()->get('username'), 0, 1)) ?>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark"><?= esc($user['username']) ?></h3>
                    <p class="text-muted text-uppercase letter-spacing-1 small fw-bold mb-0">
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">
                            <i class="bi bi-shield-check me-1"></i> <?= esc($user['role']) ?>
                        </span>
                    </p>
                </div>

                <div class="p-5">
                    <?php if(session()->getFlashdata('status')): ?>
                        <div class="alert alert-success border-0 rounded-4 shadow-sm py-3 mb-4">
                            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('status') ?>
                        </div>
                    <?php endif; ?>

                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger border-0 rounded-4 shadow-sm py-3 mb-4">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('profile/update') ?>" method="post">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-muted small text-uppercase mb-3">
                                    <i class="bi bi-person me-1"></i> Username
                                </label>
                                <input type="text" name="username" class="form-control" value="<?= esc($user['username']) ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-muted small text-uppercase mb-3">
                                    <i class="bi bi-lock me-1"></i> New Password
                                </label>
                                <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current">
                                <small class="text-muted mt-2 d-block">Min. 8 characters recommended</small>
                            </div>
                            <div class="col-12 mt-5">
                                <button type="submit" class="btn btn-dark btn-pill w-100 py-3 shadow-lg">
                                    <i class="bi bi-save2 me-2"></i> Save Profile Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <p class="text-muted small">Account created on: <span class="fw-bold"><?= date('M d, Y', strtotime($user['created_at'] ?? 'now')) ?></span></p>
            </div>
        </div>
    </div>
</div>

<style>
    .letter-spacing-1 { letter-spacing: 1px; }
    .rounded-top-4 { border-top-left-radius: 32px !important; border-top-right-radius: 32px !important; }
</style>
<?= $this->endSection() ?>
