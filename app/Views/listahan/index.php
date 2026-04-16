<!-- Load modern font and icons (put these in your header if possible) -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    body { background-color: #fcfcfd; font-family: 'Inter', sans-serif; color: #334155; }
    
    /* Layout styling */
    .main-card { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.04); background: #fff; }
    
    /* Stats Styling */
    .stats-card { background: #1e293b; color: #fff; border-radius: 16px; border: none; }
    
    /* Table Styling */
    .table thead th { 
        background-color: #f8fafc; 
        text-transform: uppercase; 
        font-size: 0.7rem; 
        letter-spacing: 0.05em; 
        font-weight: 700; 
        color: #64748b; 
        border: none;
        padding: 16px;
    }
    .table tbody td { padding: 16px; border-color: #f1f5f9; vertical-align: middle; }
    
    /* Avatar initials icon */
    .avatar-init { 
        width: 35px; height: 35px; 
        background: #f1f5f9; color: #475569; 
        display: flex; align-items: center; justify-content: center; 
        border-radius: 10px; font-weight: 600; font-size: 0.85rem; 
    }
    
    /* Modern Form Inputs */
    .form-control { 
        background-color: #f8fafc; 
        border: 1px solid #e2e8f0; 
        border-radius: 10px; 
        padding: 10px 14px; 
    }
    .form-control:focus { background-color: #fff; border-color: #cbd5e1; box-shadow: none; }
    
    /* Button pill style */
    .btn-pill { border-radius: 10px; padding: 10px 20px; font-weight: 600; transition: all 0.2s; }
</style>

<div class="container py-5">
    
<!-- Breadcrumb Navigation -->
<nav aria-label="breadcrumb" class="mb-2">
    <ol class="breadcrumb bg-transparent p-0 small">
        <li class="breadcrumb-item">
            <a href="<?= base_url('dashboard') ?>" class="text-decoration-none text-muted">
                <i class="bi bi-house-door me-1"></i> Dashboard
            </a>
        </li>
        <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">Digital Listahan</li>
    </ol>
</nav>

<!-- Page Header Section -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex align-items-center">
        <!-- Minimalist Back Arrow -->
        <a href="<?= base_url('dashboard') ?>" class="btn btn-light rounded-circle border-0 me-3 shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
        </a>
        
        <div>
            <h2 class="fw-bold text-dark mb-0">Digital Listahan</h2>
            <p class="text-muted small mb-0">Tracking active store credits</p>
        </div>
    </div>

    <!-- New Entry Button -->
    <button class="btn btn-dark btn-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="bi bi-plus-lg me-1"></i> New Entry
    </button>
</div>

    <!-- Summary Statistics Card -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card stats-card p-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <span class="text-white-50 small d-block mb-1">Total Outstanding</span>
                        <h3 class="fw-bold mb-0">₱ <?= number_format(array_sum(array_column($listahan, 'amount')), 2) ?></h3>
                    </div>
                    <i class="bi bi-piggy-bank fs-1 text-white-50"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table Container -->
    <div class="card main-card overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Customer Name</th>
                        <th>Items Description</th>
                        <th>Amount Due</th>
                        <th>Date Added</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($listahan)): foreach ($listahan as $item): ?>
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar-init me-3"><?= strtoupper(substr($item['customer_name'], 0, 1)) ?></div>
                                <span class="fw-semibold text-dark"><?= esc($item['customer_name']) ?></span>
                            </div>
                        </td>
                        <td class="text-muted small"><?= esc($item['items']) ?></td>
                        <td><span class="text-danger fw-bold">₱<?= number_format($item['amount'], 2) ?></span></td>
                        <td class="text-muted small"><?= date('M d, Y', strtotime($item['created_at'])) ?></td>
                        <td class="text-end pe-4">
                            <a href="/listahan/delete/<?= $item['id'] ?>" 
                               class="btn btn-light btn-sm rounded-pill px-3 text-danger border-0" 
                               onclick="return confirm('Settle this debt?')">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr><td colspan="5" class="text-center py-5 text-muted">No pending listahan found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Aesthetic Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form action="/listahan/store" method="POST" class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
      <div class="modal-header border-0 px-4 pt-4">
          <h5 class="fw-bold mb-0">Add New Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-4">
        <div class="mb-3">
            <label class="small text-muted fw-bold mb-1">Customer Full Name</label>
            <input type="text" name="customer_name" class="form-control shadow-none" placeholder="Juan Dela Cruz" required>
        </div>
        <div class="mb-3">
            <label class="small text-muted fw-bold mb-1">Purchased Items</label>
            <textarea name="items" class="form-control shadow-none" rows="3" placeholder="e.g. 1kg Rice, 2 Coffee Sticks"></textarea>
        </div>
        <div class="mb-0">
            <label class="small text-muted fw-bold mb-1">Total Debt Amount</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-0">₱</span>
                <input type="number" step="0.01" name="amount" class="form-control border-0 bg-light shadow-none" placeholder="0.00" required>
            </div>
        </div>
      </div>
      <div class="modal-footer border-0 p-4 pt-0">
        <button type="submit" class="btn btn-dark btn-pill w-100 py-3">Save Debt Record</button>
      </div>
    </form>
  </div>
</div>