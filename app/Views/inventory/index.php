<?= $this->extend('layout/main') ?>

<?= $this->section('styles') ?>
<style>
    /* Professional Background and Typography */
    :root {
        --bg-soft-blue: #f5f7fa;
        --glass-white: rgba(255, 255, 255, 0.8);
        --primary-indigo: #4361ee;
        --slate-600: #475569;
        --slate-400: #94a3b8;
    }

    body {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        min-height: 100vh;
    }

    /* Inventory Toolbar with Glassmorphism */
    .inventory-toolbar {
        background: var(--glass-white);
        backdrop-filter: blur(10px);
        padding: 1.25rem;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.6);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
    }

    /* Modernized Card Container */
    .inventory-card {
        background: white;
        border-radius: 24px;
        border: 1px solid rgba(231, 234, 243, 0.7);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.03), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        overflow: hidden;
    }

    /* Clean Table Styling */
    .table-clean thead th {
        background-color: #f8fafc;
        color: var(--slate-400);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 1.2px;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #f1f5f9;
    }

    .table-clean tbody td {
        padding: 1.4rem 1.5rem;
        vertical-align: middle;
        border-bottom: 1px solid #f8fafc;
        transition: background 0.2s ease;
    }

    .table-clean tbody tr:hover td {
        background-color: #fcfdfe;
    }

    /* Enhanced Stock Progress Bar */
    .stock-container {
        min-width: 160px;
    }
    .progress-micro {
        height: 8px;
        border-radius: 12px;
        background-color: #f1f5f9;
        margin-top: 8px;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
    }
    .progress-bar {
        border-radius: 12px;
    }

    /* Styled Inputs */
    .search-input-group {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 0.3rem 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .search-input-group:focus-within {
        background: white;
        border-color: var(--primary-indigo);
        box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
    }
    .search-input-group input {
        border: none;
        background: transparent;
        font-size: 0.95rem;
        color: #1e293b;
    }
    .search-input-group input:focus { outline: none; box-shadow: none; }

    /* Action Buttons - Minimalist Circle Style */
    .btn-circle {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        border: 1px solid #f1f5f9;
        background: #f8fafc;
        color: var(--slate-600);
    }
    .btn-circle:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .btn-edit:hover { background: #4361ee; color: white; border-color: #4361ee; }
    .btn-delete:hover { background: #ef4444; color: white; border-color: #ef4444; }

    /* Breadcrumb color */
    .breadcrumb-item.active { color: var(--primary-indigo); font-weight: 600; }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4 px-4">
    
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-muted text-decoration-none small">Dashboard</a></li>
                    <li class="breadcrumb-item active small">Inventory</li>
                </ol>
            </nav>
            <h2 class="fw-bold text-dark mb-0 tracking-tight">Inventory Control</h2>
            <p class="text-muted small mb-0">Monitor and manage your store stock levels in real-time.</p>
        </div>
        <a href="<?= base_url('inventory/add') ?>" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center" style="border-radius: 12px; background: var(--primary-indigo); border:none;">
            <i class="fas fa-plus-circle me-2"></i> Add New Product
        </a>
    </div>

    <div class="inventory-toolbar">
        <div class="row g-3 align-items-center">
            <div class="col-md-4">
                <div class="search-input-group d-flex align-items-center">
                    <i class="fas fa-search text-muted me-2"></i>
                    <input type="text" id="inventorySearch" class="form-control" placeholder="Search by name, SKU or category...">
                </div>
            </div>
            <div class="col-md-3">
                <select id="categoryFilter" class="form-select border-0 bg-light fw-medium" style="border-radius: 12px; padding: 0.7rem;">
                    <option value="">All Categories</option>
                    <option>Beverages</option>
                    <option>Snacks</option>
                    <option>Canned Goods</option>
                </select>
            </div>
            <div class="col-md-5 text-md-end">
                <button class="btn btn-link text-muted text-decoration-none fw-bold small me-3">
                    <i class="fas fa-file-export me-1"></i> Export CSV
                </button>
                <button class="btn btn-link text-muted text-decoration-none fw-bold small">
                    <i class="fas fa-print me-1"></i> Print List
                </button>
            </div>
        </div>
    </div>

    <div class="inventory-card">
        <div class="table-responsive">
            <table class="table table-clean mb-0" id="inventoryTable">
                <thead>
                    <tr>
                        <th width="12%">SKU / ID</th>
                        <th width="33%">Item Description</th>
                        <th width="15%">Category</th>
                        <th width="12%">Price</th>
                        <th width="18%">Stock Health</th>
                        <th width="10%" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($inventory)): ?>
                        <?php foreach($inventory as $item): ?>
                        <tr>
                            <td class="font-monospace text-muted small fw-bold">
                                #<?= str_pad($item['id'], 5, '0', STR_PAD_LEFT) ?>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-soft-blue rounded-3 d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 48px; height: 48px; background: #eff6ff;">
                                        <i class="fas fa-box text-primary"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-dark d-block fs-6"><?= $item['item_name'] ?></span>
                                        <small class="text-muted"><i class="far fa-clock me-1"></i>Updated <?= date('M d, Y') ?></small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-primary border-0 px-3 py-2 fw-bold" style="border-radius: 8px; font-size: 0.75rem; letter-spacing: 0.3px;">
                                    <?= strtoupper($item['category']) ?>
                                </span>
                            </td>
                            <td>
                                <span class="fw-bold text-dark fs-6">₱<?= number_format($item['price'], 2) ?></span>
                            </td>
                            <td>
                                <div class="stock-container">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <?php 
                                            $stockLevel = $item['stock'];
                                            $isLow = ($stockLevel <= 5);
                                            $stockText = $isLow ? 'Restock Soon' : 'Healthy';
                                            $stockColor = $isLow ? 'text-danger' : 'text-success';
                                            $barColor = $isLow ? 'bg-danger' : 'bg-success';
                                            $percentage = min(($stockLevel / 50) * 100, 100); 
                                        ?>
                                        <span class="<?= $stockColor ?> fw-bold" style="font-size: 0.85rem;">
                                            <?= $stockLevel ?> Units
                                        </span>
                                        <small class="text-muted" style="font-size: 0.7rem;"><?= $stockText ?></small>
                                    </div>
                                    <div class="progress progress-micro">
                                        <div class="progress-bar <?= $barColor ?> shadow-sm" role="progressbar" style="width: <?= $percentage ?>%"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="<?= base_url('inventory/edit/'.$item['id']) ?>" class="btn-circle btn-edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?= base_url('inventory/delete/'.$item['id']) ?>" 
                                       class="btn-circle btn-delete" 
                                       onclick="return confirm('Archive this product?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" style="width: 80px; opacity: 0.2;" class="mb-3 d-block mx-auto">
                                <p class="text-muted fw-medium">No products found in your inventory.</p>
                                <a href="<?= base_url('inventory/add') ?>" class="btn btn-sm btn-primary">Add your first item</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function(){
        // Search Filter Logic
        $("#inventorySearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#inventoryTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        // Category Filter Logic
        $("#categoryFilter").on("change", function() {
            var value = $(this).val().toLowerCase();
            if(value === "") {
                $("#inventoryTable tbody tr").show();
            } else {
                $("#inventoryTable tbody tr").filter(function() {
                    $(this).toggle($(this).find('td:nth-child(3)').text().toLowerCase().indexOf(value) > -1)
                });
            }
        });
    });
</script>
<?= $this->endSection() ?>