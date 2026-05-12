<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Load modern font and icons -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    :root {
        --primary: #4361ee;
        --primary-dark: #3a56d4;
        --success: #06ffa5;
        --danger: #f72585;
        --warning: #ffb703;
        --dark: #1e293b;
        --gray-bg: #f8fafc;
        --border: #e2e8f0;
    }
    
    /* Stats Card */
    .stats-card { 
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        border-radius: 24px; 
        border: none;
        transition: transform 0.2s, box-shadow 0.2s;
        position: relative;
        overflow: hidden;
    }
    .stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }
    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #4361ee, #06ffa5);
    }
    
    /* Table Styling */
    .table thead th { 
        background: #f1f5f9;
        text-transform: uppercase; 
        font-size: 0.7rem; 
        letter-spacing: 0.05em; 
        font-weight: 700; 
        color: #64748b; 
        border: none;
        padding: 16px 20px;
    }
    .table tbody td { 
        padding: 16px 20px; 
        border-color: #f1f5f9; 
        vertical-align: middle; 
        font-size: 0.9rem;
    }
    .table tbody tr:hover {
        background: #fafbff;
        transition: background 0.2s;
    }
    
    /* Avatar initials */
    .avatar-init { 
        width: 42px; 
        height: 42px; 
        background: linear-gradient(135deg, #e0e7ff, #c7d2fe);
        color: #4338ca; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        border-radius: 12px; 
        font-weight: 700; 
        font-size: 1rem; 
    }
    
    /* Form Controls */
    .form-control, .form-select { 
        background-color: #f8fafc; 
        border: 1px solid #e2e8f0; 
        border-radius: 12px; 
        padding: 12px 16px; 
        font-size: 0.9rem;
        transition: all 0.2s;
    }
    .form-control:focus, .form-select:focus { 
        background-color: #fff; 
        border-color: #4361ee; 
        box-shadow: 0 0 0 3px rgba(67,97,238,0.1); 
        outline: none;
    }
    
    /* Button Pill */
    .btn-pill { 
        border-radius: 14px; 
        padding: 10px 20px; 
        font-weight: 600; 
        transition: all 0.2s; 
        font-size: 0.9rem;
    }
    .btn-dark {
        background: #1e293b;
        border: none;
    }
    .btn-dark:hover {
        background: #0f172a;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .btn-outline-danger {
        border-radius: 10px;
        padding: 6px 14px;
        font-size: 0.8rem;
    }
    
    /* Badge */
    .badge-amount {
        background: #fef3c7;
        color: #d97706;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.8rem;
    }
    
    /* Empty State */
    .empty-state {
        padding: 60px 20px;
        text-align: center;
    }
    .empty-state i {
        font-size: 4rem;
        color: #cbd5e1;
        margin-bottom: 1rem;
    }
    
    /* Breadcrumb */
    .breadcrumb-item a {
        color: #64748b;
        text-decoration: none;
        transition: color 0.2s;
    }
    .breadcrumb-item a:hover {
        color: #4361ee;
    }
    
    /* Modal Styling */
    .modal-content {
        border-radius: 24px;
        border: none;
    }
    .modal-header {
        border-bottom: 1px solid #f1f5f9;
    }
    .input-group-text {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px 0 0 12px;
        font-weight: 600;
    }
    .input-group .form-control {
        border-radius: 0 12px 12px 0;
    }
    
    /* Animation */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .fade-in-up {
        animation: fadeInUp 0.4s ease;
    }
    
    /* Main Card */
    .main-card { 
        border: none; 
        border-radius: 24px; 
        box-shadow: 0 10px 40px rgba(0,0,0,0.05); 
        background: #fff; 
        overflow: hidden;
    }
</style>

<div class="fade-in-up">
    
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb bg-transparent p-0 small">
            <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard') ?>" class="text-decoration-none">
                    <i class="bi bi-house-door me-1"></i> Dashboard
                </a>
            </li>
            <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">
                <i class="bi bi-journal-bookmark-fill me-1"></i> Digital Listahan
            </li>
        </ol>
    </nav>

    <!-- Page Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div class="d-flex align-items-center">
            <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                <i class="bi bi-journal-bookmark-fill fs-3 text-primary"></i>
            </div>
            <div>
                <h2 class="fw-bold text-dark mb-0">Digital Listahan</h2>
                <p class="text-muted small mb-0">Track and manage customer credit / utang records</p>
            </div>
        </div>

        <!-- New Entry Button -->
        <button class="btn btn-dark btn-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="bi bi-plus-lg me-2"></i> New Entry
        </button>
    </div>

    <!-- Summary Statistics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stats-card p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-white-50 small text-uppercase tracking-wide d-block mb-2">Total Outstanding</span>
                        <h2 class="fw-bold text-white mb-0">₱ <?= number_format(array_sum(array_column($listahan, 'amount') ?? []), 2) ?></h2>
                    </div>
                    <div class="bg-white bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-piggy-bank fs-1 text-white opacity-75"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-white-50 small">
                        <i class="bi bi-people-fill me-1"></i> <?= count($listahan ?? []) ?> active borrowers
                    </span>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="stats-card p-4" style="background: linear-gradient(135deg, #1e3a5f 0%, #0f2b45 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-white-50 small text-uppercase d-block mb-2">Average Debt</span>
                        <h2 class="fw-bold text-white mb-0">₱ <?= number_format(array_sum(array_column($listahan ?: [], 'amount') ?: []) / max(1, count($listahan ?: [])), 2) ?></h2>
                    </div>
                    <div class="bg-white bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-graph-up fs-1 text-white opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="stats-card p-4" style="background: linear-gradient(135deg, #2d3748 0%, #1a202c 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-white-50 small text-uppercase d-block mb-2">Highest Debt</span>
                        <h2 class="fw-bold text-white mb-0">₱ <?= number_format(max(array_column($listahan ?: [], 'amount') ?: [0]), 2) ?></h2>
                    </div>
                    <div class="bg-white bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-trophy fs-1 text-white opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table Container -->
    <div class="card main-card overflow-hidden">
        <div class="card-header bg-white border-0 px-4 pt-4 pb-0">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <h5 class="fw-bold mb-0"><i class="bi bi-table me-2"></i>Credit Records</h5>
                <div class="d-flex gap-2">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <span class="input-group-text bg-light border-0 rounded-start-3"><i class="bi bi-search"></i></span>
                        <input type="text" id="searchInput" class="form-control form-control-sm bg-light border-0 rounded-end-3" placeholder="Search customer...">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="debtTable">
                <thead>
                    <tr>
                        <th class="ps-4">Customer Name</th>
                        <th>Items Description</th>
                        <th>Amount Due</th>
                        <th>Due Date</th>
                        <th>Date Added</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php if(!empty($listahan) && is_array($listahan)): ?>
                        <?php foreach ($listahan as $item): ?>
                        <tr class="debt-row">
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-init"><?= strtoupper(substr($item['customer_name'], 0, 1)) ?></div>
                                    <div>
                                        <span class="fw-semibold text-dark"><?= esc($item['customer_name']) ?></span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-muted small"><?= esc($item['items'] ?? '—') ?></td>
                            <td>
                                <span class="badge-amount">₱ <?= number_format($item['amount'], 2) ?></span>
                            </td>
                            <td>
                                <?php 
                                    $dueDateStr = $item['due_date'] ?? date('Y-m-d', strtotime("+7 days", strtotime($item['created_at'])));
                                    $dueDate = strtotime($dueDateStr);
                                    $isOverdue = time() > $dueDate;
                                ?>
                                <div class="d-flex flex-column">
                                    <span class="small fw-semibold <?= $isOverdue ? 'text-danger' : 'text-dark' ?>">
                                        <?= date('M d, Y', $dueDate) ?>
                                    </span>
                                    <?php if($isOverdue): ?>
                                        <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill mt-1" style="font-size: 0.65rem; width: fit-content;">
                                            <i class="bi bi-exclamation-circle me-1"></i> OVERDUE
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill mt-1" style="font-size: 0.65rem; width: fit-content;">
                                            <i class="bi bi-clock-history me-1"></i> ON TIME
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="text-muted small"><?= date('M d, Y', strtotime($item['created_at'])) ?></td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3 view-receipt-btn" 
                                            data-id="<?= $item['id'] ?>"
                                            data-name="<?= esc($item['customer_name']) ?>"
                                            data-items="<?= esc($item['items'] ?? '') ?>"
                                            data-amount="<?= $item['amount'] ?>"
                                            data-due="<?= $item['due_date'] ?? date('Y-m-d', strtotime('+7 days', strtotime($item['created_at']))) ?>"
                                            data-date="<?= date('M d, Y h:i A', strtotime($item['created_at'])) ?>">
                                        <i class="bi bi-receipt me-1"></i> Receipt
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3 settle-btn" 
                                            data-id="<?= $item['id'] ?>"
                                            data-name="<?= esc($item['customer_name']) ?>"
                                            data-email="<?= esc($item['email'] ?? '') ?>"
                                            data-amount="<?= $item['amount'] ?>">
                                        <i class="bi bi-check2-circle me-1"></i> Settle
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    <h5 class="text-muted">No pending listahan records</h5>
                                    <p class="text-muted small">Click "New Entry" to add a customer credit record</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white border-0 px-4 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Showing <?= count($listahan ?? []) ?> records</small>
                <small class="text-muted"><i class="bi bi-info-circle"></i> Click "Settle" to mark debt as paid</small>
            </div>
        </div>
    </div>
</div>

<!-- Aesthetic Modal for Add Record -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/listahan/store" method="POST" class="modal-content border-0 shadow-lg">
            <?= csrf_field() ?>
            <div class="modal-header border-0 px-4 pt-4">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-2">
                        <i class="bi bi-journal-plus text-primary fs-5"></i>
                    </div>
                    <h5 class="fw-bold mb-0">Add New Credit Record</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="small fw-bold text-muted mb-2">
                        <i class="bi bi-person me-1"></i> Customer Full Name
                    </label>
                    <input type="text" name="customer_name" class="form-control shadow-none" placeholder="e.g., Maria Dela Cruz" required>
                </div>
                <div class="mb-3">
                    <label class="small fw-bold text-muted mb-2">
                        <i class="bi bi-envelope me-1"></i> Customer Email (Optional)
                    </label>
                    <input type="email" name="email" class="form-control shadow-none" placeholder="e.g., maria@email.com">
                </div>
                <div class="mb-3">
                    <label class="small fw-bold text-muted mb-2">
                        <i class="bi bi-receipt me-1"></i> Purchased Items
                    </label>
                    <textarea name="items" class="form-control shadow-none" rows="3" placeholder="e.g., 2kg Rice, 1L Cooking Oil, Coffee"></textarea>
                </div>
                <div class="mb-3">
                    <label class="small fw-bold text-muted mb-2">
                        <i class="bi bi-calendar-event me-1"></i> Custom Due Date (Optional)
                    </label>
                    <input type="date" name="due_date" class="form-control shadow-none">
                    <small class="text-muted">Defaults to 7 days from now if left blank.</small>
                </div>
                <div class="mb-3">
                    <label class="small fw-bold text-muted mb-2">
                        <i class="bi bi-cash me-1"></i> Total Amount Due
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                        <input type="number" step="0.01" name="amount" class="form-control border-0 bg-light shadow-none" placeholder="0.00" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 p-4 pt-0">
                <button type="button" class="btn btn-light btn-pill px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-dark btn-pill px-4">
                    <i class="bi bi-save me-2"></i> Save Record
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Settlement Confirmation Modal -->
<div class="modal fade" id="settleModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0">
                <div class="rounded-circle bg-success bg-opacity-10 p-2">
                    <i class="bi bi-check2-circle text-success fs-4"></i>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-4">
                <h5 class="fw-bold mb-3">Settle Debt?</h5>
                <p class="text-muted mb-4">Mark <strong id="settleCustomerName"></strong>'s debt as paid?</p>
                
                <div class="text-start mb-3">
                    <label class="form-label fw-bold small text-uppercase text-muted">Select Payment Mode</label>
                    <div class="row g-2">
                        <div class="col-4">
                            <input type="radio" class="btn-check" name="paymentMethod" id="settleCash" value="cash" checked onchange="togglePartialInput()">
                            <label class="btn btn-outline-primary w-100 py-2 rounded-3" for="settleCash">
                                <i class="bi bi-cash-stack d-block mb-1"></i> Cash
                            </label>
                        </div>
                        <div class="col-4">
                            <input type="radio" class="btn-check" name="paymentMethod" id="settleGcash" value="gcash" onchange="togglePartialInput()">
                            <label class="btn btn-outline-primary w-100 py-2 rounded-3" for="settleGcash">
                                <i class="bi bi-phone d-block mb-1"></i> GCash
                            </label>
                        </div>
                        <div class="col-4">
                            <input type="radio" class="btn-check" name="paymentMethod" id="settlePartial" value="partial" onchange="togglePartialInput()">
                            <label class="btn btn-outline-primary w-100 py-2 rounded-3" for="settlePartial">
                                <i class="bi bi-p-square d-block mb-1"></i> Partial
                            </label>
                        </div>
                    </div>
                </div>

                <div id="partialSettleSection" style="display: none;" class="text-start mb-3">
                    <label for="settleAmount" class="form-label fw-bold small text-uppercase text-muted">Amount to Pay</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0">₱</span>
                        <input type="number" class="form-control border-start-0" id="settleAmount" placeholder="0.00" step="0.01">
                    </div>
                    <small class="text-muted mt-1 d-block">Current Debt: <span id="currentDebtDisplay" class="fw-bold">₱0.00</span></small>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-light btn-pill px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="confirmSettleBtn" class="btn btn-dark btn-pill px-4">
                    <i class="bi bi-check2-circle me-2"></i> Confirm Settle
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Receipt Modal -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-body p-0">
                <div class="receipt-container bg-white p-4" id="printableReceipt">
                    <div class="text-center mb-4">
                        <h5 class="fw-bold mb-0">NANAY LIVY'S STORE</h5>
                        <small class="text-muted">VALID RECEIPT</small>
                        <hr class="my-3 border-dashed">
                    </div>
                    
                    <div id="receiptItems">
                        <!-- Items will be injected here -->
                    </div>

                    <hr class="my-3 border-dashed">
                    
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="fw-bold mb-0">TOTAL DUE</h5>
                        <h5 class="fw-bold mb-0 text-primary" id="receiptTotal">₱0.00</h5>
                    </div>

                    <div id="receiptPaymentDetails" class="bg-light p-2 rounded-3 small mb-4">
                        <div class="d-flex justify-content-between">
                            <span>Customer:</span>
                            <span class="fw-bold" id="receiptCustomerName"></span>
                        </div>
                        <div class="d-flex justify-content-between mt-1">
                            <span>Status:</span>
                            <span class="fw-bold text-danger">UNPAID (UTANG)</span>
                        </div>
                        <div class="d-flex justify-content-between mt-1">
                            <span>Due Date:</span>
                            <span class="fw-bold text-dark" id="receiptDueDate"></span>
                        </div>
                    </div>

                    <div class="text-center">
                        <small class="text-muted">This is a record of credit.</small><br>
                        <small class="text-muted" id="receiptDate"></small>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 p-3 bg-light">
                <button type="button" class="btn btn-secondary w-100 rounded-3 fw-bold mb-2" onclick="window.print()">
                    <i class="bi bi-printer me-2"></i> Print Receipt
                </button>
                <button type="button" class="btn btn-primary w-100 rounded-3 fw-bold" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .border-dashed {
        border-top: 1px dashed #dee2e6;
    }
    @media print {
        @page {
            margin: 0;
            size: auto;
        }
        body {
            visibility: hidden;
            background: white !important;
        }
        #printableReceipt {
            visibility: visible;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            margin: 0;
            padding: 20px;
            background: white !important;
        }
        #printableReceipt * {
            visibility: visible;
        }
        .modal-footer, .btn-close, .modal-header, .btn {
            display: none !important;
        }
        .modal {
            position: absolute;
            left: 0;
            top: 0;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        .modal-content {
            border: none !important;
            box-shadow: none !important;
        }
    }
</style>

<script>
// Search functionality
document.getElementById('searchInput')?.addEventListener('keyup', function() {
    let searchTerm = this.value.toLowerCase();
    let rows = document.querySelectorAll('.debt-row');
    rows.forEach(row => {
        let customerName = row.querySelector('td:first-child .fw-semibold')?.innerText.toLowerCase() || '';
        row.style.display = customerName.includes(searchTerm) ? '' : 'none';
    });
});

// View Receipt functionality
document.querySelectorAll('.view-receipt-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const name = this.getAttribute('data-name');
        const items = this.getAttribute('data-items');
        const amount = this.getAttribute('data-amount');
        const date = this.getAttribute('data-date');
        const dueDateStr = this.getAttribute('data-due');

        document.getElementById('receiptCustomerName').innerText = name;
        document.getElementById('receiptTotal').innerText = '₱' + parseFloat(amount).toLocaleString(undefined, {minimumFractionDigits: 2});
        document.getElementById('receiptDate').innerText = date;

        // Use stored due date for receipt
        const dueDateObj = new Date(dueDateStr);
        const dueDateFormatted = dueDateObj.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
        document.getElementById('receiptDueDate').innerText = dueDateFormatted;

        const itemsContainer = document.getElementById('receiptItems');
        itemsContainer.innerHTML = '';
        
        // Split items by comma and display them
        if (items) {
            const itemsList = items.split(',');
            itemsList.forEach(item => {
                const div = document.createElement('div');
                div.className = 'd-flex justify-content-between mb-1 small';
                div.innerHTML = `<span>${item.trim()}</span>`;
                itemsContainer.appendChild(div);
            });
        } else {
            itemsContainer.innerHTML = '<div class="text-center text-muted small">No items listed</div>';
        }

        new bootstrap.Modal(document.getElementById('receiptModal')).show();
    });
});

// Settlement confirmation
let settleId = null;
let currentDebt = 0;

function togglePartialInput() {
    const isPartial = document.getElementById('settlePartial').checked;
    document.getElementById('partialSettleSection').style.display = isPartial ? 'block' : 'none';
}

document.querySelectorAll('.settle-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        settleId = this.getAttribute('data-id');
        let name = this.getAttribute('data-name');
        currentDebt = parseFloat(this.getAttribute('data-amount'));
        
        document.getElementById('settleCustomerName').innerText = name;
        document.getElementById('currentDebtDisplay').innerText = '₱' + currentDebt.toLocaleString(undefined, {minimumFractionDigits: 2});
        document.getElementById('settleAmount').value = '';
        
        // Reset radio buttons
        document.getElementById('settleCash').checked = true;
        togglePartialInput();
        
        new bootstrap.Modal(document.getElementById('settleModal')).show();
    });
});

document.getElementById('confirmSettleBtn').addEventListener('click', function() {
    if (!settleId) return;
    
    const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
    let url = `/listahan/settle/${settleId}?method=${paymentMethod}`;
    
    if (paymentMethod === 'partial') {
        const amountToPay = parseFloat(document.getElementById('settleAmount').value);
        if (isNaN(amountToPay) || amountToPay <= 0) {
            alert('Please enter a valid amount to pay.');
            return;
        }
        if (amountToPay > currentDebt) {
            alert('Amount to pay cannot be greater than current debt.');
            return;
        }
        url += `&amount=${amountToPay}`;
    }
    
    window.location.href = url;
});

// Auto-dismiss alerts
  setTimeout(() => {
      document.querySelectorAll('.alert').forEach(alert => {
          alert.classList.add('fade');
          setTimeout(() => alert.remove(), 500);
      });
  }, 5000);

  // Sidebar Email Logic
  document.addEventListener('DOMContentLoaded', function() {
      const customerSelect = document.getElementById('dueCustomerSelect');
      const emailInput = document.getElementById('dueCustomerEmail');
      const sendBtn = document.getElementById('sendDueNoticeBtn');
      const statusMsg = document.getElementById('emailStatusMsg');

      if (customerSelect) {
          // Populate customers from the table
          const rows = document.querySelectorAll('.debt-row');
          rows.forEach(row => {
              const name = row.querySelector('.fw-semibold').innerText;
              const amount = row.querySelector('.badge-amount').innerText;
              const dueDate = row.querySelector('.small.fw-semibold').innerText;
              const settleBtn = row.querySelector('.settle-btn');
              const id = settleBtn.getAttribute('data-id');
              const email = settleBtn.getAttribute('data-email');
              
              const option = document.createElement('option');
              option.value = id;
              option.setAttribute('data-name', name);
              option.setAttribute('data-amount', amount);
              option.setAttribute('data-due', dueDate);
              option.setAttribute('data-email', email);
              option.innerText = name;
              customerSelect.appendChild(option);
          });

          // Auto-fill email when customer is selected
          customerSelect.addEventListener('change', function() {
              const selectedOption = this.options[this.selectedIndex];
              const email = selectedOption.getAttribute('data-email');
              emailInput.value = email || '';
          });

          sendBtn.addEventListener('click', function() {
              const email = emailInput.value;
              const selectedOption = customerSelect.options[customerSelect.selectedIndex];
              
              if (!selectedOption.value) {
                  alert('Please select a customer.');
                  return;
              }
              if (!email || !email.includes('@')) {
                  alert('Please enter a valid email address.');
                  return;
              }

              const customerName = selectedOption.getAttribute('data-name');
              const amount = selectedOption.getAttribute('data-amount');
              const dueDate = selectedOption.getAttribute('data-due');

              sendBtn.disabled = true;
              sendBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Sending...';
              
              fetch('/listahan/send-notice', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-Requested-With': 'XMLHttpRequest',
                      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                  },
                  body: JSON.stringify({
                      email: email,
                      name: customerName,
                      amount: amount,
                      due_date: dueDate
                  })
              })
              .then(response => response.json())
              .then(data => {
                  statusMsg.style.display = 'block';
                  if (data.status === 'success') {
                      statusMsg.className = 'mt-2 small text-success';
                      statusMsg.innerHTML = '<i class="bi bi-check-circle me-1"></i> Notice sent successfully!';
                  } else {
                      statusMsg.className = 'mt-2 small text-danger';
                      statusMsg.innerHTML = '<i class="bi bi-exclamation-circle me-1"></i> ' + (data.message || 'Failed to send.');
                  }
              })
              .catch(error => {
                  statusMsg.style.display = 'block';
                  statusMsg.className = 'mt-2 small text-danger';
                  statusMsg.innerHTML = '<i class="bi bi-exclamation-circle me-1"></i> Error occurred.';
              })
              .finally(() => {
                  sendBtn.disabled = false;
                  sendBtn.innerHTML = '<i class="bi bi-send-fill me-1"></i> Send Notice';
                  setTimeout(() => { statusMsg.style.display = 'none'; }, 5000);
              });
          });
      }
  });
 </script>

<?= $this->endSection() ?>