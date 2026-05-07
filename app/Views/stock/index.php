<?= $this->extend('layout/main') ?>

<?= $this->section('styles') ?>
<style>
    :root {
        --stock-primary: #4361ee;
        --stock-success: #10b981;
        --stock-warning: #f59e0b;
        --stock-danger: #ef4444;
        --stock-bg: #f8fafc;
    }

    .stock-card {
        background: white;
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .stock-card:hover {
        transform: translateY(-5px);
    }

    .stock-badge {
        padding: 0.5rem 1rem;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.85rem;
    }

    .bg-low { background-color: #fee2e2; color: #b91c1c; }
    .bg-medium { background-color: #fef3c7; color: #92400e; }
    .bg-high { background-color: #d1fae5; color: #065f46; }

    .progress-thin {
        height: 6px;
        border-radius: 10px;
        background-color: #f1f5f9;
    }

    .search-box {
        background: #f1f5f9;
        border-radius: 15px;
        border: 2px solid transparent;
        padding: 0.75rem 1.25rem;
        transition: all 0.3s;
    }

    .search-box:focus-within {
        background: white;
        border-color: var(--stock-primary);
        box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
    }

    .search-box input {
        border: none;
        background: transparent;
        outline: none;
        width: 100%;
        font-weight: 500;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Stock Inventory</h2>
            <p class="text-muted mb-0">Manage and monitor real-time stock availability</p>
        </div>
        <div class="d-flex gap-3">
            <div class="search-box d-flex align-items-center" style="min-width: 300px;">
                <i class="fas fa-search text-muted me-2"></i>
                <input type="text" id="stockSearch" placeholder="Search items...">
            </div>
        </div>
    </div>

    <div class="row g-4" id="stockGrid">
        <?php if(!empty($inventory)): ?>
            <?php foreach($inventory as $item): ?>
                <?php 
                    $stockClass = 'bg-high';
                    if($item['stock'] <= 5) $stockClass = 'bg-danger text-white';
                    elseif($item['stock'] <= 15) $stockClass = 'bg-warning text-dark';
                    
                    $percent = min(100, ($item['stock'] / 50) * 100); // Assuming 50 is a "full" stock
                ?>
                <div class="col-xl-3 col-lg-4 col-md-6 stock-item" data-name="<?= strtolower($item['item_name']) ?>">
                    <div class="stock-card p-4 h-100">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="bg-light rounded-3 p-3">
                                <i class="fas fa-box fa-2x text-primary"></i>
                            </div>
                            <span class="stock-badge <?= $stockClass ?>">
                                <?= $item['stock'] ?> Left
                            </span>
                        </div>
                        
                        <h5 class="fw-bold text-dark mb-1"><?= $item['item_name'] ?></h5>
                        <p class="text-muted small mb-3"><?= $item['category'] ?></p>
                        
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="text-muted small">Stock Level</span>
                                <span class="fw-bold small"><?= round($percent) ?>%</span>
                            </div>
                            <div class="progress progress-thin">
                                <div class="progress-bar <?= $item['stock'] <= 5 ? 'bg-danger' : ($item['stock'] <= 15 ? 'bg-warning' : 'bg-success') ?>" 
                                     role="progressbar" 
                                     style="width: <?= $percent ?>%"></div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4 pt-3 border-top">
                            <a href="<?= base_url('inventory/edit/'.$item['id']) ?>" class="btn btn-light btn-sm flex-grow-1 fw-bold rounded-3">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                            <button class="btn btn-primary btn-sm flex-grow-1 fw-bold rounded-3" onclick="alert('Quick Update feature coming soon!')">
                                <i class="fas fa-plus me-1"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <i class="fas fa-box-open fa-4x text-light mb-3"></i>
                <h4 class="text-muted">No items in inventory</h4>
                <a href="<?= base_url('inventory/add') ?>" class="btn btn-primary mt-2">Add Items Now</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    document.getElementById('stockSearch').addEventListener('input', function(e) {
        const term = e.target.value.toLowerCase();
        const items = document.querySelectorAll('.stock-item');
        
        items.forEach(item => {
            const name = item.getAttribute('data-name');
            if (name.includes(term)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
<?= $this->endSection() ?>
