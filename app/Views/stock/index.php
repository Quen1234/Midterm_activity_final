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
                <div class="col-xl-3 col-lg-4 col-md-6 stock-item" data-name="<?= strtolower($item['item_name']) ?>" data-barcode="<?= $item['barcode'] ?>">
                    <div class="stock-card p-4 h-100">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="bg-light rounded-3 p-3 text-center" style="min-width: 60px;">
                                <i class="fas fa-box fa-2x text-primary d-block mb-1"></i>
                                <small class="text-muted fw-bold" style="font-size: 0.6rem;"><?= $item['barcode'] ?: 'NO BARCODE' ?></small>
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
                            <button type="button" class="btn btn-primary btn-sm flex-grow-1 fw-bold rounded-3" onclick="openUpdateModal(<?= $item['id'] ?>, '<?= htmlspecialchars(addslashes($item['item_name'])) ?>', <?= $item['stock'] ?>)">
                                <i class="fas fa-plus me-1"></i> Restock
                            </button>
                            <a href="<?= base_url('inventory/delete/'.$item['id']) ?>" class="btn btn-outline-danger btn-sm rounded-3 px-2" onclick="return confirm('Are you sure you want to delete this item?')">
                                <i class="fas fa-trash"></i>
                            </a>
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

<!-- Update Stock Modal -->
<div class="modal fade" id="updateStockModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <form id="updateStockForm" action="<?= base_url('stock/update') ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="id" id="updateItemId">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Update Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-box fa-2x text-primary"></i>
                        </div>
                        <h4 class="fw-bold mb-1" id="updateItemName">Product Name</h4>
                        <p class="text-muted">Current Stock: <span class="fw-bold text-dark" id="currentStockDisplay">0</span></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Quantity to Add</label>
                        <div class="input-group input-group-lg">
                            <button type="button" class="btn btn-outline-secondary" onclick="adjustQty(-1)">-</button>
                            <input type="number" name="add_qty" id="addQtyInput" class="form-control text-center fw-bold" value="1" min="1">
                            <button type="button" class="btn btn-outline-secondary" onclick="adjustQty(1)">+</button>
                        </div>
                        <small class="text-muted mt-2 d-block">This will be added to the current stock level.</small>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 p-4">
                    <button type="button" class="btn btn-light py-2 px-4 rounded-3 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary py-2 px-4 rounded-3 fw-bold">Update Stock</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function getUpdateModal() {
        return bootstrap.Modal.getOrCreateInstance(document.getElementById('updateStockModal'));
    }

    function openUpdateModal(id, name, currentStock) {
        document.getElementById('updateItemId').value = id;
        document.getElementById('updateItemName').innerText = name;
        document.getElementById('currentStockDisplay').innerText = currentStock;
        document.getElementById('addQtyInput').value = 1;
        getUpdateModal().show();
    }

    function adjustQty(delta) {
        const input = document.getElementById('addQtyInput');
        let val = parseInt(input.value) || 0;
        val = Math.max(1, val + delta);
        input.value = val;
    }

    document.getElementById('stockSearch').addEventListener('input', function(e) {
        const term = e.target.value.toLowerCase();
        const items = document.querySelectorAll('.stock-item');
        
        items.forEach(item => {
            const name = item.getAttribute('data-name');
            const barcode = item.getAttribute('data-barcode') || '';
            if (name.includes(term) || barcode.includes(term)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
<?= $this->endSection() ?>
