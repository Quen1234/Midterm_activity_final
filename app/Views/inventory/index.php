<!-- Load FontAwesome and a Clean Google Font (Inter) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --bg-color: #f4f7f6;
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        --accent-blue: #0d6efd;
    }

    body { 
        background-color: var(--bg-color); 
        font-family: 'Inter', sans-serif;
        color: #334155;
    }

    /* Container Spacing */
    .pper { padding: 40px 0; }

    /* Clean Card Style */
    .inventory-card {
        background: white;
        border-radius: 20px;
        border: none;
        box-shadow: var(--card-shadow);
        overflow: hidden;
    }

    /* Table Spacing & Styling */
    .table-clean { margin-bottom: 0; }
    .table-clean thead th {
        background-color: #ffffff;
        color: #94a3b8;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
        padding: 25px 30px;
        border-bottom: 1px solid #f1f5f9;
    }

    .table-clean tbody td {
        padding: 30px; /* Large padding for "Larger" feel */
        font-size: 1.05rem; /* Larger font size */
        vertical-align: middle;
        border-bottom: 1px solid #f8fafc;
        transition: background 0.2s;
    }

    .table-clean tbody tr:hover td {
        background-color: #fcfdfe;
    }

    /* Modern Pill Badges */
    .badge-pill {
        padding: 8px 16px;
        border-radius: 100px;
        font-weight: 500;
        font-size: 0.85rem;
    }

    /* Action Buttons - Minimalist */
    .btn-action {
        width: 45px;
        height: 45px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        transition: all 0.3s;
        border: 1px solid #e2e8f0;
        background: white;
        color: #64748b;
    }
    
    .btn-action-delete:hover {
        background: #fee2e2;
        color: #ef4444;
        border-color: #fecaca;
    }

    /* Add Button Elevation */
    .btn-large-add {
        padding: 14px 28px;
        font-weight: 600;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(13, 110, 253, 0.2);
    }
</style>
<nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Inventory</li>
    </ol>
</nav>
<!-- Large Header (Clean Version) -->
<div class="row align-items-center mb-5">
    <div class="col">
        <div>
            <h1 class="display-6 fw-bold text-dark mb-0">Inventory List</h1>
            <p class="text-muted mb-0 small text-uppercase letter-spacing-1">Manage your store's stock levels</p>
        </div>
    </div>
    <div class="col-auto text-end">
        <a href="<?= base_url('inventory/add') ?>" class="btn btn-primary btn-lg btn-large-add px-4">
            <i class="fas fa-plus me-2"></i> Add New Product
        </a>
        
    </div>
</div>
    <!-- Flash Message - Clean & Centered -->
    <?php if(session()->getFlashdata('status')): ?>
        <div class="alert alert-white border shadow-sm rounded-4 p-4 mb-5 d-flex align-items-center animate__animated animate__fadeIn">
            <div class="bg-success text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                <i class="fas fa-check"></i>
            </div>
            <span class="fw-medium text-dark"><?= session()->getFlashdata('status') ?></span>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Table Card -->
    <div class="inventory-card">
        <div class="table-responsive">
            <table class="table table-clean">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Item Description</th>
                        <th>Category</th>
                        <th>Unit Price</th>
                        <th>Stock Level</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($inventory as $item): ?>
                    <tr>
                        <td class="fw-medium text-muted">#<?= $item['id'] ?></td>
                        <td>
                            <span class="fw-bold fs-5 text-dark d-block"><?= $item['item_name'] ?></span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border badge-pill px-3">
                                <?= $item['category'] ?>
                            </span>
                        </td>
                        <td>
                            <span class="fw-bold text-dark fs-5">₱<?= number_format($item['price'], 2) ?></span>
                        </td>
                        <td>
                            <?php if($item['stock'] <= 5): ?>
                                <div class="d-inline-flex align-items-center bg-danger-subtle text-danger px-3 py-2 rounded-pill fw-bold">
                                    <i class="fas fa-exclamation-triangle me-2"></i> <?= $item['stock'] ?> (Low Stock)
                                </div>
                            <?php else: ?>
                                <div class="d-inline-flex align-items-center bg-success-subtle text-success px-3 py-2 rounded-pill fw-medium">
                                    <i class="fas fa-check-circle me-2"></i> <?= $item['stock'] ?> In Stock
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="text-end">
                            <a href="<?= base_url('inventory/delete/'.$item['id']) ?>" 
                               class="btn-action btn-action-delete text-decoration-none" 
                               onclick="return confirm('Remove this item from inventory?')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>